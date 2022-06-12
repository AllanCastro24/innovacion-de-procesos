<?php
// destruir la sesión.
session_start();
error_reporting(0);
session_destroy();
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
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body style="background-color: black;">
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <a href="index.html"><i class="mdi mdi-chevron-left"></i></a>
                <h3 class="card-title text-left mb-3">Iniciar sesión</h3>
                <form action="comprobarExistenciaUsuario.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Usuario o correo electronico *</label>
                    <input type="text" name = "nombreUsuario" id="pass" class="form-control p_input" placeholder="Usuario o correo">
                  </div>
                  <div class="form-group">
                    <label>Contraseña *</label>
                    <input type="password" name = "contrasenya" class="form-control p_input" placeholder="Contraseña">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <a href="cambiar_pass.html" class="forgot-pass">Recuperar contraseña</a>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Iniciar sesión</button>
                  </div>
                  <p class="sign-up">No tienes una cuenta?<a href="register.html"> Registrarse</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <script>
      function mostrarContrasena(){
        var pass = document.getElementById("pass");
        if(pass.type === "password"){
            pass.type = "text";
        }else{
            pass.type = "password";
        }
      }
    </script>
  </body>
</html>