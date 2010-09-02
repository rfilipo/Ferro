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

<!-- campo ESPECIAL --> 
<script>
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
</script>
    
<!-- Popup -->
<div 
        id="Dialog<?php echo $nome;?>" 
        title="Editar <?php echo $nome;?>">

<div
 style="border: 1px outset rgb(0, 0, 0); height: 465px; width: 220px; left: 8px; top: 8px; position: absolute; overflow-y: scroll;">
<table border="0" cellpadding="2" cellspacing="2" width="100%">
  <tbody>
    <tr>
      <td style="vertical-align: top; width: 20px;"><input
 checked="checked" type="checkbox"></td>
      <td style="vertical-align: top; width: 100px;">nome 1<br>
      </td>
      <td style="vertical-align: top; width: 50px;"><input
 title="delete" value="delete" type="button"></td>
    </tr>
    <tr>
      <td><input checked="checked" type="checkbox"></td>
      <td style="vertical-align: top;">nome 1 </td>
      <td><input title="delete" value="delete" type="button"> </td>
    </tr>
    <tr>
      <td><input checked="checked" type="checkbox"></td>
      <td style="vertical-align: top;">nome 1 </td>
      <td><input title="delete" value="delete" type="button"> </td>
    </tr>
    <tr>
      <td><input checked="checked" type="checkbox"></td>
      <td style="vertical-align: top;">nome 1 </td>
      <td><input title="delete" value="delete" type="button"> </td>
    </tr>
    <tr>
      <td><input checked="checked" type="checkbox"></td>
      <td style="vertical-align: top;">nome 1 </td>
      <td><input title="delete" value="delete" type="button"> </td>
    </tr>
    <tr>
      <td><input checked="checked" type="checkbox"></td>
      <td style="vertical-align: top;">nome 1 </td>
      <td><input title="delete" value="delete" type="button"> </td>
    </tr>
    <tr>
      <td><input checked="checked" type="checkbox"></td>
      <td style="vertical-align: top;">nome 1 </td>
      <td><input title="delete" value="delete" type="button"> </td>
    </tr>
  </tbody>
</table>
</div>
<div
 style="height: 465px; width: 600px; left: 238px; top: 8px; position: absolute;">
<table border="0" cellpadding="2" cellspacing="2" width="100%">
  <tbody>
    <tr align="center">
      <td colspan="2" rowspan="1" style="vertical-align: top;">Editando
dados de <span style="font-weight: bold;">nome1</span><br>
      </td>
    </tr>
    <tr>
      <td style="vertical-align: top; width: 20px;">nome</td>
      <td style="vertical-align: top;"><input value="nome1" type="text"><br>
      </td>
    </tr>
    <tr>
      <td style="vertical-align: top;">telefone<br>
      </td>
      <td style="vertical-align: top;"><input value="nome1" type="text"></td>
    </tr>
    <tr>
      <td style="vertical-align: top;">endere&ccedil;o<br>
      </td>
      <td style="vertical-align: top;"><input value="nome1" type="text"></td>
    </tr>
    <tr>
      <td style="vertical-align: top;">site<br>
      </td>
      <td style="vertical-align: top;"><input value="nome1" type="text"></td>
    </tr>
    <tr>
      <td style="vertical-align: top;">canal<br>
      </td>
      <td style="vertical-align: top;">
      <select>
      <option>teste</option>
      <option>cinema</option>
      <option>anima</option>
      </select>
      </td>
    </tr>
    <tr align="center">
      <td colspan="2" rowspan="1" style="vertical-align: top;"><input
 title="salvar" value="salvar" type="button"></td>
    </tr>
  </tbody>
</table>
</div>



    <p>Selecione <?php echo $nome;?><select id="S<?php echo $field->nome;?>" 
            name="<?php echo $field->nome;?>" 
            onFocus="status_msg.value='<?php echo $field->help;?>'" 
            onChange="status_msg.value=select<?php echo $field->nome;?>()"> 
<?php
    ?>
    <option>Selecione ... </option>
    <?php
    foreach ($field->all as $option){ 
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
