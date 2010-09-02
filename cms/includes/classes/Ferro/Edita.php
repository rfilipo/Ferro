<?php
/**
 * Ferro/Edita.php - Copyright filipo
 * 
 * This file is part of Ferro.
 * 
 * Ferro is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * Ferro is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Ferro.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * autor: Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * 12/02/2010
 * 
 * PHP version 5.2.6
 *
 * @category PHP
 * @package  Ferro
 * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * @license  GPL
 * @version  CVS: <cvs_id> 
 * @link     http://www.kobkob.com.br/ferro/
 */
require_once 'WidgetView.php';

/**
 * class Edita
 */
class Edita extends WidgetView 
{

   /*** Compositions: ***/
  
    private $object; // instancia do modelo generico para conformidade
  
    /*** Attributes: ***/
    
    /**
     * var fields
     *  
     * Array de objetos
     * Cada objeto contem os dados
     * @access private
     */
    //private $fields;

    //private $template;
    //private $id;

    /**
     * show()
     *
     * A classe herdeira de Edita deve implementar
     * este metodo
     *
     * @return void
     */	
    public function show()
    {
        //include_once $this->template; 
        echo "<h1>N&atilde;o implementado</h1>";
    }

    /**
     * setEnv()
     *
     * seta o ambiente web
     *
     * @category PHP
     * @package  CMSblinkx
     * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
     * @license  propriedade de Elo Company
     * @version  Release: <package_revision> 
     * @link     http://www.kobkob.com.br/ferro/
     * @return void
     */	
    public function setEnv() {    
        $this->webroot = WEBROOT;
        $this->id   = ($_GET['id'] ? $_GET['id']: $_POST['id']);
    }
} // end of Edita
?>
