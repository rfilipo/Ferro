// Ferro CMS copyright GPL Affero
// Ricardo Filipo ricardo.filipo@gmail.com

// Tela com animações

console.log("Calculando medidas");
var width = window.innerWidth;
var height= window.innerHeight;
var offset = 138;
var carga = 521 + offset;
if (height < carga) {
    offset = carga - height;
} else {
    offset = 0;
}
console.log("w "+width+" h "+height);

console.log("Controle e animacoes");
// Os handles dos objetos
//var menu1Node =  new dojo.dnd.Moveable(dojo.byId("menu1_frame"));
//var barraNode = new dojo.dnd.Moveable(dojo.byId("mastro_frame")); 
//var headerNode = new dojo.dnd.Moveable(dojo.byId("header_frame")); 
//var footerNode = new dojo.dnd.Moveable(dojo.byId("footer_frame")); 
//var pagNode = new dojo.dnd.Moveable(dojo.byId("conteudo")); 

// as animações

var barra_pra_esquerda = dojo.fx.slideTo({
	node: "mastro_frame",
	duration: 600, 
	left: 0, 
	top: 0});
var splash_off = dojo.animateProperty({
		node: "splash", 
		duration: 200,  
		properties: {
			opacity: 0,
			} 
	}); 
var header_off = 	dojo.animateProperty({
		node: "header_frame", 
		duration: 100,  
		properties: {
			opacity: 0,
			} 
	}); 
var header_on = dojo.animateProperty({ 
		node:"header_frame", 
		duration: 300,
		properties: {
			opacity: 1,
		}	
	});
var footer_off = 	dojo.animateProperty({
		node: "footer_frame", 
		duration: 100,  
		properties: {
			opacity: 0,
			} 
	});
var footer_top = height - dojo.style("footer_img","height") - 50;
var footer_on = dojo.animateProperty({ 
		node:"footer_frame", 
		duration: 300,
		properties: {
			opacity: 1,
			top: footer_top,
		}	
	});
var logo_off = 	dojo.animateProperty({
		node: "logo_frame", 
		duration: 100,  
		properties: {
			opacity: 0,
			} 
	});
var logo_left = width - dojo.style("logo_img","width");
var logo_top = height - dojo.style("logo_img","height");
var logo_on = dojo.animateProperty({ 
		node:"logo_frame", 
		duration: 300,
		properties: {
			opacity: 0.3,
			left: logo_left,
                        top: logo_top,
		}	
	});

var pag_off = 	dojo.animateProperty({
		node: "conteudo", 
		duration: 100,  
		properties: {
			opacity: 0,
			} 
	}); 
var pag_on = dojo.animateProperty({ 
		node:"conteudo", 
		duration: 300,
		properties: {
			opacity: 1,
		}	
	});
var menu1_width = dojo.style("menu1_img","width");
var menu1_height = dojo.style("menu1_img","height");
var menu1_open = dojo.animateProperty({
		node: "menu1_frame", 
		duration: 100,  
		properties: {
                        opacity: 1,
                        top: (offset + height - menu1_height),
                        left: 10,
                        "z-index": 2001,
                        visibility: "visible",
                        }
	}); 
var menu2_width = dojo.style("menu2_img", "width");
var menu2_height = dojo.style("menu2_img","height");
var menu2_open = dojo.animateProperty({
		node: "menu2_frame", 
		duration: 200,  
		properties: {
                        top:  (offset + height - menu2_height),
                        left: (10 + menu1_width),
                        visibility: "visible",
                        opacity: 1,
                        } 
	}); 
var menu3_width = dojo.style("menu3_img","width");
var menu3_height = dojo.style("menu3_img","height");
var menu3_open = dojo.animateProperty({
		node: "menu3_frame", 
		duration: 300,  
		properties: {
                        top: (offset + height - menu3_height),
                        left: (10 + menu1_width + menu2_width),
                        visibility: "visible",
                        opacity: 1,
                        } 
	}); 
var menu4_width = dojo.style("menu4_img","width");
var menu4_height = dojo.style("menu4_img","height");
var menu4_open = dojo.animateProperty({
		node: "menu4_frame", 
		duration: 400,  
		properties: {
                        top:offset + height - menu4_height, 
                        left: (10 + menu1_width + menu2_width + menu3_width),
                         visibility: "visible",
                        opacity: 1,
                        } 
	}); 
var menu5_width = dojo.style("menu5_img","width");
var menu5_height = dojo.style("menu5_img","height");
var menu5_open = dojo.animateProperty({
		node: "menu5_frame", 
		duration: 500,  
		properties: {
                        top: offset + height - menu5_height,
                        left: (10 + menu1_width + menu2_width + menu3_width + menu4_width),
                         visibility: "visible",
                        opacity: 1,
                        } 
	}); 
var menu6_width = dojo.style("menu6_img","width");
var menu6_height = dojo.style("menu6_img","height");
var menu6_open = dojo.animateProperty({
		node: "menu6_frame", 
		duration: 600,  
		properties: {
                        top: offset + height - menu6_height,
                        left: (10 + menu1_width + menu2_width + menu3_width + menu4_width + menu5_width),
                        visibility: "visible",
                        opacity: 1,
                        } 
	}); 

var menus_open = dojo.fx.chain(
      [
      menu1_open,
      menu2_open,
      menu3_open,
      menu4_open,
      menu5_open,
      menu6_open,
      ]);


var pag_to_left = dojo.animateProperty({ 
		node:"conteudo", 
		duration: 300,
		properties: {
			opacity: 1,
			left: 540,
			top: 90
		}	
	});



var telaPrincipal = dojo.fx.chain(
      [
      pag_to_left,
      header_on,
      footer_on,
      logo_on,
      ]);


// o ajax
function loadText(fragmentURL,nodeName){
   dojo.xhrGet( {
     url: fragmentURL,
     handleAs: "text",
     preventCache: true,
     load: function(response){ dojo.byId(nodeName).innerHTML = response; }
   });
}



// O controler

// Menu
function quem(){
    //alert("Em breve na ecooe!");
}
function conceito(){
    //alert("Em breve!");
}
function blog(){
    //alert("Em breve!");
}
function produtos(){
    //alert("Em breve!");
}
function dicas(){
    //alert("Em breve!");
}
function email(){
    //alert("Em breve!");
}

  // Animations
var currentAnimation;
function doAnimation(index) {
  if(currentAnimation && currentAnimation.status() != "stopped"){
      console.log("Animacao em andamento!");
    return;//do not interrupt a running animation
  }
  
  console.log("doAnimation " + index);
  switch(index) {
     case 0: // clicou Entrar no splash
        currentAnimation = dojo.fx.chain(
        [
        pag_off,
        splash_off,
        telaPrincipal,
        menus_open,
        pag_on,
        ]);
        loadText('index.php?ws=get&c=conteudo&id=1','conteudo')
        break;
  
     default:
        alert ("Em breve!");
  }

  if (currentAnimation) {
    //Play the animation. Without this call, it will not run.
    dojo.connect(currentAnimation, "onEnd", function(){
      currentAnimation = null;
    });
    currentAnimation.play();
  }
}

function pauseAnimation(){
  if(currentAnimation && currentAnimation.status() == "playing"){
    currentAnimation.pause();
  }
}

function resumeAnimation(){
  if(currentAnimation && currentAnimation.status() == "paused"){
    currentAnimation.play();
  }
}


