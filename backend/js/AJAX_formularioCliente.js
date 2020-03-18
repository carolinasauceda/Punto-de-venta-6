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
    '                                <strong>Verifica que la información este correctamente llenada y/o verifique que el RFC no este relacionado con otro registro</strong>\n' +
    '                            </div>';
function dissmisAlerts(){
    $(".alert").delay(4000).slideUp(200, function() {
        $(this).alert('close');
    });
}

var ConnectionString="Controllers/formClienteController.php";

$(document).ready(function(){
    loadregister();

    function loadregister(){
        if($("#RFC").attr("data")!=0){
            const postData={
                initData:$("#RFC").attr("data"),
            };
            $.post(ConnectionString,postData,function(ServerResponse){
                if(ServerResponse!=0){
                    let responde=JSON.parse(ServerResponse);
                    //console.log(responde);
                    $("#RFC").attr("data",responde['RFC']);
                    $('#RFC').attr('value',responde['RFC']);
                    $('#nombre').attr('value',responde['Nombre']);
                    $('#apellido_p').attr('value',responde['Apellido_P']);
                    $('#apellido_m').attr('value',responde['Apellido_M']);
                    $('#correo').attr('value',responde['Correo']);
                    $('#telefono').attr('value',responde['Telefono']);
                    $('#estado-seleccion').val(responde['RActivo']);
                }else{
                    alert("Este registro no existe");
                }

            });
        }

    }

    $('#formulario').submit(function (e){
        const postData={
            id:$("#RFC").attr("data"),
            rfc:$("#RFC").val(),
            nombre: $('#nombre').val(),
            apellido_p:$('#apellido_p').val(),
            apellido_m:$('#apellido_m').val(),
            correo:$('#correo').val(),
            telefono:$('#telefono').val(),
            activo:$('#estado-seleccion').val()
        };
        console.log(postData);
        if(buttonpressed=="btnSave"){

            $.post(ConnectionString,postData,function(response){
                //console.log("Server response: "+response.toString());
                console.log("Respuesta: "+response.toString());
                if(response==1){
                    $("#RFC").attr("data")=="0"?$('#formulario')[0].reset():null;
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
                $.post(ConnectionString,{deleteAction:1, id:$("#RFC").attr("data"),},function(response){
                    if(response==0){
                        alert("Este registro no existe o ha sido borrado previamente");
                        window.location.href="../../backend/formulario-cliente.php";
                    }else if(response==1){
                        $('input').val('');
                        $("#alertsArea").append(SuccessAlert);
                        dissmisAlerts();
                    }
                })
            }
        }else if(buttonpressed=="btnAddNew"){
            window.location="../../backend/formulario-cliente.php";
        }
        e.preventDefault();
    });

});

