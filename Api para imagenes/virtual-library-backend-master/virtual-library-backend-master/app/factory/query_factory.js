const util = require('util') //esta es la nueva forma de conectar y hacer consultas
const connection = require('../../config/connection') //recibe la conexion a nuestra base de datos
const query = util.promisify(connection.query).bind(connection) //esta es la que hace la consultas  se le pasa la conexion y con un bind para poder usar la conexion de otro archivo aqui

async function Factory(sql) {  //esta es la que maneja todas la peticiones a la base de datos recibe una consulta sql
    try {
        let sql_query = sql      //se  declara nuestra consulta que es igual a lo que sea que se este pidiendo desde las otras funciones
        const res = await query(sql_query) // aqui contiene el resultado de la consulta 
        return res                 // y retorna ese resultado
    }catch(err) {
        console.log(`Ocurrio un error : (  : ${err}`)
        return err
    }
}

module.exports = {
    Factory,
    connection
}