<?php
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';

if($action == 'ajax'){
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	
	//insertamos
	if (isset($_POST['descripcion_gastos'])){
		
		$descripcion=mysqli_real_escape_string($con,$_POST['descripcion_gastos']);
		$precio_previsto=floatval($_POST['precio_previsto']);
		$precio_real=floatval($_POST['precio_real']);
		$diferencia=($precio_previsto-$precio_real);
		$date_added=date("Y-m-d");


		//insertamos
		$sql="INSERT INTO `gastos` (`id`, `description`, `precio_previsto`, `precio_real`, `diferencia`, `created_at`) VALUES (NULL, '$descripcion', '$precio_previsto', '$precio_real', '$diferencia', '$date_added');";
		$insert=mysqli_query($con,$sql);
	}

	//actualizamos
	if (isset($_POST['edit_id_gastos'])){

		$id=intval($_POST['edit_id_gastos']);		
		$descripcion=mysqli_real_escape_string($con,$_POST['edit_descripcion']);
		$precio_previsto=floatval($_POST['edit_previsto']);
		$precio_real=floatval($_POST['edit_real']);
		$diferencia=($precio_previsto-$precio_real);

		$sql="UPDATE gastos SET description='$descripcion', precio_previsto='$precio_previsto', precio_real='$precio_real', diferencia='$diferencia' WHERE id='$id'";
		$update=mysqli_query($con,$sql);
	}
	if (isset($_REQUEST['id'])){
		$id=intval($_REQUEST['id']);
		$sql="DELETE FROM gastos WHERE id='$id'";
		$delete=mysqli_query($con,$sql);
	}


	if (isset($_GET['fecha'])) {
		$fecha=$_GET['fecha'];
		$fecha_det= explode("/",$fecha);
		$mes =$fecha_det[0];
		$año=$fecha_det[1];		
	}
	
	

	$query=mysqli_query($con,"select * from gastos where month(created_at)='$mes' and year(created_at)='$año' order by id");
	$items=1;
	$total_previsto=0;
	$total_real=0;
	$total_diferencia=0;
	while($row=mysqli_fetch_array($query)){
			$id=$row['id'];
			$description=$row['description'];
			$previsto=$row['precio_previsto'];
			$real=$row['precio_real'];
			$diferencia =$row['diferencia'];
			$id=$row['id'];	
			
			if ($real>$previsto) {
				$style="color: rgb(244, 101, 36)";
			} elseif ($real<$previsto){
				$style="color: rgb(0, 153, 51)";
			}else{
				$style='';
			}
		?>
	<tr>
		<td class='text-center'><?php echo $items;?></td>
		<td class='text-center'><?php echo $description;?></td>
		<td class='text-center'><?php echo number_format($previsto,2,'.','');?></td>
		<td class='text-center'><?php echo number_format($real,2,'.','');?></td>
		<td class='text-center' style="<?php echo $style;?>"><?php echo number_format($diferencia,2,'.','');?></td>

		
		<td class='text-center'>
			<a href="#update_gastos"  data-target="#update_gastos" class="edit" data-toggle="modal" data-id='<?php echo $id;?>' data-descripcion="<?php echo $description;?>" data-previsto="<?php echo $previsto;?>" data-real="<?php echo $real;?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
			<a href="#" onclick="eliminar_gasto('<?php echo $id;?>')"><i class="fa fa-trash" style="color:#ff3300"></i></a>
		</td>
	</tr>	
		<?php
		$items++;
		$total_previsto+=$previsto;
		$total_real+=$real;
		$total_diferencia+=$diferencia;
	}
	?>
	<tr>
		<td colspan='6'>
		
			<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalGastos"><span class="glyphicon glyphicon-minus"></span> Agregar Gastos</button>
		</td>
	</tr>
	<tr>
		<td colspan='2' class='text-center'>
			 
		</td>		
		<th class='text-center'>
			<?php echo number_format($total_previsto,2,'.','');?>&nbsp;$
		</th>
		<th colspan='' class='text-center'>

			<?php echo number_format($total_real,2,'.','');?>&nbsp;$
		</th>
		<th colspan='' style="color: rgb(244, 101, 36);" class='text-center'>

			<?php echo number_format($total_diferencia,2,'.','');?>&nbsp;$
		</th>
		<th></th>
		
	</tr>
<?php

}