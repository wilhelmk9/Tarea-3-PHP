<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colegio</title>
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- El logotipo o nombre del menú -->
            <a class="navbar-brand" href="#">Menú</a>
            <!-- Botón para colapsar la barra de navegación en pantallas pequeñas -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Contenedor para los elementos de la barra de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Lista de elementos de la barra de navegación -->
                <ul class="navbar-nav">
                    <!-- Elemento de la lista - Enlace a la página "Inicio" -->
                    <li class="nav-item">
                        <a class="nav-link" href="inicio.php">Inicio</a>
                    </li>
                    <!-- Elemento de la lista - Enlace a la página "Profesores" -->
                    <li class="nav-item">
                        <a class="nav-link" href="holi.php">Profesores</a>
                    </li>
                    <!-- Elemento de la lista - Enlace a otra página (sin especificar el destino) -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Otra Página</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Botón para abrir un modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formularioModal" id="btn_abrir_formulario">
        Nuevo Alumno
    </button>

    <!-- Contenedor principal -->
    <div class="container mt-4"> 
        <!-- Título del formulario -->
        <h1>Formulario de Estudiantes</h1>

        <!-- Contenedor para el formulario -->
        <div class="container">
            <!-- Formulario -->
            <form class="d-flex" action="crud_empleado.php" method="post">

                <!-- Modal para el formulario -->
                <div class="modal fade" id="formularioModal" tabindex="-1" aria-labelledby="formularioModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Encabezado del modal -->
                            <div class="modal-header">
                                <h5 class="modal-title" id="formularioModalLabel">Formulario de Estudiantes</h5>
                                <!-- Botón para cerrar el modal -->
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <!-- Cuerpo del modal -->
                            <div class="modal-body">
                                <!-- Campo de entrada para el ID -->
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="txt_id" class="form-label"><b>ID</b></label>
                                        <input type="number" name="txt_id" id="txt_id" class="form-control" value="0">
                                    </div>

                                    <!-- Otros campos de entrada del formulario -->
                                    <!-- Campo de entrada para el Codigo -->
                                    <div class="mb-3">
                                        <label for="txt_carne" class="form-label"><b>Código</b></label>
                                        <input type="text" name="txt_carne" id="txt_carne" class="form-control" placeholder="Código: E001" required>
                                    </div>
                                    <!-- Campo de entrada para los Nombres -->
                                    <div class="mb-3">
                                        <label for="txt_nombres" class="form-label"><b>Nombres</b></label>
                                        <input type="text" name="txt_nombres" id="txt_nombres" class="form-control" placeholder="Nombres: Nombre1 Nombre2" required>
                                    </div>
                                    <!-- Campo de entrada para los Apellidos -->
                                    <div class="mb-3">
                                        <label for="txt_apellidos" class="form-label"><b>Apellidos</b></label>
                                        <input type="text" name="txt_apellidos" id="txt_apellidos" class="form-control" placeholder="Apellidos: Apellido1 Apellido2" required>
                                    </div>
                                    <!-- Campo de entrada para la Dirección -->
                                    <div class="mb-3">
                                        <label for="txt_direccion" class="form-label"><b>Dirección</b></label>
                                        <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" placeholder="Dirección: #casa calle avenida lugar" required>
                                    </div>
                                    <!-- Campo de entrada para el Teléfono -->
                                    <div class="mb-3">
                                        <label for="txt_telefono" class="form-label"><b>Teléfono</b></label>
                                        <input type="number" name="txt_telefono" id="txt_telefono" class="form-control" placeholder="Teléfono: 55552222" required>
                                    </div>
                                    <!-- Campo de entrada para el Correo Electrónico -->
                                    <div class="mb-3">
                                        <label for="txt_correo_electronico" class="form-label"><b>Correo Electrónico</b></label>
                                        <input type="text" name="txt_correo_electronico" id="txt_correo_electronico" class="form-control" placeholder="Correo Electrónico: ejemplo@ejemplo.com" required>
                                    </div>
                                    <!-- Campo de selección para el Tipo de Sangre -->
                                    <div class="mb-3">
                                      <label for="drop_sangre" class="form-label"><b>Tipo de Sangre</b></label>
                                      <!-- Seleccionar un tipo de sangre a partir de un menú desplegable -->
                                      <select class="form-select" name="drop_sangre" id="drop_sangre">
                                          <option value="0"> ---- Tipo de sangre ---- </option>
                                          <!-- PHP para cargar opciones desde una base de datos -->
                                          <?php 
                                          // Incluir el archivo de configuración de la conexión a la base de datos
                                          include("datos_conexion.php");

                                          // Conectar a la base de datos utilizando los datos de conexión proporcionados
                                          $db_conexion = mysqli_connect($db_host, $db_usr, $db_pass, $db_nombre);

                                          // Realizar una consulta SQL para obtener los tipos de sangre desde la tabla "tipos_sangre"
                                          $db_conexion->real_query("SELECT id_tipo_sangre as id, sangre FROM tipos_sangre;");

                                          // Obtener el resultado de la consulta
                                          $resultado = $db_conexion->use_result();

                                          // Iterar a través de las filas del resultado y generar opciones para el menú desplegable
                                          while ($fila = $resultado->fetch_assoc()) {
                                              echo "<option value=" . $fila['id'] . ">" . $fila['sangre'] . "</option>";
                                          }

                                          // Cerrar la conexión a la base de datos
                                          $db_conexion->close();
                                          ?>
                                      </select>
                                  </div>

                                    <!-- Campo de entrada para la Fecha de Nacimiento -->
                                    <div class="mb-3">
                                        <label for="txt_fn" class="form-label"><b>Fecha Nacimiento</b></label>
                                        <input type="date" name="txt_fn" id="txt_fn" class="form-control" placeholder="aaaa-mm-dd" required>
                                    </div>
                                    <!-- Botones para agregar, modificar, eliminar y nuevo -->
                                    <div class="mb-3">
                                        <input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-primary" value="Agregar">
                                        <input type="submit" name="btn_modificar" id="btn_modificar" class="btn btn-success" value="Modificar">
                                        <input type="submit" name="btn_eliminar" id="btn_eliminar" class="btn btn-danger" onclick="javascript:if(!confirm('¿Desea Eliminar?'))return false" value="Eliminar">
                                        <input type="submit" name="btn_nuevo" id="btn_nuevo" class="btn btn-secondary" onclick="limpiar()" value="Nuevo">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Fin del formulario -->

            <!-- Tabla de estudiantes -->
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>id_estudiante</th>
                        <th>carnet</th>
                        <th>nombres</th>
                        <th>apellidos</th>
                        <th>direccion</th>
                        <th>telefono</th>
                        <th>correo_electronico</th>
                        <th>sangre</th>
                        <th>nacimiento</th>
                    </tr>
                </thead>
                <tbody id="tbl_empleados">
    <?php 
    // Incluir el archivo de configuración de la conexión a la base de datos
    include("datos_conexion.php");

    // Conectar a la base de datos utilizando los datos de conexión proporcionados
    $db_conexion = mysqli_connect($db_host, $db_usr, $db_pass, $db_nombre);

    // Realizar una consulta SQL para obtener información de los estudiantes y su tipo de sangre
    $db_conexion->real_query("SELECT e.id_estudiante as id, e.carne, e.nombres, e.apellidos, e.direccion, e.telefono, e.correo_electronico, p.sangre, e.fecha_nacimiento, p.id_tipo_sangre FROM estudiantes as e inner join tipos_sangre as p on e.id_tipo_sangre = p.id_tipo_sangre;");

    // Obtener el resultado de la consulta
    $resultado = $db_conexion->use_result();

    // Iterar a través de las filas del resultado y generar filas de tabla HTML
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr data-id=" . $fila['id'] . " data-idp=" . $fila['id_tipo_sangre'] . ">";
        echo "<td>" . $fila['id'] . "</td>"; // Agregar esta línea para mostrar el ID del estudiante
        echo "<td>" . $fila['carne'] . "</td>";
        echo "<td>" . $fila['nombres'] . "</td>";
        echo "<td>" . $fila['apellidos'] . "</td>";
        echo "<td>" . $fila['direccion'] . "</td>";
        echo "<td>" . $fila['telefono'] . "</td>";
        echo "<td>" . $fila['correo_electronico'] . "</td>";
        echo "<td>" . $fila['sangre'] . "</td>";
        echo "<td>" . $fila['fecha_nacimiento'] . "</td>";
        echo "</tr>";
    }

    // Cerrar la conexión a la base de datos
    $db_conexion->close();
    ?>
</tbody>

            <!-- Fin de la tabla de estudiantes -->
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- JavaScript personalizado -->
    <script type="text/javascript">
        // Función para limpiar los campos del formulario
        function limpiar() {
            $("#txt_id").val('0');
            $("#txt_carne").val('');
            $("#txt_nombres").val('');
            $("#txt_apellidos").val('');
            $("#txt_direccion").val('');
            $("#txt_telefono").val('');
            $("#txt_correo_electronico").val('');
            $("#txt_fn").val('');
            $("#drop_sangre").val("0");
        }

                      // Evento de clic en una celda de la tabla
                      $('#tbl_empleados').on('click', 'tr td', function(evt) {
                      // Declaración de variables para almacenar datos
                      var target, id, idp, carne, nombres, apellidos, direccion, telefono, correo_electronico, nacimiento;
                      
                      // Obtener el elemento del evento que se disparó
                      target = $(event.target);
                      
                      // Obtener el valor del atributo 'data-id' del elemento padre (fila de la tabla)
                      id = target.parent().data('id');
                      
                      // Obtener el valor del atributo 'data-idp' del elemento padre (fila de la tabla)
                      idp = target.parent().data('idp');
                      
                      // Obtener el contenido de la segunda celda (índice 1) de la fila
                      carne = target.parent("tr").find("td").eq(1).html();
                      
                      // Obtener el contenido de la tercera celda (índice 2) de la fila
                      nombres = target.parent("tr").find("td").eq(2).html();
                      
                      // Obtener el contenido de la cuarta celda (índice 3) de la fila
                      apellidos = target.parent("tr").find("td").eq(3).html();
                      
                      // Obtener el contenido de la quinta celda (índice 4) de la fila
                      direccion = target.parent("tr").find("td").eq(4).html();
                      
                      // Obtener el contenido de la sexta celda (índice 5) de la fila
                      telefono = target.parent("tr").find("td").eq(5).html();
                      
                      // Obtener el contenido de la séptima celda (índice 6) de la fila
                      correo_electronico = target.parent("tr").find("td").eq(6).html();
                      
                      // Obtener el contenido de la novena celda (índice 8) de la fila
                      nacimiento = target.parent("tr").find("td").eq(8).html();
                      
                      // Rellenar los campos del formulario con los datos obtenidos
                      $("#txt_id").val(id);
                      $("#txt_carne").val(carne);
                      $("#txt_nombres").val(nombres);
                      $("#txt_apellidos").val(apellidos);
                      $("#txt_direccion").val(direccion);
                      $("#txt_telefono").val(telefono);
                      $("#txt_correo_electronico").val(correo_electronico);
                      $("#txt_fn").val(nacimiento);
                      
                      // Seleccionar una opción en un menú desplegable basado en el valor de 'idp'
                      $("#drop_sangre").val(idp);
                      
                      // Mostrar un modal después de completar la preparación de datos
                      $("#formularioModal").modal('show');
                  });


        // Evento de clic en una fila de la tabla
        $('#tbl_empleados tbody').on('click', 'tr', function() {
            $('#formularioModal').modal('show');
        });

        // Evento de clic en el botón "Abrir Formulario"
        $(document).ready(function() {
            $("#btn_abrir_formulario").click(function() {
                limpiar();
            });
        });
    </script>
</body>
</html>
