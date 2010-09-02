<?php
/**
 *  cms_blinkx versao 1.0 
 *  Para controle do Blinkx Brasil
 *  autor: Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 *  12/02/2010
 * 
 * PHP version 5.2.6
 *
 * @category PHP
 * @package  CMSblinkx
 * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * @license  propriedade de Elo Company
 * @version  CVS: <cvs_id> 
 * @link     http://www.kobkob.com.br/ferro/
 *
 */
require_once("resources/class.database.php");

/**
 * class Banner
 *
 * Model class
 */
class Banner
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $titulo;   // (normal Attribute)
var $tamanho;   // (normal Attribute)
var $url;   // (normal Attribute)
var $html;   // (normal Attribute)
var $vistas;   // (normal Attribute)
var $cliques;   // (normal Attribute)
var $canal;   // (normal Attribute)
var $filme;   // (normal Attribute)
var $pagina;   // (normal Attribute)
var $banner_default;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function Banner()
{

$this->database = new Database();

}


// **********************
// GETTER METHODS
// **********************
function getFields(){
    $fields = array();
    $result =  $this->database->query("DESC banners");
    $result = $this->database->result;
    $row = mysql_fetch_object($result);
    while ($row = mysql_fetch_object($result)){
        $row->tipo = 'text';
        $row->help = 'Editando '.$row->Field;
        $row->nome = $row->Field;
        $fields[] = $row;
    }
    /**
     * Coloque aqui as parametrizacoes dos fields
     * */
    //$fields[1]->tipo = 'select';  // Produtora
    //$fields[2]->tipo = 'html';    // Destaques

    return $fields;
}


/**
 * Retorna o numero de tuplets da ultima query
 * */
public function getNumRows(){
    //$result = $this->database->result;
    return $this->numrows; 
}



function getid()
{
return $this->id;
}

function gettitulo()
{
return $this->titulo;
}

function gettamanho()
{
return $this->tamanho;
}

function geturl()
{
return $this->url;
}

function gethtml()
{
return $this->html;
}

function getvistas()
{
return $this->vistas;
}

function getcliques()
{
return $this->cliques;
}

function getcanal()
{
return $this->canal;
}

function getfilme()
{
return $this->filme;
}

function getpagina()
{
return $this->pagina;
}

function getbanner_default()
{
return $this->banner_default;
}

// **********************
// SETTER METHODS
// **********************


function setid($val)
{
$this->id =  $val;
}

function settitulo($val)
{
$this->titulo =  $val;
}

function settamanho($val)
{
$this->tamanho =  $val;
}

function seturl($val)
{
$this->url =  $val;
}

function sethtml($val)
{
$this->html =  $val;
}

function setvistas($val)
{
$this->vistas =  $val;
}

function setcliques($val)
{
$this->cliques =  $val;
}

function setcanal($val)
{
$this->canal =  $val;
}

function setfilme($val)
{
$this->filme =  $val;
}

function setpagina($val)
{
$this->pagina =  $val;
}

function setbanner_default($val)
{
$this->banner_default =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM banners WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id = $row->id;

$this->titulo = $row->titulo;

$this->tamanho = $row->tamanho;

$this->url = $row->url;

$this->html = $row->html;

$this->vistas = $row->vistas;

$this->cliques = $row->cliques;

$this->canal = $row->canal;

$this->filme = $row->filme;

$this->pagina = $row->pagina;

$this->banner_default = $row->banner_default;

}


function all($where = '1', $ordem = 'id')
{

$sql =  "SELECT * FROM banners WHERE $where order by $ordem;";
$result =  $this->database->query($sql);
$result = $this->database->result;
while ($row [] = mysql_fetch_object($result)){}

return $row;
}

// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM banners WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO banners ( titulo,tamanho,url,html,vistas,cliques,canal,filme,pagina,banner_default ) VALUES ( '$this->titulo','$this->tamanho','$this->url','$this->html','$this->vistas','$this->cliques','$this->canal','$this->filme','$this->pagina','$this->banner_default' )";
$result = $this->database->query($sql);
$this->id = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE banners SET  titulo = '$this->titulo',tamanho = '$this->tamanho',url = '$this->url',html = '$this->html',vistas = '$this->vistas',cliques = '$this->cliques',canal = '$this->canal',filme = '$this->filme',pagina = '$this->pagina',banner_default = '$this->banner_default' WHERE id = $id ";

$result = $this->database->query($sql);



}





} // end of Banner
?>
