<?php
	//include_once('conexion.php');
	
	 $var = mysqli_connect ( "localhost", "root", "", "creditouniminuto" );	
	

	   /* public function build_report($id_entidad){
	    	$total = array();
	    	for($i=0; $i<12; $i++){
	    		$month = $i+1;
	    		$sql = $this->db->query("SELECT count(nombre)as total FROM `estudiantes`es
				inner join tipo_pago b on es.id_TipoPago= b.id_TipoPago 
				where b.id_TipoPago= 1 and es.id_entidad= '$id_entidad' LIMIT 1");	
	    		$total[$i] = 0;
	    		foreach ($sql as $key){ $total[$i] = ($key['total'] == null)? 0 : $key['total']; }
	    	}			 
			return $total;
		}*/
		
		$tipo_pago=$_POST['tipo_pago'];
	    	
	    $coop= mysqli_query($var, "SELECT count(nombre) as total FROM `estudiantes`es
				inner join tipo_pago b on es.id_TipoPago= b.id_TipoPago 
				where es.id_entidad = 1 and  b.id_TipoPago= '$tipo_pago' LIMIT 1");

		$icet = mysqli_query($var, "SELECT count(nombre)as total FROM `estudiantes`es
				inner join tipo_pago b on es.id_TipoPago= b.id_TipoPago 
				where es.id_entidad = 2 and  b.id_TipoPago= '$tipo_pago' LIMIT 1");	

		$otros= mysqli_query($var, "SELECT count(nombre) as total FROM `estudiantes`es
				inner join tipo_pago b on es.id_TipoPago= b.id_TipoPago 
				where es.id_entidad = 3 and  b.id_TipoPago= '$tipo_pago' LIMIT 1");
	
	$total1 = mysqli_fetch_assoc($coop);
	$data1 = $total1['total'];
	$total2 = mysqli_fetch_assoc($icet);
	$data2 = $total2['total'];
	$total3 = mysqli_fetch_assoc($otros);
	$data3 = $total3['total'];
    
	
     $data= array( 0=>$data1,
				   1=> $data2,
				   3=>$data3
						);

		//var_dump($data);

		

		echo json_encode($data);

	
?>