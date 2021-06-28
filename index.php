<?php
// AQUI VAMOS A IMPORTAR EL DOCUMENTO DE CONEXION PARA PODER USARLO
include 'funciones/Consultas.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Núcleo de diagnóstico</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Merriweather:wght@700&family=Oswald&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <div class="general">
    <div class="mayor">
      <div class="encabezado-principal">
        <h1 class="principal-h1"><a href="pacientes.php">Núcleo de diagnóstico</a></h1>
        <div class="contacto">
          <p>
          <div class="telefono">Conmutador: <p class="negrita">33 3942-1030</p>
          </div>
          </p>
          <p>www.nucleodiagnostico.com</p>
        </div>
      </div>
      <div class="formulario">
        <h3 class="principal-registro">Registro</h3>
        <form action="validar.php" method="post">
          <label for="Paciente">Nombre del Paciente:</label>
          <input type="text" name="Paciente" required />

          <label for="Fecha">Fecha de Nacimiento:</label>
          <input type="date" name="Fecha" required />

          <label for="Telefono">Teléfono:</label>
          <input type="number" name="Telefono" placeholder="Tel. Paciente" required />

          <label for="Doctor">Doctor:</label>
          <input type="text" name="Doctor" required />

          <label for="Consultorio">Consultorio:</label>
          <select name="Consultorio" required>
            <option value="0">Selecciona un Consultorio</option>
            <?php
            $datos = consultar_consultorios();
            foreach ($datos as $dato) { ?>
              <option value="<?php echo $dato["id"] ?>"><?php echo $dato["direccion"] ?></option>
            <?php } ?>
          </select>

          <label for="Email">E-mail:</label>
          <input type="email" name="email" required />

          <label for="Horario">Horario:</label>
          <select name="Horario" required>
            <option value="0">seleccione un horario</option>
            <?php
            $datos = consultar_horarios();
            foreach ($datos as $dato) { ?>
              <option value="<?php echo $dato["id"] ?>"><?php echo $dato["hora"] ?></option>
            <?php } ?>
          </select>

          <label for="Mensaje">Mensaje:</label>
          <textarea name="Mensaje"></textarea>

          <div class="indicaciones">
            <p>INDICACIONES</p>
            <p>·Previa Cita</p>
            <p>·Presentarse sin objetos metálicos del cuello hacia arriba</p>
            <p>·Frente y oídos descubiertos, sin maquillaje (labios)</p>
          </div>

          <table class="tabla">
            <tr>
              <th>ESTUDIOS DENTALES COMPLETOS</th>
              <th>LABORATORIO DE FOTOGRAFÍA</th>
              <th>LABORATORIO DE YESOS</th>
              <th>RAYOS X EXTRAORALES</th>
            </tr>

            <tr class="fila">
              <td>
                <input type="checkbox" name="FotografiadePapel" value="1" />
                <label for="FotografiadePapel">Fotograf&iacutea de Papel</label>
              </td>
              <td>
                <input type="checkbox" name="Fotografia-Prostodoncia" value="4" />
                <label for="Fotografia-Prostodoncia">Fotograf&iacutea Prostodoncia</label>
              </td>
              <td>
                <input type="checkbox" name="Modelo-de-Estudio" value="6" />
                <label for="Modelo-de-Estudio">Modelo de Estudio</label>
              </td>
              <td>
                <input type="checkbox" name="Ortopantomografia" value="8" />
                <label for="Ortopantomografia">Ortopantomograf&iacutea</label>
              </td>
            </tr>

            <tr class="fila">
              <td>
                <input type="checkbox" name="Fotografia-Digital" value="2" />
                <label for="Fotografia-Digital">Fotografia Digital</label>
              </td>
              <td>
                <input type="checkbox" name="Fotografia-para-Simetria" value="5" />
                <label for="Fotografia-para-Simetria">Fotograf&iacutea para Simetr&iacutea</label>
              </td>
              <td>
                <input type="checkbox" name="Modelo-de-Trabajo" value="7" />
                <label for="Modelo-de-Trabajo">Modelo de Trabajo</label>
              </td>
              <td>
                <input type="checkbox" name="Lateral" value="9" />
                <label for="Lateral">Lateral de craneo y cara cefalometría</label>
              </td>
            </tr>

            <tr class="fila">
              <td colspan="3">
                <input type="checkbox" name="Fotografia-para-Blanqueamiento" value="3" />
                <label for="Fotografia-para-Blanqueamiento">Fotografía para Blanqueamiento</label>
              </td>
              <td>
                <input type="checkbox" name="Anteroposterior" value="10" />
                <label for="Anteroposterior">Anteroposterior para cefalometría</label>
              </td>
            </tr>

            <tr class="fila">
              <td colspan="3"></td>
              <td>
                <input type="checkbox" name="Posteroanterios" value="11" />
                <label for="Posteroanterios">Posteroanterios para cefalometría</label>
              </td>
            </tr>
          </table>
          <input type="submit" name="Enviar" placeholder="Enviar" />
          <div class="imagen diente">
            <img src="https://images.vexels.com/media/users/3/152018/isolated/preview/c728796e46fb111cce09ffd324a40949-icono-colorido-diente-by-vexels.png" />
          </div>
        </form>
      </div>
    </div>
    <div class="menor">
      <div class="imagen logo">
        <img src="https://media.cylex.mx/companies/1110/8243/logo/logo.jpg" alt="logo">
      </div>
      <div class="imagen dientes">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRxcloYe9YjNxqe-dle0AXP3YKLfB5CtW8Tw&usqp=CAU" alt="dientes">
      </div>
    </div>
  </div>
</body>

</html>