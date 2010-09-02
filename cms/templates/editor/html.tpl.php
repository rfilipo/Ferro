<?php 
/**
 *  Ferro versao 1.0 
 *  autor: Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 *  12/02/2010
 * 
 * PHP version 5.2.6
 *
 * @category PHP
 * @package  Ferro
 * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * @license  GPL
 * @version  CVS: $Revision 
 * @link     http://www.kobkob.com.br/ferro/
 *
 */

?>
<!-- campo HTML  -->
<script>
 formFields[seq] = new Field();
 formFields[seq].m_id     = '<?php echo $object->id; ?>';
 formFields[seq].m_campo  = '<?php echo $field->nome; ?>';
 formFields[seq].m_valor  = '<?php echo preg_replace('/[\r\n]+/', "", $object->$nome ); ?>';
 formFields[seq].m_classe = '<?php echo $Modelo; ?>';
 seq++;
</script>
<input type='hidden' id='<?php echo $nome;?>' name='<?php echo $nome;?>' value='<?php echo $object->$nome; ?>'> 

<tr><td><?php echo ucfirst($field->nome);?></td><td>
<!-- The FCK editor -->
<style type="text/css">
#<?php echo "div$nome";?> { 
border: 1px #ffa500; 
padding: 3px 3px 3px 3px ;
z-index: 500;
}
#<?php echo "FCK".$nome."___Frame";?> {
minWidth: 640;
minHeight: 300;
}

</style>
<div style='width: 640px; height:300px' id="<?php echo "div$nome";?>">
</div>
<script type="text/javascript">
var oFCKeditor<?php echo $nome;?> = new FCKeditor('<?php echo "FCK$nome";?>');
oFCKeditor<?php echo $nome;?>.BasePath = "templates/fckeditor/";
//oFCKeditor<?php echo $nome;?>.ToolbarSet = 'Basic'; 
//oFCKeditor<?php echo $nome;?>.Value = '<?php echo preg_replace('/[\r\n]+/', "", html_entity_decode($object->$nome,ENT_QUOTES));?>';
oFCKeditor<?php echo $nome;?>.Value = '<?php echo preg_replace('/[\r\n]+/', "", $object->$nome);?>';
oFCKeditor<?php echo $nome;?>.Width="640";
oFCKeditor<?php echo $nome;?>.Height="300";
oFCKeditor<?php echo $nome;?>.Create();

// jquery things
$(function() {

  $("#<?php echo "div$nome";?>").resizable({
            alsoResize: '#<?php echo "FCK".$nome."___Frame";?>'
});
  $('#<?php echo "FCK".$nome."___Frame";?>').resizable();
  $('#<?php echo "div$nome";?>').append( $('#<?php echo "FCK".$nome."___Frame";?>') );

});

// FCK things
function FCKeditor_OnComplete( oFCKeditor<?php echo $nome;?> )
{
    document.getElementById('<?php echo "FCK".$nome."___Frame";?>').height = '270';
    oFCKeditor<?php echo $nome;?>.Events.AttachEvent( 'OnSelectionChange', updateFields ) ;
}

// I need a trim !
function trim(str){return str.replace(/^\s+|\s+$/g,"");}

// my integration interface
function updateFields( oFCKeditor<?php echo $nome;?> )
{
    var ipt = document.getElementById('<?php echo $nome;?>');
    var edt = oFCKeditor<?php echo $nome;?>;
    if (escape(trim(edt.GetXHTML(true))) != escape(trim(ipt.value))){
        ipt.value = (edt.GetXHTML(true));
        //console.log(ipt.value )
        Salvar();
    }
}
</script>
</td></tr>
