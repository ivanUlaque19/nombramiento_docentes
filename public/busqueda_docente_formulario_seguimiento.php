<?php  
	
	require('class/database.php');
	$objData = new Database();
	
	if (isset($_GET['criterio']) && isset($_GET['nomAp'])) {
		$r = '%'.$_GET['criterio'].'%';
		
		if ($_GET['nomAp'] == 0) {
	
			$sth = $objData->prepare('SELECT D.APE_PATERNO, D.APE_MATERNO, D.NOMBRE2, D.CODIGO2 FROM docente1 D WHERE D.NOMBRE2 LIKE :nombre');
			$sth->bindParam(':nombre',$r);

		} else {
			$sth = $objData->prepare('SELECT D.APE_PATERNO, D.APE_MATERNO, D.NOMBRE2, D.CODIGO2 FROM docente1 D WHERE D.APE_PATERNO LIKE :apellido');
			$sth->bindParam(':apellido', $r);
		}

	} else {
		$sth = $objData->prepare('SELECT D.APE_PATERNO, D.APE_MATERNO, D.NOMBRE2, D.CODIGO2 FROM docente1 D');
		
	}
	$sth->execute();
	$result = $sth->fetchAll();
	#print_r($result);
?>

<!DOCTYPE html>
<html>
<head>
	<title>BUSQUEDA DOCENTE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet">
    <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
     <script type="text/javascript" src="js/validator_docente.js"></script>
    <link rel="stylesheet" type="text/css" href="css/estilosTabla.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <style>
  .jumbotron {
      background-color: #f4511e;
      color: #fff;
      padding: 100px 25px;
  }
  .container-fluid {
      padding: 5px 10px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #f4511e;
  }
  .carousel-indicators li {
      border-color: #f4511e;
  }
  .carousel-indicators li.active {
      background-color: #f4511e;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #f4511e;
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: black;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
  }
      

ul.dropdown-menu {
    background-color: black;
}


  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
 
      .form-group{
          width: 50%;
          
      }
      .boton{
          width: 20%;
          
      }
      
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
  }
  </style>
</head>
<body>
          <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#myPage">ORANGESOFT</a>
    </div>
      <ul class="nav navbar-nav navbar-right">
             <li><a href="prueba.php"><span class="glyphicon glyphicon-log-in"></span> pagina_anterior</a></li>
      </ul>
        </div>
    </nav>
<div class="jumbotron text-center">
  <h1>SISTEMA DE APOYO ADMINISTRATIVO</h1>
  <p>Sistema de apoyo administrativo en el seguimiento y nombramiento de docentes</p>
    <h2> modificacion docente </h2>
</div>
	<form class="form-horizontal">
		<div class="container">
			<fieldset>
				<legend>Busqueda de docentes</legend>
				<div class="well">
					<div class="form-group">
						<div class="">
							<label  class="">Criterio:</label>
							<input type="text" name="criterio" id="cr" class="">
						</div>
						<div class="col-xs-2">
	        			    <label class="radio-inline">
	            			    <input type="radio" name="nameRadios" value="nombre"> Nombre
	           				 </label>
	        			</div>
	       				 <div class="col-xs-2">
	       				     <label class="radio-inline">
	        			        <input type="radio" name="nameRadios" value="apellido"> Apellido Paterno
	        			    </label>
	       				 </div>
	       				 <div class="form-group">
	       				 	<button type="button" id="boton_buscar" class="btn btn-primary" onclick="buscar()" >BUSCAR</button>
	       				 </div>

					</div>
					<div id="tabla_docentes">
						<table >
							<thead>
								<th>NOMBRE</th>
								<th>APELLIDO PATERNO</th>
								<th>APELLIDO MATERNO</th>
							</thead>
							<tbody>
								
								<?php  

								if (isset($result) && isset($_GET['criterio']) && isset($_GET['nomAp'])) {
									
									for ($i=0; $i < sizeof($result) ; $i++) { ?>
										<tr style='cursor: pointer' onclick='muestra(this)'>
											<td><?php echo $result[$i]['NOMBRE2']; ?></td>
											<td><?php echo $result[$i]['APE_PATERNO']; ?></td>
											<td><?php echo $result[$i]['APE_MATERNO']; ?></td>
											
										</tr>
										<?php
									}
								}
								?>
							</tbody>
						</table>
					</div>
					<br>
					<div class="">
						<div class="form-group">
							<label>Resultado:</label>
							<input type="text" name="resultado_busqueda" id="res_b" class="form-control">
						</div>
					</div>
				</div>
			</fieldset>
			<div>
				<button type="button" name="aceptar" value="ACEPTAR" class="btn-primary btn" onclick="">ACEPTAR</button>
				<button type="button" id="salir" class="btn btn-primary">SALIR</button>
			</div>
		</div>
	</form>
	<script type="text/javascript">
		function muestra(ObjetoTR){
			var nombre = ObjetoTR.cells[0].childNodes[0].nodeValue;
			var apellidoPat = ObjetoTR.cells[1].childNodes[0].nodeValue;
			var apellidoMat = ObjetoTR.cells[2].childNodes[0].nodeValue;
			document.getElementById("res_b").value = nombre + " " + apellidoPat + " " + apellidoMat;
			//window.location.href = 'http://localhost/Modificacion%20nombramiento%20docente/busqueda_docente_formulario_seguimiento.php?nom'+nombre+'apeP='+apellidoPat+'apeM='+apellidoMat;
		}

		function buscar(){ 

			var crit = document.getElementById("cr").value;

			if (crit == null || crit.length == 0 || /^\s+$/.test(crit) || !isNaN(crit)) {
				alert("ERROR DE ESCRITURA");
				//return false;
			} else {
				radiobutton_opciones = document.getElementsByName("nameRadios");
				var seleccionado = false;

				for (var i = 0; i < radiobutton_opciones.length; i++) {
											
					if (radiobutton_opciones[i].checked) {
						seleccionado = true;				
						break;
					}
				}

				if (!seleccionado) {
					alert("SELECCIONE NOMBRE O APELLIDO");
					//return false;

				} else {
					//alert("bien");
					window.location.href = 'busqueda_docente_formulario_seguimiento.php?criterio='+crit+'&nomAp='+i;
				}
			}
		}		
	</script>
</body>
</html>