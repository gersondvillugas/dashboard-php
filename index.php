<?php
  include("database.php")
  //html:5 short cut
?>


<?php require_once "vistas/parte_superior.php"?>

<!-- INICIO DEL CONT PRINCIPAL -->
<div class="container">
         <div class="row">

            <div class="col-sm-12">
               <div class="pane panel-primary">
                     <div class="panel panel-heading">
                        Graficas con plotly</div> 
               </div>
               <div class="panel panel-body">
                     <div class="row">
                         <div class="col-sm-6">
                              <div id="cargaBarras"></div>
                         </div>
                         <div class="col-sm-6">
                         <div id="employee_table" class="table-responsive">    
                        <table class="table table-bordered">
                                          <thead>
                                             <tr>
                                                 <th>
                                                    Año
                                                 </th>
                                                 <th>
                                                  Canales
                                                 </th>
                                                 <th>
                                                   Total
                                                 </th>
                                                 <th>
                                                   Mes
                                                 </th>
                                              </tr>
                              
                                          </thead>
                           <tbody>

                           
                              <?php
                            #  $query="SELECT *,SUM(IND_251) FROM tb_resultados_659334_e group by canales";
                              $result_task=mysqli_query($conn,$query);
                              //recorrera mis tareas
                              while($row=mysqli_fetch_array($result_task)){ ?>
                                 <tr>
                                    <td> <?php echo $row['cod_anho'] ?></td>
                                    <td> <?php echo $row['canales'] ?></td>
                                    <td   
                                        <?php
                                             if($row['SUM(IND_251)']>600) {
                                                echo ' style="background-color: green; color: white;"';
                                             } else {
                                                echo ' style="background-color:red; color: white;"';
                                             }
	                                    ?>
                                    
                                      > <?php
                                             echo $row['SUM(IND_251)']

                                            ?></td>
                                    <td> <?php echo $row['cod_mes'] ?></td>
                                    <!-- <td> 
                                             <input data-target="#edit_data_Modal" type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" />
                                             <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn
                                             btn-danger">
                                             <i class="material-icons">delete</i>
                                             </a>
                                       </td> -->
                                 </tr>
                              <?php  } ?>
                              </tbody>
                           </table>

               </div>   
                         </div>

                     </div>
               </div>
               
            </div>    
            
         </div>

</div>
<script type="text/javascript">
   $(document).ready(function(){
        $('#cargaBarras').load('barras.php');


   });
</script>
<!-- FIN DEL CONT PRINCIPAL -->
<?php require_once "vistas/parte_inferior.php"?>