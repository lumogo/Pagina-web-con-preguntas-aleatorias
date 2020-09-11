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
      $matricula = $_POST ['mat'];
      $clave = $_POST ['uea'];

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

      $r1 = $_POST ['r1'];
      $r2 = $_POST ['r2'];
      $r3 = $_POST ['r3'];
      $r4 = $_POST ['r4'];
      $r5 = $_POST ['r5'];
      $r6 = $_POST ['r6'];
      $r7 = $_POST ['r7'];
      $r8 = $_POST ['r8'];
      $r9 = $_POST ['r9'];
      $r10 = $_POST ['r10'];
      $calificacion = 0;

      $resp_correct1="SELECT RespCorre FROM preguntas WHERE NUMP_PRE = '$p1' AND  CLAVE_UEA = '$clave'";
      $resp_correct2="SELECT RespCorre FROM preguntas WHERE NUMP_PRE = '$p2' AND  CLAVE_UEA = '$clave'";
      $resp_correct3="SELECT RespCorre FROM preguntas WHERE NUMP_PRE = '$p3' AND  CLAVE_UEA = '$clave'";
      $resp_correct4="SELECT RespCorre FROM preguntas WHERE NUMP_PRE = '$p4' AND  CLAVE_UEA = '$clave'";
      $resp_correct5="SELECT RespCorre FROM preguntas WHERE NUMP_PRE = '$p5' AND  CLAVE_UEA = '$clave'";
      $resp_correct6="SELECT RespCorre FROM preguntas WHERE NUMP_PRE = '$p6' AND  CLAVE_UEA = '$clave'";
      $resp_correct7="SELECT RespCorre FROM preguntas WHERE NUMP_PRE = '$p7' AND  CLAVE_UEA = '$clave'";
      $resp_correct8="SELECT RespCorre FROM preguntas WHERE NUMP_PRE = '$p8' AND  CLAVE_UEA = '$clave'";
      $resp_correct9="SELECT RespCorre FROM preguntas WHERE NUMP_PRE = '$p9' AND  CLAVE_UEA = '$clave'";
      $resp_correct10="SELECT RespCorre FROM preguntas WHERE NUMP_PRE = '$p10' AND  CLAVE_UEA = '$clave'";

      $resultado1=mysqli_query($enlace,$resp_correct1);
      $resultado2=mysqli_query($enlace,$resp_correct2);
      $resultado3=mysqli_query($enlace,$resp_correct3);
      $resultado4=mysqli_query($enlace,$resp_correct4);
      $resultado5=mysqli_query($enlace,$resp_correct5);
      $resultado6=mysqli_query($enlace,$resp_correct6);
      $resultado7=mysqli_query($enlace,$resp_correct7);
      $resultado8=mysqli_query($enlace,$resp_correct8);
      $resultado9=mysqli_query($enlace,$resp_correct9);
      $resultado10=mysqli_query($enlace,$resp_correct10);

      $correct1=mysqli_fetch_array($resultado1,MYSQLI_BOTH);
      $correct2=mysqli_fetch_array($resultado2,MYSQLI_BOTH);
      $correct3=mysqli_fetch_array($resultado3,MYSQLI_BOTH);
      $correct4=mysqli_fetch_array($resultado4,MYSQLI_BOTH);
      $correct5=mysqli_fetch_array($resultado5,MYSQLI_BOTH);
      $correct6=mysqli_fetch_array($resultado6,MYSQLI_BOTH);
      $correct7=mysqli_fetch_array($resultado7,MYSQLI_BOTH);
      $correct8=mysqli_fetch_array($resultado8,MYSQLI_BOTH);
      $correct9=mysqli_fetch_array($resultado9,MYSQLI_BOTH);
      $correct10=mysqli_fetch_array($resultado10,MYSQLI_BOTH);

      if($correct1[0] = $r1){$calificacion++;}
      if($correct2[0] == $r2){$calificacion++;}
      if($correct3[0] == $r3){$calificacion++;}
      if($correct4[0] == $r4){$calificacion++;}
      if($correct5[0] == $r5){$calificacion++;}
      if($correct6[0] == $r6){$calificacion++;}
      if($correct7[0] == $r7){$calificacion++;}
      if($correct8[0] == $r8){$calificacion++;}
      if($correct9[0] == $r9){$calificacion++;}
      if($correct10[0] == $r10){$calificacion++;}

      $ssql= "INSERT INTO examenes VALUES ('$matricula','$clave',CURDATE(), '$p1', '$r1', '$p2', '$r2', '$p3', '$r3', '$p4', '$r4', '$p5', '$r5', '$p6', '$r6', '$p7', '$r7', '$p8', '$r8', '$p9', '$r9', '$p10', '$r10', '$calificacion')";
      $res=mysqli_query($enlace,$ssql);   
      mysqli_close($enlace);
      if ($calificacion>=6){
        echo '
        <section class="container page">
          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Felicidades! tú calificación es '.$calificacion.'</h4>
            <p>Sorprendente!</p>
            <p>Excelente trabajo, puedes consultar tus resultados en la página alumnos o si lo deseas puedes hacer otro examen</p>
            <hr>
            <p class="mb-0">Has click en el botón para continuar.</p>
          </div>
          <div class="mx-auto" style="width: 200px;">
            <a class="btn btn-danger btn-lg" href="alumnosLogin.html" role="button">Salir</a>
          </div>
          
        </section>
        
        ';
      }else{
        echo '
        <section class="container page">
          <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Ops! tú calificación es '.$calificacion.'</h4>
            <p>No te preocupes!</p>
            <p>La calificacion no ha sido aprobatoria esta vez, sigue estudiando y vuelve a intentarlo</p>
            <hr>
            <p class="mb-0">Has click en el botón para continuar.</p>
          </div>
          <div class="mx-auto" style="width: 200px;">
            <a class="btn btn-danger btn-lg" href="alumnosLogin.html" role="button">Salir</a>
          </div>
          
        </section>
        
        ';
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