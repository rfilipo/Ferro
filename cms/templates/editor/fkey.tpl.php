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

<!-- campo fkey <?php echo $nome;?> --> 
                <div id="Dialog<?php echo $nome;?>" title="Editar <?php echo $nome;?>">
                    <ul>
                        <li>Nome: <input id="<?php echo $field->nome;?>" name="<?php echo $field->nome;?>" onFocus="status_msg.value='<?php echo $field->help;?>'" onBlur="status_msg.value='<?php echo $field->nome;?>'" value="<?php echo html_entity_decode($object->$nome,ENT_QUOTES);?>">
                        <li>Url: <input id="<?php echo $field->nome;?>" name="<?php echo $field->nome;?>" onFocus="status_msg.value='<?php echo $field->help;?>'" onBlur="status_msg.value='<?php echo $field->nome;?>'" value="<?php echo html_entity_decode($object->$nome,ENT_QUOTES);?>">
                         <br><input type="button" value="Salvar">
                         <input type="button" value="Cancelar">
                </div>
                <script>
                $("#Dialog<?php echo $nome;?>").dialog({ 
                    autoOpen: false ,
                    show: 'blind',
                    maxHeight: 400,
                    maxWidth:  600
                });
                function pop<?php echo $nome;?>() {
                        //alert ("<?php echo $nome;?>");
                        $("#Dialog<?php echo $nome;?>").dialog('open');
                }
                </script>
 
                    <tr><td><?php echo ucfirst($field->nome);?></td><td><input type='button' onclick='pop<?php echo $nome;?>();' value="Editar <?php echo $nome;?>"></td></tr>
<!-- Fim campo ESPECIAL <?php echo $nome;?> --> 
