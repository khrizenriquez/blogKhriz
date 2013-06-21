<?php
require_once("class/class.php");
require_once 'class/elementosRepetidos.php';
$tra=new Trabajo();
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
						<?php
						for ($i=0;$i<10;$i++)
						{
						?>
						<div id="separador_post"></div>
						
						<div id="post">
							<div id="titulo_post">
								<div id="titulo">VideoTutorial 10 de PHP POO</div>
								<div id="fecha">Jueves 01 de Septiembre de 2010</div>
							</div>
							<div id="texto_post">
							<hr>
							Este es el VideoTutorial 8 del Curso de PHP POO.
							Continuamos trabajando con nuestra clase Conectar.. En esta ocasión, la usaremos para insertar registros en la tabla libro_de_visitas. Usaremos la sentencia mysql insert into.
							Nos basaremos en las clases que construimos en el video anterior. Crearemos un nuevo método para poder insertar los registros, y a este método le aplicaremos javascript, básicamente la función alert y window.location para indicarle al usuario que el registro ha sido ingresado correctamente....
							</div>
							<div id="separador_texto_debajo"></div>
							<div id="debajo_post">
								<div id="leer_mas">
									<a href="">Leer M&aacute;s</a>
								</div>
								<div id="comentarios">Tiene 10 comentarios</div>
							</div>
						</div>
						<div id="div_entre_post"></div>
						<?php
						}
						?>
						<div id="div_paginacion_post">
						<hr>
						Anteriores Publicaciones
						Siguientes Publicaciones
						</div>
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
										<a href="?cat=<?php echo $categoria[$i]["id_categoria"];?>" title="<?php echo $categoria[$i]["NombreCategoria"];?>"><?php echo $categoria[$i]["NombreCategoria"];?></a>
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
