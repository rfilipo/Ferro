<?php
/**
 * Login.php - Copyright filipo
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


set_include_path(implode(PATH_SEPARATOR, explode(PATH_SEPARATOR, get_include_path())).PATH_SEPARATOR.dirname(__FILE__));

require_once('Acesso.php');

/**
 * class Login
 */
class Login  
{

    private $logado = 0;

    function Login(){
    session_start();

    if ($_POST['access']){
        $cap = false;
   	$login=trim($_POST['login']);
   	$password=trim($_POST['password']);  
	if ($_SESSION['captcha'] == $_POST['captcha']){
		$cap = true;	   		
	}

        #debug sem captcha
        # para testes
        #$cap = true;
        $password=md5($password);
        if ($cap) {$this->autentica($login, $password);}

    } else if (!isset($_SESSION['access']) || !isset($_SESSION['token']) || (!isset($_SESSION['captcha']))){
        if ($_GET['action']){
            echo "<script>alert('A sessao expirou! Novo login.')</script>";
            $this->show();
        }
      //$this->show();
      //echo "FERRO";
      //exit;

    } else {
        $this->autentica($_SESSION['access'],$_SESSION['password']);
    } 
  } // end constructor




private function autentica($login, $password){
        $acesso = new Acesso();
        $acesso->selectLogin($login, $password);
	$l = $acesso->getLogin();
	$s = $acesso->getPassword();
        $a = $acesso->getAdmin();
        $registros = $acesso->getNumRows();
	if($a == 's'){
		$_SESSION['admin']= $a;
	}
   	if($registros > 0)
	{
            $this->logado = true;
            $this->mensagem='Login OK';
	    $_SESSION['access']=$l;
	    $_SESSION['password']=$s;
	}else{		
            $this->logado = false;
            $this->mensagem='Problemas de login';
            //session_destroy();

            $this->show();
            exit();
        }
    }




    function autenticou(){
        return $this->logado;
    }

    function logout(){
            $this->logado = false;
            session_destroy();
    }

    function show(){
            $token = md5(uniqid(rand(), true));
            $_SESSION['token'] = $token;
            include("templates/header.tpl.php");
            include('templates/login.tpl.php');
            //include("templates/menu.tpl.php");
            include("templates/footer.tpl.php");
    } // end show()
}
?>
