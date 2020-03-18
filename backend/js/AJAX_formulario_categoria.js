var buttonpressed;
$('.actionbutton').click(function() {
    buttonpressed = $(this).attr('id');
});

var SuccessAlert='<div class="alert alert-success alert-dismissible" id="SuccessAlert">\n' +
    '                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n' +
    '                                <strong>Operación realizada con éxito</strong>\n' +
    '                            </div>';

var WarningAlert='<div class="alert alert-warning alert-dismissible" id="WarningAlert">\n' +
    '                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n' +
    '                                <strong>Verifica que la información este correctamente llenada</strong>\n' +
    '                            </div>';
function dissmisAlerts(){
    $(".alert").delay(4000).slideUp(200, function() {
        $(this).alert('close');
    });
}


 var ConnectionString="Controllers/formCategoriaController.php";

$(document).ready(function(){
    loadregister();

    function loadregister(){
        if($("#RFC").attr("data")!=0){
            const postData={
                initData:$("#nombre").attr("data"),
            };
            $.post(ConnectionString,postData,function(ServerResponse){
                if(ServerResponse!=0){
                    let responde=JSON.parse(ServerResponse);
                    //console.log(responde);
                    $("#nombre").attr("data",responde['id']);
                    $('#nombre').attr('value',responde['Nombre']);
                    $('#descripcion').attr('value',responde['Descripcion']);
                    $('#estado-seleccion').val(responde['RActivo']);
                }

            });
        }else{
            alert("Este registro no existe");
        }

    }

    $('#formulario').submit(function (e){
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
                    $("#nombre").attr("data")=="0"?$('#formulario')[0].reset():null;
                    $("#alertsArea").append(SuccessAlert);
                    dissmisAlerts();

                }else{
                    //Colocar aquí tu magia xd
                    $("#alertsArea").append(WarningAlert);
                    dissmisAlerts();
                }
            });

        }else if(buttonpressed=="btnDelete"){
            var r= confirm("Estas apunto de eliminar este registro \n ¿Estas seguro de ello?");
            if(r){
               $.post(ConnectionString,{deleteAction:1, id:$("#nombre").attr("data"),},function(response){
                   if(response==0){
                       alert("Este registro no existe o ha sido borrado previamente");
                       window.location.href="../../backend/formulario-categoria.php";
                   }else if(response==1){
                        $('input').val('');
                       $("#alertsArea").append(SuccessAlert);
                       dissmisAlerts();
                   }
               })
            }
        }else if(buttonpressed=="btnAddNew"){
            window.location="../../backend/formulario-categoria.php";
        }
        e.preventDefault();
    });

});

