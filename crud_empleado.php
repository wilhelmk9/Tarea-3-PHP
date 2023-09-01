<?php
if (!empty($_POST)) {
    // Obtener datos del formulario
    $txt_id = $_POST["txt_id"];
    $txt_carne = $_POST["txt_carne"];
    $txt_nombres = $_POST["txt_nombres"];
    $txt_apellidos = $_POST["txt_apellidos"];
    $txt_direccion = $_POST["txt_direccion"];
    $txt_telefono = $_POST["txt_telefono"];
    $txt_correo_electronico = $_POST["txt_correo_electronico"];
    $drop_sangre = $_POST["drop_sangre"];
    $txt_fn = $_POST["txt_fn"];

    // Incluir el archivo de configuración de la conexión a la base de datos
    include("datos_conexion.php");

    // Conectar a la base de datos utilizando los datos de conexión proporcionados
    $db_conexion = mysqli_connect($db_host, $db_usr, $db_pass, $db_nombre);
    $sql = "";

    // Verificar qué botón se presionó en el formulario (Agregar, Modificar o Eliminar)
    if (isset($_POST['btn_agregar'])) {
        // Construir la consulta SQL para agregar un nuevo registro
        $sql = "INSERT INTO estudiantes(carne, nombres, apellidos, direccion, telefono, correo_electronico, fecha_nacimiento, id_tipo_sangre) VALUES ('" . $txt_carne . "','" . $txt_nombres . "','" . $txt_apellidos . "','" . $txt_direccion . "','" . $txt_telefono . "','" . $txt_correo_electronico . "','" . $txt_fn . "'," . $drop_sangre . ");";
    } elseif (isset($_POST['btn_modificar'])) {
        // Construir la consulta SQL para modificar un registro existente
        $sql = "UPDATE estudiantes SET carne='" . $txt_carne . "', nombres='" . $txt_nombres . "', apellidos='" . $txt_apellidos . "', direccion='" . $txt_direccion . "', telefono='" . $txt_telefono . "', correo_electronico='" . $txt_correo_electronico . "', fecha_nacimiento='" . $txt_fn . "', id_tipo_sangre=" . $drop_sangre . " WHERE id_estudiante = " . $txt_id . ";";
    } elseif (isset($_POST['btn_eliminar'])) {
        // Construir la consulta SQL para eliminar un registro
        $sql = "DELETE FROM estudiantes WHERE id_estudiante = " . $txt_id . ";";
    }

    // Ejecutar la consulta SQL en la base de datos
    if ($db_conexion->query($sql) === true) {
        $db_conexion->close();
        // Redireccionar a una página después de realizar la operación
        header('Location: /colegio');
    } else {
        $db_conexion->close();
        // Manejar posibles errores aquí
    }
}
?>
