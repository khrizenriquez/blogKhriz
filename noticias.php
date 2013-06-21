<?php
require_once("class/class.php");
require_once 'class/elementosRepetidos.php';

$tra=new Trabajo();
$datos=$tra->obtenerPostPorId();
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
					<div id="divContenedor">

					<!--******************detalle post*******************-->
					
						<!--<div class="div_separador_detalle_post"></div>-->
							<div id="div_detalle_post">
								<?php echo $datos[0]["NombreProducto"];?>
								<hr>
								<?php echo $datos[0]["enexistencia"];?>
								<hr>
								<div id="div_contenedor_categoria_y_descarga_post">
									<div id="div_categoria_post">Categoría : PHP</div>
								</div>
								<div id="div_form_comentarios">
								<hr>
								<form name="form" action="" method="post">
									Nombre:<input type="text" name="nom" placeholder='Nombre' />
									<br>
									
									E-Mail:<input type="email" name="correo" placeholder='Correo electrónico' />(no será publicado)
									<br>
									Sitio Web : <input type="text" name="web">
									<br>
									Mensaje: <textarea name="mensaje" cols="40" rows="10"></textarea>
									<br>
									<br>
									<button class='btn btn-inverse' type="button" title="Comenta!" onClick="">
										<i class='icon-pencil icon-white'></i>Comentar</button>
								</form>
								</div>
								<div id="div_comentarios_post">
									<hr>
									<strong>Comentarios:</strong>
									<ul>
									<?php
									for ($i=0;$i<10;$i++)
									{
									?>
									<li>
									Claudio dice:
									<br>
									hola me gustó este post
									<hr>
									</li>
									<?php
									}
									?>
									</ul>
								</div>
							</div>
						</div>
						<div class="div_separador_detalle_post"></div>
					</div>
				</div>
				<!--***********************fin detalle post**********-->

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
