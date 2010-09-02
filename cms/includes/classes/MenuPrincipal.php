<?php
/**
 * MenuPrincipal.php
 * CmsEcooe versao 1.0 
 *
 * View class
 *
 * autor: Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * 12/02/2010
 *
 * PHP version 5.2.6
 *
 * @category PHP
 * @package  CMSFerro
 * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * @license  GPL Affero
 * @version  CVS: <cvs_id> 
 * @link     http://www.kobkob.com.br/ferro/
 */

require_once 'CmsFerro.php';
require_once 'Ferro/WidgetView.php';

/**
 * class MenuPrincipal
 */
class MenuPrincipal extends WidgetView
{

  /*** Attributes: ***/

    private $template;
    private $webroot;
    private $records;
    private $busca;
    private $start;
    private $where;
    private $limit;
    private $conteudo;
    private $conteudos;
    private $rpp;
    private $pg;

    /** Construtor:
     * 
     * @category PHP
     * @package  CMSFerro
     * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
     * @license  LGPL
     * @version  Release: <package_revision> 
     * @link     http://www.kobkob.com.br/ferro/
     * @return void
     */
    public function MenuPrincipal(){
        $this->template = 'templates/menu_principal.tpl.php';
    }

  /*** Metodos publicos: ***/

    /**
     * show()
     *
     * realiza as buscas de dados
     * mostra a tela incluindo o template
     * @category PHP
     * @package  CMSFerro
     * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
     * @license  LGPL
     * @version  Release: <package_revision> 
     * @link     http://www.kobkob.com.br/ferro/
     * @return void
     */	
    public function show(
	    $condicao = '', 
	    $template = null, 
	    $page_title = "<small><a href=http://kobkob.com.br/ferro>CMS Ferro</a></small>")
    {
	    $this->setEnv();
	    if ($template) $this->template = $template;
            $this->conteudo = new Conteudo();
	    $this->setWhere($condicao);
            $this->conteudos = $this->conteudo->all(
		    $this->where, 
		    'titulo', 
                    $this->limit);
	    require_once $this->template;
    }

    /**
     * Metodos privados
     * */

    /**
     * setEnv()
     *
     * seta o ambiente web
     * @category PHP
     * @package  CMSFerro
     * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
     * @license  LGPL
     * @version  Release: <package_revision> 
     * @link     http://www.kobkob.com.br/ferro/
     * @return void
     */	
    private function setEnv() {    
        $this->webroot = WEBROOT;
        $this->records = 3;
        $this->canal=($_GET['canal'] ? $_GET['canal']: $_POST['canal']);
        $this->busca=($_GET['busca'] ? $_GET['busca']: $_POST['busca']);
        if (isset($_GET['rpp'])) {$this->rpp = $_GET['rpp'];} else {$this->rpp = $this->records;} // $rpp - registers per page
        if (isset($_GET['pg'])) {$this->pg = $_GET['pg'];} else {$this->pg = 0;} 
        $this->start = $this->pg * $this->rpp ; 
        $this->where =  '';
        $this->limit = $this->start.", ".$this->rpp;
    }

    /**
     * setWhere()
     *
     * seta o ambiente web
     * @category PHP
     * @package  CMSFerro
     * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
     * @license  LGPL
     * @version  Release: <package_revision> 
     * @link     http://www.kobkob.com.br/ferro/
     * @return void
     */	 
    private function setWhere($condicao = ""){
            if ($this->busca) {
                $this->where .= "titulo like '%".$this->busca."%'";
            }
            if ($this->canal && $this->busca){
                $this->where .= " and canal = ".$this->canal;
            } 
            if ($this->canal && !$this->busca){
                $this->where .= "canal = ".$this->canal;
            }
            if (!$this->canal && !$this->busca){
                $this->where = 1;
	    }	
	    if ($condicao != ''){
		    $this->where .= " and $condicao";
	    }
    }
} // end of MenuPrincipal
?>
