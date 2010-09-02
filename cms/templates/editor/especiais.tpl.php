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
?>

<!-- campo Array de ESPECIAIS <?php echo $nome; ?> -->
 <script>
     var num<?php echo $nome; ?> = 0; 
     function novo<?php echo chop($nome,'es');?>(){
         $.ajax({
                type: "GET",
                url: "templates/editor/novo_especial.tpl.php?nome=<?php echo chop($nome,'es');?>"+num<?php echo $nome; ?>,
                success: function(msg){
                    $("#Dialog<?php echo $nome;?>").append(msg);
                    var selObj = document.getElementById('<?php echo "SN".chop($nome,'es');?>"+num<?php echo $nome; ?>');
                    var inputNome = document.getElementById('<?php echo chop($nome,'es');?>"+num<?php echo $nome; ?>');
                    var inputUrl = document.getElementById('<?php echo "U".chop($nome,'es');?>"+num<?php echo $nome; ?>');
                    var selIndex = selObj.selectedIndex;
                    var text = selObj.options[selIndex].text;
                    var url = urls[selIndex];
                    if (selObj.options[selIndex].value == 'outro ...'){
                        var campo = document.getElementById('<?php echo chop($nome,'es');?>"+num<?php echo $nome; ?>');
                        campo.style.visibility = 'visible';
                        campo.focus();
                    } 
                    inputNome.value = text;
                    if (url) inputUrl.value = url;
                }
         });
     }
<?php foreach ($field->valores as $especial){ ?>
    var urls = new Array();

    <?php
    foreach ($field->all as $option){ 
        ?>
        urls[<?php echo $option->id; ?>] = "<?php echo $option->url; ?>";
        <?php 
    } ?>
    function salva<?php echo $field->nome;?>(){
        alert ("Me implemente!!!!");
    }
    function select<?php echo $field->nome;?>(){
       var selObj = document.getElementById('<?php echo "S".$field->nome;?>');
       var inputNome = document.getElementById('<?php echo $field->nome;?>');
       var inputUrl = document.getElementById('<?php echo "U".$field->nome;?>');
       var selIndex = selObj.selectedIndex;
       var text = selObj.options[selIndex].text;
       var url = urls[selIndex];
       if (selObj.options[selIndex].value == 'outro ...'){
           var campo = document.getElementById('<?php echo $field->nome;?>');
           campo.style.visibility = 'visible';
           campo.focus();
       } 
       inputNome.value = text;
       if (url) inputUrl.value = url;
       return  text;
    }
<?php } ?>
</script>
    
<!-- Popup -->
<div id="Dialog<?php echo $nome;?>" 
        title="Editar <?php echo $nome;?>">
        <p>Selecione <?php echo $nome;?>
        <select id="S<?php echo "N".$field->nome;?>" 
            name="N<?php echo $field->nome;?>" 
            onFocus="status_msg.value='<?php echo $field->help;?>'" 
            onChange="status_msg.value=select<?php echo $field->nome;?>()"> 
            <option>Selecione ... </option>
            <?php
            $theA = $field->all;
            array_pop($theA);
            foreach ($theA as $option){ 
            ?>
            <option value="<?php echo $option->id; ?>"><?php if ($option->nome) echo $option->nome; ?></option>
            <?php    
            } ?>
        </select>

        <p><input type='button' value='Novo <?php echo chop($nome,'es');?>' onclick='novo<?php echo chop($nome,'es');?>();'>
    <?php foreach ($field->valores as $especial){ ?>
        <p>Selecione <?php echo $nome;?><select id="S<?php echo $field->nome;?>" 
            name="<?php echo $field->nome;?>" 
            onFocus="status_msg.value='<?php echo $field->help;?>'" 
            onChange="status_msg.value=select<?php echo $field->nome;?>()"> 
<?php
    ?>
    <option>Selecione ... </option>
    <?php
    $theA = $field->all;
    array_pop($theA);
    foreach ($theA as $option){ 
        ?>
        <option value="<?php echo $option->id; ?>"<?php 
            if ($option->nome == trim($field->valor->nome)) { 
             echo " selected"; 
             } ?>> <?php echo mb_convert_encoding($option->nome, "utf8", "auto"); ?></option>
         <?php    

    } ?>

    </select>
    <ul>
        <li>Nome: <input id="<?php echo $field->nome;?>" 
        name="<?php echo $field->nome;?>" 
        size="80"
        onFocus="status_msg.value='<?php echo $field->help;?>'" 
        onBlur="status_msg.value='<?php echo $field->nome;?>'" 
        value="<?php echo html_entity_decode($field->valor->nome,ENT_QUOTES);?>">
        <li>Url: &nbsp;&nbsp;&nbsp;&nbsp;<input id="U<?php echo $field->nome;?>" 
        name="U<?php echo $field->nome;?>" 
        size="80"
        onFocus="status_msg.value='<?php echo $field->help;?>'" 
        onBlur="status_msg.value='<?php echo $field->nome;?>'" 
        value="<?php echo html_entity_decode($field->valor->url,ENT_QUOTES);?>">
    </ul>
    <center>
    <br><input type="button" value="Salvar" onClick="salva<?php echo $field->nome;?>();">
</center>
<?php } ?>
</div>
<script>
 // Criando o popup
 $("#Dialog<?php echo $nome;?>").dialog({ 
     autoOpen: false ,
     show: 'blind',
     minHeight: 260,
     width:  "50%"
 });
 function pop<?php echo $nome;?>() {
         $("#Dialog<?php echo $nome;?>").dialog('open');
 }
 </script>
 <!-- BOTAO --> 
     <tr><td><?php echo ucfirst($field->nome);?></td><td><input type='button' onclick='pop<?php echo $nome;?>();' value="Editar <?php echo $nome;?>"></td></tr>
<!-- Fim campo ESPECIAL <?php echo $nome;?> --> 
