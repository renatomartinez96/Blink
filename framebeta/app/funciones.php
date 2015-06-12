 function remover() {
    $( ".htmlMain" ).draggable({revert: true});
    $("#"+IdObjeto).fadeOut(1);
}
function changeText(id,text) {
    $("#A"+id.substr(1,id.length)).text(text);
}
function append(play,html) {
    $(play).append(theBox['bloqueC']);
    $(html).append(theBox['etiquetaC']);
    $("#"+theBox['Idb']).addClass("animated");
    $("#"+theBox['Idb']).addClass("bounceIn");
}
function changeATR(id,text,atr) {
    $("#A"+id.substr(1,id.length)).css(atr,text);
}
function focus(id) {
    $(".playground .A").each(function(){
             $(this).removeClass("inoff");
         });
        $("#"+id).addClass("inoff");
}
function closePop() {
     $(".playground .popover").each(function(){
             $(this).popover('hide');
         });
}
function eventos() {
    $('[data-toggle="popover"]').popover({template: '<div class="popover" role="tooltip" style="width: 15vw;"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"><div class="data-content"></div></div></div>',trigger:"manual"});  
    $( ".U" ).on('mouseenter',function() {
        theBox['U'] = $(this).attr('id');
     })
    .on('mouseleave',function() {
        theBox['U'] = 0;
    });
    $( ".D" ).on('mouseenter',function() {
        theBox['D'] = $(this).attr('id');
     })
    .on('mouseleave',function() {
        theBox['D'] = 0;
    });
    $( ".A" ).on('mouseenter',function() {
        theBox['A'] = $(this).attr('id');
        focus(theBox['A']);
     })
    .on('mouseleave',function() {
        theBox['A'] = $(this).attr('id');
        focus(theBox['A']);
    });
    $(".T").on('input', function() {
        changeText($(this).parent().parent().attr('id'),$(this).val());  
    });
    $(".C").on('input', function() { 
    var C = $(this).parent().parent().attr('id').substr($(this).parent().parent().attr('id').indexOf("0"),$(this).parent().parent().attr('id').length);
 changeATR($(this).parent().parent().parent().parent().parent().parent().parent().attr('id'),$(this).val(),WebObjecsArray[C].substr(WebObjecsArray[C].substr(0,WebObjecsArray[C].indexOf("-$%#%&-")).length + 7,WebObjecsArray[C].indexOf("-$%#%&-",WebObjecsArray[C].substr(0,WebObjecsArray[C].indexOf("-$%#%&-")).length + 7) - 8));  
    });
    $(".P").on('click', function() {
        //closePop();
        $(this).popover('toggle');
    });
}
function eventosOff() {
     $('.U').off("mouseenter");
     $('.U').off("mouseleave");
     $('.D').off("mouseenter");
     $('.D').off("mouseleave");
     $('.A').off("mouseenter");
     $('.A').off("mouseleave");
     $(".T").off("input");
     $(".C").off("input");
     $(".P").off("click");

}
function createHTML(tag,blq) {
    theBox['etiquetaC'] = "<"+tag+" id='A"+idF+"'>"+"</"+tag+">";
    theBox['bloqueC'] = blq.substr(0, blq.indexOf("id=''")+4) +"B"+ idF + blq.substr(blq.indexOf("id=''")+4);
    theBox['Idb'] = "B"+ idF;
    theBox['Ida'] = "A"+ idF;
}
function createCSS(tag,blq) {
    $("#A"+theBox['D'].substr(1,theBox['D'].length)).css(tag,"inherit");
    theBox['bloqueC'] = blq.substr(0, blq.indexOf("id=''")+4) +"B"+ idF + "O" + IdObjeto + blq.substr(blq.indexOf("id=''")+4);
    
    theBox['Idb'] = "B"+ idF;
    theBox['Ida'] = "A"+ idF;
}
function appendExtr(id,tipo) {
       if(tipo == "CSS") {
           $("#"+id).find("#CSS").attr("data-content",$("#"+id).find("#CSS").attr("data-content") + theBox['bloqueC']); 
           $("#"+id).find("#CSS").popover('show');
//           $("#"+id).find("#CSS").children().css("display","none")
       }
}
function identificar() {
    eventosOff();
    theBox['tipo'] = WebObjecsArray[IdObjeto].substr(0,WebObjecsArray[IdObjeto].indexOf("-$%#%&-"));
    var etiqueta = WebObjecsArray[IdObjeto].substr(theBox['tipo'].length + 7,WebObjecsArray[IdObjeto].indexOf("-$%#%&-",theBox['tipo'].length + 7) - 8);
    var bloque = WebObjecsArray[IdObjeto].substr(theBox['tipo'].length + etiqueta.length + 14,WebObjecsArray[IdObjeto].length);
    switch (theBox['tipo']) {
        case "0":
            remover();
            createHTML(etiqueta,bloque);
            append(".playground",".yourSite");
        break;
        case "1":
            createHTML(etiqueta,bloque);
            append("#"+theBox['U'],"#A"+theBox['U'].substr(1,theBox['U'].length));
        break;
        case "2":
            createHTML(etiqueta,bloque);
            append("#"+theBox['U'],"#A"+theBox['U'].substr(1,theBox['U'].length));
        break;
        case "3":
            createCSS(etiqueta,bloque); 
            appendExtr(theBox['D'],"CSS");
        break;
    }
    idF++;
    eventos();
}
 
$( ".htmlMain" ).draggable({revert: true,cursor: "move", cursorAt: { top: -5, left: -5 }, containment: ".HTMLgenerator", scroll: false,drag: function() {
             IdObjeto = $(this).attr('id');
      }, });