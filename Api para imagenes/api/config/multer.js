
const multer = require('multer')
const path = require('path')

const storage = multer.diskStorage({
    destination: function(req, file, cb) { //le paso el destino  recibe lo que envie el cliente (req) recibe un archivo (file) y (cb) un objeto con el que podemos manipular
        cb(null, path.join(__dirname, '../static/image')) //llamo al objeto y le paso la dirrecion para guardar la imagen desde donde estamos hasta donde lo queremos guardar
    },
    filename: function(req, file, cb) {  //nombre del archivo que se va a guardar  recibe las mismas cosas que el otro
        cb(null, `image${Date.now()}.${file.mimetype.split('/')[1]}`) //lepongo el nombre dela imagen y le paso la fecha para que siempre sea diferente y el mimetype que es png o jpg y luego lo corto en la pleca y le digo que el segundo parametro
    }

    // image/jpg
})

module.exports = storage