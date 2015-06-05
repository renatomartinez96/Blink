function append() {
    $(".playground").append(theBox['bloqueC']);
    $(".yourSite").append(theBox['etiquetaC']);
}

function createHTML(tag,blq) {
    theBox['etiquetaC'] = "<"+tag+" id='A"+idF+"'>"+"</"+tag+">";
    theBox['bloqueC'] = blq.substr(0, blq.indexOf("id=''")+4) +"B"+ idF + blq.substr(blq.indexOf("id=''")+4);
    theBox['Id'] = "B"+ idF;
}
function identificar() {
    theBox['tipo'] = WebObjecsArray[IdObjeto].substr(0,WebObjecsArray[IdObjeto].indexOf("-$%#%&-"));
    var etiqueta = WebObjecsArray[IdObjeto].substr(theBox['tipo'].length + 7,WebObjecsArray[IdObjeto].indexOf("-$%#%&-",theBox['tipo'].length + 7) - 8);
    var bloque = WebObjecsArray[IdObjeto].substr(theBox['tipo'].length + etiqueta.length + 14,WebObjecsArray[IdObjeto].length);
    switch (theBox['tipo']) {
        case "0":
            createHTML(etiqueta,bloque);
            append();
            dropable();
        break;
    }
}
$( ".htmlMain" ).draggable({revert: true,cursor: "move", cursorAt: { top: -5, left: -5 }, containment: ".HTMLgenerator", scroll: false,drag: function() {
             IdObjeto = $(this).attr('id');
      }, });