const route = require('express').Router()

const storage = require('../../config/multer')
const multer = require('multer')
const uploader = multer({storage})

const { todoslosproductos, obtenerunproducto, nuevoproducto} = require('../controller/imagen.controller')


route.get('/todoslosproductos', todoslosproductos)
route.get('/obtenerunproducto/:id', obtenerunproducto)
//route.get('/getOneEbook/:id', getOneEbook)

//route.get('/getAudioBooks', getAudioBooks)


//route.get('/getEbooks', getEbooks)

route.post('/nuevoproducto', uploader.single('file'), nuevoproducto)

//route.post('/newEBook', uploader.single('file'), newEBook)


module.exports = route
