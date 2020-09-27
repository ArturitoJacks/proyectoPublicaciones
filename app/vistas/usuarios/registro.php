<?php require RUTAAPP . '/vistas/includes/header.php';?>
<div class="container" align="center" style="margin-top: 150px;">
      <div class="row center-div">
          <div class="col s12">
            <div class="card">
              <div class="row"><br>
                <h2>Registrarse</h2>
              </div>
              <div class="card-content black-text">
                <form action="<?php echo RUTAPUBLIC?>/usuarios/registrarse" method="post" autocomplete="off">
                  <input name="nombre" type="text" class="validate" placeholder="Nombre" autocomplete="off" autofocus="" required="">
                  <input name="correo" type="email" class="validate" placeholder="Correo" autocomplete="off" required="">
                  <input name="pass" type="password" class="validate" placeholder="Clave" required="">
                  <button class="btn waves-effect waves-light black" type="submit" name="action" >REGISTRARSE <i class="material-icons">send</i></button>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
<?php require RUTAAPP . '/vistas/includes/footer.php';?>