#!/usr/bin/perl 
#===============================================================================
#
#         FILE:  criaSearch.pl
#
#        USAGE:  ./criaSearch.pl  
#
#  DESCRIPTION:  Cria codigo em php para search
#
#      OPTIONS:  ---
# REQUIREMENTS:  ---
#         BUGS:  ---
#        NOTES:  ---
#       AUTHOR:  Ricardo Filipo (rf), ticardo.filipo@gmail.com
#      COMPANY:  Mito-Lógica design e soluções de comunicação ltda
#      VERSION:  1.0
#      CREATED:  03/05/2010 11:51:15 PM
#     REVISION:  ---
#===============================================================================

use strict;
use warnings;


my $code;
my $sch;
my $tab;

$sch = $ARGV[0];
$tab = $ARGV[1];

$code = "
/**
 * Busca $sch e carrega os dados do objeto
 * \@return void
 */
public function search".ucfirst $sch." (\$sch) {
    \$sql = \"SELECT id from \`$tab\` where $sch like '\$sch'\";".'
    $result =  $this->database->query($sql);
    $result = $this->database->result;
    $row = mysql_fetch_object($result);
    $achou = false;
    if ($row){
        $this->select($row->id);
        $achou = true;
    }
    return $achou;
}
';


print $code;
