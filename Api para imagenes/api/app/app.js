const express = require('express')
const port = process.env.PORT || 8080
const { urlencoded, json } = require('express')
const path = require('path')
const cors = require('cors')

// Inicializamos el servidor
const app = express()

//configuramos el puerto que nos de o si no utilizamos el 8080
app.set('port', port)


// middlewares
app.use(cors())//para permitir el acceso de otras aplicaciones
app.use(urlencoded({extended: true})) //este es para el manejo de imagenes 
app.use(json()) //para poder utilizar json y devolver ne formato json al cliente los datos que nos de el servidor

// routes / rutas
app.use('/imagenes', require('./routes/imagen.routes')) //ruta principal

// public static files / carpeta publica estatica
app.use(express.static(path.join(__dirname, '../static'))) //ruta donde se guardan las imagenes

module.exports = app      //exporto todo este metodo para poder usarlo en el index
