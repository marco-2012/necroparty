<?php
$emailTxt = isset($messages['email'][0]) ? $messages['email'][0]['text'] : null;
$emailClass = isset($messages['email'][0]['type']) ? $messages['email'][0]['type'] : null;
$emailClass = $emailClass == 'error' ? 'has-error' : null;
$passTxt = isset($messages['password'][0]) ? $messages['password'][0]['text'] : null;
$passClass = isset($messages['password'][0]['type']) ? $messages['password'][0]['type'] : null;
$passClass = $passClass == 'error' ? 'has-error' : null;
?>
<article id="menu-right">
		<h4 class="barTitle">Login</h4>
		<div class="col-md-12">
			<form data-area="in" method="post" action="?controller=Login&action=login">
				<div class="form-group form-group-sm has-danger" data-area="in">
					<label for="email" class="control-label" data-area="in">Email:</label>
					<div class="input-group <?php echo $emailClass; ?>">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						</span>
						<input type="text" name="email" id="email" placeholder="email..." class="form-control" data-area="in" data-toggle="tooltip" title="<?php echo $emailTxt; ?>" data-placement="bottom" />
					</div>
				</div>

				<div class="form-group form-group-sm has-danger" data-area="in">
					<label for="password" class="control-label" data-area="in">Contraseña:</label>
					<div class="input-group <?php echo $passClass; ?>">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
						</span>
						<input type="password" name="password" id="password" placeholder="contraseña..." class="form-control" data-area="in" data-toggle="tooltip" title="<?php echo $passTxt; ?>" data-placement="bottom" />
					</div>
				</div>

				<div class="form-group form-group-sm has-danger" data-area="in">
					<input type="submit" value="Entrar" class="form-control btn btn-primary" />
				</div>
				<a class="btn btn-default" href="?controller=Usuarios&action=create">Crear cuenta</a>
			</form>
		</div>
	</article>