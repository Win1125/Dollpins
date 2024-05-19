$(document).ready(function() {
    var id, opcion;
    opcion = 4;
        
    tablaCargos = $('#tablaCargos').DataTable({  
        "ajax":{            
            "url": "database/crudCargo.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "id"},
            {"data": "cargo"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
        ]
    });     

    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formCargos').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        id = $.trim($('#id').val());       
        cargo = $.trim($('#cargo').val());                          
            $.ajax({
              url: "database/crudCargo.php",
              type: "POST",
              datatype:"json",    
              data: {id:id, cargo:cargo, opcion:opcion},    
              success: function(data) {
                tablaCargos.ajax.reload(null, false);
               }
            });			        
        $('#modalCRUD').modal('hide');											     			
    });

    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        id=null;
        $("#formCargos").trigger("reset");
        $(".modal-header").css( "background-color", "#17a2b8");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Registrar Cargo");
        $('#modalCRUD').modal('show');	    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	        
        id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		 
        cargo = fila.find('td:eq(1)').text();
        $("#id").val(id);
        $("#cargo").val(cargo);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Cargo");		
        $('#modalCRUD').modal('show');		   
    });
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        id = parseInt($(this).closest('tr').find('td:eq(0)').text());		
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro "+ id +"?");                
        if (respuesta) {            
            $.ajax({
              url: "database/crudCargo.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, id:id},    
              success: function() {
                  tablaCargos.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });    