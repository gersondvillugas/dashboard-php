<?php
  include("database.php");
 // $where="";

 $where="";



////////////////////// BOTON BUSCAR //////////////////////////////////////
$anho="";
$mes="";
if (isset($_POST['buscar']))
{
  
	
  if (isset($_POST["xano"]))
  {
    $anho = $_POST["xano"];
   # echo $anho;
   # echo " is your year";
  } 
 
  if (isset($_POST["xmes"]))
  {
    $mes = $_POST["xmes"];
    #echo $mes;
    #echo " is your mes";
  } 

  

	if (empty($_POST['xano']))
	{ 
    $where="where cod_mes =$mes ";
    #echo "12/28/2002 - %V,%G,%Y = " . strftime("%B", strtotime("1")) . "\n";

	}

	else if (empty($_POST['xmes']))
	{
		$where="where cod_anho=$anho";
	}

	else
	{
		$where="where cod_mes = $mes and cod_anho=$anho";
	}
}
 
/////////////////////// boton ////////////////////////
$atento='';;
$t_contacto='';
$master_center='';
$plus_metas='';
$plus_metas_web='';
$coalition='';
if (isset($_POST['atento']))
{   $atento='ATENTO';
    #$atento=$_POST['atento'];
   # $where="where canales IN ('$atento')";
   # echo  $atento;

}
if (isset($_POST['t_contacto']))
{   $t_contacto='T-Contacto';
    #$atento=$_POST['atento'];
    #$where="where canales IN ('$t_contacto')";
   # echo  "gg";

}
if (isset($_POST['master_center']))
{   $master_center='Master Center';
    #$atento=$_POST['atento'];
    #$where="where canales IN ('$master_center')";
   # echo  "gg";

}
if (isset($_POST['plus_metas']))
{   $plus_metas='PLUS METAS';
    #$atento=$_POST['atento'];
    #$where="where canales IN ('$plus_metas')";
   # echo  "gg";

}
if (isset($_POST['plus_metas_web']))
{   $plus_metas_web='PLUS.METAS WEB';
    #$atento=$_POST['atento'];
    #$where="where canales IN ('$plus_metas_web')";
   # echo  "gg";

}
if (isset($_POST['coalition']))
{   $coalition='COALITION';
    #$atento=$_POST['atento'];
    #$where="where canales IN ('$coalition')";
   # echo  "gg";

}

if(!empty($atento) ||
  !empty($master_center)  ||
   !empty($coalition) || !empty($plus_metas) || !empty($plus_metas_web) || 
   !empty($t_contacto)  ){
  #echo "es vacio";
   $where="where canales IN ('$coalition','$atento','$master_center','$t_contacto'
   
   '$plus_metas_web','$plus_metas')";

}
$query="SELECT *,SUM(IND_251) FROM tb_resultados_659334_e $where group by canales";







/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

  $query="SELECT *,SUM(IND_251) FROM tb_resultados_659334_e  $where group by canales";
 #  FROM tb_resultados_659334_e 
  //html:5 short cut
  #$query="SELECT * FROM tb_resultados_659334_e";
  $query1="SELECT  distinct  cod_anho FROM tb_resultados_659334_e";
  $query2="SELECT distinct cod_mes FROM tb_resultados_659334_e";
  $result_anios=mysqli_query($conn,$query1);
  $result_mes=mysqli_query($conn,$query2);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>filtro por mes y año presionar refrescar </span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <setcion>
          <form method="post">
          <div class="form-group">
          <select name="xano" id="" class="form-control">
             <option value="">Año</option>
             
           
             <?php
                             # $query="SELECT  distinct  cod_mes  FROM tb_resultados_659334_e";
                             # $result_task=mysqli_query($conn,$query);
                              //recorrera mis tareas
                              while($row=mysqli_fetch_assoc($result_anios)){ ?>
                          <option <?php echo $row['cod_anho'] ?>><?php echo $row['cod_anho'] ?></option>';
            <?php  } ?>                  

          
           </select>
          
          </div>        
           <div class="form-group" >
           <select name="xmes" id="" class="form-control">
             <option value="">Mes</option>
             <?php
                           #   $query="SELECT  distinct  cod_mes  FROM tb_resultados_659334_e";
                            #  $result_task=mysqli_query($conn,$query);
                              //recorrera mis tareas
                              while($row=mysqli_fetch_assoc($result_mes)){ ?>
                          <option <?php echo $row['cod_mes'] ?>><?php echo $row['cod_mes'] ?></option>';
            <?php  } ?>
          
           </select>
           
           </div>
           <button name="buscar" type="submit" class="btn btn-warning btn-lg btn-block">Refrescar</button>                      
         
         </form>

      </setcion>
      <!-- Divider -->
      <hr class="sidebar-divider">

      

  

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white  shadow">
          
        
           
            <div>
                  <p> Multifiltros Canales</p>
            
                    <form  method="post" class="form-inline">
                      <button name="atento" class="btn btn-secondary" type="submit">ATENTO</button>
                      <button  name="t_contacto" class="btn  btn-secondary" type="submit">T-Contacto</button>
                      <button name="master_center" class="btn btn-secondary" type="submit">Master Center</button>
                      <button  name="plus_metas" class="btn  btn-secondary" type="submit">PLUS METAS</button>
                      <button  name="plus_metas_web" class="btn  btn-secondary" type="submit">PLUS.METAS WEB</button>
                      <button  name="coalition" class="btn  btn-secondary" type="submit">COALITION</button>

                    </form>                      
          
            
            </div>
         
        </nav>
        <!-- End of Topbar -->