const route = require('express').Router()
const path = require('path');
const fs = require('fs');
const multer = require('multer');
//const upload = multer({dest: '../../public/images'})
const upload = multer({ storage: multer.memoryStorage()}) //almacena la imagen en memoria

route.get('/prueba',(req,res)=>{
    res.json({message : "oye tu ves esto?"})
})

route.post('/imagen',upload.single('imagen'),(req,res)=>{
    const body = req.body
    const file = req.file
    console.log(file);
    res.send('Que ondaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
})
/*
const storage = require('../../config/multer')
const multer = require('multer')
const uploader = multer({storage})

const { getInicializarionData, getOneBook, getOneEbook, getAudioBooks, getEbooks, newAudioBook, newEBook } = require('../controller/book.controller')


route.get('/getInicializationData', getInicializarionData)
route.get('/getOneBook/:id', getOneBook)
route.get('/getOneEbook/:id', getOneEbook)

route.get('/getAudioBooks', getAudioBooks)


route.get('/getEbooks', getEbooks)

route.post('/newAudioBook', uploader.single('file'), newAudioBook)

route.post('/newEBook', uploader.single('file'), newEBook)

*/

module.exports = route