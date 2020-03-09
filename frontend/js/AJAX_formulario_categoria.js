var buttonpressed;
$('.actionbutton').click(function() {
    buttonpressed = $(this).attr('id');
});


 var ConnectionString="Controllers/formCategoriaController.php";

$(document).ready(function(){
    loadregister();

    function loadregister(){
        const postData={
            initData:$("#nombre").attr("data"),
        };
        $.post(ConnectionString,postData,function(ServerResponse){
            if(ServerResponse!=0){
                let responde=JSON.parse(ServerResponse);
                console.log(responde);
                $("#nombre").attr("data",responde['id']);
                $('#nombre').attr('value',responde['Nombre']);
                $('#descripcion').attr('value',responde['Descripcion']);
                $('#estado-seleccion').val(responde['RActivo']);
            }

        });
    }

    $('#formulario-categoria').submit(function (e){
        const postData={
            id:$("#nombre").attr("data"),
            nombre: $('#nombre').val(),
            descripcion:$('#descripcion').val(),
            activo:$('#estado-seleccion').val(),
        };
        console.log(postData);
        if(buttonpressed=="btnSave"){

            $.post(ConnectionString,postData,function(response){
                //console.log("Server response: "+response.toString());
                console.log(response);
                if(response==1){

                    $('#SuccessAlert').attr('class',"alert alert-success alert-dismissible d-block");
                }else{
                    //Colocar aquí tu magia xd
                    $('#WarningAlert').attr('class',"alert alert-warning alert-dismissible d-block");
                }
            });

        }else if(buttonpressed=="btnDelete"){
            var r= confirm("Estas apunto de eliminar este registro \n ¿Estas seguro de ello?");
            if(r){
               $.post(ConnectionString,{deleteAction:1, id:$("#nombre").attr("data"),},function(response){
                   if(response==0){
                       alert("Este registro no existe o ha sido borrado previamente");
                       window.location.href="/backend/formulario-categoria.php";
                   }else if(response==1){
                        $('#SuccessAlert').attr('class',"alert alert-success alert-dismissible d-block");
                   }
               })
            }
        }else if(buttonpressed=="btnAddNew"){
            window.location="/backend/formulario-categoria.php";
        }
        e.preventDefault();
    });

});

