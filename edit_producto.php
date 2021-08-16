<?php
include("db.php");
$DESCRIPCION = '';
$UNIDADMEDIDA = '';
$PRECIO = '';

if  (isset($_GET['IDMATERIAL'])) {
  $IDMATERIAL = $_GET['IDMATERIAL'];
  $query = "SELECT * FROM productos WHERE IDMATERIAL=$IDMATERIAL";
  $result = mysqli_query($conexion, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $DESCRIPCION = $row['DESCRIPCION'];
    $UNIDADMEDIDA = $row['UNIDADMEDIDA'];
    $PRECIO = $row['PRECIO'];
  }
}

if (isset($_POST['update'])) {
  $IDMATERIAL = $_GET['IDMATERIAL'];
  $DESCRIPCION= $_POST['DESCRIPCION'];
  $UNIDADMEDIDA = $_POST['UNIDADMEDIDA'];
  $PRECIO = $_POST['PRECIO'];

  $query = "UPDATE productos set DESCRIPCION = '$DESCRIPCION', UNIDADMEDIDA = '$UNIDADMEDIDA', PRECIO = '$PRECIO' WHERE IDMATERIAL=$IDMATERIAL";
  mysqli_query($conexion, $query);
  $_SESSION['message'] = 'Guardado';
  $_SESSION['message_type'] = 'warning';
  header('Location: productos.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_producto.php?IDMATERIAL=<?php echo $_GET['IDMATERIAL']; ?>" method="POST">
        <div class="form-group">
          <input name="DESCRIPCION" type="text" class="form-control" value="<?php echo $DESCRIPCION; ?>" placeholder="Descripcion">
        </div>
        <div class="form-group">
          <input name="UNIDADMEDIDA" type="text" class="form-control" value="<?php echo $UNIDADMEDIDA; ?>" placeholder="Medida">
        </div>
        <div class="form-group">
        <input name="PRECIO" type="number" class="form-control" value="<?php echo $PRECIO; ?>" placeholder="Precio">
        </div>
        <button class="btn-success" name="update">
          Actualizar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
