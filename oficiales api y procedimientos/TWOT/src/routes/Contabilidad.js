const express = require('express');
const mysql = require("../database");
const router = express.Router();

router.get(["/contabilidad", "/Leer"],(req, res)=>{
    const sql = `CALL PROC_INGRESOS('?', '?', 4)`
    mysql.query(sql,(error,results)=>{
        if(error) throw error;
        if(results.length>0){
            res.json(results[0]);
        }else{
            res.send('No se pudo obtener resultados')
        }
    });  
    console.log('Datos leidos correctamente');
});

router.get(["/conteo", "/Leer"],(req, res)=>{
    const sql = `CALL PROC_MAXIMOS()`
    mysql.query(sql,(error,results)=>{
        if(error) throw error;
        if(results.length>0){
            res.json(results[0]);
        }else{
            res.send('No se pudo obtener resultados')
        }
    });  
    console.log('Datos leidos correctamente');
});


router.put('/ingresos',(req,res)=>{
    const objingresos ={
        
        INGRESOS: req.body.INGRESOS,
        EGRESOS: req.body.EGRESOS,
    }
    const sql = `CALL PROC_INGRESOS(${objingresos.INGRESOS},${objingresos.EGRESOS},'1')`
    mysql.query(sql, error=>{
        if(error) throw error;
        res.send('Se actualizo correctamente')
    })
    console.log('Datos actualizados correctamente');
});

router.put('/egresos',(req,res)=>{
    const objingresos ={
        
        INGRESOS: req.body.INGRESOS,
        EGRESOS: req.body.EGRESOS,
    }
    const sql = `CALL PROC_INGRESOS(${objingresos.INGRESOS},${objingresos.EGRESOS},'2')`
    mysql.query(sql, error=>{
        if(error) throw error;
        res.send('Se actualizo correctamente')
    })
    console.log('Datos actualizados correctamente');
});


/* ESTA RUTA YA NO SIRVE, ESTATUS FUERA DE SERVICIO*/
router.put('/capital',(req,res)=>{
    const objingresos ={
        
        INGRESOS: req.body.INGRESOS,
        EGRESOS: req.body.EGRESOS,
    }
    const sql = `CALL PROC_INGRESOS(${objingresos.INGRESOS},${objingresos.EGRESOS},'3')`
    mysql.query(sql, error=>{
        if(error) throw error;
        res.send('Se actualizo correctamente')
    })
    console.log('Datos actualizados correctamente');
});



module.exports=router;
