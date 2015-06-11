function remover() {
    $( ".htmlMain" ).draggable({revert: true});
    $("#"+IdObjeto).fadeOut(1);
}
function append(play,html) {
    $(play).append(theBox['bloqueC']);
    $(html).append(theBox['etiquetaC']);
    $("#"+theBox['Idb']).addClass("animated");
    $("#"+theBox['Idb']).addClass("bounceIn");
}
function focus(id) {
    $(".playground .A").each(function(){
             $(this).removeClass("inoff");
         });
        $("#"+id).addClass("inoff");
}
function eventos() {
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
        console.log("frf");   
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
}
function createHTML(tag,blq) {
    theBox['etiquetaC'] = "<"+tag+" id='A"+idF+"'>"+"</"+tag+">";
    theBox['bloqueC'] = blq.substr(0, blq.indexOf("id=''")+4) +"B"+ idF + blq.substr(blq.indexOf("id=''")+4);
    theBox['Idb'] = "B"+ idF;
    theBox['Ida'] = "A"+ idF;
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
            append("#"+theBox['U'],"#"+theBox['U']);
        break;
        case "2":
            createHTML(etiqueta,bloque);
            append("#"+theBox['U'],"#"+theBox['U']);
        break;
    }
    idF++;
    eventos();
}
$( ".htmlMain" ).draggable({revert: true,cursor: "move", cursorAt: { top: -5, left: -5 }, containment: ".HTMLgenerator", scroll: false,drag: function() {
             IdObjeto = $(this).attr('id');
      }, });