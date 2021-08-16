<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGES DE PRODUCTOS -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <br>
      <?php session_unset(); } ?>

      <!-- AGREGAR PRODUCTOS EN EL FORM -->
      <div class="card card-body">
        <form action="save.php" method="POST">

          <div class="form-group">
            <input type="text" name="DESCRIPCION" class="form-control" placeholder="Descripción" autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="UNIDADMEDIDA" class="form-control" placeholder="Medida" autofocus>
          </div>

          <div class="form-group">
            <input type="number" name="PRECIO" class="form-control" placeholder="Precio" autofocus>
          </div>

          <input type="submit" name="save_producto" class="btn btn-success btn-block" value="Guardar">
        </form>

      </div>
    </div>

    <div class="col-md-8">
      <table class="table table-bordered">

        <thead>
          <tr>
            <th>Descripción</th>
            <th>Medida</th>
            <th>Precio</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody>

          <?php
          $query = "SELECT * FROM productos";
          $result = mysqli_query($conexion, $query);    

          while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['DESCRIPCION']; ?></td>
            <td><?php echo $row['UNIDADMEDIDA']; ?></td>
            <td><?php echo $row['PRECIO']; ?></td>
            <td>
              <a href="edit_producto.php?IDMATERIAL=<?php echo $row['IDMATERIAL']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete.php?IDMATERIAL=<?php echo $row['IDMATERIAL']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>

      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
