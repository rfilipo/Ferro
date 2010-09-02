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

set_include_path(implode(PATH_SEPARATOR, explode(PATH_SEPARATOR, get_include_path())).PATH_SEPARATOR.dirname(__FILE__));

include_once("resources/class.database.php");

/**
 * class Acesso
 */
class Acesso
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT

var $nome;   // (normal Attribute)
var $email;   // (normal Attribute)
var $login;   // (normal Attribute)
var $password;   // (normal Attribute)
var $admin;   // (normal Attribute)

var $database; // Instance of class database
var $rows; // numero de rows


// **********************
// CONSTRUCTOR METHOD
// **********************

function Acesso()
{

$this->database = new Database();

}


// **********************
// GETTER METHODS
// **********************
function getFields(){
    $fields = array();
    $result =  $this->database->query("DESC acesso");
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



function getid()
{
return $this->id;
}

function getnome()
{
return $this->nome;
}

function getemail()
{
return $this->email;
}

function getlogin()
{
return $this->login;
}

function getpassword()
{
return $this->password;
}

function getadmin()
{
return $this->admin;
}
function getNumRows()
{
return $this->rows;
}


// **********************
// SETTER METHODS
// **********************


function setid($val)
{
$this->id =  $val;
}

function setnome($val)
{
$this->nome =  $val;
}

function setemail($val)
{
$this->email =  $val;
}

function setlogin($val)
{
$this->login =  $val;
}

function setpassword($val)
{
$this->password =  $val;
}

function setadmin($val)
{
$this->admin =  $val;
}

// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{

$sql =  "SELECT * FROM acesso WHERE id = $id;";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);

$this->id = $row->id;

$this->nome = $row->nome;

$this->email = $row->email;

$this->login = $row->login;

$this->password = $row->password;

$this->admin = $row->admin;

}


function selectLogin($login, $password)
{

$sql =  "SELECT * FROM acesso WHERE login = '$login' and password='$password';";
$result =  $this->database->query($sql);
$result = $this->database->result;
$row = mysql_fetch_object($result);

$this->id = $row->id;

$this->nome = $row->nome;

$this->email = $row->email;

$this->login = $row->login;

$this->password = $row->password;

$this->admin = $row->admin;

$this->rows = mysql_num_rows($result);

}


function all($ordem = 'id', $where = '1')
{

$sql =  "SELECT * FROM acesso WHERE $where order by $ordem;";
$result =  $this->database->query($sql);
$result = $this->database->result;
while ($row[] = mysql_fetch_object($result)){}

return $row;
}


// **********************
// DELETE
// **********************

function delete($id)
{
$sql = "DELETE FROM acesso WHERE id = $id;";
$result = $this->database->query($sql);

}

// **********************
// INSERT
// **********************

function insert()
{
$this->id = ""; // clear key for autoincrement

$sql = "INSERT INTO acesso ( nome,email,login,password,admin ) VALUES ( '$this->nome','$this->email','$this->login','$this->password','$this->admin' )";
$result = $this->database->query($sql);
$this->id = mysql_insert_id($this->database->link);

}

// **********************
// UPDATE
// **********************

function update($id)
{



$sql = " UPDATE acesso SET  nome = '$this->nome',email = '$this->email',login = '$this->login',password = '$this->password',admin = '$this->admin' WHERE id = $id ";

$result = $this->database->query($sql);



}


} // class : end

?>
