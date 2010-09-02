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

<!-- campo select -->
    <tr><td><?php echo ucfirst($field->nome);?></td><td>
    <script>
        function select<?php echo $field->nome;?>(){
            var selObj = document.getElementById('<?php echo $field->nome;?>');
            var selIndex = selObj.selectedIndex;
            if (selObj.options[selIndex].value == 'outro ...'){
                var campo = document.getElementById('<?php echo $field->nome;?>');
                campo.style.visibility = 'visible';
                campo.focus();
            } 
            return  selObj.options[selIndex].text;
        }
    </script>
    <select id="<?php echo $field->nome;?>" name="<?php echo $field->nome;?>" onFocus="status_msg.value='<?php echo $field->help;?>'" onChange="status_msg.value=select<?php echo $field->nome;?>()"> 
<?php
    ?>
    <option>Selecione ... </option>
    <?php
    foreach ($field->valores as $option){ 
        ?>
        <option value="<?php 
        echo $option->id; ?>"<?php 
         if ($option->nome == trim($this->object->$nome)) { 
             echo " selected"; 
         } ?>> <?php echo utf8_encode($option->nome); ?></option>
        <?php 
    } ?>

    </select>
</td></tr>

