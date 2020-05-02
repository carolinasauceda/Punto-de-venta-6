<?php
    //require_once '../../../DB/helperDataTransform.php';
    //$datatransform = new DataTransform();
    require "../../../common/Controllers/sessionController.php";
    $userControl= new sessionController('../../../');
    $edition=$userControl->isAutorizeFor('Productos');
    $level=  (int) $_SESSION['AutorizacionNivel'];
    $level=$level>=100?1:0; //Si el usuario tiene permisos mayores a 100 este tiene autorización para ver ciertos campos ocultos

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <script src="https://kit.fontawesome.com/22c16ef1fa.js" crossorigin="anonymous"></script>

    </head>
    <body>


   <div class="container">

       <div class="row">
           <h2 style="text-align:center">Productos disponibles</h2>
           <h4 style="padding-left:800px">
           </h4>
       </div>

       <div class="row d-flex ">
           <div class="col-md-2">
               <a href="form.php" class="btn btn-primary">Nuevo Producto</a>
           </div>
           <div class="col-md-2">
               <a href="nuevo.php" class="btn btn-primary">Reporte</a>
           </div>
       </div>

       <br>

       <table id="example" class="display" style="width:100%">
           <thead>
           <tr>
               <th>ID</th>
               <th>Nombre</th>
               <th>Precio</th>
               <?php echo $level?'<th>Activo</th>':''?>
               <th></th>
           </tr>
           </thead>
           <tbody>
           </tbody>
           <tfoot>
           <tr>
           </tr>
           </tfoot>
       </table>
   </div>
    <!--modal delete-->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><?php echo $level?'Archivar':'Eliminar';?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>

                <div class="modal-body">
                    <?php echo $level?'¿Desea archivar este registro?':'¿Desea eliminar este registro?';?>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button id="btnDelete" class="btn btn-danger btn-ok text-white"><?php echo $level?'Archivar':'Eliminar';?></button>
                </div>
            </div>
        </div>
    </div>

    <!--modal view -->
    <div class="modal fade" id="register-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Producto: </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 font-weight-bold">ID: </div> <div class="col-6" id="modal-p-id"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 font-weight-bold">Nombre: </div> <div class="col-6" id="modal-p-nombre"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 font-weight-bold">Proveedor: </div> <div class="col-6" id="modal-p-proveedor"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 font-weight-bold">Categoria: </div> <div class="col-6" id="modal-p-categoria"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 font-weight-bold">Precio Unitario: </div> <div class="col-6" id="modal-p-precio"></div>
                    </div>
                    <div class="row">
                        <div class="col-6 font-weight-bold">Stock: </div> <div class="col-6" id="modal-p-stock"></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="eliminar2" class="btn btn-danger btn-ok text-white" <?php echo !$edition? $disable= 'disabled' :$disable= '';?> ><?php echo $level?'Archivar':'Eliminar';?></button>
                    <a href="form.php" class="btn btn-primary btn-ok text-white <?php echo !$edition? $disable= 'disabled' :$disable= '';?>"  >Editar</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/b-1.6.1/fc-3.3.0/fh-3.1.6/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
    <script src="../../../common/js/CommonAlerts.js"></script>
    <script>
        msg = new alerts();
        var connection="../../Controllers/Productos/Providers/AJAXIndexProvider.php";
        onDeleteNewRedirect="../../views/productos/index.php";
        var deleteElementId;
        SuccessAlert=msg.basicSuccessAlert();
        $( document ).ready(function() {
            listar();
        });

        var listar=function(){
            var table=$('#example').DataTable({
                'ajax':{
                    'method':'POST',
                    'url':connection,
                    'data':{
                        'level':<?php echo $level?>
                    }
                },
                'columns':[
                    {'data':'ID'},
                    {'data':'Nombre'},
                    {'data':'Precio'},
                    <?php echo $level?'{"data":"RActivo"},':''?>
                    {'defaultContent':botonesDataTable}
                ],
                <?php echo $level?'"order": [[ 3, "desc" ]],':''?>
                'language': DataTableLenguaje
            });

            accionBtnEditarListener('#example tbody',table);
            accionBtnEliminarListener('#example tbody',table);
            accionBtnVerListener('#example tbody',table);

        }

        var botonesDataTable="<button type='button' class='editar btn btn-primary'<?php echo !$edition? $disable= 'disabled' :$disable= '';?>><i class='fas fa-edit'></i></button>" +
                             "<button type='button' class='ver btn btn-secondary ml-1' data-toggle='modal' data-target='#register-view' ><i class='fa fa-eye'></i></button>"+
                             "<button type='button' class='eliminar btn btn-danger ml-1' <?php echo !$edition? $disable= 'disabled' :$disable= '';?> data-toggle='modal' data-target='#confirm-delete' ><i class='<?php echo $level?'fa fa-archive':'fa fa-trash-alt';?>'></i></button>";

        var accionBtnEditarListener=function(tbody, table){
            $(tbody).on('click','button.editar', function(){
               var data= table.row($(this).parents('tr')).data();
               window.location ="form.php?id="+data.ID;
            });
        }

        var accionBtnVerListener=function(tbody, table){
            $(tbody).on('click','button.ver', function(){
                var data= table.row($(this).parents('tr')).data();
                deleteElementId=data.ID;
                $.post(connection,{ViewAction:1, proveedor:data.IDProveedor, categoria:data.IDCategoria,},function(response){
                    var datos = $.parseJSON(response);
                    $('#modal-p-id').text(data.ID);
                    $('#modal-p-nombre').text(data.Nombre);
                    $('#modal-p-precio').text(data.Precio);
                    $('#modal-p-stock').text(data.EnExistencia);
                    $('#modal-p-proveedor').text(datos['Proveedor']);
                    $('#modal-p-categoria').text(datos['Categoria']);
                });
            });
        }

        var accionBtnEliminarListener=function(tbody, table){
            $(tbody).on('click','button.eliminar', function(){
                var data= table.row($(this).parents('tr')).data();
                deleteElementId=data.ID;
                $('#confirm-delete').modal('show');
            });
        }

        $( "#eliminar2" ).click(function() {
            $('#register-view').modal('hide');
            $('#confirm-delete').modal('show');
        });



        var DataTableLenguaje={
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        }

    </script>
    <script src="../../js/AJAXIndexController.js"></script>

    </body>
</html>