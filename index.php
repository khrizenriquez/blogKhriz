<?php
/*
Creado por Khriz Enríquez (A-K)
@khrizenriquez -- Pueden escribirme en caso de cualquier duda o sugerencia :D
*/

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
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		<!-- area de scripts -->
	</head>

	<body>

		<div id="fb-root"></div>
		<script>
			(function(d, s, id)
			{
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
			  fjs.parentNode.insertBefore(js, fjs);
			}
			(document, 'script', 'facebook-jssdk'));
		</script>

		<section id="principal">

			<nav id='navBarraSuperior' class='navbar navbar-inverse navbar-fixed-top'>
				<?php 
				$menu = new ElementosRepetidos();
				$menu->menu("active");
				?>
			</nav>

			<!-- elementos para el slider -->
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
			<!-- elementos para el slider -->

			<div id="divMain">
				<div id="divContent">
					<div id="divContenedor">
						<?php
						if (isset($_GET["pos"]))
						{
							$inicio=$_GET["pos"];
						}else
						{
							$inicio=0;
						}
						if (isset($_GET["cat"]))
						{
							$c=$_GET["cat"];
						}else
						{
							$c=1;
						}
						$datos=$tra->obtenerPaginacionNoticias($inicio,$c);
						if (count($datos)==0)
						{	
							echo "<h1>no hay registros asociados a esta categoría</h1>";
						}else
						{
							for ($i=0;$i<sizeof($datos);$i++)
							{
						?>
				
						<div id="post">
							<div id="titulo_post">
								<div id="titulo"><?php echo $datos[$i]["NombreProducto"];?></div>
								<div id="divEnExistencia"><?php echo $datos[$i]["enexistencia"];?></div>
							</div>
							<div id="texto_post">
								<hr>
								<?php echo Conectar::corta_palabra($datos[$i]["NombreProducto"],300);?>....
							</div>
							<div id="separador_texto_debajo"></div>
							<div id="debajo_post">
								<div id="leer_mas">
									<?php
									$texto=str_replace(" ","-",$datos[$i]["NombreProducto"]);
									//echo $texto;
									?>
										<a href="<?php echo $texto."p".$datos[$i]["IdProducto"].".html"?>">Leer más</a>
								</div>
								<!-- <div id="comentarios">Tiene <?php //echo $tra->total_comentarios($datos[$i]["IdProducto"]);?> comentarios</div> -->
							</div>
						</div>
					
						<div id="div_entre_post"></div>
						<?php
							}
						}
						?>
						<div id="div_paginacion_post">
							<hr>
							<?php
							if ($inicio==0)
							{
							?>
							<i title='Anteriores publicaciones' class='icon-arrow-left'></i>
							<?php
							}else
							{
							$anterior=$inicio-10;
							?>
							<a href="?pos=<?php echo $anterior;?>&cat=<?php echo $c;?>" title="Anteriores Publicaciones"><i class='icon-arrow-left'></i></a>
							<?php
							}
							?>

							<?php
							if (count($datos)==10)
							{
								$proximo=$inicio+10;
								?>
								<a href="?pos=<?php echo $proximo;?>&cat=<?php echo $c;?>" title="Siguientes publicaciones"><i class='icon-arrow-right'></i></a>
								<?php
							}else
							{
								?>
								<i title='Siguientes publicaciones' class='icon-arrow-right'></i>
								<?php
							}
							?>
						</div>
					</div>
					<div id="divSidebar">
						<div id="separador_widget"></div>
						<div id="widget">
							<!-- usando los comentarios de fb -->
							<div class="fb-follow" data-href="https://www.facebook.com/KhrizEnriquez" data-show-faces="true" data-font="verdana" data-width="250">
							</div>
							<!-- usando los comentarios de fb -->
							<!-- usando los post de g+ -->
							<!-- Place this tag where you want the share button to render. -->
							<div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60"></div>
							<!-- Place this tag after the last share tag. -->
							<script type="text/javascript">
								window.___gcfg = {lang: 'es-419'};
								(function()
								{
									var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
								    po.src = 'https://apis.google.com/js/plusone.js';
								    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
								})();
							</script>
							<!-- usando los post de g+ -->
							<!-- usando los post de tw -->
							<a href="https://twitter.com/share" class="twitter-share-button" data-url="https://www.facebook.com/KhrizEnriquez" data-via="khrizenriquez" data-lang="en" data-related="anywhereTheJavascriptAPI" data-count="vertical">Tweet</a>
							<!-- usando los post de tw -->
							<div id="caja_widget">
								<div id="titulo_widget" class='label-inverse'>Categorías</div>
								<?php
								$categoria=$tra->obtenerNoticias();	
								for ($i=0;$i<sizeof($categoria);$i++)
								{
								?>
								<div id="contenido_widget">
									<a href="?cat=<?php echo $categoria[$i]["IdCategoria"];?>" title="<?php echo $categoria[$i]["NombreCategoria"];?>"> <?php echo @$categoria[$i]["NombreCategoria"];?></a>
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
								<div id="titulo_widget" class='label-inverse'>Ultimos Posts</div>
								<?php
								$noticias = $tra->obtenerUltimasNoticias();
								for ($i=0;$i<sizeof($noticias);$i++)
								{
									//$texto=str_replace(" ","-",$noticias[$i]["NombreProducto"]);
								?>
								<div id="contenido_widget">
									<a href="<?php print $texto."p".$noticias[$i]["IdProducto"].".html"?>" title="<?php print @$noticias[$i]['NombreProducto'] ?>"><?php print @Conectar::corta_palabra($noticias[$i]['NombreProducto'], 20); ?></a>
								</div>
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
		</section>
		<footer id="footer">
			<?php
			$pie = new ElementosRepetidos();
			$pie->piePagina('black', '&COPY;Khriz Enríquez ');
			?>
		</footer>
	</body>
</html>