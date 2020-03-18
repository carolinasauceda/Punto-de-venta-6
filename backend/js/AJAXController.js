class AJAXController{

   constructor(connectionString) {
       this.ConnectionString=connectionString;
   }

    loadRegister(fieldIdentifier, responseValid){

        if($(fieldIdentifier).attr("data")!=0){
            const postData={
                initData:$(fieldIdentifier).attr("data"),
            };
            return $.post(this.ConnectionString,postData,function(ServerResponse){
                console.log("Server response: "+ServerResponse);
                if(ServerResponse!=0){
                    let responde=JSON.parse(ServerResponse);
                    responseValid(responde);

                }else{
                    alert("El registro no existe");
                }
            }
            );
        }

    }


    saveRegister(postData, dataResetItemSelector, formSelector, onSuccessMsg, onWarningMsg){
       console.log(postData());
        $.post(this.ConnectionString,postData(),function(response){
            //console.log("Server response: "+response.toString());
            console.log(response);
            if(response==1){
                $(dataResetItemSelector).attr("data")=="0"?$(formSelector)[0].reset():null;
                alerta.SuccessAlert(onSuccessMsg);
            }else{
                //Colocar aquí tu magia xd
                alerta.WarningAlert(onWarningMsg);
            }
        });
    }


    deleteRegister(dataItemSelectorContainingKey, redirectURL, onSuccessMsg="Operación realizada con éxito"){
        var r= confirm("Estas apunto de eliminar este registro \n ¿Estas seguro de ello?");
        if(r){
            $.post(this.ConnectionString,{deleteAction:1, id:$(dataItemSelectorContainingKey).attr("data"),},function(response){
                console.log(response);
                if(response==0){
                    alert("Este registro no existe o ha sido borrado previamente");
                    window.location.href=redirectURL;
                }else if(response==1){
                    $('input').val('');
                    alerta.SuccessAlert(onSuccessMsg);
                }
            })
        }
    }




}
/*-------------------------------------------------Manejadores de Eventos-----------------------------------------------------------*/

alerta = new alerts();
var ajaxController = new AJAXController(connection);

var buttonpressed;
$('.actionbutton').click(function() {
    buttonpressed = $(this).attr('id');
});

$(document).ready(function(){
    console.log(registerKeyDataField);
    ajaxController.loadRegister(registerKeyDataField,function(responde){loadregisterfunc(responde)});

    $(formSelector).submit(function (e){
        console.log(savePostData);
        if(buttonpressed=="btnSave"){
            ajaxController.saveRegister(savePostData,registerKeyDataField,formSelector, SuccessAlert, WarningAlert);
        }else if(buttonpressed=="btnDelete"){
            ajaxController.deleteRegister(registerKeyDataField,onDeleteNewRedirect, SuccessAlert);
        }else if(buttonpressed=="btnAddNew"){
            window.location=onDeleteNewRedirect;
        }
        e.preventDefault();
    });

});

