<?php
namespace Tp\StamparBundle\Controller;

use Tp\StamparBundle\Entity\Pedido;

class Conexion {
    private $link;
    //ACA SE DECIDE CUANTOS RESULTADOS MOSTRAR POR PÁGINA , EN EL EJEMPLO PONGO 15
    private $rows_per_page = 10;
    private $page;
    
    public function __construct() {
        $this->link = mysql_connect('localhost', 'root', 'root');
        mysql_select_db('tpbd', $this->link);
        //AL PRINCIPIO COMPRUEBO SI HICIERON CLICK EN ALGUNA PÁGINA
        if(isset($_GET['page'])){
            $this->page= $_GET['page'];
        }else{
        //SI NO DIGO Q ES LA PRIMERA PÁGINA
            $this->page=1;
        }
    }
    
    public function buscarPedidosPorEmpleado($id){
        $pedidos = array();
        
        $consulta = mysql_query('SELECT p.id, p.fecha from Pedido AS p
                                    INNER JOIN Empleado AS e
                                        ON p.id_empleado = e.id
                                    WHERE e.id = '.$id.'
                                ');
//        $res = mysql_fetch_array($consulta);
        while ($value = mysql_fetch_object($consulta)) {
            //$local = new local($r["codLoc"], $r["Nomb"], $r["Direccion"], $r["BeterinarioResp"]);
            var_dump($value);
            echo '<br>';
//            $pedido = new Pedido();
//            $pedido->setId($value['id']);
//            $pedido->setFecha($value['fecha']);
            array_push($pedidos, $value);
        }
//        die;
//        $c->cerrar();
//        return $local;
        return $pedidos;
    }
    
//    public function findAllLocal(){
//        $consulta = mysql_query('SELECT * from local');
//        $resultado = $this->paginar($consulta);
//        return $resultado;
//    }
//    
//    public function findAllMascota(){
//        $consulta = mysql_query('SELECT * from mascota');
//        $resultado = $this->paginar($consulta);
//        return $resultado;
//    }
//    
//    public function paginar($consulta){
//        //MIRO CUANTOS DATOS FUERON DEVUELTOS
//        $num_rows = mysql_num_rows($consulta);
//        //CALCULO LA ULTIMA PÁGINA
//        $lastpage = ceil($num_rows / $this->rows_per_page);
//        //COMPRUEBO QUE EL VALOR DE LA PÁGINA SEA CORRECTO Y SI ES LA ULTIMA PÁGINA
//        $page=(int)$this->page;
//        if($page > $lastpage){
//            $page= $lastpage;
//        }
//        if($page < 1){
//            $page=1;
//        }
//        
//        return $consulta;
//    }
//    
//    public function findMascota($cod){
//        $consulta = mysql_query('SELECT * from mascota WHERE Cod = '.$cod);
//        $resultado =  mysql_fetch_row($consulta);
//        return $resultado;
//    }
}
?>