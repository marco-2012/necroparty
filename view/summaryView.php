<?php require_once('view/templates/template01/template01-01.php'); ?>
<?php require_once('view/templates/partials/menuLeft.php'); ?>
<section class="contGral" style="border: 0px solid #f00;">
	<article class="module01">
		<h3 class="barTitle"><i class="iconfont  icon-home"> </i> INICIO - novedades</h3>
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
				<a class="bottomRight" href="">Leer más</a>
			</p>
			<div class="data">
				<span>31-05-2016</span>
				<span>By: margo antonio garcía sánchez</span>
			</div>
		</div>
		<?php }	?>
	</article>

	<?php require_once('view/templates/partials/menuRight.php'); ?>
	<?php 
		Session::active() ?
			require_once('view/templates/partials/profileRight.php') :
			require_once('view/templates/partials/menuLeft.php'); ?>
</section>

<?php require_once('view/templates/template01/template01-02.php'); ?>