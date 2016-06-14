<?php 

$userSes = Session::get('user') ? Session::get('user') : array();
$user = isset($userSes['user']) ? $userSes['user'] : 'Nombre de usuario';
$email = isset($userSes['email']) ? $userSes['email'] : 'usuario@correo.com';  
$noArt = isset($userSes['noArticles']) ? $userSes['noArticles'] : 0;
$msnRead = isset($userSes['msnRead']) ? $userSes['msnRead'] : 0;
$msnTot = isset($userSes['msnTot']) ? $userSes['msnTot'] : 0;  
?>

<article id="profile-right">
	<h3 class="barTitle"><?php echo $user; ?></h3>
	<img src="public/imgs/varios/fotos_03.jpg" />
	<div>
		<h5><?php echo $email; ?></h5>
		<hr />
		<ul>
			<li><a href="">Publicaciones:</a> <span class="badge badge-red"><?php echo $noArt; ?></span></li>
			<li><a href="">Msn sin leer:</a> <span class="badge badge-red"><?php echo $msnRead; ?></span></li>
			<li><a href="">Msn totales:</a> <span class="badge badge-red"><?php echo $msnTot; ?></span></li>
		</ul>	
	</div>
	<a href="?controller=Login&action=logout">Cerrar sesión</a>
</article>