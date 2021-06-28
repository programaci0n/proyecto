<?php
function registrar_paciente(string $nombre, string $fecha_nacimiento, string $telefono, string $doctor, int $consultorio, string $email, int $horario, string $mensaje)
{
    $conn = new mysqli('remotemysql.com:3306', 'juvyqS3ibB', 'pOCcweeXiw', 'juvyqS3ibB');

    if (mysqli_connect_errno()) {
        return 0;
    }

    $stmt = $conn->prepare('INSERT INTO personas VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ssssisis', $nombre, $fecha_nacimiento, $telefono, $doctor, $consultorio, $email, $horario, $mensaje);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return 1;
}

function registrar_extras(string $nombre, int $extra)
{
    $conn = new mysqli('remotemysql.com:3306', 'juvyqS3ibB', 'pOCcweeXiw', 'juvyqS3ibB');

    if (mysqli_connect_errno()) {
        return 0;
    }

    $id = 0;
    if ($res = $conn->query('SELECT id FROM personas where nombre="' . $nombre . '"')) {
        while ($fila = $res->fetch_row()) {
            $id = $fila[0];
        }
    }

    $stmt = $conn->prepare('INSERT INTO personas_extras VALUES (?, ?)');
    $stmt->bind_param('ii', $id, $extra);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return 1;
}

function existe_persona(string $nombre)
{
    $conn = new mysqli('remotemysql.com:3306', 'juvyqS3ibB', 'pOCcweeXiw', 'juvyqS3ibB');

    if (mysqli_connect_errno()) {
        return 0;
    }

    if ($res = $conn->query('SELECT id FROM personas where nombre="' . $nombre . '"')) {
        while ($fila = $res->fetch_row()) {
            return true;
        }
    }

    return false;
}

function consultar_personas()
{
    $conn = new mysqli('remotemysql.com:3306', 'juvyqS3ibB', 'pOCcweeXiw', 'juvyqS3ibB');

    if (mysqli_connect_errno()) {
        return 0;
    }

    if ($res = $conn->query("SELECT id, nombre FROM personas")) {
        $datos = array();
        while ($fila = $res->fetch_row()) {
            $datos[$fila[0]]['id'] = $fila[0];
            $datos[$fila[0]]['nombre'] = $fila[1];
        }
        $conn->close();
        return $datos;
    }
}

function consultar_persona(int $id)
{
    $conn = new mysqli('remotemysql.com:3306', 'juvyqS3ibB', 'pOCcweeXiw', 'juvyqS3ibB');

    if (mysqli_connect_errno()) {
        return 0;
    }

    if ($res = $conn->query("SELECT id, nombre, fecha_nacimiento, telefono, doctor, consultorio, email, horario, mensaje FROM personas where id=" . $id)) {
        $datos = array();
        while ($fila = $res->fetch_row()) {
            $datos[$fila[0]]['id'] = $fila[0];
            $datos[$fila[0]]['nombre'] = $fila[1];
            $datos[$fila[0]]['fecha_nacimiento'] = $fila[2];
            $datos[$fila[0]]['telefono'] = $fila[3];
            $datos[$fila[0]]['doctor'] = $fila[4];
            $datos[$fila[0]]['consultorio'] = $fila[5];
            $datos[$fila[0]]['email'] = $fila[6];
            $datos[$fila[0]]['horario'] = $fila[7];
            $datos[$fila[0]]['mensaje'] = $fila[8];
        }
        $conn->close();
        return $datos;
    }
}

function consultar_extras_persona(int $id)
{
    $conn = new mysqli('remotemysql.com:3306', 'juvyqS3ibB', 'pOCcweeXiw', 'juvyqS3ibB');

    if (mysqli_connect_errno()) {
        return 0;
    }

    if ($res = $conn->query("SELECT extra FROM personas_extras where persona=" . $id)) {
        $datos = array();
        while ($fila = $res->fetch_row()) {
            array_push($datos, $fila[0]);
        }
        $conn->close();
        return $datos;
    }
}

function consultar_consultorios()
{
    $conn = new mysqli('remotemysql.com:3306', 'juvyqS3ibB', 'pOCcweeXiw', 'juvyqS3ibB');

    if (mysqli_connect_errno()) {
        return 0;
    }

    if ($res = $conn->query("SELECT id, direccion FROM consultorios")) {
        $datos = array();
        while ($fila = $res->fetch_row()) {
            $datos[$fila[0]]['id'] = $fila[0];
            $datos[$fila[0]]['direccion'] = $fila[1];
        }
        $conn->close();
        return $datos;
    }
}

function consultar_horarios()
{
    $conn = new mysqli('remotemysql.com:3306', 'juvyqS3ibB', 'pOCcweeXiw', 'juvyqS3ibB');

    if (mysqli_connect_errno()) {
        return 0;
    }

    if ($res = $conn->query("SELECT id, hora FROM horarios")) {
        $datos = array();
        while ($fila = $res->fetch_row()) {
            $datos[$fila[0]]['id'] = $fila[0];
            $datos[$fila[0]]['hora'] = $fila[1];
        }
        $conn->close();
        return $datos;
    }
}

function consultar_extras()
{
    $conn = new mysqli('remotemysql.com:3306', 'juvyqS3ibB', 'pOCcweeXiw', 'juvyqS3ibB');

    if (mysqli_connect_errno()) {
        return 0;
    }

    if ($res = $conn->query("SELECT id, nombre FROM extras")) {
        $datos = array();
        while ($fila = $res->fetch_row()) {
            $datos[$fila[0]]['id'] = $fila[0];
            $datos[$fila[0]]['nombre'] = $fila[1];
        }
        $conn->close();
        return $datos;
    }
}

function eliminar(int $id)
{
    $conn = new mysqli('remotemysql.com:3306', 'juvyqS3ibB', 'pOCcweeXiw', 'juvyqS3ibB');

    if (mysqli_connect_errno()) {
        return;
    }

    $stmt = $conn->prepare('DELETE FROM personas_extras WHERE persona=?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt = $conn->prepare("DELETE FROM personas WHERE id=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function actualizar(int $id, string $nombre, string $fecha_nacimiento, string $telefono, string $email, string $mensaje)
{
    $conn = new mysqli('remotemysql.com:3306', 'juvyqS3ibB', 'pOCcweeXiw', 'juvyqS3ibB');

    if (mysqli_connect_errno()) {
        return 0;
    }

    $query = 'UPDATE personas SET nombre=?, fecha_nacimiento=?, telefono=?, email=?, mensaje=? WHERE id=?';

    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssssi', $nombre, $fecha_nacimiento, $telefono, $email, $mensaje, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return 1;
}
