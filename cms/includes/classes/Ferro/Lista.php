<?php
/**
 * Ferro/Lista.php - Copyright filipo
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
 * class Lista
 */
class Lista extends WidgetView
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/


  /**
   * show()
   *
   * @return 
   * @access public
   */
  public function show( )
  {
  }

/**
     * setEnv()
     *
     * seta o ambiente web
     *
     * Para utilizar este metodo numa classe filha, espera-se
     * que esta instancie as variaveis setadas como publicas
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
        $this->records = RECORDS;
        $this->canal   = ($_GET['canal'] ? $_GET['canal']: $_POST['canal']);
        $this->busca   = ($_GET['busca'] ? $_GET['busca']: $_POST['busca']);
        if (isset($_GET['rpp'])) {$this->rpp = $_GET['rpp'];} else {$this->rpp = $this->records;} // $rpp - registers per page
        if (isset($_GET['pg'])) {$this->pg = $_GET['pg'];} else {$this->pg = 0;} 
        $this->start    = $this->pg * $this->rpp ; 
        $this->where    =  '';
        $this->limit    = $this->start.", ".$this->rpp;
    }

    /**
     * setWhere()
     *
     * seta o ambiente web
     * @category PHP
     * @package  CMSblinkx
     * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
     * @license  propriedade de Elo Company
     * @version  Release: <package_revision> 
     * @link     http://www.kobkob.com.br/ferro/
     * @return void
     */	 
    public function setWhere($condicao = ""){
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
} // end of Edita
?>
