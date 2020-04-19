<html>
    <head>
        <script src="https://kit.fontawesome.com/22c16ef1fa.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-2">
            <label for="code">Código de barras del producto:</label><br>
            <input type="text" name="code" id="code" placeholder=" Código del producto"/>
            <br>

            <div class="mt-5">
                <table id="sellsTable" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Importe</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Importe</th>

                    </tr>
                    </tfoot>
                </table>
        </div>

        <div class="container mt-2">
            <p><b>Total: </b><span id="Total"></span></p>
            <p><b>Efectivo: </b><input id="Efectivo" type="number" step="0.01" min="1"></p>
            <p><b>Cambio: </b><span id="Cambio"></span></p>
            <button id="Enviar" class="btn btn-success">Procesar Compra</button>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
            <script src="../../../common/js/Dictionaries.js"></script>
        <script>
            $(document).ready(function(){
                document.getElementById("code").focus();

            });
        </script>
            <script src="../../js/ventas/sellsManager.js"></script>

    </body>
</html>