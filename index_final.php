<?php
  session_start();
  error_reporting(0);
  $usuario = $_SESSION["usuario"];

  if(is_null($usuario)){
    header("location:login.php");
  }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CFDI</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/main.css"> 
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-18562188-24"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-18562188-24');
    </script>
  </head>
  <body>
    <div class="container-scroller">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index_final.php" style="color: whitesmoke;"><h2>CFDI</h2></a>
          <a class="sidebar-brand brand-logo-mini" href="index_final.php" style="color: whitesmoke;"><h6>CFDI</h6></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="assets/images/faces/face15.png" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><a href="#" style="color: whitesmoke"><?php  echo $_SESSION['usuario']  ?></a></h5>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="login.php" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-account text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Cerrar sesi??n</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Opciones disponibles</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="index_final.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Consultar CFDI</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="estadisticas.php">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Estadisticas</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index_final.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <h1>Analizador CFDIs</h1>
            <div id="app">
              <div id="drop" class="dropfiles margenb" ref="drop">Arrastra los archivos XML aqu??</div>
              <div class="row">
                  <div class="col-sm table-responsive">
                      <table class="table table-striped table-bordered table-hover margenb" id="totales" ref="totales" style="width:320px">
                          <tbody>
                              <tr><th>Cantidad:</th><td>{{cantidad}}</td></tr>
                              <tr><th>Ingresos:</th><td>{{total_ingresos}}</td></tr>
                              <tr><th>Egresos:</th><td>{{total_egresos}}</td></tr>
                              <tr><th>Traslados:</th><td>{{total_traslados}}</td></tr>
                              <tr><th>N??mina:</th><td>{{total_nomina}}</td></tr>
                              <tr><th>Pago:</th><td>{{total_pago}}</td></tr>
                              <tr><th>IVA:</th><td>${{total_iva.toFixed(2)}}</td></tr>
                              <tr><th>Total:</th><td>${{total_suma.toFixed(2)}}</td></tr>
                          </tbody>
                      </table>
                  </div>
                  <div class="col-sm">
                      <div v-if="errores.length" class="alert alert-warning">
                          <h3>Errores:</h3>
                          <ul>
                              <li v-for="error in errores">{{error.archivo}}: {{error.mensaje}}</li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Resultados</h4>
                  <p class="card-description"> <input type="text" id="buscar" class="form-control" placeholder="Buscar algo" style="color: aliceblue;">
                    <input style="background-color: #12151e; color: aliceblue; border-color: #12151e;" class="btn btn-primary btn-fw form-control" type="button" value="Exportar a excel" onclick="exportTableToExcel('tabla','Reporte')">
                  </p>
                  
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tabla" ref="tabla" style="color: aliceblue; scroll-behavior: auto;">
                      <thead>
                          <tr>
                            <th>Fecha</th>
                            <th>tipo</th>
                            <th>serie</th>
                            <th>Fact</th>
                            <th>Raz??n social</th>
                            <th>Importe excento</th>
                            <th>Importe gravado</th>
                            <th>iva</th>
                            <th>Importe retenido</th>
                            <th>Total</th>
                            <th>RFC para DIOT</th>
                            <th>Concepto del gasto</th>
                            <th>Nombre receptor</th>
                            <th>RFC Receptor</th>
                            <th>Nombre de archivo XML</th>
                          </tr>
                        </thead>
                        <tbody id="tablita" >
                            <tr v-for="cfdi in cfdis">
                                <td>{{cfdi.fecha}}</td>
                                <td>{{cfdi.tipo}}</td>
                                <td>{{cfdi.serie}}</td>
                                <td>{{cfdi.fact}}</td>
                                <td>{{cfdi.nombre}}</td>
                                <td>{{cfdi.excento}} $</td>
                                <td>{{cfdi.sub_total}} $</td>
                                <td>{{cfdi.iva}} $</td>
                                <td>{{cfdi.descuento}} $<!--{{cfdi.rfc_receptor}}--></td>
                                <td>{{cfdi.total_importe}} $</td>
                                <td>{{cfdi.rfc}}</td>
                                <!--td>{{cfdi.totalimpuestostrasladados.toFixed(2)}} $</td-->
                                <td>
                                  <div v-for="concepto in cfdi.conceptos" class="concepto">
                                      {{concepto.cantidad}}
                                      {{concepto.descripcion}}
                                      ${{concepto.importe.toFixed(2)}} $
                                    <span v-for="traslado in concepto.traslados" class="traslado">
                                        {{traslado.tipo}}
                                        {{traslado.tasa}} 
                                    </span>
                                  </div>
                                </td>
                                <td>{{cfdi.nombre_receptor}}</td>
                                <td>{{cfdi.rfc_receptor}}</td>
                                <td>{{cfdi.archivo}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <input style="background-color: #12151e; color: aliceblue; border-color: #12151e;" class="btn btn-primary btn-fw form-control" type="button" value="Guardar datos" onclick="mostrarJson()">
                    <script>//Buscar elementos
                      $(document).ready(function(){
                        $("#buscar").on("keyup", function() {
                          var value = $(this).val().toLowerCase();
                          $("#tablita tr").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                          });
                        });
                      });
                      $(function(){
                        $("#tabla").makeSortable();
                      });
                    </script>
                  </div>
                </div>
              </div>
          </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ?? Innovaci??n de procesos</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        
    <!-- vue -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"></script>

    <script src="assets/js/cargarxml.js?v=1.1.1"></script>
    <script src="assets/js/main.js?v=1.1.1"></script>
    <script>
      function exportTableToExcel(tableID, filename = ''){
          var downloadLink;
          var dataType = 'application/vnd.ms-excel';
          var tableSelect = document.getElementById(tableID);
          var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
          
          // Specify file name
          filename = filename?filename+'.xls':'excel_data.xls';
          
          // Create download link element
          downloadLink = document.createElement("a");
          
          document.body.appendChild(downloadLink);
          
          if(navigator.msSaveOrOpenBlob){
              var blob = new Blob(['ufeff', tableHTML], {
                  type: dataType
              });
              navigator.msSaveOrOpenBlob( blob, filename);
          }else{
              // Create a link to the file
              downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
          
              // Setting the file name
              downloadLink.download = filename;
              
              //triggering the function
              downloadLink.click();
          }
      }

      function limpiar_tabla(){
        var table = document.getElementById("tablita");
        var rowCount = table.rows.length;
      
        if(rowCount < 1)
            alert('No se puede eliminar el encabezado');
        else
            table.deleteRow(rowCount -1);
          }
    </script>
    <script>//Ordenar tabla
        (function($){
        $.fn.extend({
              makeSortable: function(){
                  var MyTable = this;
                  var getCellValue = function (row, index){ 
                      return $(row).children('td').eq(index).text();
                  };
                  MyTable.find('th').click(function(){
                      var table = $(this).parents('table').eq(0);
                      // Sort by the given filter
                      var rows = table.find('tr:gt(0)').toArray().sort(function(a, b) {
                          var index = $(this).index();
                          var valA = getCellValue(a, index), valB = getCellValue(b, index);
                          return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB);
                      });
                      this.asc = !this.asc;
                      if (!this.asc){
                          rows = rows.reverse();
                      }
                      for (var i = 0; i < rows.length; i++){
                          table.append(rows[i]);
                      }
                  });
              }
          });
      })(jQuery);
    </script>

<script type="text/javascript">
     
  function tableToJson(table){
    var data=[];
    var headers=[];

    for(var i=0 ; i<table.rows[0].cells.length; i++){
      headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase().replace(/ /gi, '');
    }

    for(var i=0; i<table.rows.length; i++){
      var tableRow = table.rows[i];
      var rowData = {};
      for(var j=0; j<tableRow.cells.length; j++){
        rowData[ headers[j] ] = tableRow.cells[j].innerText;
      }
      data.push(rowData);
    }

    var datos = {"data" : data};
    return datos;
  }

  function mostrarJson(){
    var myJson =  JSON.stringify(tableToJson(document.getElementById("tabla")));
    _ajax("almacenarTabla.php", {"json" : myJson})
    .done(function( info ){
      console.log(info);
    });
  }

  function _ajax(url, data){
    alert("Se guard?? con ??xito");
    var ajax = $.ajax({
      "method" : "POST",
      "url" : "almacenarTabla.php",
      "data": data
    })

    return ajax;
  }


</script>
  </body>
</html>