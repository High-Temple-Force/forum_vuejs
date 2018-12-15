const express = require('express')
const bodyParser = require('body-parser')
const cors = require('cors')
const path = require('path')

const app = express()

// middleware
app.use(bodyParser.json())
app.use(cors())

const posts = require('./routes/api/posts')

app.use('/api/posts', posts)

// handle product
if (process.env.NODE_ENV === 'production') {
  // static folder
  app.use(express.static(path.join(__dirname, 'public/')))

  // handle spa
  app.get(/.*/, (req, res) => res.sendFile(path.join(__dirname, '/public/index.html')))
}

const port = process.env.PORT || 5000

app.listen(port, () => console.log(`Server started on port ${port}`))
