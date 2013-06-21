<?php
require_once("class/class.php");
require_once 'class/elementosRepetidos.php';
$tra = new Trabajo();
?>
<!DOCTYPE html>
<html lang='es-mx'>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><!-- meta para no agrandar la pantalla desde un movil -->
		<title>..::khrizenríquez Blog::..</title>

		<!--[if gte IE 9]>
			<style type="text/css">
				.gradient {
		       		filter: none;
		    	}
		  	</style>
		<![endif]-->

		<!-- area de estilos -->
        <link rel="stylesheet" href="css/propios/estiloIndex.css" />
		<!-- area de estilos -->
		<!-- area de scripts -->
		<script src='js/js/quitandoWebKit.js'></script>
		<script src='js/jQuery/jqueryMin.js'></script>
		<script src='js/jqueryUI/jquery-ui.js'></script>
		<script src='js/jsBootstrap/bootstrap.js'></script>
		<script src='js/ResponsiveSlides/responsiveslides.min.js'></script>
		<script src='js/jQuery/valoresIniciales.js'></script>
		<script>
			$('.carousel').carousel({
			  interval: 1000
			});
			$(function ()
			{
			    // Slideshow 1
			    $("#slider1").responsiveSlides({
			    	maxwidth: 800,
			        speed: 800
			    });
		    });
		</script>
		<!-- area de scripts -->
	</head>

	<body>

		<section id="principal">

			<nav id='navBarraSuperior' class='navbar navbar-inverse navbar-fixed-top'>
				<?php 
				$menu = new ElementosRepetidos();
				$menu->menu("active");
				?>
			</nav>

			<header id="contenedorSlider">
				<!-- Slideshow 1 -->
			    <ul class="rslides" id="slider1">
			      	<li>
			      		<img src="img/ResponsiveSlides/1.jpg" alt="">
			      	</li>
			      	<li>
			      		<img src="img/ResponsiveSlides/2.jpg" alt="">
			      	</li>
			      	<li>
			      		<img src="img/ResponsiveSlides/3.jpg" alt="">
			      	</li>
			    </ul>
			    <!-- Slideshow 1 -->
			</header>

			<div id="divMain">
				<div id="divContent">
					Hola
				</div>
					<div id="divSidebar">
						
						<div id="separador_widget"></div>
						<div id="widget">
										
								<div id="caja_widget">
									<div id="titulo_widget" class='label-inverse'>Categorías</div>
									<?php
								$categoria=$tra->obtenerNoticias();	
								for ($i=0;$i<sizeof($categoria);$i++)
								{
								?>
									<div id="contenido_widget">
										<a href="http://127.0.0.1/blogkhriz/?cat=<?php echo $categoria[$i]["IdCategoria"];?>" title="<?php echo $categoria[$i]["NombreCategoria"];?>"><?php echo @$categoria[$i]["NombreCategoria"];?></a>
									</div>
							<?php
								}
								?>
								</div>
						
							<div class="separador_lateral_widget"></div>
						</div>
						
						<div id="separador_widget"></div>
						<div id="widget">
							
								<div id="caja_widget">
									<div id="titulo_widget" class='label-inverse'>Ultimos VideoTutoriales</div>
									<?php
								for ($i=0;$i<10;$i++)
								{
								?>
									<div id="contenido_widget">PHP</div>
							<?php
								}
								?>
								</div>
						
							<div class="separador_lateral_widget"></div>
						</div>
						
					</div>

					<div id="footer"></div>
				</div>
			</div>
			<footer id="footer">
						<?php
				        $pie = new ElementosRepetidos();
				        $pie->piePagina('black', '&COPY;Khriz Enríquez ');
				        ?>
					</footer>
		</section>

	</body>
</html>
