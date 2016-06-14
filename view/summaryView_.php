<?php require_once('view/templates/template01/template01-01.php'); ?>

<header>
	<img src="public/imgs/header/maxLogo01.png">
	<div class="title">
		<h1>Necro Party</h1>
		<hr />
		<p>
			<span>Bienvenido a mi fiesta,</span>
			<span>todos están invitados...</span>
		</p>
	</div>
</header>

<div id="menu01" class="barTitle2">
	<div class="menuFloatLeft">
		MENÚ
		<span class="iconBgCir">
			<i class="iconfont  icon-menu"> </i>&nbsp;
		</span>
	</div>

	<div class="menuFloatRight">
		LOGIN
		<span class="iconBgCir">
			<i class="icon-user"></i>
		</span>
	</div>
	<div class="clear"></div>
</div>

<nav id="menu01-a">
	<ul>
		<li><a href="#">INICIO</a></li>
		<li><a href="#">IMÁGENES</a></li>
		<li><a href="#">RELFEXIONES</a></li>
		<li><a href="#">VIDEOS</a></li>
		<li><a href="#">CONTACTO</a></li>
	</ul>
</nav>

<section class="contGral" style="border: 1px solid #f00;">
	<article class="module01">
		<h3 class="barTitle">INICIO - novedades</h3>
		<?php 
		for ($i=0; $i < 5; $i++) { ?>
		<div class="articleMin marginSM">
			<h4 class="barTitle">Título del artículo</h4>
			<img src="public/imgs/articles/ejemplo.jpg" class="marginSM" alt="Título del artículo" />
			<p>
				<?php
				$txt = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod'.
				'tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,'.
				'quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo';
				echo substr($txt, 0, 190).'...'; ?>
				<a href="">Leer más</a>
			</p>
		</div>
		<?php }	?>
	</article>

</section>

<section>
	<article>

	</article>
</section>

<?php require_once('view/templates/template01/template01-02.php'); ?>