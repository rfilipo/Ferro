<?php
/**
 *  cms_blinkx versao 1.0 
 *  menu_filmes.tpl.php
 *
 *  Para controle do Blinkx Brasil
 *  menu de filmes por canal
 *
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
 *
 *
 *
 */

# As colunas a serem mostradas
$columns  = array("id", "BID", "titulo", "sinopse", "produtora") ;

require_once 'templates/header.tpl.php'; 
require_once 'includes/functions.inc.php';
require_once 'templates/menu.tpl.php';

?>

<!-- jAlerts -->
<script src="./includes/jquery_alerts/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="./includes/jquery_alerts/jquery.ui.draggable.js" type="text/javascript"></script>
<script src="./includes/jquery_alerts/jquery.alerts.js" type="text/javascript"></script>

<?php
$lang = 'br';
$table;
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


// Labels
$i = 0; 
echo '<h2>'.ucfirst($table).'</h2>';
echo "<table class=\"table\" border=0><tr>";	
foreach ($columns as $column){
	echo "<td class=\"header_mid\"><b>&nbsp;".
		ucfirst($column).
		"&nbsp;</b></td>";
}
echo "<td class=\"header_mid\" colspan=2 align=center><b>Comandos</td></tr>";


// Values
$l=0;
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
                    alert("Deletando cadastro com <?php echo ' igual a \"'.$field->id.'\" na tabela '.$table  ?>");
		    location="deletebd.php?<?php echo 'id='.$field->id.'&table='.$table;?>";
		}
	    });
        }
</script>

<!-- comandos -->
<td>&nbsp;<input type="button" name="edit" value="Editar" onClick="location='<?php echo $table.'/'.$table;?>_updfrm2.php?<?php echo 'id='.$field->id;?>';"></td>
<td>&nbsp;<input type="button" name="delete" class="confirm_button" value="Deletar" onClick='deleta<?php echo $field->id;?>();'></td>
</tr>
    <?php
}/* end foreach ($fields as $field){ */

    echo "</table>";

	// Paging links
	paging($tr,$rpp,$pg); 

// Search
	for($x=0;$x<$nf;$x++){
		if($sgbd=='my') {
			$fn = mysql_field_name($res,$x);
		}elseif($sgbd=='pg'){
			$fn = pg_field_name($res,$x);
		}
		$flds .= "<option value='$fn'>".ucfirst($fn)."</option>";
	}
	?>
	<br><br>

	<FORM method="post" action="./search.php">
	<INPUT type="hidden" name="table" value="<?php echo $table;?>">
	<?php 
		echo $l_field;
		echo $field_lng;
	?>

	<SELECT name="fld">
		<?php echo $flds;?>
	</SELECT>
	<INPUT name="txtsearch">
	<INPUT type="submit" name="sendSearch" value="<?php echo $search_lng;?>">
	</FORM>	

<?php

include_once 'templates/footer.tpl.php'; 

?>	
