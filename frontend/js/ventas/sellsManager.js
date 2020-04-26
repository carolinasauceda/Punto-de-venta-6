ventaDic = new Dictionary(); //Se require importar el archivo Dictionaries ubicado en /common/js/

var ConnectionString = '../../Controllers/Ventas/Providers/AJAXSellsProvider.php';
var cantidadAnteriorCache;
var totalVenta;
var cambio;
var efectivo;

var t = $('#sellsTable').DataTable();
$(document).ready(function(){

    $('#clienteSearch').click(function () {

        var client=$('#cliente').val();
        $.post(ConnectionString,{'SearchClient':client},function(response){
            response=JSON.parse(response);
            $('#NombreCliente').text(response['Nombre']);
            $('#idCliente').attr('data',response['ID']);
        });

    })


    function setCantidadAnteriorCache(cantidad){
        cantidadAnteriorCache=cantidad;
    }

$("#code").on('keyup', function (e) {
    var productCode=$('#code').val();
    if(e.keyCode===13){
        if(ventaDic.has(productCode.toString())){
            var productCount=parseInt($("#Cantidad_"+productCode).val());
            setCantidadAnteriorCache(productCount);
            productCount=productCount+1;
            $("#Cantidad_"+productCode).val(productCount);
            calculateImport($("#Cantidad_"+productCode));
            clearCodeBox();
        }else{
            $.post(ConnectionString,{'ProductID':productCode},function(response){
                if(response==0){
                    alert("Producto no autorizado para venta")
                }else{
                    response=JSON.parse(response);
                    if(parseInt(response["EnExistencia"])>0){
                        ventaDic.set(productCode,{"Precio":response['PrecioUnitario'],"Cantidad":1});
                        updateStock(productCode,1,(parseInt(response['PrecioUnitario'])), 0, response['PrecioUnitario'], response["EnExistencia"]);
                        console.log(response);
                        console.log(response['Nombre'])
                        t.row.add( [
                            "<p id='Nombre_"+productCode+"'>"+response["Nombre"]+"</p>",
                            "<p id='PrecioUnitario_"+productCode+"'>"+response["PrecioUnitario"]+"</p>",
                            "<input type='number' id='Cantidad_"+productCode+"' value='"+1+"'  min='0' onchange='calculateImport($(this));'>",
                            "<p id='Importe_"+productCode+"'>"+response["PrecioUnitario"]+"</p>",
                            //"<button class='btn btn-danger' onclick='deleteItem($(this));' id='Opciones_"+productCode+"'><i class='fa fa-trash'></i></button>",

                        ] ).node().id=productCode.toString();
                        t.draw( false );

                    }else{
                        alert("No hay stock disponible para realizar la compra. Si considera que es un error llame al gerente");
                    }

                }
                clearCodeBox();
            });
        }


        //
    }
});

    function clearCodeBox(){
        $('#code').val("");
        document.getElementById("code").focus();
    }

    $('#Enviar').click(function () {

        var efectivo = $('#Efectivo').val();
        var total = $('#Total').text();
        if(parseFloat(efectivo)>=parseFloat(total)){
            var cambio =  parseFloat(efectivo)-parseFloat(total);
            $('#Cambio').text(cambio);
            var venta={'efectivo':efectivo, 'total':total, 'cambio':cambio, 'cliente':$('#idCliente').attr('data'), 'empleado':empleado};
            console.log("Entre aqui");
            $.post(ConnectionString,{'ProcesarVenta':1, 'Venta':venta, 'Productos':ventaDic.getItems()},function(response){
                console.log(response.toString());
            });
        }else{
            alert("No se puede procesar el pago, el efectivo no es suficiente");
        }




    });

});

/*function deleteItem(thisField){
    var itemID=$(thisField).closest('tr').attr('id');
    console.log("Holis: "+itemID.toString());

    $("#Cantidad_"+itemID).val(0);
    calculateImport($("#Cantidad_"+itemID));

    $("#Cantidad_"+itemID).addClass('selected');
    t.row('.selected').remove().draw( true );
    var row = document.getElementById(itemID);
    row.parentNode.removeChild(row);

    ventaDic.remove(itemID);

}*/

function total(){
    var ventas= ventaDic.values();
    var total=0;
    for(var i=0; i<ventas.length; i++){
        total=total+(ventas[i]['Precio']*ventas[i]['Cantidad'])
    }
    totalVenta=total;
    $('#Total').text(totalVenta);
}



/*function total2(){
    var table = $('#sellsTable').DataTable();
    var info = table.page.info();

    var count = info.recordsTotal;
    var total=0;
    for(var i=0; i<count; i++){
        var span = document.createElement('div');
        span.innerHTML = table.column(3).data()[i].toString();
        console.log(span.innerHTML);
        total=total+parseFloat(span.textContent || span.innerText);
    }



}*/



function calculateImport(thisField){

    var itemID=$(thisField).closest('tr').attr('id');
    var importeAnterior= parseInt($("#Importe_"+itemID.toString()).text());
    var precio=$("#PrecioUnitario_"+itemID.toString()).text();
    var cantidad=thisField.val();
    $.post(ConnectionString,{'ProductID':itemID, 'StockPetition':true},function(response){
        response=JSON.parse(response);
        console.log("Stock"+response.toString());
        if(parseInt(response['EnExistencia'])<parseInt(cantidad)){
            $("#Cantidad_"+itemID).val(cantidadAnteriorCache);
            alert("No existe esa cantidad de productos en el stock. Si considera que es un error llame al gerente");
        }else{
            var importe= precio*cantidad;
            updateStock(itemID,cantidad,importe, importeAnterior, precio, response["EnExistencia"]);
            console.log("Importe: "+importe.toString()+" cantidad: "+cantidad.toString()+" precio: "+precio.toString());
            $("#Importe_"+itemID.toString()).text(importe);
            ventaDic.ChildDicSet(itemID,'Cantidad',cantidad);
            console.log(ventaDic.ChildDicValues(itemID));
            console.log("Importe Anterior: "+importeAnterior.toString()+" Importe actual: "+importe.toString())
        }


    });
}


function updateStock(itemid,cantidadAvender, importe, importeAnterior, precio, stockActual){
    var cantAnterior = parseInt(importeAnterior)/parseInt(precio);
    var cantActual = parseInt(importe)/parseInt(precio);
    var stock; //Si la cantidad anterior es mas pequeña este valor saldra negativo
    if(cantAnterior>cantActual) {
        stock=cantAnterior-cantActual;
        stock = parseInt(stockActual) + parseInt(stock);
    }//Por ende el calculo se autoajusta por ley de los signos eliminando la necesidad de condiciones
    else {
        stock=cantActual-cantAnterior;
        stock = parseInt(stockActual) - parseInt(stock); //Por ende el calculo se autoajusta por ley de los signos eliminando la necesidad de condiciones
    }
    $.post(ConnectionString,{'IDForStock':itemid, 'UpdateStock':stock});
    ventaDic.ChildDicSet(itemid,'Cantidad',cantidadAvender);
    total();
}
