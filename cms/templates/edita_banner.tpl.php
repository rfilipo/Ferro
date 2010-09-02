<?php 
<?php
/**
 * edita.tpl.php
 * 
 * cms_blinkx versao 1.0 
 * Para controle do Blinkx Brasil
 * autor: Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * 12/02/2010
 *
 * PHP version 5.2.6
 *
 * @category PHP
 * @package  CMSblinkx
 * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * @license  propriedade de Elo Company
 * @version  CVS: $Revision: 1.6 $ 
 * @link     http://www.kobkob.com.br/ferro/
 *
 */
require_once 'templates/header.tpl.php'; 
require_once 'includes/functions.inc.php';
require_once 'templates/menu.tpl.php';
require_once 'templates/fckeditor/fckeditor.php';

$Modelo     =      ucfirst($this->modelo);
$id         =      $this->id;
$fields     =      $this->fields;
$object     =      $this->object;

?>


<h2 align=center><?php echo Adicionar.' '.ucfirst(banner);?></h2>

<form enctype="multipart/form-data" method="POST" action="banners_insdb.php" name="frmInsert">
        <!--
        <form enctype="multipart/form-data" method="POST" id="test" action="../show_post.php" name="frmInsert">
-->

        <table border="0" align="center">
        <script>
 
        function setBannerWidth(x, y){ 
            //window.location.href=window.location.href;
            var banner = document.getElementById('banner_frame');
            x = parseInt(x) + 16;
            y = parseInt(y) + 16;
            banner.style.width = x+'px';
            banner.style.height = y+'px';
            setImage();
        }
 
       </script>
        <tr><td>Titulo</td><td><input name="titulo" type="text" size="50" maxlength="255" onFocus="status_msg.value='Campo titulo'" onBlur="status_msg.value=''"></td></tr>

        <tr><td>Medida</td><td>
450x89<input name="medidas" type="radio" size="50" maxlength="255" onclick="setBannerWidth('450','89')" value='450x89'>&nbsp;&nbsp;&nbsp;
432x89<input name="medidas" type="radio" size="50" maxlength="255" onclick="setBannerWidth('432','89')" value='432x89'>
</td></tr>
        <tr><td>Url (link)</td><td><input name="url" type="text" size="50" maxlength="255" onFocus="status_msg.value='Campo url'" onBlur="status_msg.value=''"></td></tr>

        <tr><td>Banner</td><td>

<input id='html_input' name="html" type="hidden">

<script>

        function setImage(){
            var html_input = document.getElementById('html_input');
            var imagemUrl = window.frames[0].document.getElementById('imagem');
            html_input.value = "<img src='<?php echo $webroot; ?>banners/uploads/"+imagemUrl.value+"'>";
        }

</script>

<div id='show_banner'>
<iframe id='banner_frame' style='width:600px; height:120px: overflow:hidden;' src='upload.html'>
</iframe>
</div>
</td></tr>
<tr><td width="180">P&aacute;gina</td><td>
    <script>
        function selectPagina(){
        var selObj = document.getElementById('select_pagina');
        var selIndex = selObj.selectedIndex;
        return  selObj.options[selIndex].text;
        }
    </script>
    <select id="select_pagina" name="pagina" onFocus="status_msg.value='Campo pagina '" onChange="status_msg.value=selectQualidade()"> 
<?php
    $sql = "select id, valor from pagina";  
    $res = mysql_query($sql);
    ?>
    <option value=''>Selecione ... </option>
    <?php
    while($field = mysql_fetch_array($res)){ ?>
    <option value="<?php echo $field[0]; ?>"><?php echo $field[1]; ?></option>
<?php } ?>
</select>
</td></tr>

<tr><td>Canal</td><td>
    <script>
        function selectCanais(){
        var selObj = document.getElementById('select_canais');
        var selIndex = selObj.selectedIndex;
        return  selObj.options[selIndex].text;
        }
    </script>
    <select id="select_canais" name="canal" onFocus="status_msg.value='Campo canal '" onChange="status_msg.value=selectMidias()"> 
   <option value=''>Selecione ... </option>
    <?php
    foreach($){ ?>
    <option value="<?php echo $field[0]; ?>"><?php echo $field[1]; ?></option>
<?php } ?>
</select>
</td></tr>
<tr><td>Filme</td><td>
    <script>
        function selectFilme(){
        var selObj = document.getElementById('select_filmes');
        var selIndex = selObj.selectedIndex;
        return  selObj.options[selIndex].text;
        }
    </script>
    <select id="select_filmes" name="filme" onFocus="status_msg.value='Campo midias sugeridas '" onChange="status_msg.value=selectMidias()"> 
<?php
    $sql = "select id, titulo from filmes";  
    $res = mysql_query($sql);
    ?>
    <option value=''>Selecione ... </option>
    <?php
    while($field = mysql_fetch_array($res)){ ?>
    <option value="<?php echo $field[0]; ?>"><?php echo $field[1]; ?></option>
<?php } ?>
</select>
</td></tr>
        <tr><td>Default</td><td><input name="banner_default" type="checkbox">&nbsp;(ser&aacute; o banner mostrado na falta de um espec&iacute;fico)</td></tr>
        <tr><td></td><td><input type="submit" class="submit" value="Inserir" onClick='setImage()'></td></tr>

                <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
		<tr><td colspan="2"><input type="text" id="status_msg" name="status_msg" value="cliques" size="60" readonly></td></tr>
	</table>

	</form>

	<?php 
	include_once("includes/footer.php"); 
	?>
	
