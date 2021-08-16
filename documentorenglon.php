<?php include("db.php"); ?>



      <div class="card card-body">
        <form action="save.php" method="POST">

          <div class="form-group">
            <input type="text" name="IDMATERIAL" class="form-control" placeholder="id material" autofocus>
          </div>

          <div class="form-group">
            <input type="text" name="UNIDAD_MEDIDA" class="form-control" placeholder="Medida" autofocus>
          </div>

          <div class="form-group">
            <input type="number" name="CANTIDAD" class="form-control" placeholder="Cantidad" autofocus>
          </div>

          <div class="form-group">
            <input type="number" name="PRECIO" class="form-control" placeholder="Precio" autofocus>
          </div>

          <input type="submit" name="save_documentorenglon" class="btn btn-success btn-block" value="Guardar">
        </form>

      </div>
    </div>

    <?php
      $query = "SELECT * FROM documentorenglon";
      $result = mysqli_query($conexion, $query);    

      while($row = mysqli_fetch_assoc($result)) { ?>
  <div class="col-md-3">
    <form action="save.php" method="POST">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['IDMATERIAL']; ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['PRECIO']; ?></h6>
          <p class="card-text"><?php echo $row['UNIDAD_MEDIDA']; ?></p>
          <div class="form-group">
            <input type="number" name="CANTIDAD" class="form-control" placeholder="CANTIDAD" autofocus>
          </div>
          <input type="submit" name="save_documentorenglon" class="btn btn-success btn-block" value="Guardar">
        </div>
      </div>
    </form>
  </div>
    <?php } ?>
