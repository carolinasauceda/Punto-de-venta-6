class AJAXFormController{

    constructor(connectionString) {
        this.ConnectionString=connectionString;
    }

    deleteRegister(dataItemSelectorContainingKey, redirectURL, onSuccessMsg="Operación realizada con éxito"){
            $.post(this.ConnectionString,{deleteAction:1, id:dataItemSelectorContainingKey,},function(response){
                console.log(response);
                if(response==0){
                    alert("Este registro no existe o ha sido borrado previamente");
                }
                window.location.href=redirectURL;
            })

    }




}
/*-------------------------------------------------Manejadores de Eventos-----------------------------------------------------------*/

alerta = new alerts();
var ajaxController = new AJAXFormController(connection);

$('#btnDelete').click(function() {
    ajaxController.deleteRegister(deleteElementId,onDeleteNewRedirect, SuccessAlert);
});

