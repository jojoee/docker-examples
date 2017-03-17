// Airbnb code style

const _ = require('lodash')
const express = require('express')
const lodash = require('lodash')
const redis = require('redis')
const mysql = require('mysql')
const mongoClient = require('mongodb').MongoClient
const fivebeans = require('fivebeans')
const amqp = require('amqplib/callback_api')
const app = express()
const port = 8007
const nodeEnv = process.env.NODE_ENV
const isProd = (nodeEnv === 'production')

const localConfig = {
  mysql: {
    host: 'localhost',
    user: 'root',
    pass: null,
    name: 'jojoee_test',
  },
  mongo: {
    host: 'localhost',
    port: 27017,
    name: 'jojoee_test',
  },
  redis: {
    host: 'localhost',
    port: 6379,
  },
  beanstalkd: {
    host: 'localhost',
    port: 11300,
  },
  rabbitmq: {
    host: 'localhost',
    port: 5672,
  },
}
const dockerConfig = {
  mysql: {
    host: 'db_mysql',
    user: 'root',
    pass: 'rootpass',
    name: 'jojoee_test',
  },
  mongo: {
    host: 'db_mongo',
    port: 27017,
    name: 'jojoee_test',
  },
  redis: {
    host: 'db_redis',
    port: 6379,
  },
  beanstalkd: {
    host: 'queue_beanstalkd',
    port: 11300,
  },
  rabbitmq: {
    host: 'queue_rabbitmq',
    port: 5672,
  },
}

var config = (isProd) ? _.assign({}, localConfig, dockerConfig) : localConfig
var error = {
  mysql: null,
  mongo: null,
  redis: null,
  beanstalkd: null,
  rabbitmq: null,
}

// MySQL
// https://github.com/mysqljs/mysql
const mysqlClient = mysql.createConnection({
  host: config.mysql.host,
  user: config.mysql.user,
  password: config.mysql.pass,
  database: config.mysql.name,
})
mysqlClient.connect(function(err) {
  if (err) error.mysql = err
})
mysqlClient.query('SELECT 1', function(err, results, fields) {
  if (err) error.mysql = err
})

// MongoDB
// https://github.com/mongodb/node-mongodb-native
const mongoConnectUrl = `mongodb://${config.mongo.host}:${config.mongo.port}/${config.mongo.name}`
mongoClient.connect(mongoConnectUrl, function(err, db) {
  if (err) error.mongo = err
})

// Redis
const redisClient = redis.createClient(config.redis.port, config.redis.host)
redisClient.on('error', function (err) {
  error.redis = err
})

// beanstalkd
// https://github.com/ceejbot/fivebeans
const beanstalkdClient = new fivebeans.client(config.beanstalkd.host, config.beanstalkd.port)
beanstalkdClient
  .on('error', function(err) {
    error.beanstalkd = err
  })
  .connect()

// RabbitMQ
// https://github.com/squaremo/amqp.node
amqp.connect(`amqp://${config.rabbitmq.host}`, function(err, conn) {
  error.rabbitmq = err
})

var result = getResult()

app.get('/', function (req, res) {
  res.send(result)
})

app.listen(port, function () {
  console.log(result)
})

function copy(obj) {
  return JSON.parse(JSON.stringify(obj));
}

function getResult() {
  var connection = copy(error)
  _.forOwn(connection, function(value, key) {
    connection[key] = !value
  })

  return {
    port: port,
    config: config,
    connection: connection,
    error: error,
  }
}

var interval = setInterval(function() {
  result = getResult()
  console.log(result)
  clearInterval(interval)
}, 1000)
