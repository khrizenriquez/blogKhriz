<?php
/*
 * creado por Khriz Enríquez (tw) @khrizenriquez (fb) /khrizenriquez
 */
class ElementosRepetidos
{
    private $anioActual = "";
    
    function __construct()
    {
        $this->anioActual = date('Y');//me sirve para colocar el año actual
    }
    
    function piePagina($colorTexto, $creditos)
    {
        print "<footer class='navbar navbar-fixed-bottom'>
                    <label id = 'lblPie' style='color: $colorTexto; text-align:center' title='¿Te fue de ayuda?, contáctame en Twitter si tienes dudas o sugerencias'>
                        <a href='https://twitter.com/khrizEnriquez'>
                        <img src='img/rSociales/twitter_32.png' alt='Twitter' /></a>
                        $creditos $this->anioActual
                    </label>
            </footer>";
    }
    function sliderKhriz($item)
    {
        for ($i = 2; $i <= 7; $i++)
        {
            print "<div class='$item'>
                <img src='img/imgSliders/$i.jpg' alt='Imagen $i' title='Imagen $i' />
            </div>";
        }
    }
    function menu($menuActivo)
    {
        print "<!-- barra de navegacion de mi formulario-->
                    <section class='navbar-inner'>
                        <section class='container'>
                            <a class='btn btn-navbar' data-toggle='collapse' data-target='.nav-collapse'>
                                <span class='icon-bar'></span>
                                <span class='icon-bar'></span>
                                <span class='icon-bar'></span>
                            </a>
                            <a class='brand' href=''>Khrizenríquez blog</a>                    
                            <div class='nav-collapse collapse'>
                                <ul class='nav'>
                                    <li class='$menuActivo'>
                                        <a href='index.php'><i class='icon-home icon-white'></i> Página principal</a>
                                    </li>
                                    <li>
                                        <a href='#'><i class='icon-user icon-white'></i> Acerca de Khriz</a>
                                    </li>
                                    <li>
                                        <a href='#'><i class='icon-folder-open icon-white'></i> Mis trabajos</a>
                                    </li>
                                    <li>
                                        <a href='#'><i class='icon-camera icon-white'></i> Mis fotos</a>
                                    </li>
                                </ul>
                                <form class='navbar-form pull-right'>
                                    <input type='text' name='s' class='span3' placeholder='Buscar' title='Escribe algo para que te lo busque' />
                                    <a href='' class='btn btn-primary' title='Quiero buscar'><i class='icon-search icon-white'></i></a>
                                </form>
                                            
                            </div>
                        </section>
                    </section>
                    <!-- barra de navegacion de mi formulario-->";
    }
}
?>