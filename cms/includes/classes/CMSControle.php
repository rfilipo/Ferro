<?php
/**
 * CMSControle.php
 *
 * CMS Ferro versao 1.0 
 * autor: Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * 12/02/2010
 * 
 * PHP version 5.2.6
 *
 * @category PHP
 * @package  CMSFerro
 * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * @license  GPL Affero
 * @version  CVS: $Revision$ 
 * @link     http://www.kobkob.com.br/ferro/
 *
 */
require_once 'includes/classes/EditaConteudo.php';
require_once 'includes/classes/EditaUsuario.php';
require_once 'includes/classes/ListaConteudos.php';
require_once 'includes/classes/ListaUsuarios.php';
require_once 'includes/classes/CmsFerro.php';
require_once 'includes/classes/Login.php';
require_once 'includes/classes/MenuPrincipal.php';
require_once 'includes/classes/CMS.php';


/**
 * class CMSControle
 */
class CMSControle
{

  /**
   * @access private
   */
  private $cms;

  public function getLoginStatus(){
      return $this->cms->logado;
  }

  function CMSControle($login){
      $this->cms->logado = false;
      $this->cms = new CMS();
      $this->login = $login;
 }

  /**
   * function ws
   *
   * Implementa webservice para as classes modelo
   * @param action String = 'info' 
   * @access public
   */
  public function ws( $ws ='info' ) {
      switch ($ws) {
    case "info":
        echo "Use ws=metodo&c=classe&para=a&parb=b";
        break;

    case "get":
        $classe = $_GET['c'];
        $id = $_GET['id'];
        $o = new $classe();
        $o->select($id);
        $return = $o;
        echo "$o->html";
        break;

    case "delete":
        $classe = $_GET['c'];
        $id = $_GET['id'];
        $o = new $classe();
        $return = $o->delete($id);
        echo "Deletando $classe id $id.";
        break;

    case "update":
        $classe = ucfirst($_GET['c']);
        $id = $_GET['id'];
        $p = $_GET['p']; // parametro
        $v = $_GET['v']; // valor
        $o = new $classe();
        $vr = mysql_escape_string($v);
        $vr = $v;
        $o->select($id);
        $o->$p = $vr;
        $return = $o->update($id);
        echo "<h2>Atualizado $p em $classe id $id com valor:</h2><br> $v";
        break;

    default:
        echo "Sou o web service, ieeeah!";
      }
  }

  /**
   * function action
   *
   * Implementa a navegacao do CMS
   * As opcoes sao as do menu
   * @param action String = 'menu' 
   * @access public
   */
  public function action( $action ='menu' ) {
      switch ($action) {
    case "menu":
        $menu = new MenuPrincipal();
        $this->showMenuPrincipal($menu);
        break;

    case "listaconteudos":
        $view = new ListaConteudos();
        $this->showListaConteudos($view);
        break;

    case "editaconteudo":
        $view = new EditaConteudo();
        $this->showEditaConteudo($view);
        break;

    case "listabanners":
        $view = new ListaBanners();
        $this->showListaBanners($view);
        break;

    case "editabanner":
        $view = new EditaBanner();
        $this->showEditaBanner($view);
        break;

    case "listausuarios":
        $view = new ListaUsuarios();
        $this->showListaUsuarios($view);
        break;


    case "editausuario":
        $view = new EditaUsuario();
        $this->showEditaUsuario($view);
        break;

    case "logout":
        $this->login->logout();

        echo "<body bgcolor='black'>
            <script>alert(\"Efetuando o logout!. Retornando para a tela de login.\");</script>  
            <META HTTP-EQUIV=\"refresh\" content=\"o; URL=index.php\"> 
            "; 
        break;

    case "copyleft":
        echo "<pre>
                        This file is part of CMSFerro.

    CMSFerro is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    CMSFerro is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with CMSFerro.  If not, see <http://www.gnu.org/licenses/>.

</pre>
";
        break;

    default:
        $menu = new MenuPrincipal();
        $this->showMenuPrincipal($menu);
        /*
        echo "<h1>Erro, $action nao definido no sistema</h1>";
         */
        break;
}

  } // end of member function action

  /**
   *
   * @param MenuPrincipal widget 
   * @return 
   * @access public
   */
  public function showMenuPrincipal( $widget ) {
       $id = $_GET['id']; 
       $widget->show();
  } // end of member function showMenuPrincipal

  /**
   *
   * @param Login widget 
   * @return 
   * @access public
   */
  public function showLogin() {
    $this->login->show();    
  } // end of member function showLogin


  /**
   *
   * @param ListaConteudo widget 
   * @return 
   * @access public
   */
  public function showListaConteudo( $widget ) {
      // ordenar por titulo
        $widget->show('titulo');
    
  } // end of member function showLista

  /**
   *
   * @param EditaConteudo widget 
   * @return 
   * @access public
   */
  public function showEditaConteudo( $widget ) {
        $widget->show();
    
  } // end of member function showEditaConteudo

  /**
   *
   * @param EditaUsuario widget 
   * @return 
   * @access public
   */
  public function showEditaUsuario( $widget ) {
        $widget->show();
    
  } // end of member function showEditaCampo



  /**
   *
   * @param ListaBanners widget 
   * @return 
   * @access public
   */
  public function showListaBanners( $widget ) {
        $widget->show();
    
  } // end of member function showListaBanners

  /**
   *
   * @param EditaBanner widget 
   * @return 
   * @access public
   */
  public function showEditaBanner( $widget ) {
        $widget->show();
    
  } // end of member function showEditaBanner

  /**
   *
   * @param ListaUsuarios widget 
   * @return 
   * @access public
   */
  public function showListaUsuarios( $widget ) {
        $widget->show();
    
  } // end of member function showListaUsuarios

  /**
   *
   * @param EditaUsuarios widget 
   * @return 
   * @access public
   */
  public function showEditaUsuarios( $widget ) {
        $widget->show();
    
  } // end of member function showEditaUsuarios
} // end of CMSControle
?>
