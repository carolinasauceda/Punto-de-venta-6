$(function(){

    /*Al cargar la pagina se ejecuta esto*/

    $.post("../../Controllers/Productos/Providers/AJAXIndexProvider.php",{initLoad:1},function(ServerResponse){
        console.log(ServerResponse);
        let response = JSON.parse(ServerResponse);
        let filas="";
        response.forEach(
            row => {
                filas+= '<tr>' +
                    '<td> '+row.ID+' </td>' +'<td> '+row.Nombre+' </td>' +'<td> '+row.IDProveedor+' </td>' +'<td> '+row.IDCategoria+' </td>' + '<td> '+row.Precio+' </td>' +'<td> '+row.EnExistencia+' </td>' +'<td> '+row.RActivo+' </td>' +
                    '</tr>'
            });
        $('#cuerpoTabla').html(filas);
    });

    /*Al momento de usar la barra de busqueda se ejecuta esto*/
   console.log("us wojfjn");
   $('#search').keyup(function(){
       let search =$('#search').val();
       $.post("../../Controllers/Productos/Providers/AJAXIndexProvider.php",{search:search},function(ServerResponse){
           console.log(ServerResponse);
           let response = JSON.parse(ServerResponse);
            let filas="";
            response.forEach(
                row => {
                    filas+= '<tr scope="row">' +
                        '<td> '+row.ID+' </td>' +'<td> '+row.Nombre+' </td>' +'<td> '+row.IDProveedor+' </td>' +'<td> '+row.IDCategoria+' </td>' + '<td> '+row.Precio+' </td>' +'<td> '+row.EnExistencia+' </td>' +'<td> '+row.RActivo+' </td>' +
                        '</tr>'
                });
           $('#cuerpoTabla').html(filas);
       });
   });



});