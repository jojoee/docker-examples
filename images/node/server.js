'use strict';

const express = require('express');

// Constants
const PORT = 8080;

// App
const app = express();
app.get('/', function (req, res) {
  res.send('Hello world from /images/node/server.js\n');
});

app.listen(PORT);
console.log('Running on http://localhost:' + PORT);

try {
  var lodash = require('lodash');
  console.log('lodash: OK');

} catch (ex) {
  console.log('lodash: not OK');
}
