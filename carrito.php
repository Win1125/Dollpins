<?php
include('./config/conexion.php');
$mensaje = '';

if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {
        case 'Agregar':
            $ID = $_POST['id'];
            $NOMBRE = $_POST['nombre'];
            $PRECIO = $_POST['precio'];
            $CANTIDAD = $_POST['cantidad'];

            if (!isset($_SESSION['CARRITO'])) {
                $producto = array(
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'CANTIDAD' => $CANTIDAD,
                    'PRECIO' => $PRECIO
                );
                $_SESSION['CARRITO'][0] = $producto;
                $mensaje = 'Producto Agregado al Carrito';
            } else {
                $idProductos = array_column($_SESSION['CARRITO'], "ID");

                if (in_array($ID, $idProductos)) {
                    echo "<script>alert('El Producto ya ha sido Seleccionado');</script>";
                    $mensaje = 'Producto Agregado al Carrito';
                } else {
                    $NumeroProductos = count($_SESSION['CARRITO']);
                    $producto = array(
                        'ID' => $ID,
                        'NOMBRE' => $NOMBRE,
                        'CANTIDAD' => $CANTIDAD,
                        'PRECIO' => $PRECIO
                    );
                    $_SESSION['CARRITO'][$NumeroProductos] = $producto;
                    $mensaje = 'Producto Agregado al Carrito';
                }
            }
            //$mensaje = print_r($_SESSION, true);
            break;

        case 'Eliminar':
            $ID = $_POST['id'];

            foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                if ($producto['ID'] == $ID) {
                    // eliminar el registro de la sesion
                    unset($_SESSION['CARRITO'][$indice]);
                    echo "<script>alert('Elemento Borrado');</script>";
                }
            }
            break;

        case 'Pagar':
            $total = 0;

            if (isset($_POST['btnAccion'])) {
                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    $total += ($producto['CANTIDAD'] * $producto['PRECIO']);
                }

                $idUsuario = $_SESSION['id'];
                $sentencia = $conn->query("INSERT INTO factura (id, id_usuario, total, fecha_hora, aprobacion) VALUES (NULL, '$idUsuario', '$total', NOW(), b'1');");

                // Vaciar lista despues de una compra
                if (isset($_POST['btnAccion'])) {
                    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                        // eliminar el registro de la sesion
                        unset($_SESSION['CARRITO'][$indice]);
                    }
                }

                echo "<script>alert('Su Pago ha Sido Aprobado');</script>";
            }
            break;

        default:
            # code...
            break;
    }
}
