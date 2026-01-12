const express = require('express')
const app = express()
const port = 3000

app.get('/', (req, res) => {
  res.send('Hola mundo de Node, de parte de Borja')
})

app.listen(port, '0.0.0.0', () => { 
  console.log(`Example app listening on port ${port}`) 
})
