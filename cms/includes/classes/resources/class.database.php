<?php
/*
*
* MARCO VOEGELI 31.12.2005
* www.voegeli.li
*
* This class provides one central database-connection for
* al your php applications. Define only once your connection
* settings and use it in all your applications.
*
* Modificada por Filipo em 2010-02-17
*
 */
//error_reporting(0);
// se nao incluiu a configuracao ...
set_include_path(implode(PATH_SEPARATOR, explode(PATH_SEPARATOR, get_include_path())).PATH_SEPARATOR.dirname(__FILE__).'/../../');
require_once('config.inc.php');

 class Database
 { // Class : begin
 
 var $host;  		//Hostname, Server
 var $password; 	//Passwort MySQL
 var $user; 		//User MySQL
 var $database; 	//Datenbankname MySQL
 var $link;
 var $query;
 var $result;
 var $rows;
 
 function Database()
 { // Method : begin
 //Konstruktor
 
 
 
 // ********** DIESE WERTE ANPASSEN **************
 // ********** ADJUST THESE VALUES HERE **********
 
  $this->host     = DB_HOST;                  //          <<---------
  $this->password = DB_PASS;           //          <<---------
  $this->user     = DB_USER;                   //          <<---------
  $this->database = DATABASE;           //          <<---------
  $this->rows = 0;
 
 // **********************************************
 // **********************************************
 
 
  
 } // Method : end
 
 function OpenLink()
 { // Method : begin
  $this->link = @mysql_connect($this->host,$this->user,$this->password) or die (print "Class Database: Erro ao conectar o banco de dados (link)\n");
 } // Method : end
 
 function SelectDB()
 { // Method : begin
 
 @mysql_select_db($this->database,$this->link) or die (print "Class Database: Erro ao selecionar o banco ".$this->database."\n");
  
 } // Method : end
 
 function CloseDB()
 { // Method : begin
 mysql_close();
 } // Method : end
 
 function Query($query)
 { // Method : begin
 $this->OpenLink();
 $this->SelectDB();
 $this->query = $query;
 $this->result = mysql_query($query,$this->link) or die (print "Class Database: Erro ao executar a Query: ".$query."\n");
 
// $rows=mysql_affected_rows();
// var_dump($query);
if(ereg("SELECT",$query))
{
 $this->rows = mysql_num_rows($this->result);
}
 

$this->CloseDB();
 } // Method : end	
  
 } // Class : end
 
?>
