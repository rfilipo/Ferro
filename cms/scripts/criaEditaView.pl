#!/usr/bin/perl 
#===============================================================================
#
#         FILE:  criaEditaView.pl
#
#        USAGE:  ./criaEditaView.pl modelo  
#
#  DESCRIPTION:  Retorna codigo em php para classe view EditaModelo
#
#      OPTIONS:  ---
# REQUIREMENTS:  ---
#         BUGS:  ---
#        NOTES:  ---
#       AUTHOR:  Ricardo Filipo (rf), ricardo.filipo@gmail.com
#      COMPANY:  Mito-Lógica design e soluções de comunicação ltda
#      VERSION:  1.0
#      CREATED:  03/05/2010 11:51:15 PM
#     REVISION:  ---
#===============================================================================

use strict;
use warnings;

my $code;
my $model;
my $Model;
my $models;
my $Models;

# recebe o nome do modelo
$model = lc $ARGV[0];
$Model = ucfirst $model;
$models= $model."s";
$Models= $Model."s";

$code = "<?php
/**
 * Ferro 1.0 
 * Edita$Model.php
 *
 * View para modelo $Model
 * autor: Ricardo Filipo <ricardo.filipo\@mitologica.com.br>
 * 12/02/2010
 * 
 * PHP version 5.2.6
 * 
 * \@category PHP
 * \@package  Ferro
 * \@author   Ricardo Filipo <ricardo.filipo\@mitologica.com.br>
 * \@license  LGPL
 * \@version  CVS: <cvs_id> 
 * \@link     http://www.kobkob.com.br/ferro/
 *
 */


require_once 'Ferro/Edita.php';
require_once '$Model.php';


/**
 * class Edita$Model
 * 
 * \@category PHP
 * \@package  Ferro
 * \@author   Ricardo Filipo <ricardo.filipo\@mitologica.com.br>
 * \@license  LGPL
 * \@version  Release: <package_revision> 
 * \@link     http://www.kobkob.com.br/ferro/
 */
class Edita$Model extends Edita
{

 
   /*** Compositions: ***/
  
    private \$$model;  // instancia do objeto model 
  
    /*** Attributes: ***/
    
    /**
     * var fields
     *  
     * Array de objetos
     * Cada objeto contem os dados
     * \@access private
     */
    private \$fields;

    private \$lang;
    private \$object; // instancia do modelo generico para conformidade
    private \$template;
    private \$id;
    private \$modelo;

    /**
     * Edita$Model()
     *
     * Construtor
     * Seta os campos, labels, idioma e o template default
     * \@param id o id do $model a editar
     * \@return void
     */	
    public function Edita$Model()
    {
        \$this->modelo = '$model';
        \$this->$model    = new $Model();
        \$this->setEnv();
        if (\$this->id){
            \$this->$model->select(\$this->id);
        } else {
            \$this->id = \$this->$model->insert();
        }
        \$this->fields   = \$this->$model->getFields();
        \$this->lang     = 'br';   
        \$this->object   = \$this->$model; 
        \$this->template = 'templates/edita.tpl.php';
    }

    /**
     * show()
     *
     * Apresenta tela de ediçao de $model 
     * montado de acordo com o template carregado
     * 
     * \@return void
     */	
    public function show()
    {
        include_once \$this->template; 
    }
}
?>
";
print $code;
