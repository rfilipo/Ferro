<?php
/**
 * Ferro 1.0 
 * EditaBanner.php
 *
 * View para modelo Banner
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
require_once 'Banner.php';


/**
 * class EditaBanner
 * 
 * @category PHP
 * @package  Ferro
 * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * @license  LGPL
 * @version  Release: <package_revision> 
 * @link     http://www.kobkob.com.br/ferro/
 */
class EditaBanner extends Edita
{

 
   /*** Compositions: ***/
  
    private $banner;  // instancia do objeto model 
  
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
    private $id;
    private $modelo;

    /**
     * EditaBanner()
     *
     * Construtor
     * Seta os campos, labels, idioma e o template default
     * @param id o id do banner a editar
     * @return void
     */	
    public function EditaBanner()
    {
        $this->modelo = 'banner';
        $this->banner    = new Banner();
        $this->setEnv();
        if ($this->id){
            $this->banner->select($this->id);
        } else {
            $this->id = $this->banner->insert();
        }
        $this->fields   = $this->banner->getFields();
        $this->lang     = 'br';   
        $this->object   = $this->banner; 
        $this->template = 'templates/edita_banner.tpl.php';
    }

    /**
     * show()
     *
     * Apresenta tela de ediçao de banner 
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
