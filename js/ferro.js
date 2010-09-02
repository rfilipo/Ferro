// CMSFerro todos os direitos GPL Affero;


var menu1="index.php?ws=get&c=conteudo&id=2";
var menu2="index.php?ws=get&c=conteudo&id=3";
var menu3="index.php?ws=get&c=conteudo&id=4";
var menu4="index.php?ws=get&c=conteudo&id=5";
var menu5="index.php?ws=get&c=conteudo&id=6";
var menu6="index.php?ws=get&c=conteudo&id=7";

////////////////////////////////////////////////////////////////////
var djConfig = {
    isDebug:true, parseOnLoad:true
};

dojo.require("dojo.parser");
dojo.require("dojo.fx");
dojo.require("dojo.dnd.Moveable");
dojo.require("dijit.layout.BorderContainer");
dojo.require("dijit.layout.ContentPane");
//  dojo.require("dojo.data.ItemFileReadStore");

//  dojo.addOnLoad(function() { dojo.parser.parse(); });
 
var init = function(){
    console.log("cms ferro iniciando ... Copyright Mito-Logica");
};

 
var doTela = function(){
	console.log("Montando a tela ...");
    	var outerBc = new dijit.layout.BorderContainer({
      	"design": "sidebar",
      	"style": "height: 600px; width: 780px; z-index: 2000"
    	}, "quadro");

    	var my_screen = new dijit.layout.ContentPane({
      	"region": "top",
      	"style": "height: 580px; width: 760px;"
    	},"canvas");

    outerBc.addChild(my_screen);

    outerBc.startup();


};

dojo.addOnLoad(init);
dojo.addOnLoad(doTela);

//alert("tudo ok!!!");

