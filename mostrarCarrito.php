<?php
include('./include/header.php');
include 'carrito.php';
?>

<div class="container">
  <div class="col-md-4 mt-5 mb-4">
    <h2>Lista de Carrito</h2>
  </div>
  <div class="table-container">
    <?php if (!empty($_SESSION['CARRITO'])) { ?>
      <table class="table table-striped">
        <thead>
          <tr class="text-center">
            <th width="50%">Descripcion</th>
            <th width="5%">Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
            <th width="10%">Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $total = 0;
          foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
            <tr class="text-center">
              <td><?php echo $producto['NOMBRE'] ?></td>
              <td><?php echo $producto['CANTIDAD'] ?></td>
              <td>$<?php echo number_format($producto['PRECIO'], 2) ?></td>
              <td>$<?php echo number_format($producto['CANTIDAD'] * $producto['PRECIO'], 2) ?></td>
              <td>
                <form action="" method="post">
                  <input type="hidden" name="id" value="<?php echo $producto['ID']; ?>">
                  <button class="btn btn-danger" name="btnAccion" value="Eliminar" type="submit">Eliminar</button>
                </form>
              </td>
            </tr>
          <?php
            $total += ($producto['CANTIDAD'] * $producto['PRECIO']);
          } ?>
          <tr>
            <td colspan="3" class="text-right">
              <h4>Total:</h4>
            </td>
            <td class="text-center">
              <h4>$<?php echo number_format($total, 2); ?></h4>
            </td>
            <td>╰(￣ω￣ｏ)</td>
          </tr>
        </tbody>
      </table>
      <form action="mostrarCarrito.php" method="post">
        <div class="form-group text-right mt-5 mb-5">
          <button class="btn btn-warning" name="btnAccion" value="Pagar" type="submit">Proceder a Pagar</button>
        </div>
      </form>
    <?php } else { ?>
      <div class="alert alert-success">
        No hay productos en el carrito
      </div>
    <?php } ?>
  </div>
</div>

<?php include('./include/footer.php'); ?>