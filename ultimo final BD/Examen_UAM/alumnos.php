<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>alumnos.php</title>
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
              <li class="nav-item active">
                <a class="nav-link" href="alumnosLogin.html">Alumnos <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="profesores.php">Profesores</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="materias.php">Materias</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <?php

        $matricula = $_POST['user'];
        $password = $_POST['password'];

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
        // añadiría un limit 1 a la consulta pues solo esperamos un registro
        $consulta = mysqli_query ($enlace, "SELECT * FROM alumnos WHERE matricula = '$matricula' AND contrasena = '$password'");  
        $result = mysqli_query ($enlace, "SELECT nombre, apellido FROM alumnos WHERE matricula = '$matricula' AND contrasena = '$password'");
        $nombre= mysqli_fetch_array($result);
        // esto válida si la consulta se ejecuto correctamente o no
        // pero en ningún caso válida si devolvió algún registro
        if(!$consulta){ 
            echo mysqli_error($mysqli);
            // si la consulta falla es bueno evitar que el código se siga ejecutando
            exit;
        } 
        // este else sobra
        //else { 
            //print "Bienvenido"; 
        //} 

        // validemos pues si se obtuvieron resultados 
        // Obtenemos los resultados con mysqli_fetch_assoc
        // si no hay resultados devolverá NULL que al convertir a boleano para ser evaluado en el if será FALSE
        if($user = mysqli_fetch_assoc($consulta)) {
          echo '<div class="jumbotron jumbotron-fluid caja">
          <img src="https://img.pngio.com/education-graduate-science-student-study-teaching-icon-icon-student-studying-science-png-512_512.jpg" alt="icono-alumno" class="img-fluid" alt="Responsive image" style="width: 12rem; height: 12rem;">
          <div class="container">
            <h1 class="display-5">Bienvenido ' . $nombre[0] . ' '. $nombre[1] . '</h1>
            <p class="lead">Aqui podras consultar tus resultados de tus examenes o puedes inicuar uno nuevo</p>
          </div>
        </div>';
          $ssql = "SELECT examenes.matricula, a.nombre, a.apellido, examenes.clave_uea,m.nombre,examenes.fecha_exam, examenes.calificacion
          FROM examenes
          INNER JOIN  alumnos a ON examenes.matricula = a.matricula
          INNER JOIN  materias m ON examenes.clave_uea = m.clave_uea
          WHERE examenes.matricula = ". $matricula . " ";
          $resultado=mysqli_query($enlace,$ssql );
          echo
          '<section class="page"><div class=" container encabezado center">
            <h1>Consulta tus resultados</h1>
          </div>
          <br>
          <table class="container table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Matricula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Clave UEA</th>
                <th scope="col">Nombre de la UEA</th>
                <th scope="col">Fecha del Examen</th>
                <th scope="col">Calificación</th>
              </tr>
            </thead>
            ';
            while($row=mysqli_fetch_array($resultado,MYSQLI_BOTH))
            {
            echo '<tbody><tr><th scope="row">'.$row[0]."</td>"."<td>".$row[1]."</td>"."<td>".$row[2]."</td>"."<td>".$row[3]."</td>"."<td>".$row[4]."</td>"."<td>".$row[5]."</td>"."<td>".$row[6]."</td>"."</tr>";
            }
                mysqli_free_result($resultado);
            echo "</tbody></table></section>";
            echo '
            <div class=" container encabezado center">
              <h1>Hacer un nuevo Examen</h1>
            </div>
            
            <section class="container">
              <form class="ing" method ="post" Action="examen.php">
                <div class="ingresar col-md-3 mb-3">
                    <h2>Selecciona una UEA</h2>
                    <div class="form-group">
                  <label for="validationTooltipUsername">Matricula</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <img class="icono-credencial" src="img/credencial_uami.png" alt="">
                      </span>
                    </div>
                    <input name="mat" type="text" class="form-control" id="validationTooltipUsername" value="'.$matricula.'" readonly>
                </div>
                <div class="form-group">
              <label for="inputState">Clave de la UEA</label>
            <select name="clave" class="form-control">';
                  $ssql1="SELECT * FROM materias ORDER BY clave_uea";
                  $resultado1=mysqli_query($enlace,$ssql1);
                      while($row=mysqli_fetch_array($resultado1,MYSQLI_BOTH))
                      {
                      echo '<option>'.$row[0].'</option>';
                      }
                      echo '
                  </select>
                      </div>
                  <div class="boton">
                      <button type="submit" class="btn btn-danger">Empezar examen</button>
                  </div>
                      
                </div>
              </form>
            </section> 
                      ';
            } else {
              echo '<section class="container page">
              <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Ha ocurrido un error, tu contraseña y usuario no coincide</h4>
                <p>Asegurate de haber colocado los datos correctamente y vuelve a intentar</p>
                <p>Si aún no tienes cuenta registrate</p>
                <hr>
                <p class="mb-0">Has click en el botón para continuar.</p>
              </div>
              <div class="mx-auto" style="width: 200px;">
                <a class="btn btn-danger btn-lg" href="alumnosLogin.html" role="button">Volver a intentar</a>
              </div>
              
            </section>';
          }
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