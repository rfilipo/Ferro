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
 * @version  CVS: $Revision$ 
 * @link     http://www.kobkob.com.br/ferro/
 *
 */
 $nome = $_GET['nome'];
?>

<!-- campo ESPECIAL --> 
 <script>
     function salva<?php echo $nome;?>(){
         alert('Me implemente!!!');
     }
 </script>
   <ul>
        <li>Nome: <input id="<?php echo $nome;?>" 
        name="<?php echo $field->nome;?>" 
        size="80"
        onFocus="status_msg.value='<?php echo "Editando $nome";?>'" 
        onBlur="status_msg.value='<?php echo $nome;?>'">
        <li>Url: &nbsp;&nbsp;&nbsp;&nbsp;<input id="U<?php echo $nome;?>" 
        name="U<?php echo $nome;?>" 
        size="80"
        onFocus="status_msg.value='<?php echo "Editando URL de $nome";?>'" 
        onBlur="status_msg.value='<?php echo $nome;?>'">
    </ul>
    <center>
    <br><input type="button" value="Salvar" onClick="salva<?php echo $nome;?>();">
</center>
<!-- Fim campo ESPECIAL <?php echo $nome;?> --> 
