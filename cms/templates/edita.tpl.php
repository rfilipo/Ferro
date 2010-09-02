<?php
/**
 * edita.tpl.php
 * 
 * ferro versao 1.0 
 * Para controle do Blinkx Brasil
 * autor: Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * 12/02/2010
 *
 * PHP version 5.2.6
 *
 * @category PHP
 * @package  CMSferro
 * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * @license  GPL Affero
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

//:) debug
//var_dump($object);

?>
<script>
var retorno;
var formFields;
var seq;
formFields = new Array();


/**
  * class Field
  * 
  */

Field = function ()
{
    this._init ();
}

/**
 * _init sets all Field attributes to their default value. 
 */
Field.prototype._init = function ()
{
    this.m_id = "";
    this.m_campo = "";
    this.m_valor = "";
    this.m_classe = "";
}




function ajaxInsert(campos, valores, tabela){
    var xmlhttp;
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    } else {
        alert("Este navegador nao aceita Ajax! Nenhum dado foi modificado.");
    }

    xmlhttp.onreadystatechange=function() {
        if(xmlhttp.readyState==4)
        {
            alert('Dados Salvos! '+xmlhttp.responseText);
            retorno = xmlhttp.responseText;
    }
}
    xmlhttp.open("GET","insere_campo.php?campos="+campos+"&valores="+valores+'&tabela='+tabela,true);
    xmlhttp.send(null);
}


/**
 * Faz update em campo no banco
 * 
 * @param id, campo, valor, classe
 *
 */
function ajaxUpdate(id, campo, valor, classe){
   $.get('?', {
            ws: 'update',
            p:  campo, 
            v:  valor,
            c:  classe,
            id: id
    }, function() {
            console.log('Dados salvos! '+valor);
    });
}

 /**
  * realiza o submit
  */
 function mySubmit() {
     alert("O seu formulario esta sendo enviado ao servidor!");
     for (i=0; i < seq; i++){
         ajaxUpdate (formFields[i].m_id, formFields[i].m_campo, formFields[i].m_valor, formFields[i].m_classe);
     }
 }

 function Salvar(){
      var meuCampo;
      for (i=0; i < seq; i++){
         meuCampo = document.getElementById(formFields[i].m_campo);
         formFields[i].m_valor = meuCampo.value;
      }
 }

 function handleEnter(e) {
    var charCode;
    if(e && e.which){
        charCode = e.which;
    }else if(window.event){
        e = window.event;
        charCode = e.keyCode;
    }
    if(charCode == 13) {
        //nao faz nada;
    }
 }
 document.onkeypress=handleEnter;
 seq = 0;
/*
 formFields[seq] = new Field();
 formFields[seq].m_id     = 'COisa';
 formFields[seq].m_campo  = '';
 formFields[seq].m_valor  = '';
 formFields[seq].m_classe = '';
 seq++;
*/
</script>



<h2><?php echo "Editar $Modelo";?></h2>

<table border="0">
		<input name="id" type="hidden" value="<?php echo $id;?>">
		<table border="0">
<?php 
foreach ($fields as $field) {
    switch ($field->tipo) {
        case "select":
            require 'templates/editor/select.tpl.php';
        break;

        case "text":
            $nome = $field->nome;
            require 'templates/editor/text.tpl.php';
        break;

        case "html":
            $nome = $field->nome;
            require 'templates/editor/html.tpl.php';
        break;

        case "fkey":
            $nome = $field->nome;
            require 'templates/editor/fkey.tpl.php';
        break;
 
        case "especial":
            $nome = $field->nome;
            require 'templates/editor/especial.tpl.php';
        break;
  
        case "especiais":
            $nome = $field->nome;
            require 'templates/editor/especiais.tpl.php';
        break;
  
        case "auxiliar":
            require 'templates/editor/auxiliar.tpl.php';
        break;

        case "checkbox":
            require 'templates/editor/checkbox.tpl.php';
        break;

        case "password":
            require 'templates/editor/password.tpl.php';
        break;


        default:
            ?>
            <tr><td colspan=2><h4><?php echo $field->nome;?>: Erro, tipo desconhecido <?php echo $field->tipo;?></h4></td></tr>
            <?php
    }
}
?>
    <tr><td></td><td>
    <br>
    <input type="button" value="Salvar" onClick="mySubmit();"> 
    <input type="button" value="Cancelar" onClick="document.getElementById('').style.visibility='hidden'"> </td></tr>
</table>
</div>	


<?php

include_once 'templates/footer.tpl.php'; 

?>	
