<?php

/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos


	if (isset($_GET['fecha'])) {
		$fecha=$_GET['fecha'];
		$fecha_det= explode("/",$fecha);
		$mes =$fecha_det[0];
		$año=$fecha_det[1];		
	}

	if (isset($_GET["indicadorGanancias"])) {

		

        $query_ganancias_previsto=mysqli_query($con,"select sum(precio_previsto) as previsto  from ganancias  where month(created_at)='$mes' and year(created_at)='$año' ");
		$rw=mysqli_fetch_array($query_ganancias_previsto);
		$previsto_ganancias=$rw['previsto'];           

        
        $query_ganancias_real=mysqli_query($con,"select sum(precio_real) as real_precio  from ganancias where month(created_at)='$mes' and year(created_at)='$año' ");
		$rw2=mysqli_fetch_array($query_ganancias_real);
		$real_ganancias=$rw2['real_precio'];
        ?>        
     	<h4><strong>Previsto </strong>: <?php echo number_format($previsto_ganancias,2,'.','');?>&nbsp;$ </h4>

	    <h4><strong>Real </strong>: <?php echo number_format($real_ganancias,2,'.','');?>&nbsp;$</h4>
        <?php               
	}


	if (isset($_GET['indicadorGastos'])) {
		
        $query_gastos_previsto=mysqli_query($con,"select sum(precio_previsto) as previsto  from gastos where month(created_at)='$mes' and year(created_at)='$año' ");
			$rw=mysqli_fetch_array($query_gastos_previsto);
			$previsto_gastos=$rw['previsto'];
         

        
        $query_gastos_real=mysqli_query($con,"select sum(precio_real) as real_precio  from gastos where month(created_at)='$mes' and year(created_at)='$año' ");
			$rw2=mysqli_fetch_array($query_gastos_real);
			$real_gastos=$rw2['real_precio'];
        ?>              
        
        <h4><strong>Previsto </strong>: <?php echo number_format($previsto_gastos,2,'.','');?>$ </h4>

        <h4><strong>Real </strong>: <?php echo number_format($real_gastos,2,'.','');?>&nbsp;$</h4>
        <?php
	}

?>