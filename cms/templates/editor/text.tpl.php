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

<!-- campo text -->
<script>
 formFields[seq] = new Field();
 formFields[seq].m_id     = '<?php echo $object->id; ?>';
 formFields[seq].m_campo  = '<?php echo $field->nome; ?>';
 formFields[seq].m_valor  = '<?php echo $object->$nome; ?>';
 formFields[seq].m_classe = '<?php echo $Modelo; ?>';
 seq++;
</script>

        <tr><td><?php echo ucfirst($field->nome);?></td><td><input id="<?php echo $field->nome;?>" name="<?php echo $field->nome;?>" onChange="Salvar();" onFocus="status_msg.value='<?php echo $field->help;?>'" onBlur="status_msg.value='<?php echo $field->nome;?>'" value="<?php echo html_entity_decode($object->$nome,ENT_QUOTES);?>"></td></tr>
