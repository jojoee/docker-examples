const http = require('http')
const port = 8006
const welcomeMsg = 'Server is listening at ' + port

var server = http.createServer(function(req, res) {
  res.writeHead(200)
  res.write(welcomeMsg)
  res.end()
})

server.listen(port)
console.log(welcomeMsg)
