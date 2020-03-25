
class alerts{

    dissmisAlerts(){
        $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
    }

    SuccessAlert(msg){
        let SuccessAlert='<div class="alert alert-success alert-dismissible" id="SuccessAlert">\n' +
            '                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n' +
            '                                <strong>'+msg+'</strong>\n' +
            '                            </div>';
        $("#alertsArea").append(SuccessAlert);
        this.dissmisAlerts()
    }

    WarningAlert(msg){
        let WarningAlert='<div class="alert alert-warning alert-dismissible" id="WarningAlert">\n' +
            '                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n' +
            '                                <strong>'+msg+'</strong>\n' +
            '                            </div>';
        $("#alertsArea").append(WarningAlert);
        this.dissmisAlerts()
    }

    basicSuccessAlert(){
        return "Operación realizada con éxito";
    }

    basicwarningAlert(){
        return "Verifica que todos tus campos esten llenados correctamente";
    }


}