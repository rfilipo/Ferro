<?php
/**
 * Ferro 1.0 
 * ListaVisitacao.php
 *
 * View para modelo Visitacao
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
require_once 'Visitacao.php';


/**
 * class ListaVisitacao
 * 
 * @category PHP
 * @package  Ferro
 * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * @license  LGPL
 * @version  Release: <package_revision> 
 * @link     http://www.kobkob.com.br/ferro/
 */
class ListaVisitacao extends Lista
{

    /**
    * Atributes
    * */
    private $table;
    private $columns;
    private $fields;
    private $lang;    
    private $template;
    private $visitacao;

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
     * Apresenta lista de visitacaos por ordem de id ou o indexador
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
        $this->fields = $this->visitacao->all(
            $this->where, 
            "$ordem", 
            $this->limit);
        $model = 'visitacao';
        include_once $this->template; 
    }


    /**
     * ListaVisitacao()
     *
     * Construtor
     * Seta os titulos das colunas, lingua, nome da tabela e o template default
     * @return void
     */	
    public function ListaVisitacao()
    {
        $this->visitacao    = new Visitacao();
        $this->columns  = array("id","ip","data","link","referer","browser","os") ;
        $this->lang = 'br';    
        $this->table = 'visitas';
        $this->template = 'templates/lista.tpl.php';
    }


} // end of ListaVisitacaos
?>
