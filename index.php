<?php
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	$query_perfil=mysqli_query($con,"select * from perfil where id=1");
	$rw=mysqli_fetch_assoc($query_perfil);
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Script PHP para control de notas de gastos" />
    <meta name="author" content="Obed Alvarado" />
   
    <title>Presupuesto Mensual - <?php echo $rw['nombre_comercial'];?></title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
	<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel=icon href='http://obedalvarado.pw/img/logo-icon.png' sizes="32x32" type="image/png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	

	<style>
		table.table td a.edit {
        color: #FFC107;
    	}
     	table.table td i {
        font-size: 19px;
    	}
    	table.table td a:hover {
		color: #2196F3;
		}
	</style>


</head>
<body >

	<?php
	//add
	include("modal/add/gastos.php");
	include("modal/add/ganancias.php");

	//update
	include("modal/update/gastos.php");
	include("modal/update/ganancias.php");

	  ?>
    <div class="container outer-section" >
        
        <div id="print-area">
                  <div class="row pad-top font-big">
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <a href="https://obedalvarado.pw/" target="_blank">  <img src="assets/img/logo.png" alt="Logo sistemas web" /></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <strong>E-mail : </strong> <?php echo $rw['email'];?>
                    <br />
                    <strong>Teléfono :</strong> <?php echo $rw['telefono'];?> <br />
					<strong>Sitio web :</strong> <?php echo $rw['web'];?> 
                   
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <strong><?php echo $rw['nombre_comercial'];?>  </strong>
                    <br />
                    Dirección : <?php echo $rw['direccion'];?> 
                </div>

            </div>
            <div class="row">
            	<hr />
            	<div class="col-md-12">   

                    <div class="col-md-3">
                        <label>Fecha <span class="text-danger"></span></label>
                        <div class="cal-icon">
                             <input class="form-control datetimepicker" type="text" id="date"  name="date" value="<?php echo date("m/Y");?>">

                         </div>
                    </div>
                </div>   
            </div>
            
            

            <div class="row ">
			
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <h2>Gastos </h2> 	
                    <div id="resultadosIndicadorGastos"></div>
                    
                </div>


                <div class="col-lg-6 col-md-6 col-sm-6">
                    <h2>Ganancias</h2>
                    <div id="resultadosIndicadorGanancias"></div>
                </div>
            </div>
            
         
            <div class="row">
			<hr />

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="table-responsive">
                        <table class="table table-striped  table-hover">
                            <thead>
                                <tr>
                                    <th class='text-center'>Item</th>
									<th class='text-center'>Descripción</th>
									<th class='text-center'>Previsto</th>
                                    <th class='text-center'>Real</th>
                                    <th class='text-center'>Difer.</th>
									<th class='text-center'></th>
                                </tr>
                            </thead>
                            <tbody class='items_gastos'>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="table-responsive">
                        <table class="table table-striped  table-hover">
                            <thead>
                                <tr>
                                    <th class='text-center'>Item</th>
									<th class='text-center'>Descripción</th>
									<th class='text-center'>Previsto</th>
                                    <th class='text-center'>Real</th>
                                    <th class='text-center'>Difer.</th>
									<th class='text-center'></th>
                                </tr>
                            </thead>
                            <tbody class='items_ganancias'>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
	
	
	
   
</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 
 <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script><
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>


<script>
	$(document).ready(function() {
  	fecha =  new Date();
	//Año
	year = fecha.getFullYear();
	//Mes
	mes = fecha.getMonth() + 1;
 	data = mes+"/"+year;

	changeDate(data);


});
</script>


<script type="text/javascript">
    $(function () {
        $('.datetimepicker').datetimepicker({
        	 format: 'MM/YYYY'
        	   
        })
        .on('dp.change', function (e) {
        	var fecha = $("#date").val();
         	changeDate(fecha);
         });
    });
</script>

<script type="text/javascript">

	function changeDate(fecha){

		mostrar_items_gastos(fecha);
	 	mostrar_items_ganancias(fecha);
	 	indicadorGastosUpdate(fecha);
	 	indicadorGananciasUpdate(fecha);

	}

	function indicadorGastosUpdate(fecha){		
		$.ajax({
			type: "GET",
			url:'ajax/indicadores.php?fecha='+fecha+"&indicadorGastos=indicadorGastos",			
			 beforeSend: function(objeto){
			 $('#resultadosIndicadorGastos').html('Cargando...');
		  },
			success:function(data){
				$("#resultadosIndicadorGastos").html(data).fadeIn('slow');
		}
		})
	}

	function indicadorGananciasUpdate(fecha){		
		$.ajax({
			type: "GET",
			url:'ajax/indicadores.php?fecha='+fecha+"&indicadorGanancias=indicadorGanancias",			
			 beforeSend: function(objeto){
			 $('#resultadosIndicadorGanancias').html('Cargando...');
		  },
			success:function(data){
				$("#resultadosIndicadorGanancias").html(data).fadeIn('slow');
		}
		})
	}



   

	function mostrar_items_gastos(fecha){
		var parametros={"action":"ajax"};
		$.ajax({
			url:'ajax/gastos.php?fecha='+fecha,
			data: parametros,
			 beforeSend: function(objeto){
			 $('.items_gastos').html('Cargando...');
		  },
			success:function(data){
				
				$(".items_gastos").html(data).fadeIn('slow');
		}
		})
	}

	function mostrar_items_ganancias(fecha){
		var parametros={"action":"ajax"};
		$.ajax({
			url:'ajax/ganancias.php?fecha='+fecha,
			data: parametros,
			 beforeSend: function(objeto){
			 $('.items_ganancias').html('Cargando...');
		  },
			success:function(data){
				$(".items_ganancias").html(data).fadeIn('slow');
		}
		})
	}
	
	
	$( "#guardar_ganancias" ).submit(function( event ) {
		parametros = $(this).serialize();
		var fecha = $("#date").val();
		var fechaString= fecha.toString();
		$.ajax({
			type: "POST",
			url:'ajax/ganancias.php?fecha='+fecha,
			data: parametros,
			 beforeSend: function(objeto){
				 $('.items_ganancias').html('Cargando...');
			  },
			success:function(data){

				$(".items_ganancias").html(data).fadeIn('slow');
				$("#modalGanancias").modal('hide');
				changeDate(fechaString);
			}
		})
		
	  event.preventDefault();
	})


	$( "#guardar_gastos" ).submit(function( event ) {
		parametros = $(this).serialize();
		var fecha = $("#date").val();
		var fechaString= fecha.toString();
		$.ajax({
			type: "POST",
			url:'ajax/gastos.php?fecha='+fecha,
			data: parametros,
			 beforeSend: function(objeto){
				 $('.items_gastos').html('Cargando...');
			  },
			success:function(data){

				$(".items_gastos").html(data).fadeIn('slow');
				$("#modalGastos").modal('hide');
				changeDate(fechaString);
			}
		})
		
	  event.preventDefault();
	})






	$('#update_gastos').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('id') 
		  $('#edit_id_gastos').val(id)
		  var descripcion = button.data('descripcion') 
		  $('#edit_descripcion').val(descripcion)
		  var previsto = button.data('previsto') 
		  $('#edit_previsto').val(previsto)
		  var real = button.data('real') 
		  $('#edit_real').val(real)
		  
		  
		})

	$( "#gastos_update" ).submit(function( event ) {
		  var parametros = $(this).serialize();
		  var fecha = $("#date").val();
		  var fechaString= fecha.toString();
			$.ajax({
					type: "POST",
					url: "ajax/gastos.php?fecha="+fecha,
					data: parametros,
					 beforeSend: function(objeto){
					 	$('.items_gastos').html('Cargando...');
					  },
					success: function(data){
						$(".items_gastos").html(data).fadeIn('slow');						
						$("#update_gastos").modal('hide');
						changeDate(fechaString);
				  }
			});
		  event.preventDefault();
		});


	$('#update_ganancias').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('id') 
		  $('#edit_id_ganancias').val(id)
		  var descripcion = button.data('descripcion') 
		  $('#edit_descripcion_ganancias').val(descripcion)
		  var previsto = button.data('previsto') 
		  $('#edit_previsto_ganancias').val(previsto)
		  var real = button.data('real') 
		  $('#edit_real_ganancias').val(real)
		  
		  
		})

	$( "#ganancias_update" ).submit(function( event ) {
		  var parametros = $(this).serialize();
		  var fecha = $("#date").val();
		  var fechaString= fecha.toString();
			$.ajax({
					type: "POST",
					url: "ajax/ganancias.php?fecha="+fecha,
					data: parametros,
					 beforeSend: function(objeto){
					 	$('.items_ganancias').html('Cargando...');
					  },
					success: function(data){
						$(".items_ganancias").html(data).fadeIn('slow');						
						$("#update_ganancias").modal('hide');
						changeDate(fechaString);
				  }
			});
		  event.preventDefault();
		});		
		
		function eliminar_ganancia(id){
			var fecha = $("#date").val();
			var fechaString= fecha.toString();
			var parametros={"action":"ajax","id":id,"fecha":fecha};
			$.ajax({
				url:'ajax/ganancias.php',
				data: parametros,
				 beforeSend: function(objeto){
				 $('.items_ganancias').html('Cargando...');
			  },
				success:function(data){
					$(".items_ganancias").html(data).fadeIn('slow');
					changeDate(fechaString);
			}
			})
		
		}
		
		function eliminar_gasto(id){
			var fecha = $("#date").val();
			var fechaString= fecha.toString();
			var parametros={"action":"ajax","id":id,"fecha":fecha};
			$.ajax({
				url:'ajax/gastos.php',
				data: parametros,
				 beforeSend: function(objeto){
				 $('.items_gastos').html('Cargando...');
			  },
				success:function(data){
					$(".items_gastos").html(data).fadeIn('slow');
					changeDate(fechaString);	
			}
			})
		
		}
</script>

</html>
