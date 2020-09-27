<?php require RUTAAPP . '/vistas/includes/header.php';?>
  <div class="container">
    <div class="row">
      <div class="col s12">
        <div class="card">
         <div class="card-content black-text">
            <span class="card-title black-text">Editar Publicación</span>
                <form action="<?php echo RUTAPUBLIC; ?>/publicaciones/editarPublicacion/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                    <input type="text" name="titulo" placeholder="Titulo" value="<?php echo $data['titulo']; ?>">
                    <textarea name="mensaje" class="materialize-textarea" placeholder="En que estas pensando..." cols="30" rows="10"><?php echo $data['mensaje']; ?></textarea>
                    <img src="<?php echo RUTAPUBLIC; ?>/public/imagenes/<?php echo $data['imagen']; ?>" width="70">
                    <input type="hidden" name="ruta" value="<?php echo $data['imagen']; ?>">
                    <div class="file-field input-field">
                        <div class="btn black">
                         <span>Imagen</span>
                        <input type="file" name="imagen">
                        </div>
                        <div class="file-path-wrapper">
                         <input type="text" class="file-path validate">
                        </div>
                    </div>
                       <button class="btn waves-effect waves-light black" type="submit" name="action">Actualizar <i class="material-icons">send</i></button>
                </form>
             </div>
       </div>
    </div>
   </div>
</div>
<?php require RUTAAPP . '/vistas/includes/footer.php';?>