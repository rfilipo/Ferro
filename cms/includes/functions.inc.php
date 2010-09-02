<?php


function get_string_between($string, $start, $end){ 
    $string = " ".$string; 
    $ini = strpos($string,$start); 
    if ($ini == 0) return ""; 
    $ini += strlen($start); 
    $len = strpos($string,$end,$ini) - $ini; 
    return substr($string,$ini,$len); 
} 

function acerta_enc($sinopse){
    $sinopse        = str_replace('\\', '', str_replace("'","\'", mb_convert_encoding($sinopse, 'auto', "HTML-ENTITIES")));
    if (check_utf8($sinopse)) {
        $sinopse        = str_replace("'","\'", mb_convert_encoding($sinopse, 'auto', "HTML-ENTITIES"));
        //echo "<h4>UTF-8</h4>";
        return $sinopse;
    } else {
        $sinopse        = str_replace("'","\'", mb_convert_encoding($sinopse, 'utf-8', "HTML-ENTITIES"));
        return $sinopse;
    }
}




function check_utf8($str) { 
    $len = strlen($str); 
    for($i = 0; $i < $len; $i++){ 
        $c = ord($str[$i]); 
        if ($c > 128) { 
            if (($c > 247)) return false; 
            elseif ($c > 239) $bytes = 4; 
            elseif ($c > 223) $bytes = 3; 
            elseif ($c > 191) $bytes = 2; 
            else return false; 
            if (($i + $bytes) > $len) return false; 
            while ($bytes > 1) { 
                $i++; 
                $b = ord($str[$i]); 
                if ($b < 128 || $b > 191) return false; 
                $bytes--; 
            } 
        } 
    } 
    return true; 
} // end of check_utf8 





function processa_canal_com_link($tabela, $campo, $canal){
    $id_campo = busca_id_campo($tabela, $canal);
    $values .= "'".$id_campo."','";
    foreach ($campo as $item){
         $ipos = strpos($item, '(');
         $fpos = strpos($item, ')');
         if ($ipos !== false && $fpos !== false ) {
         $estenome= trim(htmlentities(substr($item,0,($ipos-1)), ENT_QUOTES));
         $esteurl = trim(htmlentities(substr($item,($ipos+1),-1), ENT_QUOTES));
         // busca o id do campo na tabela auxiliar
         $id_dado = busca_campo_canal($tabela, $estenome, $esteurl);
         $values .= $id_dado.",";
         } else {
             //die ("Formato incompativel: linha ".$i.", campo ".$thisfield);
             $item = trim(htmlentities($item, ENT_QUOTES));
             //echo "<br>Ator: $item\n";
             $id_dado = busca_campo_canal($tabela, $item, '');
             $values .= $id_dado.",";
         }
         //echo "<li>$item\n";
    }
    $values = chop($values,",");
    $values .= "'";
    return $values;
}

function busca_id($thisfield, $thisvalue){
    if ($thisfield == 'modelo_de_contrato') $thisfield = 'modelo_contrato';
    if ($thisfield == 'revenue_share_elo') $thisfield = 'revenue_share';
    $sql_busca = "SELECT * from $thisfield where `valor` = '".$thisvalue."'";
    $busca = mysql_query($sql_busca) or die (mysql_error()."Tabela $thisfield: Erro! Falha ao buscar o registro!");
    $res = mysql_fetch_array($busca);
    $id_dado = $res[0];
    if (!$id_dado) { // se nao achou
        // insere o dado e usa o id
        $sql_dado="INSERT INTO $thisfield (`valor`) VALUES ('".$thisvalue."')";
        $insert = mysql_query($sql_dado);
        if (!$insert){ 
            die ("Tabela $thisfield: Erro! Falha ao inserir o registro!".mysql_error()."<br>SQL: ".$sql_dado);
        } else { 
            $id_dado =  mysql_insert_id();
        }
    }
    return $id_dado;
} 

function busca_canal($thisvalue){
    $thisfield = 'canais';
    $sql_busca = "SELECT * from $thisfield where `nome` = '".$thisvalue."'";
    echo "<li>buscando canal $thisvalue $sql_busca";
    $busca = mysql_query($sql_busca) or die (mysql_error()."Tabela $thisfield: Erro! Falha ao buscar o registro!");
    $res = mysql_fetch_array($busca);
    $id_dado = $res[0];
    if (!$id_dado) { // se nao achou
        // insere o dado e usa o id
        $sql_dado="INSERT INTO $thisfield (`nome`) VALUES ('".$thisvalue."')";
        $insert = mysql_query($sql_dado);
        if (!$insert){ 
            die ("Tabela $thisfield: Erro! Falha ao inserir o registro!".mysql_error()."<br>SQL: ".$sql_dado);
        } else { 
            $id_dado =  mysql_insert_id();
        }
    }
    return $id_dado;
}

function busca_id_campo($campo, $canal){
    $tabela = 'canais_campos';
    $sql_busca = "SELECT * from $tabela where `campo` = '".$campo."' AND `canal` = '".$canal."'" ;
    $busca = mysql_query($sql_busca) or die (mysql_error()."Tabela $tabela: Erro! Falha ao buscar o registro!");
    $res = mysql_fetch_array($busca);
    $id_dado = $res[0];
    if (!$id_dado) { // se nao achou
        // insere o dado e usa o id
        $sql_dado="INSERT INTO $tabela (`canal`, `campo`) VALUES ('".$canal."', '".$campo."')";
        $insert = mysql_query($sql_dado);
        if (!$insert){ 
            die ("Tabela $tabela: Erro! Falha ao inserir o registro!".mysql_error()."<br>SQL: ".$sql_dado);
        } else { 
            $id_dado =  mysql_insert_id();
        }
    }
    return $id_dado;
}


/**
 * busca o record na tabela auxiliar que contenha nome e url
 * @param thisfield - a tabela a busca
 * @param rhisnome: o nome da coisa a buscar
 *
 */
function busca_campo_canal($thisfield, $thisnome, $thisurl){
    $sql_busca = "SELECT * from $thisfield where `nome` = '".$thisnome."' AND `url` = '".$thisurl."'";
    $busca = mysql_query($sql_busca) or die ("Tabela $thisfield: Erro! Falha ao buscar o registro!".mysql_error()."<br>SQL: ".$sql_busca);
    $res = mysql_fetch_array($busca);
    $id_dado = $res[0];
    if (!$id_dado) { // se nao achou
        // insere o dado e usa o id
        $sql_dado="INSERT INTO $thisfield (`nome`, `url`) VALUES ('".$thisnome."','".$thisurl."')";
        $insert = mysql_query($sql_dado);
        if (!$insert){ 
            die ("Tabela $thisfield: Erro! Falha ao inserir o registro!".mysql_error()."<br>SQL: ".$sql_dado);
        } else { 
            $id_dado =  mysql_insert_id();
        }
    }
    return $id_dado;
} 




/** 
 * Cria sql para insercao a partir do csv
 * @param tabela
 * @param ini
 * @param end
 * @param line onde estao os nomes dos campos
 *
 */
function toSqlInsert($tabela, $ini, $end, $line){
    global $csv;
    $sql = array();
    $c = 0;
    $count = 0 ;
    $delta = $end-$ini;
    for ($j = 6; $j<count($csv); $j++){
        $values = "(\n";
        $fields = "(";
        for ($i=$ini; $i<$end; $i++){
            if ($i < $end-1){ 
                $thisfield = mapField($csv[$line][$i],$tabela); 
                $fields .= "`".$thisfield."`,";
                $values .= "'".$csv[$j][$i]."',\n";
                // conta se for vazio
                if  ($csv[$j][$i] == '') $count ++; 
            } else { 
                $thisfield = mapField($csv[$line][$i],$tabela); 
                $fields .= "`".$thisfield."`)";
                $values .= "'".$csv[$j][$i]."')\n";
                if  ($csv[$j][$i] == '') $count ++; 
            }
        }
        //echo "<li>Contador: $count $delta";
        if ($delta > $count){ // se há $delta campos vazios não precisa SQL
            $sql[$c] = "INSERT INTO $tabela ";
            $sql[$c] .= $fields." \n VALUES ".$values;
            $c++;
        }
    } 
    return $sql;
}

function mapField($field, $table){ 
    $map = $field; 
    $sql = "select * from $table";
    //echo "\n $sql"; 
    $res = mysql_query($sql);
    $nf = mysql_num_fields($res);
    $i=0;
    while($i < $nf) {				        
        $column = mysql_field_name($res,$i);
        //echo "\n$column - $field\n";
        if (soundex($column) == soundex($field)){
            //echo $column." => ".$field."\n";
            $map = $column;
        }
	$i++;
    }
    if ($field=="FOTOS EM ALTA QUALIDADE?"){$map="alta_qualidade";}
    return $map;
}

/**
 * PopForm 1.1
 *
 * Nova implementacao usando jQuery UI
 * Apresenta um popup
 * @return void
 */
function popForm($id, $file, $title='Preencha os dados', $id_rec='', $initCode='',$iframe = 0){
echo "\n<!-- POPFORM 1.1 $id $iframe $idrec $title -->";
    global $webroot;
?>
<script>
function init_<?php echo $id;?>() {
    // init code. Is empty? good!
    //alert ('Init do dmdeditor');
    <?php echo $initCode;?>
}

</script>

<div  id="Dialog_<?php echo $id;?>">
    <div class="cell_pop" id='cell_<?php echo $id;?>'>
    <center>
<?php 
    if ($iframe){
        echo "  
<iframe id='iframe_$id' style='width:640px; height:480px' onload='init_$id();' src='$webroot$file'></iframe>
        ";
    } else {    
        include ($file);
    }
?>
</center>
</div>
    </div>
    <script>
 init_<?php echo $id;?>();
 // Criando o popup
 $("#Dialog<?php echo $id;?>").dialog({ 
     autoOpen: false ,
     show: 'blind',
     minHeight: 260,
     width:  "50%"
 });
 function pop<?php echo $id;?>() {
         //alert ("Abrindo HUUUU <?php echo $id;?>");
         $("#Dialog_<?php echo $id;?>").dialog('open');
 }
</script>
<?php
}
//// Fim PopForm

// recursive file copy
// http://www.php.net/manual/pt_BR/function.copy.php
function recurse_copy($src,$dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recurse_copy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
} 


function paging ($tr,$rpp,$pg) { // $tr - total_records and $rpp - registers per page 
echo "<!-- $tr,$rpp,$pg -->";
    global $table;
    global $webroot;
    global $canal;
  if ($tr%$rpp==0){$pages = intval($tr / $rpp)-1;} else {$pages = intval($tr / $rpp);} // calc pages necessary

  if ($tr>0){ 
     $NumStartRegister = ($pg*$rpp)+1; 
     if ($pg <> $pages) {$NumEndRegister = ($pg*$rpp)+$rpp;} else {$NumEndRegister = $tr;} 

     if ($pg <> 0) { 
       $showpage = $pg - 1; 
       #echo "<a href=".$_SELF."?canal=$canal&table=".$table."&pg=0 title='first'>&nbsp;<img src='$webroot/images/first.jpg' alt='first' title='first' border='0'></a>&nbsp;"; 
       echo "<a href='?".$_SERVER['QUERY_STRYNG']."&canal=$canal&table=".$table."&pg=0' title='first'>&nbsp;<img src='$webroot/images/first.jpg' alt='first' title='first' border='0'></a>&nbsp;"; 
       #echo "<a href=".$_SELF."?canal=$canal&table=".$table."&pg=".$showpage." title='previous'> &nbsp;<img src='$webroot/images/prev.jpg' alt='previous' title='previous' border='0'></a>&nbsp;"; 
       echo "<a href='?".$_SERVER['QUERY_STRING']."&canal=$canal&table=".$table."&pg=".$showpage."' title='previous'> &nbsp;<img src='$webroot/images/prev.jpg' alt='previous' title='previous' border='0'></a>&nbsp;"; 
     }else{
       $showpage = $pg; 
       echo "&nbsp;<img src='$webroot/images/first_dis.jpg' alt='first' title='first' border='0'>&nbsp;"; 
       echo "&nbsp;<img src='$webroot/images/prev_dis.jpg' border='0'>&nbsp;"; 
	 } 
     for ($i = $pg-5; $i<$pg; $i++) { 
        $showpage=$i+1; 
        if ($i>=0) { 
           #echo '<a href="'.$_SELF.'?canal='.$canal.'&table='.$table.'&pg='.$i.'">'.$showpage.'</a>'; 
           echo '<a href="?'.$_SERVER['QUERY_STRING'].'&canal='.$canal.'&table='.$table.'&pg='.$i.'">'.$showpage.'</a>'; 
           echo '&nbsp;&nbsp;'; 
        } 
     } 
     for ($i = $pg; ($i<=$pages AND $i<=($pg+5)); $i++) { 
        $showpage=$i+1; 
        if ($i == $pg) { 
           echo $showpage;
		} else { 
           #echo '<a href="'.$_SELF.'?canal='.$canal.'&table='.$table.'&pg='.$i.'">'.$showpage.'</a>'; 
           echo '<a href="?'.$_SERVER['QUERY_STRING'].'&canal='.$canal.'&table='.$table.'&pg='.$i.'">'.$showpage.'</a>'; 
           echo '&nbsp;&nbsp;'; 
        } 
     } 
     if ($pg < $pages) { 
        $showpage = $pg + 1; 
        #echo "<a href=".$_SELF."?canal=$canal&table=".$table."&pg=".$showpage." title='next'>&nbsp;<img src='$webroot/images/next.jpg' title='next' alt='next' border='0'></a>&nbsp;"; 
        echo "<a href='?".$_SERVER['QUERY_STRING']."&canal=$canal&table=".$table."&pg=".$showpage."' title='next'>&nbsp;<img src='$webroot/images/next.jpg' title='next' alt='next' border='0'></a>&nbsp;"; 
        #echo "<a href=".$_SELF."?canal=$canal&table=".$table."&pg=".$pages." title='last'>&nbsp;<img src='$webroot/images/last.jpg' title='last' alt='last' border='0'></a>&nbsp;"; 
        echo "<a href='?".$_SERVER['QUERY_STRING']."&canal=$canal&table=".$table."&pg=".$pages."' title='last'>&nbsp;<img src='$webroot/images/last.jpg' title='last' alt='last' border='0'></a>&nbsp;"; 
     }else{
       $showpage = $pg; 
       echo "&nbsp;<img src='$webroot/images/last_dis.jpg' border='0'>&nbsp;"; 
       echo "&nbsp;<img src='$webroot/images/next_dis.jpg' border='0'>&nbsp;"; 
	 } 
     echo "&nbsp;Total: $tr"; 

  } 
} 



function blinkx_paging ($tr,$rpp,$hit,$busca, $username, $password) { // $tr - total_records and $rpp - registers per page 
    global $webroot;
    $pg = intval($hit/$rpp);
    $hit = intval($pg/$rpp);
  if ($tr%$rpp==0){$pages = intval($tr / $rpp)-1;} else {$pages = intval($tr / $rpp);} // calc pages necessary

  if ($tr>0){ 
     $NumStartRegister = ($pg*$rpp)+1; 
     if ($pg <> $pages) {$NumEndRegister = ($pg*$rpp)+$rpp;} else {$NumEndRegister = $tr;} 

     if ($pg <> 0) { 
       $showpage = $pg - 1; 
       echo "<!-- primeiros botoes pagina $pg hit $hit-->
           <a href=".$_SELF."?username=$username&password=$password&busca=".$busca."&start=1&maxresults=$rpp title='first'>
           &nbsp;<img src='$webroot/images/first.jpg' alt='first' title='first' border='0'></a>&nbsp;
           <a href=".$_SELF."?username=$username&password=$password&busca=".$busca."&start=".(($hit-$rpp) < 0 ? 1 : ($hit-$rpp) )."&maxresults=".(($hit-1) < 0 ? $rpp : ($hit-1))." title='previous'> &nbsp;<img src='".$webroot."/images/prev.jpg' alt='previous' title='previous' border='0'></a>&nbsp;
       "; 
     }else{
       $showpage = $pg; 
       echo "
           &nbsp;<img src='$webroot/images/first_dis.jpg' alt='first' title='first' border='0'>&nbsp;"; 
       echo "
           &nbsp;<img src='$webroot/images/prev_dis.jpg' border='0'>&nbsp;"; 
	 } 
     for ($i = $pg-5; $i<$pg; $i++) {
        $showpage=$i+1; 
        if ($i>=0) { 
        echo "\n<!-- pag $i  pagina $pg hit $hit----->\n";
            echo '<a href="'.$_SELF.'?username='.$username.'&password='.$password.'&busca='.$busca.'&start='.$hit.'&maxresults='.($hit+$rpp).'">'.$showpage.'</a>'; 
            echo '
                &nbsp;&nbsp;'; 
        } 
     } 
     for ($i = $pg; ($i<=$pages AND $i<=($pg+5)); $i++) { 
        $showpage=$i+1; 
        echo "\n<!-- pag $i  pagina $pg hit $hit----->\n";
        if ($i == $pg) { 
            echo "\n$showpage";
		} else { 
           echo "\n".'<a href="'.$_SELF.'?username='.$username.'&password='.$password.'&busca='.$busca.'&start='.($i*$rpp).'&maxresults='.(($i+1)*$rpp).'">'.$showpage.'</a>'; 
           echo ' &nbsp;&nbsp;'; 
        } 
     } 
     if ($pg < $pages) { 
        $showpage = $pg + 1; 
        echo "<a href=".$_SELF."?username=$username&password=$password&busca=".$busca."&start=".($hit+$rpp+1)."&maxresults=".($hit+$rpp*2)." title='next'>&nbsp;<img src='".$webroot."/images/next.jpg' title='next' alt='next' border='0'></a>&nbsp;"; 
        echo "<a href=".$_SELF."?username=$username&password=$passwordbusca=".$busca."&start=".($tr-$rpp)."&maxresults=$tr title='last'>&nbsp;<img src='$webroot/images/last.jpg' title='last' alt='last' border='0'></a>&nbsp;"; 
     }else{
       $showpage = $pg; 
       echo "&nbsp;<img src='$webroot/images/last_dis.jpg' border='0'>&nbsp;"; 
       echo "&nbsp;<img src='$webroot/images/next_dis.jpg' border='0'>&nbsp;"; 
	 } 
     echo "&nbsp;Total: $tr"; 

  } 
}




// Remove directory recursively from php manual - php.net
function SureRemoveDir($dir, $DeleteMe) {
    if(!$dh = @opendir($dir)) return;
    while (false !== ($obj = readdir($dh))) {
        if($obj=='.' || $obj=='..') continue;
        if (!@unlink($dir.'/'.$obj)) SureRemoveDir($dir.'/'.$obj, true);
    }

    closedir($dh);
    if ($DeleteMe){
        @rmdir($dir);
    }
}

// Return permissions of file
function file_perms($file){
	if(file_exists($file)){
		if(strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN'){
			$perm = substr(decoct(fileperms($file)),2);
			return $perm;
		}
	}else{
		return false;			
	}
}
/*
if(file_perms(__FILE__) =='0707' || file_perms(__FILE__) =='0777'){
	print file_perms(__FILE__);
}else{
	print "Sem permissão de escrita. A permissão atual é de ".file_perms(__FILE__)." altere para 0707 ou 0777";
}
*/


// Return fields and table referenceds only of the first field with FK
function foreign_key($table){
	global $database, $sgbd;
	if($sgbd=='my'){
		$sql="SELECT COLUMN_NAME, REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE c
			WHERE c.TABLE_SCHEMA = '$database' AND c.TABLE_NAME = '$table' AND not isnull(REFERENCED_TABLE_NAME)";

		$qry=mysql_query($sql);

		$row=0;
		$regs=array();
		$nf=mysql_num_fields($qry);
		while ($data = mysql_fetch_array($qry)) {
			for($x=0;$x < $nf;$x++){
				array_push($regs, $data[$x]);
			}
	   		$row++;
		}	

		return $regs;
	}elseif($sgbd=='pg'){
		$sql="SELECT kcu.column_name as local_field,
		   		ccu.table_name AS references_table,
				  ccu.column_name AS references_field
			 FROM information_schema.table_constraints tc
		LEFT JOIN information_schema.key_column_usage kcu
			   ON tc.constraint_catalog = kcu.constraint_catalog
			  AND tc.constraint_schema = kcu.constraint_schema
			  AND tc.constraint_name = kcu.constraint_name
		LEFT JOIN information_schema.referential_constraints rc
			   ON tc.constraint_catalog = rc.constraint_catalog
			  AND tc.constraint_schema = rc.constraint_schema
			  AND tc.constraint_name = rc.constraint_name
		LEFT JOIN information_schema.constraint_column_usage ccu
			   ON rc.unique_constraint_catalog = ccu.constraint_catalog
			  AND rc.unique_constraint_schema = ccu.constraint_schema
			  AND rc.unique_constraint_name = ccu.constraint_name
			WHERE tc.table_name = '$table'
			and tc.constraint_type='FOREIGN KEY';
		";
		/* Adapted from: http://www.alberton.info/postgresql_meta_info.html */

		$qry=pg_query($sql);

		//$row=0;
		$regs=array();
		$nf=pg_num_fields($qry);
		while ($data = pg_fetch_array($qry)) {
			for($x=0;$x < $nf;$x++){
				array_push($regs, $data[$x]);
			}
	   		//$row++;
		}	
		return $regs;
	}
}
/*
$table='prateleiras';
$ret = foreign_key($table);
$nrfk = count($ret);
print "FldLoc1 - ".$ret[0].'<br>';
print "TabRef1 - ".$ret[1].'<br>';
print "FldRef1 - ".$ret[2].'<br>';
print "FldLoc2 - ".$ret[3].'<br>';
print "TabRef2 - ".$ret[4].'<br>';
print "FldRef2 - ".$ret[5].'<br>';
//...
*/

//dropdown
function combo($field, $default_value = null, $table)
{
	//this code is bringing in the values for the dropdown. 
	$query="select * from $table order by $field"; 

	/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */ 

	$result = mysql_query ($query); 
	while($row=mysql_fetch_array($result)){//Array or records stored 
	if($row[$field] == $default_value)
	{
		$combo .= "<option value=$row[0] selected='selected'>$row[$field]</option>"; 
	}
	else
	{
		$combo .= "<option value=$row[0]>$row[$field]</option>"; 
	}

	/* Option values are added by looping through the array */ 
	} 
	return $combo;
}
// Adapted from: http://codingforums.com/showthread.php?t=161047
//print combo('clientes','nome',$default_value = 'Elias Pereira Brito');


/*
function combo($fieldref, $default, $table){
	global $sgbd;

	if($sgbd=='my'){
		$result=mysql_query("SELECT $fieldref FROM $table ORDER BY $fieldref");
		$cb .= "\n<option value=\"0\">Selecione</option>\n";	
		$row=0;
		while($row = mysql_fetch_array($result)){
			//$display=htmlentities($row[$fieldref]);
			$display=htmlentities($row[1]);
			if($row[$fieldref]==$default){
				$cb .= "\n<option value=\"$row[$fieldref]\" SELECTED>$display</option>\n";
			}else{
				$cb .= "\n<option value=\"$row[$fieldref]\">$display</option>\n";
			}
		}				
		return $cb;
	}elseif($sgbd=='pg'){	
		$result=pg_query("SELECT $fieldref FROM $table ORDER BY $fieldref");
		$cb .= "\n<option value=\"0\">Selecione</option>\n";	
		$row=0;
		while($row = pg_fetch_array($result)){
			//$display=htmlentities($row[$fieldref]);
			$display=htmlentities($row[1]);
			if($row[$fieldref]==$default){
				$cb .= "\n<option value=\"$row[$fieldref]\" SELECTED>$display</option>\n";
			}else{
				$cb .= "\n<option value=\"$row[$fieldref]\">$display</option>\n";
			}
		}				
		return $cb;
	}
}
// combo("field", "fieldref", "valuefielddefault", "tableref");
// print combo("code","name", 6, "person");
*/

// Write string in file
function write_string($arquivo,$str){
	$fp = fopen($arquivo, "w");
	$ret=fwrite($fp, $str); // grava a string no arquivo. Se o arquivo não existir ele será criado
	if(!$ret) ////print "Erro ao gravar no arquivo!";
	fclose($fp);
}

// Original in: http://www.scriptbrasil.com.br/forum/lofiversion/index.php/t62271.html
function table_names(){	
	global $database,$sgbd;

	if($sgbd=='my'){
		$resultado_tabelas = mysql_list_tables($database);
		$qntd_tabelas = mysql_numrows($resultado_tabelas);

		for ($i = 0; $i < $qntd_tabelas; $i++)
		{
			$tables .= mysql_tablename($resultado_tabelas, $i).',';
		}
		return $tables;
	}elseif($sgbd=='pg'){
		$resultado_tabelas = pg_query("SELECT relname FROM pg_class WHERE relname !~ '^(pg_|sql_)' AND relkind = 'r';");
		$qntd_tabelas = pg_num_rows($resultado_tabelas);

		$tables='';
		while ($row = pg_fetch_array($resultado_tabelas))
		{ 
		 	$tables .= $row[0].',';
		} 
		return $tables;
	}
}	
//print_r(table_names());


// Retorna o tamanho dos campos na tabela
function field_len($table,$nr_field){
$sql="
SELECT a.attnum AS ordinal_position,
         a.attname AS field,
         t.typname AS type,
         a.attlen AS max_character_maximum_length,
         a.atttypmod AS len
    FROM pg_class c,
         pg_attribute a,
         pg_type t
   WHERE c.relname = '$table'
     AND a.attnum > 0
     AND a.attrelid = c.oid
     AND a.atttypid = t.oid
ORDER BY a.attnum;
";

	$result=pg_query($sql);
	$nr=pg_num_rows($result);

	for($x=0;$x<$nr;$x++){
		$arr = pg_fetch_array($result);
		if($arr["type"]=='int2' || $arr["type"]=='int4' || $arr["type"]=='int8' || $arr["type"]=='numeric'){
			$len .= '12'.',';
		}elseif($arr["type"]=='bpchar' || $arr["type"]=='varchar'){
			$len .= ($arr["len"]-4).',';
		}elseif($arr["type"]=='date'){
			$len .= '8'.',';
		}elseif($arr["type"]=='time'){
			$len .= 5;
		}elseif($arr["type"]=='timestamp'){
			$len .= '13'.',';
		}	
	}

	$len=explode(',',$len);
	$len=$len[$nr_field];

	return $len;
}
/*
for ($j = 1; $j < 6; $j++) {
    $len = field_len('clientes', $j-1);
	print "<input name=\"$fieldname\" type=\"text\" size=\"$len\" maxlength=\"$len\" ></td></tr>\n";	
}
*/


// Original in http://www.daniweb.com/forums/thread78890.html
function highlight($content,$query,$color='blue'){
   $query=explode(' ',$query);
   for($i=0;$i<sizeOf($query);$i++)
   $content=preg_replace("/($query[$i])/i","<b><font color=".$color.">\${1}</font></b>",$content);
   return $content;
}

// Return primary key field name
function primary_key($table){
	global $database,$sgbd;

	if($sgbd=='my'){
		$sql="SELECT c.COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE c
			WHERE c.TABLE_SCHEMA = '$database'
			AND c.TABLE_NAME = '$table' AND c.CONSTRAINT_NAME = 'PRIMARY'";
		
		$ret=array();
		$qry=mysql_query($sql);
		$reg=mysql_fetch_array($qry);	

		for($x=0;$x<mysql_num_rows($qry);$x++){
			array_push($ret,$reg[0]);
		}
		return $ret;
	}elseif($sgbd=='pg'){	
		$str="SELECT ta.attname AS column_name
			FROM pg_class bc, pg_index i, pg_attribute ta, pg_attribute ia
			WHERE bc.oid = i.indrelid AND ia.attrelid = i.indexrelid AND ta.attrelid = bc.oid AND bc.relname = '$table'
			AND ta.attrelid = i.indrelid AND ta.attnum = i.indkey[ia.attnum-1]
			ORDER BY column_name;
		";

		$ret=array();
		$qry = pg_query($str);

		for($x=0;$x<pg_num_rows($qry);$x++){
			$reg = pg_fetch_array($qry,$x);
			array_push($ret,$reg[0]);
		}
		return $ret;
	}
}

// Return only text fields 
function fields_text($result){
	global $sgbd;

	if($sgbd=='my'){
		$i = mysql_num_fields($result);
			for ($j = 0; $j < $i; $j++) {
			    $fieldname = mysql_field_name($result, $j);
				$type=mysql_field_type($result, $j);

				if($type=='string' || $type=='date' || $type=='time' || $type=='timestamp'){
					$ftype .= $fieldname.',';
				}
			}
		return $ftype;
	}elseif($sgbd=='pg'){
		$i = pg_num_fields($result);
			for ($j = 0; $j < $i; $j++) {
			    $fieldname = pg_field_name($result, $j);
				$ftype .= $fieldname.',';
			}
		return $ftype;
	}
}

?>
