<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAGESD DE CLIENTES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <br>
      <?php session_unset(); } ?>

      <!-- AGREGAR CLIENTES EN EL FORM -->
      <div class="card card-body">
        <form action="save.php" method="POST">

          <div class="form-group">
            <input type="text" name="RAZON_SOCIAL" class="form-control" placeholder="Razon Social" autofocus>
          </div>

          <div class="form-group">
            <textarea name="RFC" rows="2" class="form-control" placeholder="RFC"></textarea>
          </div>

          <input type="submit" name="save_cliente" class="btn btn-success btn-block" value="Guardar">
        </form>

      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">

        <thead>
          <tr>
            <th>Razon Social</th>
            <th>RFC</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM clientes";
          $result = mysqli_query($conexion, $query);    

          while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['RAZON_SOCIAL']; ?></td>
            <td><?php echo $row['RFC']; ?></td>
            <td>
              <a href="edit.php?IDCLIENTE=<?php echo $row['IDCLIENTE']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete.php?IDCLIENTE=<?php echo $row['IDCLIENTE']?>" class="btn btn-danger">
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
