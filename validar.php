<?php
if (!$_POST) {
  header('Location: index.php');
}
if ($_POST['Fecha'] == '0' || $_POST['Consultorio'] == '0') {
  header('Location: index.php');
}

include 'funciones/Consultas.php';
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">

<head>
  <meta charset="utf-8" />
  <title>VALIDACION PACIENTE</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Merriweather:wght@700&family=Oswald&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body class="paciente">

  <a href="index.php">index</a>
  <a href="pacientes.php">pacientes</a>
  <h1 class="titulo-paciente">Tu registro se ha enviado correctamente</h1>

  <form action="" class="datos-paciente">
    <?php
    $Paciente = $_POST['Paciente'];
    $Fecha = $_POST['Fecha'];
    $Telefono = $_POST['Telefono'];
    $Doctor = $_POST['Doctor'];
    $Consultorio = $_POST['Consultorio'];
    $email = $_POST['email'];
    $Horario = $_POST['Horario'];
    $Mensaje = $_POST['Mensaje'];
    ?>
    <label for="paciente">El nombre del paciente es:</label>
    <input type="text" name="paciente" id="paciente" readonly value="<?php echo $Paciente ?>">

    <label for="fecha">Fecha de nacimiento:</label>
    <input type="text" name="fecha" id="fecha" readonly value="<?php echo $Fecha ?>">

    <label for="telefono">Telefono del paciente:</label>
    <input type="text" name="telefono" id="telefono" readonly value="<?php echo $Telefono ?>">

    <label for="doctor">Nombre del doctor:</label>
    <input type="text" name="doctor" id="doctor" readonly value="<?php echo $Doctor ?>">

    <label for="consultorio">Consultorio al que el paciente desea acudir</label>
    <select name="Consultorio">
      <?php
      $datos = consultar_consultorios();
      foreach ($datos as $dato) {
        if ($dato['id'] == $Consultorio) { ?>
          <option value="<?php echo $dato["id"] ?>"><?php echo $dato["direccion"] ?></option>
      <?php }
      } ?>
    </select>

    <label for="email">E-Mail</label>
    <input type="text" name="email" id="email" readonly value="<?php echo $email ?>">

    <label for="horario">Horario de consulta:</label>
    <select name="Horario">

      <?php
      $datos = consultar_horarios();
      foreach ($datos as $dato) {
        if ($dato['id'] == $Horario) { ?>
          <option value="<?php echo $dato["id"] ?>"><?php echo $dato["hora"]; ?></option>
      <?php }
      } ?>
    </select>

    <label for="mensaje">Mensaje del paciente:</label>
    <textarea name="mensaje" id="mensaje"> <?php echo $Mensaje ?></textarea>
  </form>

  <?php
  $existe = existe_persona($Paciente);
  if ($existe) {
    header('Location: index.php');
  } else {
    registrar_paciente($Paciente, $Fecha, $Telefono, $Doctor, $Consultorio, $email, $Horario, $Mensaje);
  ?>
    <h2>EXAMENES A REALIZAR</h2>
    <ul class="lista">
      <?php
      if ($_POST['FotografiadePapel']) { ?>
        <li>Fotografía de Papel</li>
      <?php } ?>

      <?php
      if ($_POST['Modelo-de-Estudio']) { ?>
        <li>Modelo de estudio</li>
      <?php }
      registrar_extras($Paciente, 6);
      ?>

      <?php
      if ($_POST['Ortopantomografia']) { ?>
        <li>Ortopantomografia</li>
      <?php }
      registrar_extras($Paciente, 8);
      ?>

      <?php
      if ($_POST['Fotografia-Digital']) { ?>
        <li>Fotografia digital</li>
      <?php }
      registrar_extras($Paciente, 2);
      ?>

      <?php
      if ($_POST['Fotografia-para-Simetria']) { ?>
        <li>Fotografia para Simetria</li>
      <?php }
      registrar_extras($Paciente, 5);
      ?>

      <?php
      if ($_POST['Fotografia-Prostodoncia']) { ?>
        <li>Fotografia Prostodoncia</li>
      <?php }
      registrar_extras($Paciente, 4);
      ?>

      <?php
      if ($_POST['Modelo-de-Trabajo']) { ?>
        <li>Modelo de Trabajo</li>
      <?php }
      registrar_extras($Paciente, 7);
      ?>

      <?php
      if ($_POST['Lateral']) { ?>
        <li>Lateral de craneo y cara cefalometría</li>
      <?php }
      registrar_extras($Paciente, 9);
      ?>

      <?php
      if ($_POST['Fotografia-para-Blanqueamiento']) { ?>
        <li>Fotografia para Blanqueamiento</li>
      <?php }
      registrar_extras($Paciente, 3);
      ?>

      <?php
      if ($_POST['Anteroposterior']) { ?>
        <li>Anteroposterior para cefalometría</li>
      <?php }
      registrar_extras($Paciente, 10);
      ?>

      <?php
      if ($_POST['Posteroanterios']) { ?>
        <li>Posteroanterios para cefalometría</li>
      <?php }
      registrar_extras($Paciente, 11);
      ?>
    <?php } ?>
    </ul>


</body>

</html>