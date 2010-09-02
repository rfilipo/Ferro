<?php
/************************************************************************
  			CMS Ferro - Copyright filipo

                        This file is part of ferro.

    cms_blinkx is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    cms_blinkx is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with ferro.  If not, see <http://www.gnu.org/licenses/>.

**************************************************************************/
/** 
 * Array de constantes globais
 *
 * Customize para a sua aplicação
 *
 * */
$defs = array(

    "APP_TITLE" => "Ferro CMS",

    "WEBROOT"   => "/ferro",
    
    //"APPROOT"   => "/home/storage/f/ac/ac/eloaudiovisual/public_html/cms_blinkx2/",
    "APPROOT"   => "/var/www/ferro",
    
    "OFFSET_PLANILHA" => 0,


    // Configuracao do banco de dados

    "DB_HOST"    => 'localhost',
    
    "DB_USER"    => 'filipo',

    "DB_PASS"    => '111111',

    "DATABASE"   => 'ecooe_dev',
    
    "DB_PORT"    => '3306',
    
    "RECORDS"    => 8
    
);

foreach ($defs as $chave=>$valor){
    define($chave,$valor);
}

?>
