<?php
if (!$_POST) {
    header('Location: pacientes.php');
}
include 'funciones/Consultas.php';

if ($_POST['actualizar']) {
    actualizar($_POST['id'], $_POST['Paciente'], $_POST['Fecha'], $_POST['Telefono'], $_POST['email'], $_POST['Mensaje']);
    header('Location: pacientes.php');
} else {
    eliminar($_POST['id']);
    header('Location: pacientes.php');
}
