<?php
/*
Creado por Khriz Enríquez (A-K)
@khrizenriquez -- Pueden escribirme en caso de cualquier duda o sugerencia :D
*/

//variable que me servira para cuando inicie sesion cuando le coloque un login para gestionar la parte back-end
session_start();
//clase abstracta que me sirve para la conexion hacia la base de datos
abstract class Conectar
{
    //metodo para conectarme que recive 4 parametros
	static function conexion($nombreHost, $usuario, $clave, $nombreBD)
    {
        try
        {
            $conectandome = new PDO("mysql:host=".$nombreHost.";dbname=". $nombreBD, $usuario, $clave);//para la conexion necesito 4 valores, clave, usuario
            $conectandome->query("SET NAMES 'utf8'");//para que los datos que entran a la bd admitan caracteres especiales
            return($conectandome);
            // y el nombre del host donde estara la bd, aparte del nombre de la bd
        }catch(PDOException $e) 
        {
            echo "Error en la conexión: " . $e->getMessage();
            print "<p>Error: No puede conectarse con la base de datos.</p>\n";
            exit();
        }
    }
    //metodo para conectarme que recive 4 parametros

    //metodo que me sirve para cortar palabras, y desplegar solo el numero que desee, puedo tener un texto de 500 palabras pero solo quiero mostrar 50
    public static function corta_palabra($palabra,$num)
    {
        $largo=strlen($palabra);//indicarme el largo de una cadena
        $cadena=substr($palabra,0,$num);
        return $cadena;
    }
    //metodo que me sirve para cortar palabras, y desplegar solo el numero que desee, puedo tener un texto de 500 palabras pero solo quiero mostrar 50
}
//clase abstracta que me sirve para la conexion hacia la base de datos

//clase abstracta que me sirve para la conexion hacia la base de datos
class Trabajo 
{
	private $noticias;
	private $nombreHost;//si es local se usa localhost sino la direccion donde esta el archivo
    private $usuario;
    private $clave;
    private $nombreBD;
    private $datos;
    private $post;
    private $comentarios;
    //metodo constructor para inicializar mis variables
    function __construct()
    {
        $this->nombreHost = "localhost";
        $this->usuario = "root";
        $this->clave = "";
        $this->nombreBD = "neptuno";
        $this->datos = array();
        $this->noticias = array();
        $this->post = array();
        $this->comentarios = array();
    }
    //metodo constructor para inicializar mis variables
    //hago un select a la bd para conseguir los datos que deseo
	function obtenerNoticias()
	{
		$querySelect = "SELECT categorias.NombreCategoria, categorias.IdCategoria, categorias.Descripcion, categorias.Imagen FROM categorias";

		$mostrando = Conectar::conexion($this->nombreHost, $this->usuario, $this->clave, $this->nombreBD)->query($querySelect);

		if($mostrando ->rowCount() > 0)//si cuando hace el query obtiene un resultado los desplegara
        {
            foreach($mostrando as $lista)
            {
                $this->datos[] = $lista;
            }
            return $this->datos;
            $mostrando = null;//dejamos con un valor nulo la conexion
        }else
        {
            print "No existen datos";
        }
	}
    //hago un select a la bd para conseguir los datos que deseo
    //hago un select con un limite para desplegar ciertos datos de la bd
    function obtenerPaginacionNoticias($inicio, $categoria)
    {
        $queryPaginacion = "SELECT * FROM productos where IdCategoria = $categoria ORDER BY IdProducto DESC LIMIT $inicio, 10";

        $paginacion = Conectar::conexion($this->nombreHost, $this->usuario, $this->clave, $this->nombreBD)->query($queryPaginacion);

        if($paginacion ->rowCount() > 0)//si cuando hace el query obtiene un resultado los desplegara
        {
            foreach($paginacion as $totalResultado)
            {
                $this->noticias[] = $totalResultado;
            }
            return $this->noticias;
            $paginacion = null;//dejamos con un valor nulo la conexion
        }else
        {
            print "No existen datos";
        }
    }
    //hago un select con un limite para desplegar ciertos datos de la bd
    //hago un select para que me muestre la cantidad de comentarios que existen por cada producto segun sea el caso
    public function total_comentarios($id_noticia)
    {
        $querySelect = "SELECT count(*) as cuantos from comentarios where idProductos = $id_noticia";

        $mostrando = Conectar::conexion($this->nombreHost, $this->usuario, $this->clave, $this->nombreBD)->query($querySelect);

        if($mostrando ->rowCount() > 0)//si cuando hace el query obtiene un resultado los desplegara
        {
            $lista = $this->datos[0]['cuantos'];
         
            return $lista;
            $mostrando = null;//dejamos con un valor nulo la conexion
        }else
        {
            print "No existen datos";
        }
    }
    //hago un select para que me muestre la cantidad de comentarios que existen por cada producto segun sea el caso
    //select que me sirve para mostrar los productos filtrandolos por un parametro que recibo vía Get
    function obtenerPostPorId()
    {
        $queryPost = "SELECT * FROM productos WHERE IdProducto = ".$_GET['id'];

        $postId = Conectar::conexion($this->nombreHost, $this->usuario, $this->clave, $this->nombreBD)->query($queryPost);

        if($postId ->rowCount() > 0)//si cuando hace el query obtiene un resultado los desplegara
        {
            foreach($postId as $totalResultado)
            {
                $this->post[] = $totalResultado;
            }
            return $this->post;
            $postId = null;//dejamos con un valor nulo la conexion
        }else
        {
            print "No existen datos";
        }
    }
    //select que me sirve para mostrar los productos filtrandolos por un parametro que recibo vía Get
    //query para insertar los comentarios que hagan en el formulario de comentarios
    function insertarComentarios()
    {
        $queryInsertar = "INSERT INTO comentarios VALUES(NULL, '".strip_tags($_POST['nom'])."', '".strip_tags($_POST['correo'])."', '".strip_tags($_POST['web'])."', '".strip_tags($_POST['mensaje'])."', now(), '".strip_tags($_POST['idProducto'])."');";

        $insertando = Conectar::conexion($this->nombreHost, $this->usuario, $this->clave, $this->nombreBD)->prepare($queryInsertar);

        $insertando->execute();
        $insertando = null;//dejamos con un valor nulo la conexion
        print "<script type='text/javascript'>
        alert('El comentario ha sido ingresado correctamente. Gracias por escribir a mi web');
        window.location='".$_POST["url"]."';
        </script>";
    }
    //query para insertar los comentarios que hagan en el formulario de comentarios
    //select para obtener todos los comentarios filtrandolos por el id de cada producto
    public function obtenerComentarios($id)
    {
        $sqlSelect="SELECT * from comentarios where idProductos = $id order by idComentario desc";

        $comentarios = Conectar::conexion($this->nombreHost, $this->usuario, $this->clave, $this->nombreBD)->query($sqlSelect);

        if($comentarios ->rowCount() > 0)//si cuando hace el query obtiene un resultado los desplegara
        {
            foreach($comentarios as $totalComentarios)
            {
                $this->datos[] = $totalComentarios;
            }
            return $this->datos;
            $comentarios = null;//dejamos con un valor nulo la conexion
        }else
        {
            print "No hay comentarios para este post";
        }
    }
    //select para obtener todos los comentarios filtrandolos por el id de cada producto
    //select que me sirve para obtener las ultimas 10 noticias en este caso, esto se desplegara en el widget de ultimos posts de noticias y del index
    public function obtenerUltimasNoticias()
    {
        $sqlNoticias = "SELECT * from productos order by IdProducto desc limit 10";

        $noticias = Conectar::conexion($this->nombreHost, $this->usuario, $this->clave, $this->nombreBD)->query($sqlNoticias);

        if($noticias ->rowCount() > 0)//si cuando hace el query obtiene un resultado los desplegara
        {
            foreach($noticias as $totalNoticias)
            {
                $this->datos[] = $totalNoticias;
            }
            return $this->datos;
            $noticias = null;//dejamos con un valor nulo la conexion
        }else
        {
            print "No hay comentarios para este post";
        }
    }
    //select que me sirve para obtener las ultimas 10 noticias en este caso, esto se desplegara en el widget de ultimos posts de noticias y del index
}
?>