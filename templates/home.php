<?php 

Assets::title('Bienvenidos');
Assets::sweetalert();
Assets::head();
Message::sweetalert("Bienvenido","success",$_SESSION[KEY.NOMBRES],2);
Assets::nav('.');
 ?>

<div class="row">
<div class="col-md-12">
<div class="jumbotron">
	<div class="container">
		
		<h1><?php echo TITULO_HOME; ?></h1>
		<p><?php echo DESC_HOME; ?></p>
		<p>
			<a class="btn btn-primary btn-lg" data-toggle="modal" href="#modal-informacion"><i class="fa fa-search fa-1x"></i> Conoce más del Sistema.</a>
		</p>
	</div>
</div>
</div>
</div>
<?php include('templates/modal/mas-informacion.php'); ?>
<?php Assets::footer(); ?>