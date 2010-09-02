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
 * class Conteudo
 *
 * Model class
 */
class Conteudo
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $titulo;   // (normal Attribute)
var $html;   // (normal Attribute)
var $hits;   // (normal Attribute)
var $autor;   // (normal Attribute)
var $data;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function Conteudo()
{

$this->database = new Database();

}


// **********************
// GETTER METHODS
// **********************
function getFields(){
    $fields = array();
    $result =  $this->database->query("DESC conteudos");
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

   /* 
    // Autor
    $fields[0]->tipo = 'especial';  
    $autor = new Acesso();
    $autor->select($this->autor);
    $autores = $autor->all();
    $fields[0]->all = $autores;
    $fields[0]->especial = $autor;
    */
    // Html
    $fields[2]->tipo = 'html';    

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

function gethtml()
{
return $this->html;
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

function setautor($val)
{
$this->autor =  $val;
}

function sethtml($val)
{
$this->html =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM conteudos WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);


$this->id = $row->id;

$this->titulo = $row->titulo;

$this->autor = $row->autor;

$this->hits = $row->hits;

$this->html = $row->html;

$this->data = $row->data;

}


function all($where = '1', $ordem = 'id')
{

$sql =  "SELECT * FROM conteudos WHERE $where order by $ordem;";
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
$sql = "DELETE FROM conteudos WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO conteudos ( autor, titulo,html,data,hits ) VALUES ( '$this->autor','$this->titulo','$this->html','$this->data','$this->hits' )";
$result = $this->database->query($sql);
$this->id = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE conteudos SET autor = '$this->autor', titulo = '$this->titulo',html = '$this->html', data = '$this->data', hits = '$this->hits'  WHERE id = $id ";

$result = $this->database->query($sql);



}





} // end of Conteudo
?>
