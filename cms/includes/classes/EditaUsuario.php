<?php
/**
 * Ferro 1.0 
 * EditaUsuario.php
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


require_once 'Ferro/Edita.php';
require_once 'Acesso.php';


/**
 * class EditaUsuario
 * 
 * @category PHP
 * @package  Ferro
 * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * @license  LGPL
 * @version  Release: <package_revision> 
 * @link     http://www.kobkob.com.br/ferro/
 */
class EditaUsuario extends Edita
{

 
   /*** Compositions: ***/
  
    private $usuario;  // instancia do objeto model 
  
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
    public  $id;
    private $modelo;

    /**
     * EditaUsuario()
     *
     * Construtor
     * Seta os campos, labels, idioma e o template default
     * @param id o id do usuario a editar
     * @return void
     */	
    public function EditaUsuario()
    {
        $this->modelo = 'usuario';
        $this->usuario    = new Acesso();
        $this->setEnv();
        if ($this->id){
            $this->usuario->select($this->id);
        } else {
            $this->id = $this->usuario->insert();
        }
        $this->fields   = $this->usuario->getFields();
        $this->lang     = 'br';   
        $this->object   = $this->usuario; 
        $this->template = 'templates/edita.tpl.php';
    }

    /**
     * show()
     *
     * Apresenta tela de ediçao de usuario 
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
