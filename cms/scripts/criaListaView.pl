#!/usr/bin/perl 
#===============================================================================
#
#         FILE:  criaListaView.pl
#
#        USAGE:  ./criaListaView.pl modelo  
#
#  DESCRIPTION:  Retorna codigo em php para classe view Lista
#
#      OPTIONS:  ---
# REQUIREMENTS:  ---
#         BUGS:  ---
#        NOTES:  ---
#       AUTHOR:  Ricardo Filipo (rf), ticardo.filipo@gmail.com
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
 * Lista$Models.php
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


require_once 'Ferro/Lista.php';
require_once '$Model.php';


/**
 * class Lista$Models
 * 
 * \@category PHP
 * \@package  Ferro
 * \@author   Ricardo Filipo <ricardo.filipo\@mitologica.com.br>
 * \@license  LGPL
 * \@version  Release: <package_revision> 
 * \@link     http://www.kobkob.com.br/ferro/
 */
class Lista$Models extends Lista
{

    /**
    * Atributes
    * */
    private \$table;
    private \$columns;
    private \$fields;
    private \$lang;    
    private \$template;
    private \$$model;

    /**
    * Public atributes
    * */
    public \$canal;
    public \$busca;
    public \$start;
    public \$where;
    public \$limit;
    public \$webroot;
    public \$records;
    public \$rpp;
    public \$pg;


    /**
     * show()
     *
     * Apresenta lista de $models por ordem de id ou o indexador
     * recebido como parametro 
     * 
     * \@param \$ordem = 'id'
     * \@return void
     */	
    public function show(\$ordem = 'id')
    {
        \$this->setEnv();
        \$this->setWhere('');
        \$this->fields = \$this->$model->all(
            \$this->where, 
            \"\$ordem\", 
            \$this->limit);
        include_once \$this->template; 
    }


    /**
     * Lista$Models()
     *
     * Construtor
     * Seta os titulos das colunas, lingua, nome da tabela e o template default
     * \@return void
     */	
    public function Lista$Models()
    {
        \$this->$model    = new $Model();
        \$this->columns  = array(\"id\", \"nome\") ;
        \$this->lang = 'br';    
        \$this->table = '$model';
        \$this->template = 'templates/lista.tpl.php';
    }


} // end of Lista$Models
?>";
print $code;
