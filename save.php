<?php

include('db.php');

if (isset($_POST['save_cliente'])) {
  $RAZON_SOCIAL = $_POST['RAZON_SOCIAL'];
  $RFC = $_POST['RFC'];

    $query = "INSERT INTO clientes(RAZON_SOCIAL, RFC) VALUES ('$RAZON_SOCIAL', '$RFC')";

    $result = mysqli_query($conexion, $query);
  if(!$result) {
    die("Falla en conectar en la base de datos.");
  }

  $_SESSION['message'] = 'Guardado';
  $_SESSION['message_type'] = 'success';
  header('Location: clientes.php');

}

if (isset($_POST['save_producto'])) {
  $DESCRIPCION = $_POST['DESCRIPCION'];
  $UNIDADMEDIDA = $_POST['UNIDADMEDIDA'];
  $PRECIO = $_POST['PRECIO'];
  $IDMATERIAL = $_POST['IDMATERIAL'];
  $UNIDAD_MEDIDA = $_POST['UNIDAD_MEDIDA'];
  $CANTIDAD = $_POST['CANTIDAD'];
  $PRECIO = $_POST['PRECIO'];

  $query = "INSERT INTO  productos (DESCRIPCION, UNIDADMEDIDA, PRECIO) VALUES ('$DESCRIPCION', '$UNIDADMEDIDA', '$PRECIO')";
  
   $result = mysqli_query($conexion, $query);
    if(!$result == 1) {

      $query = "INSERT INTO documentorenglon (IDMATERIAL, UNIDAD_MEDIDA, CANTIDAD, PRECIO) VALUES('$IDMATERIAL', '$UNIDAD_MEDIDA', '$CANTIDAD', '$PRECIO')";

      $result = mysqli_query($conexion, $query);
      die("Falla en conectar en la base de datos.");
    }

    $_SESSION['message'] = 'Guardado';
    $_SESSION['message_type'] = 'success';
    header('Location: productos.php');

}

if (isset($_POST['save_documentorenglon'])) {
  $IDMATERIAL = $_POST['IDMATERIAL'];
  $UNIDAD_MEDIDA = $_POST['UNIDAD_MEDIDA'];
  $CANTIDAD = $_POST['CANTIDAD'];
  $PRECIO = $_POST['PRECIO'];

    $query = "INSERT INTO documentorenglon (IDCODIGO, IDMATERIAL, UNIDAD_MEDIDA, CANTIDAD, PRECIO) VALUES('$IDCODIGO', $IDMATERIAL', '$UNIDAD_MEDIDA', '$CANTIDAD', '$PRECIO')";

    $result = mysqli_query($conexion, $query);
    if(!$result) {
    die("Falla en conectar en la base de datos.");
  }

  $_SESSION['message'] = 'Guardado';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}


?>
