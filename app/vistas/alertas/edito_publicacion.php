<?php require RUTAAPP . '/vistas/includes/header.php'; ?>


<script>
	swal("Se edito correctamente")
	.then((value) => {
	 location.href = "<?php echo RUTAPUBLIC; ?>/publicaiones/index";
	});
</script>


<?php require RUTAAPP . '/vistas/includes/footer.php'; ?>