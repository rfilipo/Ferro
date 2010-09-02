<?php
/**
 *  cms_blinkx versao 1.0 
 *  lista.tpl.php
 *
 *  Para controle do Blinkx Brasil
 *  lista de modelos ordenados por seus campos
 *
 *  autor: Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 *  12/02/2010
 * 
 * PHP version 5.2.6
 *
 * @category PHP
 * @package  CMSblinkx
 * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * @license  GPL
 * @version  CVS: <$Revision: 1.6 $> 
 * @link     http://www.kobkob.com.br/ferro/
 */

# As colunas a serem mostradas
# Tire o comentario abaixo para fixar colunas
# $columns  = array("id", "BID", "titulo", "sinopse", "produtora") ;

require_once 'templates/header.tpl.php'; 
require_once 'includes/functions.inc.php';
require_once 'templates/menu.tpl.php';

?>

<!-- jAlerts -->
<script src="./includes/jquery_alerts/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="./includes/jquery_alerts/jquery.ui.draggable.js" type="text/javascript"></script>
<script src="./includes/jquery_alerts/jquery.alerts.js" type="text/javascript"></script>
<script>
function enviaBusca(){
    var abuscar = document.getElementById('buscar').value;
    alert("A buscar "+abuscar);
    window.location.href=location.pathname+"?action=listade<?php echo ucfirst($table);?>&busca="+abuscar+"&canal=<?php echo $canal;?>";
}

function requestCanal() {
    var selObj = document.getElementById('selectCanal');
    var selIndex = selObj.selectedIndex;
    var canalSelecionado = selObj.options[selIndex].value;
    window.location.href="?action=listade<?php echo ucfirst($table);?>&canal="+canalSelecionado;
}



</script>
<?php
$lang     = 'br'           ;
$table    = $this->table   ;
$fields   = $this->fields  ;
$webroot  = $this->webroot ;
$records  = $this->records ;
$canal    = $this->canal   ;
$busca    = $this->busca   ;
$start    = $this->start   ;
$where    = $this->where   ;
$limit    = $this->limit   ;
$filme    = $this->filme   ;
$filmes   = $this->filmes  ;
$rpp      = $this->rpp     ;
$pg       = $this->pg      ; 

if (!$model)   $model   = rtrim($this->table, "s");
if (!$columns) $columns = $this->columns;
$Model    = ucfirst($model);
 
//var_dump($limit);
// Labels
$i = 0; 
echo '<h2>'.ucfirst($table).'</h2>';
?>
<table width='840'>
<tr>
<td>
<h2>SELECIONE O CANAL</h2>
<select name="canal" id="selectCanal" onChange='requestCanal()'>
<option value="">Selecione ...</option>
<?php
    $mcanal = new Canal();
    $canais = $mcanal->all();
    foreach ($canais as $field){ ?>
    <option value="<?php echo $field->id; ?>"
<?php  if ($field->id == $_GET['canal']) { echo " selected"; } ?> 
><?php echo $field->nome; ?></option>
<?php } ?>
</select>
</td><td align='right'>
<h2>PROCURAR EM <?php echo ucfirst($table);?></H2>
<input id='buscar' name='buscar'><input type='button' value='OK' onclick='enviaBusca();'>
</td>
</tr>
</table>
<?php
echo "<table class=\"table\" border=0><tr>";	
foreach ($columns as $column){
	echo "<td class=\"header_mid\"><b>&nbsp;".
		ucfirst($column).
		"&nbsp;</b></td>";
}
echo "<td class=\"header_mid\" colspan=2 align=center><b>Comandos</td></tr>";

// Values
$l=0;
array_pop($fields);
foreach ($fields as $field){
    if ($l % 2 > 0) {
        echo "<tr>";
    } else {
        echo "<tr class=\"linha_par\">";
    }
    $l++;
    foreach ($columns as $column){
	    echo "\n<td class=\"mid_a_1\">&nbsp;".html_entity_decode($field->$column,ENT_QUOTES)."&nbsp;</td>";
    }
    ?>

<script type="text/javascript">
        function deleta<?php echo $field->id;?>(){
	    jConfirm("Deletar o cadastro com titulo igual a <?php echo $field->titulo.' na tabela '.$table  ?>?", 'Confirma!', 
              function(r) {
                if(r){
                    $.ajax({
                       type: "GET",
                       url: "index.php?ws=delete&id=<?php echo $field->id;?>&c=<?php echo $Model;?>",
                       success: function(msg){
                           jAlert(msg, 'Confirma!' ,
                               function (r) {
                                if(r) location.reload() ;
                               }
                           );
                       }
                    });
                }
	    });
        }
</script>

<!-- comandos -->
<td>&nbsp;<input type="button" name="edit" value="Editar" onClick="location='<?php echo "?action=cadastrar".$model."&id=".$field->id;?>';"></td>
<td>&nbsp;<input type="button" name="delete" class="confirm_button" value="Deletar" onClick='deleta<?php echo $field->id;?>();'></td>
</tr>
    <?php
}/* end foreach ($fields as $field){ */

    echo "</table>";
    // Paging links
    $todoslinks = new $Model();
    $todoslinks->all($where, 'id');

        $tr=$todoslinks->getNumRows();  //tr - total of registers
	paging($tr,$rpp,$pg); 

	?>
	<br><br>
<?php

include_once 'templates/footer.tpl.php'; 

?>	
