<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>materias.php</title>
</head>
<body>

    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-danger header">
        <a class="navbar-brand" href="index.html">
            <img src="img/logo.png" alt="">
            EXAMEN UAM-I
        </a>
        <div class="elementos-navbar">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.html">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="alumnosLogin.html">Alumnos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="profesoresLogin.html">Profesores</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Materias <span class="sr-only">(current)</span></a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <?php 
			//Conexion con la base de datos
			$enlace = mysqli_connect ('localhost','root','','examen'); //conexion a mysql
			if(!$enlace){
				die('<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Conexión fallida: ' . mysql_error() . '</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>');
			}
			else{
				echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Conexión exitosa!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>';
			}
								$ssql = "SELECT * FROM materias";
			$resultado=mysqli_query($enlace,$ssql );
		?>

		<div class=" container encabezado center">
			<h1>Consulta las UEAS</h1>
		</div>
		<br>
		<table class="container table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Clave de la UEA</th>
					<th scope="col">Nombre de la UEA</th>
				</tr>
			</thead>
		<?php 
			//Mostrar los registros
			while($row=mysqli_fetch_array($resultado,MYSQLI_BOTH))
			{
			echo '<tbody><tr><th scope="row">'.$row[0]."</td>"."<td>".$row[1]."</td>"."</tr>";
			}
					mysqli_free_result($resultado);
			echo "</tbody></table>";
		?>

    <footer class="bg-danger">
      <p>Derechos Reservados &copy2019</p>
      <nav class="navbar sticky-bottom navbar-expand-lg navbar navbar-dark">
          <div>
            <a href="https://www.facebook.com/uam.mx/" target="blank">
                <img src="img/fb-logo.png" alt="">
            </a>
            <a href="https://www.instagram.com/instauam/" target="blank">
                <img src="img/ig-logo.png" alt="">
            </a>
            <a href="https://twitter.com/Yo_SoyUAM" target="blank">
                <img src="img/tw-logo.png" alt="">
            </a>
          </div>

      </nav>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>