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
                <a class="nav-link" href="alumnosLogin.html">Alumnos<span class="sr-only">(current)</span></a>
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
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "examen";
      $enlace = mysqli_connect($servername,$username,$password,$dbname);//Conexion a BD
      if(!$enlace){
        die('<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Conexión fallida: ' . mysql_error() . '</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div><section class="container"><form id="examen" class="ing"  method ="post" Action="examen2.php">');
      }
      else{
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Conexión exitosa!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div><section class="container"><form id="examen" class="ing"  method ="post" Action="examen2.php">';
      }
        $matricula = $_POST ['mat'];
        $clave = $_POST ['clave'];
        $fecha_actual=date("d/m/Y");
        $ssql = "SELECT m.clave_uea, m.nombre, p.NUMP_PRE, p.PREGUN, p.Respt_A, p.Respt_B, p.Respt_C, p.Respt_D,  p.RespCorre
          FROM materias m
          INNER JOIN  preguntas p ON m.clave_uea = p.clave_uea
          WHERE m.clave_uea = $clave
          ORDER BY RAND() LIMIT 11";
          $resultado=mysqli_query($enlace,$ssql);
          $row=mysqli_fetch_array($resultado,MYSQLI_BOTH);
          echo '
          <div class="jumbotron jumbotron-fluid caja">
            <img src="http://www.ddeduclpz.gob.bo/images/iconos/icono-25.png" alt="icono-alumno" class="img-fluid" alt="Responsive image" style="width: 12rem; height: 12rem;">
            <div class="container">
              <h1>Examen de '.$row[1].'</h1>
              <h3>Fecha: '.$fecha_actual.'</h3>
              <h3>Matricula:   <input name="mat" size="8" type="text" value="'.$matricula.'" readonly></h3>
              <h3>Clave de UEA:   <input name="uea" size="5" type="text" value="'.$row[0].'" readonly></h3>
            </div>
          </div>';
              $i=1;
              while($row=mysqli_fetch_array($resultado,MYSQLI_BOTH))
              {
                echo '<h5>'.$i.'.- '.$row[3].'</h5>';
                echo '<p><input name="r'.$i.'" type="radio" value="A" > a) '.$row[4].'</p>';
                echo '<p><input name="r'.$i.'" type="radio" value="B" > b) '.$row[5].'</p>';
                echo '<p><input name="r'.$i.'" type="radio" value="C" > c) '.$row[6].'</p>';
                echo '<p><input name="r'.$i.'" type="radio" value="D" > d) '.$row[7].'</p>';
                echo '<input name="p'.$i.'" readonly type="hidden" value="'.$row[2].'">';
                $i++;
              }
      mysqli_close($enlace);
    ?>
    <div class="boton">
        <button name="terminar" type="submit" class="btn btn-danger">Terminar Examen</button>
    </div>
    </form>
  </section>
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