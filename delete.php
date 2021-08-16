<?php

include("./db.php");

if(isset($_GET['IDCLIENTE'])) {
  $IDCLIENTE = $_GET['IDCLIENTE'];
  $query = "DELETE FROM clientes WHERE IDCLIENTE = $IDCLIENTE";
  $result = mysqli_query($conexion, $query);
  if(!$result) {
    die("Falla en conectar en la base de datos.");
  }

  $_SESSION['message'] = 'Eliminado correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: clientes.php');
}

if(isset($_GET['IDMATERIAL'])) {
  $IDMATERIAL = $_GET['IDMATERIAL'];
  $query = "DELETE FROM productos WHERE IDMATERIAL = $IDMATERIAL";
  $result = mysqli_query($conexion, $query);
  if(!$result) {
    die("Falla en conectar en la base de datos.");
  }

  $_SESSION['message'] = 'Eliminado correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: productos.php');
}

?>
