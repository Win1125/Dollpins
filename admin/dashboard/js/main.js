// Crear un elemento <link> para importar el archivo CSS
var linkElement = document.createElement('link');
linkElement.rel = 'stylesheet';
linkElement.href = '../sw/dist/sweetalert2.min.css';

// Crear un elemento <script> para importar el archivo JavaScript
var scriptElement = document.createElement('script');
scriptElement.src = '../sw/dist/sweetalert2.min.js';

$(document).ready(function () {
    var user_id, opcion;
    opcion = 4;

    tablaUsuarios = $('#tablaUsuarios').DataTable({
        "ajax": {
            "url": "database/crud.php",
            "method": 'POST', //usamos el metodo POST
            "data": { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            { "data": "nombre" },
            { "data": "correo" },
            { "data": "passw" },
            { "data": "id_cargo" },
            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>" }
        ]
    });

    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formUsuarios').submit(function (e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        user_id = $.trim($('#id').val());
        nombre = $.trim($('#nombre').val());
        correo = $.trim($('#correo').val());

        if (!isEmail(correo)) {
            Swal.fire({
                title: 'Ocurrió un error inesperado',
                text: 'El correo electronico ingresado es invalido',
                type: 'error',
                confirmButtonText: 'Aceptar'
            });
        } else {
            password = $.trim($('#password').val());
            if (!isPass(password)) {
                Swal.fire({
                    title: 'Ocurrió un error inesperado',
                    text: 'La contraseña debe tener al menos una letra en mayusucla y un numero y debe tener 6 digitos.',
                    type: 'error',
                    confirmButtonText: 'Aceptar'
                });
            } else {
                cargo = $.trim($('#cargo').val());
                $.ajax({
                    url: "database/crud.php",
                    type: "POST",
                    datatype: "json",
                    data: { user_id: user_id, nombre: nombre, correo: correo, password: password, cargo: cargo, opcion: opcion },
                    success: function (data) {
                        tablaUsuarios.ajax.reload(null, false);
                    }
                });
            }
        }
        $('#modalCRUD').modal('hide');
    });



    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function () {
        opcion = 1; //alta           
        user_id = null;
        $("#formUsuarios").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Registrar empleados");
        $('#modalCRUD').modal('show');
    });

    //Editar        
    $(document).on("click", ".btnEditar", function () {
        opcion = 2;//editar
        fila = $(this).closest("tr");
        user_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		 
        nombre = fila.find('td:eq(1)').text();
        correo = fila.find('td:eq(2)').text();
        password = fila.find('td:eq(3)').text();
        cargo = fila.find('td:eq(4)').text();
        $("#id").val(user_id);
        $("#nombre").val(nombre);
        $("#correo").val(correo);
        $("#password").val(password);
        $("#cargo").val(cargo);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Usuario");
        $('#modalCRUD').modal('show');
    });

    //Borrar
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro " + user_id + "?");
        if (respuesta) {
            $.ajax({
                url: "database/crud.php",
                type: "POST",
                datatype: "json",
                data: { opcion: opcion, user_id: user_id },
                success: function () {
                    tablaUsuarios.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

});

function isPass(pass) {
    // Verificar la longitud de la contraseña
    if (pass.length < 6) {
        return false;
    }

    // Verificar si la contraseña contiene al menos una letra mayúscula
    if (!/[A-Z]/.test(pass)) {
        return false;
    }

    // Verificar si la contraseña contiene al menos un número
    if (!/\d/.test(pass)) {
        return false;
    }

    // La contraseña cumple con todos los criterios
    return true;
}

function isEmail(email) {
    // Expresión regular para validar el formato de un correo electrónico
    var patron = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Verificar si la cadena coincide con el patrón
    if (patron.test(email)) {
        return true; // El correo electrónico es válido
    } else {
        return false; // El correo electrónico no es válido
    }
}
