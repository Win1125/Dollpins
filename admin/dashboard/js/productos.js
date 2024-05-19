$(document).ready(function() {
    var id, opcion;
    opcion = 4;
        
    tablaProductos = $('#tablaProductos').DataTable({  
        "ajax":{            
            "url": "database/crudProductos.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "id"},
            {"data": "nombre"},
            {"data": "descripcion"},
            {"data": "valor"},
            {"data": "id_categoria"},
            {"data": "existencias"},
            {"data": "estado"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
        ]
    });     
    
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formProductos').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        id = $.trim($('#id').val());
        nombre = $.trim($('#nombre').val());
        descripcion = $.trim($('#descripcion').val());       
        valor = $.trim($('#valor').val());
        id_categoria = $.trim($('#id_categoria').val());
        existencias = $.trim($('#existencias').val());
        estado = $.trim($('#estado').val());                            
            $.ajax({
              url: "database/crudProductos.php",
              type: "POST",
              datatype:"json",    
              data: {id:id, nombre:nombre,descripcion:descripcion, valor:valor, id_categoria:id_categoria,existencias:existencias,estado:estado,opcion:opcion},    
              success: function(data) {
                tablaProductos.ajax.reload(null, false);
               }
            });			        
        $('#modalCRUD').modal('hide');											     			
    });
            
     
    
    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        id=null;
        $("#formProductos").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Registrar producto");
        $('#modalCRUD').modal('show');	    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	        
        id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		 
        nombre = fila.find('td:eq(1)').text(); 
        descripcion = fila.find('td:eq(2)').text(); 
        valor = fila.find('td:eq(3)').text();
        id_categoria = fila.find('td:eq(4)').text();
        existencias = fila.find('td:eq(5)').text();
        estado = fila.find('td:eq(6)').text();

        $("#id").val(id);
        $("#nombre").val(nombre);
        $("#descripcion").val(descripcion);
        $("#valor").val(valor);
        $("#id_categoria").val(id_categoria);
        $("#existencias").val(existencias);
        $("#estado").val(estado);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Producto");		
        $('#modalCRUD').modal('show');		  
    });
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro "+id+"?");                
        if (respuesta) {            
            $.ajax({
              url: "database/crudProductos.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, id:id},    
              success: function() {
                tablaProductos.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });    