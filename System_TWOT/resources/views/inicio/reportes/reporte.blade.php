@extends('adminlte::page')

@section('title', 'reporte')


@section('content_header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    
    <h1>TWOT</h1>

@stop

@section('content') 
<input type="hidden" id="ingresos" value="{{$contaArreglo[0]['INGRESOS']}}">
<input type="hidden" id="egresos" value="{{$contaArreglo[0]['EGRESOS']}}">
<input type="hidden" id="capital" value="{{$contaArreglo[0]['CAPITAL']}}">
<center><h1>REPORTE DE CAPITAL</h1> </center>
<br>
<h2>La empresa cuenta con un capital de: L. {{$contaArreglo[0]['CAPITAL']}}</h2>
<br>
<br>
<h2>En la Fecha de: {{date('m-d-Y h:i:s a', time())}}</h2>


<canvas id="myChart" class="bg-warning" width="10" height="5"></canvas>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<!-- chartjs.org en la seccion get started-->
<script>
   var ingresos = document.getElementById('ingresos').value;
   var egresos = document.getElementById('egresos').value;
   var capital = document.getElementById('capital').value;
        let date = new Date().toDateString();;
       
        var ctx= document.getElementById("myChart").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"pie",
            data:{
                labels:['Ingresos','Gastos','Capital'],
                datasets:[{
                        label:'THE WORLD OF TOOLS       '+ date,
                        data:[ingresos,egresos,capital],
                        backgroundColor:[
                            'rgb(66, 134, 244,0.5)',
                            'rgb(74, 135, 72,0.5)',
                            'rgb(229, 89, 50,0.5)'
                        ]
                }]
            },
            options:{
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                    }]
                }
            }
        });
    </script>

@stop