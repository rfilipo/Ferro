<?php 
/**
 *  cms Ferro versao 1.0 
 *  autor: Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 *  12/02/2010
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

 /*! \mainpage CMS Ferro 1.0 (Beta 1)
  *
  * \section Introdução
  * 
  * A completar
  *
  * \section Instalação
  *
  * \subsection Criando a dist
  * A completar
  *   
  */
chdir ('cms');
require_once "./includes/init.php" ;
$login = new Login();
$cms = new CMSControle($login);
if (!$login->autenticou()) {
    if ($_GET['ws'] == 'get') {
        $cms->ws($_GET['ws']);
    } else {
        include('deny.html');
    }
    die();
} else { 
    if ($_GET['action']) {
        $cms->action($_GET['action']);
    } else if ($_GET['ws']) {
        $cms->ws($_GET['ws']);
    } else {
        $cms->action('default');
    }
}
?>

