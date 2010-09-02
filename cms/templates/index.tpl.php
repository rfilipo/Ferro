<?php 	
/**
 *  ecooe versao 1.0 
 *  index.tpl.php
 *
 *
 *  autor: Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 *  12/02/2010
 * 
 * PHP version 5.2.6
 *
 * @category PHP
 * @package  Ecooe
 * @author   Ricardo Filipo <ricardo.filipo@mitologica.com.br>
 * @license  GPL
 * @version  CVS: <cvs_id> 
 * @link     http://www.kobkob.com.br/ferro/
 *
 *
 *
 *
 */
include_once 'templates/header.tpl.php'; 
include_once 'includes/functions.inc.php';

$webroot  = $this->webroot ;
$records  = $this->records ;
$busca    = $this->busca   ;
$start    = $this->start   ;
$where    = $this->where   ;
$limit    = $this->limit   ;
$conteudo    = $this->conteudo   ;
$conteudos   = $this->conteudos   ;
$rpp      = $this->rpp;
$pg       = $this->pg; 
?>

<link type="text/css" rel="stylesheet" href="includes/elomaster.css">
<script>

var retorno;
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



function ajaxUpdate(id, campo, valor, classe){
    var $dialog = $('<div></div>')
    .load("?ws=update&p="+campo+"&v="+valor+"&c="+classe+"&id="+id)
    .dialog({
        title: 'Resposta do servidor',
        width: 800,
        height: 360    
    });
}

 /**
  * realiza o submit
  */
 function mySubmit() {
    var f = document.forms.testeform;
    f.submitButton.disabled = true;
    alert("O seu formulario esta sendo enviado ao servidor!");
    f.submit();
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

function enviaBusca(){
    var abuscar = document.getElementById('buscar').value;
    window.location.href=location.pathname+"?busca="+abuscar";
}
</script>

	<h2><?php echo $page_title;?></h2>
<table width='840'>
<tr>
<td>
</td><td align='right'>
<h4>PROCURAR: </h4>
<input id='buscar' name='buscar'><input type='button' value='OK' onclick='enviaBusca();'>
</td>
</tr>
</table>
<br>
<table>
<?php
foreach ($this->conteudos as $conteudo){
    if ($conteudo){
        echo "<tr><td><a href='?action=editaconteudo&id=".$conteudo->id."'>".$conteudo->titulo."</td><td>".$conteudo->html."</td></tr>\n";
    }
}

?>
</table>

<br><br>
<br><br>

<?php
    // Paging links
    $todosconteudos = new Conteudo();
    $todosconteudos->all(1, 'titulo');

        $tr=$todosconteudos->getNumRows();  //tr - total of registers
	paging($tr,$rpp,$pg); 

	for($x=0;$x<$nf;$x++){
		if($sgbd=='my') {
			$fn = mysql_field_name($res,$x);
		}elseif($sgbd=='pg'){
			$fn = pg_field_name($res,$x);
		}
		$flds .= "<option value='$fn'>".ucfirst($fn)."</option>";
	}
	?>

