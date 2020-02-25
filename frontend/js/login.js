$(document).ready(function(){
    $('.login-form').submit(function (e){
        const postData={
          usernamefield: $('#usuario-field').val(),
          passwordfield:$('#password-field').val(),
        };
        console.log(postData);
        $.post("Controllers/loginController.php",postData,function(response){
            //console.log("Server response: "+response.toString());
            if(response==1){
                window.location.href = "index.php";
            }else{
                alert("Credenciales incorrectas");
            }
        });
        e.preventDefault();
    });
});