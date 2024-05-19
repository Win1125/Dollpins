$(document).ready(function () {
    var id, opcion;
    opcion = 4;

    tablaPedidos = $('#tablaPedidos').DataTable({
        "ajax": {
            "url": "database/crudPedidos.php",
            "method": 'POST', //usamos el metodo POST
            "data": { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "id" },
            { "data": "id_usuario" },
            { "data": "total" },
            { "data": "fecha_hora" },
            { "data": "aprobacion" },
            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>" }
        ]
    });

    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formPedidos').submit(function (e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        id = $.trim($('#id').val());
        id_usuario = $.trim($('#id_usuario').val());
        total = $.trim($('#total').val());
        fecha_hora = $.trim($('#fecha_hora').val());
        aprobacion = $.trim($('#aprobacion').val());
        $.ajax({
            url: "database/crudPedidos.php",
            type: "POST",
            datatype: "json",
            data: { id:id, id_usuario:id_usuario, total:total, fecha_hora:fecha_hora, aprobacion:aprobacion, opcion:opcion },
            success: function (data) {
                tablaPedidos.ajax.reload(null, false);
            }
        });
        $('#modalCRUD').modal('hide');
    });

    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function () {
        opcion = 1; //alta           
        id = null;
        $("#formPedidos").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Registrar Pedidos");
        $('#modalCRUD').modal('show');
    });

    //Editar        
    $(document).on("click", ".btnEditar", function () {
        opcion = 2;//editar
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		 
        id_usuario = parseInt(fila.find('td:eq(1)').text());
        total = fila.find('td:eq(2)').text();
        fecha_hora = fila.find('td:eq(3)').text();
        aprobacion = fila.find('td:eq(4)').text();

        $("#id").val(id);
        $("#id_usuario").val(id_usuario);
        $("#total").val(total);
        $("#fecha_hora").val(fecha_hora);
        $("#aprobacion").val(aprobacion);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Pedido");
        $('#modalCRUD').modal('show');
    });

    //Borrar
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro " + id + "?");
        if (respuesta) {
            $.ajax({
                url: "database/crudPedidos.php",
                type: "POST",
                datatype: "json",
                data: { opcion:opcion, id:id },
                success: function () {
                    tablaPedidos.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });
});    