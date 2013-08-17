 
function muestracapa(capa, archivo,mensaje) 
{
var content = $("#"+capa);
content.slideUp();
  content.html("<div class='letras'><img src='images/wait3.gif' style='display:inline'>&nbsp;"+mensaje+"</div>");
  content.load(archivo);
  content.slideDown();
  content.fadeTo(0, 1000);
} 
 
 
 
 
 