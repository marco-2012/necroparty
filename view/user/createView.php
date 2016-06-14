<?php require_once('view/templates/template01/template01-01.php'); ?>
<?php

$fields = array(
	array('id'=>'email', 'txt'=>'Correo Electrónico *', 'type'=>'text', 'placeholder'=>'Escribe tu correo electrónico...'),
	array('id'=>'user', 'txt'=>'Usuario *', 'type'=>'text', 'placeholder'=>'Escribe tu usuario...'),
	array('id'=>'password', 'txt'=>'Contraseña *', 'type'=>'password', 'placeholder'=>'Elige una contraseña...'),
	array('id'=>'password2', 'txt'=>'Confirma tu contraseña *', 'type'=>'password', 'placeholder'=>'Escribe de nuevo tu contraseña...'),
	array('id'=>'facebook', 'txt'=>'Escribe tu facebook', 'type'=>'text', 'placeholder'=>'Escribe tu facebook...'),
);

$fieldsRes = Session::get('fieldsRes');
Session::delete('fieldsRes');

$class = null;
?>
<section class="contGral" style="border: 0px solid #f00;">
	<article class="">
		<div class="row">
			<div class="col-md-12">
				<h3 class="barTitle"><i class="icon-user"></i> Registro</h3>
				<form id="frm-create" class="form-horizontal" method="post" action="?controller=Usuarios&action=store">
				<?php 
				foreach ($fields as $value) { 
					$id = $value['id'];
					$txt = $value['txt'];
					$type = $value['type'];
					$placeholder = $value['placeholder'];

					$class = isset($fieldsRes[$id]['class']) ? $fieldsRes[$id]['class'] : null;
					$value = isset($fieldsRes[$id]['value']) ? $fieldsRes[$id]['value'] : null;
					$msn = isset($fieldsRes[$id]['msn']) ? $fieldsRes[$id]['msn'] : null;
				?>
					<div class="form-group <?php echo $class; ?>">
						<label for="<?php echo $id; ?>" class="col-md-3 control-label"><?php echo $txt; ?></label>
						<div class="col-md-5">
							<input type="<?php echo $type; ?>" class="form-control" id="<?php echo $id; ?>" name="<?php echo $id; ?>" value="<?php echo $value; ?>" placeholder="<?php echo $placeholder; ?>"  />
							<span class="help-block"><?php echo $msn; ?></span>
						</div>
					</div>
				<?php } ?>

					<div class="form-group">
						<div class="col-md-5 col-md-offset-2">
							<input type="submit" value="Crear cuenta" class="btn btn-primary" />
						</div>
					</div>
				</form>
			</div>
		</div>		
	</article>
</section>

<?php require_once('view/templates/template01/template01-02.php'); ?>
