class DataToSendManager{

    onloadCategoriaRegister(){
        return function(responde){
            $("#nombre").attr("data",responde['id']);
            $('#nombre').attr('value',responde['Nombre']);
            $('#descripcion').attr('value',responde['Descripcion']);
            $('#estado-seleccion').val(responde['RActivo']);
        }
    }

    onSavePostDataOfCategoria(){
        return function(){
            return {
                id:$("#nombre").attr("data"),
                nombre: $('#nombre').val(),
                descripcion:$('#descripcion').val(),
                activo:$('#estado-seleccion').val(),
            }
        };
    }

    /*Clientes-------------------------------------------------------------------------*/

    onloadClienteRegister(){
        return function(responde){
            $("#RFC").attr("data",responde['RFC']);
            $('#RFC').attr('value',responde['RFC']);
            $('#nombre').attr('value',responde['Nombre']);
            $('#apellido_p').attr('value',responde['Apellido_P']);
            $('#apellido_m').attr('value',responde['Apellido_M']);
            $('#correo').attr('value',responde['Correo']);
            $('#telefono').attr('value',responde['Telefono']);
            $('#estado-seleccion').val(responde['RActivo']);
        };
    }

    onSavePostDataOfCliente(){
        return function(){
            return{
                id:$("#RFC").attr("data"),
                rfc:$("#RFC").val(),
                nombre: $('#nombre').val(),
                apellido_p:$('#apellido_p').val(),
                apellido_m:$('#apellido_m').val(),
                correo:$('#correo').val(),
                telefono:$('#telefono').val(),
                activo:$('#estado-seleccion').val()
            };
        }
    }

    /*Empleados----------------------------------------------------------------------*/

    onloadEmpleadoRegister(){
        return function(responde){
            $("#RFC").attr("data",responde['IDEmpleado']);
            $('#RFC').attr('value',responde['RFC']);
            $('#nombre').attr('value',responde['Nombre']);
            $('#apellido_p').attr('value',responde['Apellido_P']);
            $('#apellido_m').attr('value',responde['Apellido_M']);
            $('#fnac').attr('value',responde['Fecha_Nacimiento']);
            $('#fcontratacion').attr('value',responde['Fecha_Contratacion']);
            $('#direccion').attr('value',responde['Direccion']);
            $('#telefono').attr('value',responde['Telefono']);
            $('#tipousuario').attr('value',responde['NivelUsuario']);
            $('#clave').attr('value',responde['Clave']);
            $('#estado-seleccion').val(responde['RActivo']);
        };
    }

    onSavePostDataOfEmpleado(){
        return function(){
            return{
                id:$("#RFC").attr("data"),
                rfc:$("#RFC").val(),
                nombre: $('#nombre').val(),
                apellido_p:$('#apellido_p').val(),
                apellido_m:$('#apellido_m').val(),
                fnac:$('#fnac').val(),
                fcontratacion:$('#fcontratacion').val(),
                direccion:$('#direccion').val(),
                telefono:$('#telefono').val(),
                tipousuario:$('#tipousuario').val(),
                clave:$('#clave').val(),
                activo:$('#estado-seleccion').val()
            };
        }
    }

    /*Nivel de Usuario*/


    onloadNivelUsuarioRegister(){
        return function(responde){
            console.log("Entra aqui");
            $("#descripcion").attr("data",responde['id']);
            $('#descripcion').attr('value',responde['descripcion']);
            $('#nivelDePermisos').attr('value',responde['nivel']);
        };
    }

    onSavePostDataOfNivelUsuario(){
        return function(){
            return{
                id:$("#descripcion").attr("data"),
                descripcion:$("#descripcion").val(),
                nivel: $('#nivelDePermisos').val(),
            };
        }
    }

    /*Proveedores-------------------------------------------------------------------------------*/

    onloadProveedoresRegister(){
        return function(responde){
            $("#compania").attr("data",responde['IDProveedor']);
            $('#compania').attr('value',responde['Compania']);
            $('#contacto').attr('value',responde['Contacto']);
            $('#correo').attr('value',responde['Correo']);
            $('#telefono').attr('value',responde['Telefono']);
            $('#estado-seleccion').val(responde['RActivo']);
        };
    }

    onSavePostDataOfProveedores(){

        return function(){
            return {
                id:$("#compania").attr("data"),
                compania:$("#compania").val(),
                contacto: $('#contacto').val(),
                correo:$('#correo').val(),
                telefono:$('#telefono').val(),
                activo:$('#estado-seleccion').val()
            };
        }
    }

    /*Productos-----------------------------------------------------------------------------------*/


    onloadProductoRegister(){
        return function(responde){
            $("#nombre").attr("data",responde['IDProducto']);
            $('#nombre').attr('value',responde['Nombre']);
            $('#proveedor').attr('value',responde['IDProveedor']);
            $('#categoriaProducto').attr('value',responde['IDCategoria']);
            $('#precio').attr('value',responde['PrecioUnitario']);
            $('#stock').attr('value',responde['EnExistencia']);
            $('#estado-seleccion').val(responde['RActivo']);
        };
    }

    onSavePostDataOfProducto(){

        return function(){
            return {
                id:$("#nombre").attr("data"),
                nombre:$("#nombre").val(),
                proveedor: $('#proveedor').val(),
                categoria:$('#categoriaProducto').val(),
                precio:$('#precio').val(),
                stock:$('#stock').val(),
                activo:$('#estado-seleccion').val()
            };
        }
    }

}