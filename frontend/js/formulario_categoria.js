var buttonpressed;
$('.actionbutton').click(function() {
    buttonpressed = $(this).attr('id');
});

$(document).ready(function(){
    loadregister();

    function loadregister(){
        const postData={
            initData:$("#nombre").attr("data"),
        };
        $.post("Controllers/formCategoriaController.php",postData,function(ServerResponse){
            console.log(ServerResponse);
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

            $.post("Controllers/formCategoriaController.php",postData,function(response){
                //console.log("Server response: "+response.toString());
                console.log(response);
                if(response==1){

                    alert("Informacion guardada o actualizada correctamente");
                }else{
                    //Colocar aquí tu magia xd
                    alert("Verefica que toda información es correctamente llenada");
                }
            });

        }else if(buttonpressed="btnlol"){
            console.log("Lol press ");
        }
        e.preventDefault();
    });

});

