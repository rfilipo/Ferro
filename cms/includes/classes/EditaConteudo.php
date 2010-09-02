<?php
/**
 * Ferro 1.0 
 * EditaConteudo.php
 *
 * View para modelo Conteudo
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


require_once 'Ferro/Edita.php';
require_once 'Conteudo.php';


/**
 * class EditaConteudo
 * 
 * @category PHP
 * @package  Ferro
 * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * @license  LGPL
 * @version  Release: <package_revision> 
 * @link     http://www.kobkob.com.br/ferro/
 */
class EditaConteudo extends Edita
{

 
   /*** Compositions: ***/
  
    private $conteudo;  // instancia do objeto model 
  
    /*** Attributes: ***/
    
    /**
     * var fields
     *  
     * Array de objetos
     * Cada objeto contem os dados
     * @access private
     */
    private $fields;

    private $lang;
    private $object; // instancia do modelo generico para conformidade
    private $template;
    var $id;
    private $modelo;

    /**
     * EditaConteudo()
     *
     * Construtor
     * Seta os campos, labels, idioma e o template default
     * @param id o id do conteudo a editar
     * @return void
     */	
    public function EditaConteudo()
    {
        $this->modelo = 'conteudo';
        $this->conteudo    = new Conteudo();
        $this->setEnv();
        if ($this->id){
            $this->conteudo->select($this->id);
        } else {
            $this->id = $this->conteudo->insert();
        }
        $this->fields   = $this->conteudo->getFields();
        $this->lang     = 'br';   
        $this->object   = $this->conteudo; 
        //$this->template = 'templates/edita_conteudo.tpl.php';
        $this->template = 'templates/edita.tpl.php';
    }

    /**
     * show()
     *
     * Apresenta tela de ediçao de conteudo 
     * montado de acordo com o template carregado
     * 
     * @return void
     */	
    public function show()
    {
        include_once $this->template; 
    }
}
?>
