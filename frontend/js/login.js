$(document).ready(function(){
    $('.login-form').submit(function (e){
        const postData={
          usernamefield: $('#usuario-field').val(),
          passwordfield:$('#password-field').val(),
        };
        $.post("Controllers/loginController.php",postData,function(response){
            //console.log("Server response: "+response.toString());

            if(response==1){
                console.log("Access allow");
                window.location.href = "index.php";
            }else{
                console.log("Access denied");
                alert("Credenciales incorrectas");
            }
        });
        e.preventDefault();
    });
});