
const { connection, Factory } = require('../factory/query_factory')

 
async function todoslosproductos (req, res) {
    console.log("todoslosproductos")
    let sql_todaslasimagenes = `select * from imagenes`
    const res_todaslasimagenes = await Factory(sql_todaslasimagenes)

    //let sql_freeebooks = `select * from freebook limit 4`  // no lo uso
    //const res_freebook = await Factory(sql_freeebooks)

    res.json({imagenes : res_todaslasimagenes}) 
    //res.json( res_todaslasimagenes)   //si da errores utilizar esta opcion
}

/* async function  obtenerunproducto (req, res) {
    console.log('producto obtenido');
    const { id } = req.params
    let sql = `select * from audiobooks where id = ${parseInt(id)}`
    const result = await Factory(sql)
    res.json(result) 
}*/

async function obtenerunproducto (req, res) {
    const { id } = req.params
    let sql = `select * from imagenes where COD_PRODUCTO = ${parseInt(id)}`
    const result = await Factory(sql)
    res.json(result)
}



async function nuevoproducto (req, res) {
    console.log('nuevo producto');
    
    const { body, file } = req   //body contiene el nombre del producto y el archivo

    if(file) {  //si ya existe el archivo
        //convertir a entero
        var precioint = parseInt(body.precio);
        let url = `http://localhost:8080/image/${file.filename}`
        let sql = `INSERT INTO imagenes( Nombre,Descripcion,imagen ,Precio) VALUES 
                    (${connection.escape(body.nombre)},${connection.escape(body.descripcion)}, ${connection.escape(url)}, ${connection.escape(precioint)})`

        const result = await Factory(sql)
        console.log('se agrego la imagen');
        
        res.send(`<head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>
        <body style="background-color:#3E5676;">
        <center>
        <marquee BGCOLOR=#FFFFFF>Ya se agrego regresa a la pagina anterior para enviar los otros datos</marquee>	
        <a class="btn btn-warning btn-lg" role="button" href="javascript: history.back()">Volver atrás</a>
        <center>
        </body>` );
        //res.redirect('http://127.0.0.1:8000/compras'); //finaliza el proceso de respuesta
       // res.json(result) //mostrar el resultado por consola
    }
}
/*
async function newEBook (req, res) {
    const { body, file } = req

    if(file) {

        let url = `http://localhost:8080/image/${file.filename}`
        let sql = `insert into freebook(name, author, img_url) values 
                    (${connection.escape(body.name)}, ${connection.escape(body.author)}, ${connection.escape(url)})`

        const result = await Factory(sql)
        res.json(result)
    } 
} */

module.exports = {
    todoslosproductos,
    obtenerunproducto, 
    nuevoproducto,
    
}