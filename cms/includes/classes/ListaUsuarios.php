<?php
/**
 * Ferro 1.0 
 * ListaUsuarios.php
 *
 * View para modelo Usuario
 * autor: Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * 12/02/2010
 * 
 * PHP version 5.2.6
 * 
 * @category PHP
 * @package  Ferro
 * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * @license  LGPL
 * @version  CVS: <cvs_id> 
 * @link     http://www.kobkob.com.br/ferro/
 *
 */


require_once 'Ferro/Lista.php';
require_once 'Acesso.php';


/**
 * class ListaUsuarios
 * 
 * @category PHP
 * @package  Ferro
 * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * @license  LGPL
 * @version  Release: <package_revision> 
 * @link     http://www.kobkob.com.br/ferro/
 */
class ListaUsuarios extends Lista
{

    /**
    * Atributes
    * */
    private $table;
    private $columns;
    private $fields;
    private $lang;    
    private $template;
    private $usuario;

    /**
    * Public atributes
    * */
    public $canal;
    public $busca;
    public $start;
    public $where;
    public $limit;
    public $webroot;
    public $records;
    public $rpp;
    public $pg;


    /**
     * show()
     *
     * Apresenta lista de usuarios por ordem de id ou o indexador
     * recebido como parametro 
     * 
     * @param $ordem = 'id'
     * @return void
     */	
    public function show($ordem = 'id')
    {
        $this->limit = RECORDS; 
        $this->setEnv();
        $this->setWhere('');
        $this->fields = $this->usuario->all(
            $this->where, 
            "$ordem", 
            $this->limit);
        $model = "acesso";
        include_once $this->template; 
    }

    /**
     * ListaUsuarios()
     *
     * Construtor
     * Seta os titulos das colunas, lingua, nome da tabela e o template default
     * @return void
     */	
    public function ListaUsuarios()
    {
        $this->usuario    = new Acesso();
        $this->columns  = array("id", "nome") ;
        $this->lang = 'br';    
        $this->table = 'usuario';
        $this->template = 'templates/lista.tpl.php';
    }
} // end of ListaUsuarios
?>
