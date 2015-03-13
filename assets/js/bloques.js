$(document).ready(function() {
        
        var IdObjeto = "";
        var BloqueCreado = "";
        var EtiquetaCreada = "";
        var IddeInserssion = "";
        var IddeInserssionAtriSty = "";
        var IdObjetoCreadoUnico = -1;
        var tipodeObjeto = "";
        var idAtributoactual = "";
        var IdObjetosupperior = "";
        var porpiedadCSSCreada = "";
        //cuandoagarroelobjeto
        $( ".htmlMain" ).draggable({revert: true,cursor: "move", cursorAt: { top: -5, left: -5 }, containment: ".HTMLgenerator", scroll: false,drag: function() {
             IdObjeto = $(this).attr('id');
      }, });
        
        //cuandosueltoelobjeto
                //arrays
                 var WebObjecsArray = ["div$0","h1$1","p$1","b$2","div$2","a$2","img$1","href$3","src$3","name$3","background-color$4"];
                 var WebBlocksArray = ["<div id='' class='col-xs-2 htmlParts yellow uno'><p>BODY</p></div>",
                              "<div id='' class='col-xs-3 htmlParts green withauto dos'><p>HEADER</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                              "<div id='' class='col-xs-3 htmlParts green withauto dos'><p>PARAGRAPH</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                               "<div id='' class='col-xs-3 htmlParts green withauto uno'><p>BOLD</p></div>",
                                "<div id='' class='col-xs-3 htmlParts green withauto uno'><p>DIVITION</p></div>",
                                "<div id='' class='col-xs-3 htmlParts green withauto uno'><p>LINK</p></div>",
                                "<div id='' class='col-xs-3 htmlParts green withauto uno'><p>IMAGE</p></div>",
                                 "<div id='' class='col-xs-3 htmlPartsAtriSty orange withauto dos'><p>HREF</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                                "<div id='' class='col-xs-3 htmlPartsAtriSty orange withauto dos'><p>SRC</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                                 "<div id='' class='col-xs-3 htmlPartsAtriSty orange withauto dos'><p>NAME</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                                      "<div id='' class='col-xs-3 htmlPartsAtriSty royal withauto dos'><p>BGCOLOR</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>"];
                var FinalString = "";
        //funciones segundarias
                function inputText() {
                     $('.textinp').on('input', function() {
                     var valor = $(this).val();
                     var IdObjetoTexto = $(this).parent().parent().attr('id');
                         
                    if (idAtributoactual == "3") {
                        var addou = WebObjecsArray[IdObjetosupperior];
                        var numerouno = addou.indexOf("$");
                        var nombre = addou.substr(0,numerouno);
                        $("#A"+IddeInserssionAtriSty).attr(nombre, valor);
                    }else if (idAtributoactual == "4") {
                        alert("hola");
                    }else {
                        $("#A"+IdObjetoTexto).text(valor);
                    }
                });   
                }
                function remover() {
                        $( ".htmlMain" ).draggable({revert: true});
                        $("#"+IdObjeto).remove();
                } 
                function createAtribute(nombre) {
                    $("#A"+IddeInserssion).attr(nombre,"");
                    var bloqueString = WebBlocksArray[IdObjeto];
                    var numerotres = bloqueString.indexOf("id=''");
                    var Bloque = bloqueString.substr(0, numerotres+4) +"B"+ IdObjetoCreadoUnico +"T"+ tipodeObjeto +"O"+IdObjeto+ bloqueString.substr(numerotres+4);
                    BloqueCreado = Bloque;
                    $("#"+IddeInserssion).append(BloqueCreado);
                }
                
        //funciones primarias
                
                function createCSS(nombre) {
                    var propiedad = nombre + ":green;";
                    porpiedadCSSCreada = propiedad;
                    var bloqueString = WebBlocksArray[IdObjeto];
                    var numerotres = bloqueString.indexOf("id=''");
                    var Bloque = bloqueString.substr(0, numerotres+4) +"B"+ IdObjetoCreadoUnico +"T"+ tipodeObjeto +"O"+IdObjeto+ bloqueString.substr(numerotres+4);
                    BloqueCreado = Bloque;
                    $("#"+IddeInserssion).append(BloqueCreado);
                }
                function getParameterTres() {
                    $( ".htmlPartsAtriSty" ).mouseenter(function() {
                         var IddeInserssionAtriStytemp = "";
                         IddeInserssionAtriStytemp = $(this).attr('id');
                         var tipoindex = IddeInserssionAtriStytemp.indexOf("T");
                        var idIndex = IddeInserssionAtriStytemp.indexOf("O");
                         var tipoedito = IddeInserssionAtriStytemp.substr(tipoindex + 1,IddeInserssionAtriStytemp.length - idIndex - 1);
                        var idObjeto = IddeInserssionAtriStytemp.substr(idIndex + 1);
                        idAtributoactual = tipoedito;
                        IdObjetosupperior = idObjeto;
                         $(this).addClass("arriba");
                    
                     })
                    .mouseleave(function() {
                        $(this).removeClass("arriba");
                    });
                } 
                function getParameterDos() {
                    $( ".htmlParts" ).mouseenter(function() {
                         IddeInserssionAtriSty = $(this).attr('id');
                         var tipoindex = IddeInserssionAtriSty.indexOf("T");
                        var idIndex = IddeInserssionAtriSty.indexOf("O");
                         var tipoedito = IddeInserssionAtriSty.substr(tipoindex + 1,IddeInserssionAtriSty.length - idIndex - 1);
                        var idObjeto = IddeInserssionAtriSty.substr(idIndex + 1);
                        idAtributoactual = tipoedito;
                        IdObjetosupperior = idObjeto;
                         $(this).addClass("arriba2");
                    
                     })
                    .mouseleave(function() {
                        $(this).removeClass("arriba2");
                    });
                }
                function getParameter() {
                    $( ".uno" ).mouseenter(function() {
                         IddeInserssion = $(this).attr('id');
                         $(this).addClass("arriba");
                    
                     })
                    .mouseleave(function() {
                        $(this).removeClass("arriba");
                    });
                }
                function procesDos() {
                    $("#"+IddeInserssion).append(BloqueCreado);
                    $("#A"+IddeInserssion).append(EtiquetaCreada);
                }
                function procesTres() {
//                    var IndexDeId = FinalString.indexOf(IddeInserssion);
//                    var numerocuatro = IddeInserssion.length;
//                    var partido = FinalString.substr(0, IndexDeId+numerocuatro + 2) + EtiquetaCreada + FinalString.substr(IndexDeId+numerocuatro + 2);
//                    FinalString = partido;
                    $("#"+IddeInserssion).append(BloqueCreado);
                    //$(".yourSite").html("");
                    $("#A"+IddeInserssion).append(EtiquetaCreada);
                }
                function procesUno() {
                    
                    $(".playground").append(BloqueCreado);
                    
                    $(".yourSite").append(EtiquetaCreada);
                }
                function createObjects(nombre) {
                    var etiqueta = "<"+nombre+" id='"+"AB"+IdObjetoCreadoUnico+ "T" +tipodeObjeto+"O"+IdObjeto+"'>"+"</"+nombre+">";
                    var bloqueString = WebBlocksArray[IdObjeto];
                    var numerotres = bloqueString.indexOf("id=''");
                    var Bloque = bloqueString.substr(0, numerotres+4) +"B"+ IdObjetoCreadoUnico +"T"+tipodeObjeto + "O"+IdObjeto+ bloqueString.substr(numerotres+4);
                    BloqueCreado = Bloque;
                    EtiquetaCreada = etiqueta;
                }
                function identifie() {
                    var addou = WebObjecsArray[IdObjeto];
                    var numerouno = addou.indexOf("$");
                    var nombre = addou.substr(0,numerouno);
                    var numerodos = addou.length;
                    var tipo = addou.substr(numerouno + 1,numerodos);
                    tipodeObjeto = tipo;
                    switch (tipo) {
                        case "0":
                               //alert("tipo 1");
                               remover();
                               createObjects(nombre);
                               procesUno();
                            break;
                        case "1":
                               //alert("tipo 2");
                                createObjects(nombre);
                                procesDos();
                            break;
                        case "2":
                               createObjects(nombre);
                               procesTres();
                            break;
                        case "3":
                               createAtribute(nombre);
                             break;
                        case "4":
                               createCSS(nombre);
                             break;
                    }
                    
                }
              $( ".playground" ).droppable({
                    drop: function( event, ui ) {
                        
                        identifie();
                        getParameter();
                        getParameterDos();
                        getParameterTres();
                        IdObjetoCreadoUnico--;
                        inputText();
                }
    });  
            
});

//barra de navegacion
