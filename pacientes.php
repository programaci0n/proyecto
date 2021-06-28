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
                <h1 class="principal-h1"><a href="index.php">Núcleo de diagnóstico</a></h1>
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
                <form action="pacientes.php" method="get">
                    <select name="paciente" id="pacientes">
                        <?php
                        $datos = consultar_personas();
                        if (!$datos) {
                            header('Location: index.php');
                        }
                        foreach ($datos as $dato) { ?>
                            <option value="<?php echo $dato["id"] ?>"><?php echo $dato["nombre"] ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" value="consultar">
                </form>
                <?php
                if ($_GET['paciente']) {
                    $datos_paciente = consultar_persona($_GET['paciente'])[$_GET['paciente']];
                ?>
                    <form action="actualizar.php" method="post">
                        <label for="Paciente">Nombre del Paciente:</label>
                        <input type="text" name="Paciente" required value="<?php echo $datos_paciente['nombre'] ?>" />

                        <label for="Fecha">Fecha de Nacimiento:</label>
                        <input type="date" name="Fecha" required value="<?php echo $datos_paciente['fecha_nacimiento'] ?>" />

                        <label for="Telefono">Teléfono:</label>
                        <input type="number" name="Telefono" placeholder="Tel. Paciente" required value="<?php echo $datos_paciente['telefono'] ?>" />

                        <label for="Doctor">Doctor:</label>
                        <input type="text" name="Doctor" required disabled="true" value="<?php echo $datos_paciente['doctor'] ?>" />

                        <label for="Consultorio">Consultorio:</label>
                        <select name="Consultorio" required disabled="true">
                            <option value="0">Selecciona un Consultorio</option>
                            <?php
                            $datos = consultar_consultorios();
                            foreach ($datos as $dato) { ?>
                                <option value="<?php echo $dato["id"] ?>" <?php if (intval($dato['id']) == intval($datos_paciente['consultorio'])) {
                                                                                echo 'selected';
                                                                            } ?>><?php echo $dato["direccion"] ?></option>
                            <?php } ?>
                        </select>

                        <label for="Email">E-mail:</label>
                        <input type="email" name="email" required value="<?php echo $datos_paciente['email'] ?>" />

                        <label for="Horario">Horario:</label>
                        <select name="Horario" required disabled="true">
                            <option value="0">seleccione un horario</option>
                            <?php
                            $datos = consultar_horarios();
                            foreach ($datos as $dato) { ?>
                                <option value="<?php echo $dato["id"] ?>" <?php if (intval($dato['id']) == intval($datos_paciente['horario'])) {
                                                                                echo 'selected';
                                                                            } ?>><?php echo $dato["hora"]; ?></option>
                            <?php } ?>
                        </select>

                        <label for="Mensaje">Mensaje:</label>
                        <textarea name="Mensaje"><?php echo $datos_paciente['mensaje']; ?></textarea>

                        <div class="indicaciones">
                            <p>INDICACIONES</p>
                            <p>·Previa Cita</p>
                            <p>·Presentarse sin objetos metálicos del cuello hacia arriba</p>
                            <p>·Frente y oídos descubiertos, sin maquillaje (labios)</p>
                        </div>

                        <?php $extras_paciente = consultar_extras_persona($datos_paciente['id']); ?>
                        <table class="tabla">
                            <tr>
                                <th>ESTUDIOS DENTALES COMPLETOS</th>
                                <th>LABORATORIO DE FOTOGRAFÍA</th>
                                <th>LABORATORIO DE YESOS</th>
                                <th>RAYOS X EXTRAORALES</th>
                            </tr>

                            <tr class="fila">
                                <td>
                                    <input type="checkbox" name="FotografiadePapel" value="1" disabled="true" <?php if (in_array(1, $extras_paciente)) {
                                                                                                                    echo "checked";
                                                                                                                } ?> />
                                    <label for="FotografiadePapel">Fotograf&iacutea de Papel</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="Fotografia-Prostodoncia" value="4" disabled="true" <?php if (in_array(4, $extras_paciente)) {
                                                                                                                        echo "checked";
                                                                                                                    } ?> />
                                    <label for="Fotografia-Prostodoncia">Fotograf&iacutea Prostodoncia</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="Modelo-de-Estudio" value="6" disabled="true" <?php if (in_array(6, $extras_paciente)) {
                                                                                                                    echo "checked";
                                                                                                                } ?> />
                                    <label for="Modelo-de-Estudio">Modelo de Estudio</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="Ortopantomografia" value="8" disabled="true" <?php if (in_array(8, $extras_paciente)) {
                                                                                                                    echo "checked";
                                                                                                                } ?> />
                                    <label for="Ortopantomografia">Ortopantomograf&iacutea</label>
                                </td>
                            </tr>

                            <tr class="fila">
                                <td>
                                    <input type="checkbox" name="Fotografia-Digital" value="2" disabled="true" <?php if (in_array(2, $extras_paciente)) {
                                                                                                                    echo "checked";
                                                                                                                } ?> />
                                    <label for="Fotografia-Digital">Fotografia Digital</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="Fotografia-para-Simetria" value="5" disabled="true" <?php if (in_array(5, $extras_paciente)) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> />
                                    <label for="Fotografia-para-Simetria">Fotograf&iacutea para Simetr&iacutea</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="Modelo-de-Trabajo" value="7" disabled="true" <?php if (in_array(7, $extras_paciente)) {
                                                                                                                    echo "checked";
                                                                                                                } ?> />
                                    <label for="Modelo-de-Trabajo">Modelo de Trabajo</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="Lateral" value="9" disabled="true" <?php if (in_array(9, $extras_paciente)) {
                                                                                                        echo "checked";
                                                                                                    } ?> />
                                    <label for="Lateral">Lateral de craneo y cara cefalometría</label>
                                </td>
                            </tr>

                            <tr class="fila">
                                <td colspan="3">
                                    <input type="checkbox" name="Fotografia-para-Blanqueamiento" value="3" disabled="true" <?php if (in_array(3, $extras_paciente)) {
                                                                                                                                echo "checked";
                                                                                                                            } ?> />
                                    <label for="Fotografia-para-Blanqueamiento">Fotografía para Blanqueamiento</label>
                                </td>
                                <td>
                                    <input type="checkbox" name="Anteroposterior" value="10" disabled="true" <?php if (in_array(10, $extras_paciente)) {
                                                                                                                    echo "checked";
                                                                                                                } ?> />
                                    <label for="Anteroposterior">Anteroposterior para cefalometría</label>
                                </td>
                            </tr>

                            <tr class="fila">
                                <td colspan="3"></td>
                                <td>
                                    <input type="checkbox" name="Posteroanterios" value="11" disabled="true" <?php if (in_array(11, $extras_paciente)) {
                                                                                                                    echo "checked";
                                                                                                                } ?> />
                                    <label for="Posteroanterios">Posteroanterios para cefalometría</label>
                                </td>
                            </tr>
                        </table>
                        <input type="submit" name="actualizar" value="actualizar" />
                        <input type="hidden" name="id" value="<?php echo $datos_paciente['id'] ?>">
                        <input type="submit" name="eliminar" value="eliminar" />
                        <input type="hidden" name="id" value="<?php echo $datos_paciente['id'] ?>">
                        <div class="imagen diente">
                            <img src="https://images.vexels.com/media/users/3/152018/isolated/preview/c728796e46fb111cce09ffd324a40949-icono-colorido-diente-by-vexels.png" />
                        </div>
                    </form>
                <?php } ?>
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