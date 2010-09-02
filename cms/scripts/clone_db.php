<?php

/**
 * Clonando o banco de dados para usar o fe_nome_da_tabela
 **/
$sql[0]= "\n"
    . " CREATE TABLE IF NOT EXISTS `eloaudiovisual1`.`fe_canais` ( `id` int( 11 ) NOT NULL auto_increment ,\n"
    . " `nome` varchar( 255 ) default NULL ,\n"
    . " PRIMARY KEY ( `id` ) ) ENGINE = MyISAM  "
    . " DEFAULT CHARACTER SET utf8"
    . " DEFAULT COLLATE utf8_general_ci"
    .";\n"
    . "\n"
    . "INSERT INTO `eloaudiovisual1`.`fe_canais` SELECT * FROM `eloaudiovisual1`.`canais`;";

$sql[1] = "
	CREATE TABLE IF NOT EXISTS `fe_filmes` (
  `id` int(11) NOT NULL auto_increment,
  `titulo` char(255) default NULL,
  `produtora` int(11) default NULL,
  `destaques` varchar(255) default NULL,
  `sinopse` text character set utf8 collate utf8_unicode_ci,
  `duracao` varchar(349) default NULL,
  `diretor` varchar(349) default NULL,
  `ano_de_lancamento` varchar(349) default NULL,
  `canal` int(11) default NULL,
  `contrato` int(11) default NULL,
  `links` int(11) default NULL,
  `material` int(11) default NULL,
  `armazenamento` int(11) default NULL,
  `curadoria` int(11) default NULL,
  `cadastrou` varchar(11) default NULL,
  `BID` varchar(255) default NULL,
  `DMD` mediumtext,
  PRIMARY KEY  (`id`),
  KEY `produtora` (`produtora`),
  KEY `canal` (`canal`),
  KEY `contrato` (`contrato`),
  KEY `links` (`links`),
  KEY `material` (`material`),
  KEY `armazenamento` (`armazenamento`),
  KEY `curadoria` (`curadoria`),
  KEY `cadastrou` (`cadastrou`)
) ENGINE=MyISAM  
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci
  AUTO_INCREMENT=240 ;
";



$sql[2] = "\n"
    . "\n"
    . "INSERT INTO `eloaudiovisual1`.`fe_filmes` SELECT * FROM `eloaudiovisual1`.`filmes`;";


