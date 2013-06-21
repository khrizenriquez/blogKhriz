<?php
session_start();
abstract class Conectar
{
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
    //**********************************************************************************************
	//Función para invertir fecha
	static function invierte_fecha($fecha)
	{
		$dia=substr($fecha,8,2);
		$mes=substr($fecha,5,2);
		$anio=substr($fecha,0,4);
		$correcta=$dia."-".$mes."-".$anio;
		return $correcta;
	}
	//Función para invertir fecha
    public static function corta_palabra($palabra,$num)
    {
        $largo=strlen($palabra);//indicarme el largo de una cadena
        $cadena=substr($palabra,0,$num);
        return $cadena;
    }
}

class Trabajo 
{
	private $noticias;
	private $nombreHost;//si es local se usa localhost sino la direccion donde esta el archivo
    private $usuario;
    private $clave;
    private $nombreBD;
    private $datos;
    
    function __construct()
    {
        $this->nombreHost = "localhost";
        $this->usuario = "root";
        $this->clave = "";
        $this->nombreBD = "neptuno";
        $this->datos = array();
        $this->noticias=array();
    }

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
}
?>