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
?>
        <tr><td><?php echo ucfirst($field->nome);?></td><td>
<!-- FIXME - ckeditor muito lento -->
<style type="text/css">
    #<?php echo "div$nome";?> { 
                border: 1px #ffa500; 
                padding: 3px 3px 3px 3px ;
                z-index: 5000;}
</style>
<div id="<?php echo "div$nome";?>">
<!--	
<textarea style="width: 100%; height: 100%" id="<?php echo "FCK".$nome."___Frame";?>" name="<?php echo "FCK".$nome."___Frame";?>" class="nckeditor">
        <?php echo html_entity_decode($object->$nome,ENT_QUOTES);?>
</textarea>
-->
<?php
$sBasePath            = "templates/fckeditor/" ;

$oFCKeditor           = new FCKeditor("FCK$nome") ;
$oFCKeditor->BasePath = $sBasePath ;
$oFCKeditor->ToolbarSet = 'Basic'; 
$oFCKeditor->Value    = html_entity_decode($object->$nome,ENT_QUOTES);
$oFCKeditor->Create() ;
                    /*
                     */
?>
</div>
<!--
-->
<!--
<input id="<?php echo $field->nome;?>" name="<?php echo $field->nome;?>" onFocus="status_msg.value='<?php echo $field->help;?>'" onBlur="status_msg.value='<?php echo $field->nome;?>'" value="<?php echo html_entity_decode($object->$nome,ENT_QUOTES);?>">
-->
<script type="text/javascript">
            $(function() {
		$("#<?php echo "div$nome";?>").resizable({
                        alsoResize: '#<?php echo "FCK".$nome."___Frame";?>'
                });
		$("#<?php echo "FCK".$nome."___Frame";?>").resizable();
	    });
	</script>

</td></tr>
 
