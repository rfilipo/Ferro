
<?php
require_once 'Ferro/Database.php';


/**
 * class Crud
 * 
 */
class Crud
{

    /** Aggregations: */

    /** Compositions: */

     /*** Attributes: ***/

    /**
     * 
     * @access private
     */
    private $db;

    function getFields(){
        $fields = array();
        $result =  $this->database->query("DESC produtoras");
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
        //$fields[15]->tipo = 'html';   //
    
        return $fields;
    }
} // end of Crud
?>
