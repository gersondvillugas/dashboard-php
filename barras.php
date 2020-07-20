<?php
include("database.php");
//html:5 short cut
$sql="SELECT *,SUM(IND_251) FROM tb_resultados_659334_e group by canales";
$result=mysqli_query($conn,$sql);
$valoresY=array(); //Totales  IND_251
$valoresX=array();//canales
while($ver=mysqli_fetch_row($result)){
    $valoresY[]=$ver[6];
    $valoresX[]=$ver[2];
    
}
$datosX=json_encode($valoresX);
$datosY=json_encode($valoresY);
?>
<div id="graficabarras">
<script type="text/javascript">
function crearCadenalineal(json){
    var parsed= JSON.parse(json);
    var arr=[];
    for(var x in parsed){
        arr.push(parsed[x]);
    }
    return arr;
}
</script>    


<script type="text/javascript">
datosX=crearCadenalineal('<?php echo $datosX ?>')
datosY=crearCadenalineal('<?php echo $datosY ?>')

var data = [
    {
        x: datosX,
        y: datosY,
        type: 'bar'
    }
];
var layout = {
    title: 'Cumplimiento',
    font:{
        family: 'Raleway, sans-serif'
    },
    showlegend: false,
    xaxis: {
        tickangle: -45
    },
    yaxis: {
        zeroline: false,
        gridwidth: 2
    },
    bargap :0.05
};

Plotly.newPlot('graficabarras', data,layout)

</script>
</div>