<?php
require_once '../admin/dashboard/database/conexion.php';

function isEmail($email){
    // Expresión regular para validar el formato de un correo electrónico
    $patron = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

    // Verificar si la cadena coincide con el patrón
    if (preg_match($patron, $email)) {
        return true; // El correo electrónico es válido
    } else {
        return false; // El correo electrónico no es válido
    }
}

function emailExiste($email, $conn) {
    try {
        // Verificar si la conexión a la base de datos está establecida
        if (!$conn) {
            throw new Exception("No hay conexión a la base de datos");
        }

        // Preparar la consulta SQL
        $stmt = $conn->prepare("SELECT id FROM empleados WHERE correo = ? LIMIT 1");

        // Comprobar si la preparación de la consulta fue exitosa
        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $conn->errorInfo()[2]);
        }

        // Vincular el parámetro con el correo electrónico
        $stmt->bindValue(1, $email, PDO::PARAM_STR);

        // Ejecutar la consulta
        if (!$stmt->execute()) {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->errorInfo()[2]);
        }

        // Obtener el número de filas encontradas
        $num = $stmt->rowCount();

        // Cerrar la consulta preparada
        $stmt->closeCursor();

        // Verificar si se encontró el correo electrónico
        if ($num > 0) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function obtenerIdUsuarioPorCorreo($correo, $conexion){
    try {
        // Preparar la consulta SQL
        $stmt = $conexion->prepare("SELECT id FROM empleados WHERE correo = ?");

        // Vincular el parámetro con el correo electrónico
        $stmt->bindValue(1, $correo, PDO::PARAM_STR);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró algún resultado
        if ($resultado) {
            // Retornar el ID del usuario
            return $resultado['id'];
        } else {
            // Retornar false si no se encontró el correo
            return false;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

// Función para verificar si las contraseñas coinciden
function passwordsMatch($password1, $password2) {
    return $password1 === $password2;
}

// Función para actualizar la contraseña en la base de datos
function updatePassword($idUsuario, $newPassword, $conexion) {
    try {
        // Preparar la consulta SQL
        $stmt = $conexion->prepare("UPDATE empleados SET passw = ? WHERE id = ?");

        // Vincular los parámetros
        $stmt->bindValue(1, sha1($newPassword));
        echo "ID de la funcion: ". $idUsuario. "\n";
        $stmt->bindValue(2, $idUsuario, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
