<?php require RUTAAPP . '/vistas/includes/header.php';?>
  <main>
    <div class="container" align="center" style="margin-top: 150px;">
      <div class="row center-div">
          <div class="col s12">
            <div class="card">
              <div class="row"><br>
                <img src="<?php echo RUTAPUBLIC; ?>/public/img/logo.png" alt="" width="200">
              </div>
              <div class="card-content black-text">
                <form action="<?php echo RUTAPUBLIC?>/usuarios/iniciarSesion" method="post" autocomplete="off">
                  <input name="correo" type="email" class="validate" placeholder="Correo" autocomplete="off" autofocus="" required="">
                  <input name="pass" type="password" class="validate" placeholder="Clave" required="">
                  <button class="btn waves-effect waves-light black" type="submit" name="action" >ENTRAR <i class="material-icons">send</i></button>
                </form>
              </div>
              <div class="card-action">
                2020 COPYRIGHT <?php echo NOMBREAPP; ?> ADNTECHNOLOGIES 
              </div>
            </div>
          </div>
      </div>
    </div>
  </main>
<?php require RUTAAPP . '/vistas/includes/footer.php';?>

