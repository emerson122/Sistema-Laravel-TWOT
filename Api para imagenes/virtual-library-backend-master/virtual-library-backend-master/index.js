const app = require('./app/app')

app.listen(app.get('port'), (err) => {
    if(err) {
        console.log(`Ocurrio un error :(  : ${err}`)
    }else {
        console.log(`\n\t\t2.El servidor esta corriendo : ) \n\t\tEn el puerto ${app.get('port')}`)
    }
})