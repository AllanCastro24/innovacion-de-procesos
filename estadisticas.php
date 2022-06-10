<?php
  session_start();
  error_reporting(0);
  $usuario = $_SESSION["usuario"];
  $id = $_SESSION["id"];

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
    <link rel="stylesheet" href="estadistica.css"> 
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-18562188-24"></script>

    <!-- Libreria estadisticas-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>
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
          <a class="sidebar-brand brand-logo" href="index.html" style="color: whitesmoke;"><h2>CFDI</h2></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html" style="color: whitesmoke;"><h6>CFDI</h6></a>
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
                  <h5 class="mb-0 font-weight-normal"><a href="configurar-perfil.html" style="color: whitesmoke"><?php  echo $_SESSION['usuario']  ?></a></h5>
                </div>
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
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
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
          <!--Aqui va tu código alondra --> 
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Resultados</h4>

              <h5 id="fecha" class="card-title">Ingresar fechas</h5>
              <div>
                <!--Aqui iran los inputs para filtrar-->
                <div style="display: flex;">
                  <input type="date" name="" id="a" class="form-control">
                  <input type="date" name="" id="b" class="form-control">
                </div>
               
                <br>
                
                <br>
                <input type="button" value="Filtrar" onClick = searchDate() class="form-control">
                <!--input type="button" value="Filtrar" onClick = "prueba()" class="form-control"-->
                <br>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="tabla" ref="tabla" style="color: aliceblue; scroll-behavior: auto;">
                    <thead>
                      <tr>
                          <th>Fecha</th>
                          <th>tipo</th>
                          <th>serie</th>
                          <th>Fact</th>
                          <th>Razón social</th>
                          <th>Importe excento</th>
                          <th>Importe gravado</th>
                          <th>iva</th>
                          <th>Importe retenido</th>
                          <th>Total</th>
                          <th>RFC para DIOT</th>
                          <th>Concepto del gasto</th>
                          <th>Nombre receptor</th>
                          <th>RFC Receptor</th>
                      </tr>
                    </thead>
                    <tbody id="tablita" >
                      <?php
                        include('conexion.php');
                        $sql="SELECT * from xml WHERE id_usuario = '$id'";
                        $resul=mysqli_query($obj_conexion,$sql);

                        while($mostrar=mysqli_fetch_array($resul)){
                          ?>
                        <tr>
                            <td><?php echo $mostrar['fecha'] ?></td>
                            <td><?php echo $mostrar['tipo'] ?></td>
                            <td><?php echo $mostrar['serie'] ?></td>
                            <td><?php echo $mostrar['fact'] ?></td>
                            <td><?php echo $mostrar['razon_social'] ?></td>
                            <td><?php echo $mostrar['importe_excento'] ?></td>
                            <td><?php echo $mostrar['importe_gravado'] ?></td>
                            <td><?php echo $mostrar['iva'] ?></td>
                            <td><?php echo $mostrar['importe_retenido'] ?></td>
                            <td><?php echo $mostrar['total'] ?></td>
                            <td><?php echo $mostrar['rfc_para_diot'] ?></td>
                            <td><?php echo $mostrar['concepto'] ?></td>
                            <td><?php echo $mostrar['nombre_receptor'] ?></td>
                            <td><?php echo $mostrar['rfc_receptor'] ?></td>
                        </tr>
                        <?php
											}
										?>
                    </tbody>
                </table>
              </div>
              <br><br>
              <!--h4 style="margin-left: 15px;" class="card-title">Estadisticas</h4>
              <div style="display: flex;">
              <div id = "est1"> 
                <canvas id = "grafica"></canvas>
              </div>
              <div id = "est2"> 
                <canvas id = "grafica2"></canvas>
                <iframe src="https://www.retrogames.cc/embed/10386-the-king-of-fighters-2002-magic-plus-bootleg-bootleg.html" width="600" height="450" frameborder="no" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" scrolling="no"></iframe>
              </div>
            </div>
              <script src="estadistica.js"></script>
            </div>
            
          </div>
          
          </div-->
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Innovación de procesos</span>
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
        function prueba(){
          console.log("<?php echo $id?>");
          console.log("Pruebas")
        }

    </script>
    <script>
      function searchDate() {
          var input_startDate, input_stopDate, tr, i;
        // get the values and convert to date
        input_startDate =  new Date(document.getElementById("a").value);
        input_stopDate =  new Date(document.getElementById("b").value);

        tr = document.querySelectorAll("#tabla tbody tr");

        for (let i = 0; i < tr.length; i++) {
          // ensure we have a relevant td
          let td = tr[i].getElementsByTagName("td");
          if (!td || !td[0]) continue;

          // you need to get the text and convert to date
          let td_date = new Date(td[0].textContent);
          

          // now you can compare dates correctly
          if (td_date) {
            if (td_date >= input_startDate && td_date <= input_stopDate) {
              // show the row by setting the display property
              tr[i].style.display = 'table-row;';
            } else {
              // hide the row by setting the display property
              tr[i].style.display = 'none';
            }
          }
        }
}
    </script>
  </body>
</html>