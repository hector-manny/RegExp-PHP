<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
      <title>RegEx</title>
   </head>
   <body >
      <br><br><br>
      <div class="row justify-content-md-center tarjeta">
         <div class="col-sm-8">
            <div class="card  border-dark text-center color " style="padding: 10px;">
               <div class="card-header">
                  <h2>Expresiones Regulares</h2>
               </div>
               <div class="card-body-md">
                  <br>
                  <br>
                  <br>
                  <h5 class="card-title">Validacion de Formulario</h5>
                  <br>
                  <br>
                  <form class="form-row" method="POST">
                     <div class="input-group mb-3">
                        <input type="text"name="nombre" class="form-control" placeholder="Nombre Completo" required>
                     </div>
                     <div class="input-group mb-3">
                        <input type="text" name="correo" class="form-control" placeholder="ejemplo-ejemplo123@email.com" required >
                     </div>
                     <div class="input-group mb-3">
                        <input type="text" name="dui" class="form-control"  placeholder="Dui con guión (########-#)" required>
                        <input type="text" name="edad" class="form-control"  placeholder="Edad" required>
                     </div>
                     <div class="input-group">
                        <span class="input-group-text">Ingrese un texto</span>
                        <input type="text" name="texto" class="form-control" placeholder="Ingrese un texto" required>
                     </div>
                     <br>
                     <br>
                     <br>
                     <div class="col-12 justify-content-md-center">
                        <input type="submit" class="btn btn-danger btn-lg" value="Enviar">
                     </div>
                     <br>
                     <br>
                     <br>
                  </form>
                  <?php
                     $nombre = $_POST['nombre'];
                     $edad = $_POST['edad'];
                     $correo = $_POST['correo'];
                     $DUI = $_POST['dui'];
                     $cadena = $_POST['texto'];//obtenemos el valor del texto
                     $patron = "/^[[:digit:]]+$/"; //realizamos el patron de la RegEx [:digit] = cualquier digito
                     $patron1 = "/^[a-z]+$/"; //patron de ^ = iicio de la linea o string + de la a-z mas $ que significa final de la linea
                     $mayus = "/^[A-Z]+$/"; //mayusculas
                     $patron2 = "/^[a-z]+$/i"; // la i significa que es insensitiva que puede ser tanto mayusculas como minusculas.
                     $patronDUI = "/[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[0-9]+[-]+[0-9]/"; //patron de dui
                     $patroncorreo = "/([a-z]+[._-]+[a-z]+[0-9]+[@]+[a-z]+[.]+[a-z]+)/"; 
                     if($cadena!=null && $nombre!=null && $edad!=null && $correo!=null && $DUI!=null ){
                     if (preg_match($patron1, $nombre)) {
                         echo "<p>El nombre  $nombre que a enviado son sólo letras minúsculas.</p>\n";
                         }
                          elseif(preg_match($mayus, $nombre)){
                                  echo "<p>El nombre <strong>$nombre</strong> que a enviado solo tiene letras mayusculas.</p>";
                              }
                              if(preg_match($patroncorreo, $correo)){
                                 echo"<p> El correo <strong>$correo</strong> es correcto! </p>";
                             }else{
                                 echo"<p> El correo <strong>$correo</strong> no tiene el formato correcto! </p>";
                             }
                              if(preg_match($patronDUI, $DUI)){
                         echo "<P> Es un numero de Dui el numero es: <strong>$DUI</strong> </p>";
                     }else{
                         echo"<p> <strong>$DUI</strong> No es un numero de DUI valido ingresa de nuevo con un guión </p>";
                     }
                     if (preg_match($patron, $edad)) {
                     echo "<p>La edad <strong>$edad</strong> son sólo números.</p>\n";
                     } else {
                     echo "<p>La edad <strong>$edad</strong> no son números por favor ingresa tu edad en numeros.</p>\n";
                     }
                     if (preg_match($patron2, $cadena)) {
                         echo "<p>La cadena <strong>$cadena</strong> son sólo letras minúsculas o mayúsculas.</p>\n";
                     } elseif(preg_match($patron,$cadena)){
                         echo "<p>La cadena <strong>$cadena</strong> son sólo numeros.</p>\n";
                     }
                     }else{
                      echo "<p>Por favor ingresa una cadena de texto.</p>";
                     }
                     ?>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
