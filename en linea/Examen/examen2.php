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
                <a class="nav-link" href="profesores.php">Profesores</a>
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
      $username = "id10241842_examen";
      $password = "examen";
      $dbname = "id10241842_examen";
      $enlace = mysqli_connect($servername,$username,$password,$dbname);//Conexion a BD
      if(!$enlace){
        die('<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Conexión fallida: ' . mysql_error() . '</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div><section class="container"><form name="examen" Action="examen2.php">');
      }
      else{
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Conexión exitosa!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div><section class="container"><form name="examen" Action="examen2.php">';
      }
      $p1 = $_POST ['p1'];
      $p2 = $_POST ['p2'];
      $p3 = $_POST ['p3'];
      $p4 = $_POST ['p4'];
      $p5 = $_POST ['p5'];
      $p6 = $_POST ['p6'];
      $p7 = $_POST ['p7'];
      $p8 = $_POST ['p8'];
      $p9 = $_POST ['p9'];
      $p10 = $_POST ['p10'];

      $calificacion = 0;
      $ssql2= "INSERT INTO examenes VALUES ('$matricula','$clave',CURDATE(), $calificacion)";
      $resultado = mysqli_query($enlace, $ssql2);
      $ssql = "SELECT m.clave_uea, m.nombre, examenes.fecha_exam, p.NUMP_PRE, p.PREGUN, p.Respt_A, p.Respt_B, p.Respt_C, p.Respt_D,  p.RespCorre
          FROM examenes
          INNER JOIN  materias m ON examenes.clave_uea = m.clave_uea
          INNER JOIN  preguntas p ON examenes.clave_uea = p.clave_uea
          WHERE m.clave_uea= ". $clave . " ";
          $resultado=mysqli_query($enlace,$ssql );
      while($row=mysqli_fetch_array($resultado,MYSQLI_BOTH) and $i<=10)
            {
              echo '<h5>'.$i.'.- '.$row[4].'</h5>';
              echo '<p><input name="p'.$i.'" value="A" type="radio"> a) '.$row[5].'</p>';
              echo '<p><input name="p'.$i.'" value="B" type="radio"> b) '.$row[6].'</p>';
              echo '<p><input name="p'.$i.'" value="C" type="radio"> c) '.$row[7].'</p>';
              echo '<p><input name="p'.$i.'" value="D" type="radio"> d) '.$row[8].'</p>';
              $i=$i+1;
            }

      if(! $resultado )
      {
      
      }
      mysqli_close($enlace);
    ?>
    <div class="boton">
        <button name="" type="submit" class="btn btn-danger">Terminar Examen</button>
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