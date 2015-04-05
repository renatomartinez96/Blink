
     function inputText() {
                     $('.textinp').off( "click");
                     $('.textinp').on('input', function() {
                     var valor = $(this).val();
                     var IdObjetoTexto = $(this).parent().parent().attr('id');
                     var IdObjetoTextoATR = $(this).parent().parent().parent().attr('id');
                    if (idAtributoactual == "3") {
                        var addou = WebObjecsArray[IdObjetosupperior];
                        var numerouno = addou.indexOf("$");
                        var nombre = addou.substr(0,numerouno);
                        $("#A"+IdObjetoTextoATR).attr(nombre, valor);
                    }else if (idAtributoactual == "4") {
                        var addou = WebObjecsArray[IdObjetosupperior];
                        var numerouno = addou.indexOf("$");
                        var nombre = addou.substr(0,numerouno);
                        $("#A"+IdObjetoTextoATR).css(nombre, valor);
                    }else {
                        $("#A"+IdObjetoTexto).text(valor);
                    }
                });   
                }
            function getParameterTres() {
                    $('.htmlPartsAtriSty').off( "mouseenter");
                    $('.htmlPartsAtriSty').off( "mouseleave");
                    $( ".htmlPartsAtriSty" ).on('mouseenter',function() {
                         var IddeInserssionAtriStytemp = "";
                         IddeInserssionAtriStytemp = $(this).attr('id');
                         var tipoindex = IddeInserssionAtriStytemp.indexOf("T");
                        var idIndex = IddeInserssionAtriStytemp.indexOf("O");
                         var idObjeto = IddeInserssionAtriStytemp.substr(idIndex + 1);
                         var tipoedito = IddeInserssionAtriStytemp.substr(tipoindex + 1,IddeInserssionAtriStytemp.length - idIndex - idObjeto.length);
                        idAtributoactual = tipoedito;
                        IdObjetosupperior = idObjeto;
                         $(this).addClass("arriba");
                    
                     })
                    .on('mouseleave',function() {
                        $(this).removeClass("arriba");
                    });
                } 
                function getParameterDos() {
//                    $('.htmlParts').off( "mouseenter");
//                    $('.htmlParts').off( "mouseleave");
                    $( ".htmlParts" ).on('mouseenter',function() {
                         IddeInserssionAtriSty = $(this).attr('id');
                        IddeInserssiondos = IddeInserssionAtriSty;
                         var tipoindex = IddeInserssionAtriSty.indexOf("T");
                        var idIndex = IddeInserssionAtriSty.indexOf("O");
                         var idObjeto = IddeInserssionAtriSty.substr(idIndex + 1);
                         var tipoedito = IddeInserssionAtriSty.substr(tipoindex + 1,IddeInserssionAtriSty.length - idIndex - idObjeto.length);
                        IdObjetosupperior = idObjeto;
                        idAtributoactual = tipoedito;
                         $(this).addClass("arriba2");
                    
                     })
                    .on('mouseleave',function() {
                        $(this).removeClass("arriba2");
                    });
                }
                function getParameter() {
                    $('.uno').off( "mouseenter");
                    $('.uno').off( "mouseleave");
                    $( ".uno" ).on('mouseenter',function() {
                         IddeInserssion = $(this).attr('id');
                         $(this).addClass("arriba");
                    
                     })
                    .on('mouseleave',function() {
                        $(this).removeClass("arriba");
                    });
                }
            
        //funciones costantes
            
        $( ".htmlMain" ).draggable({revert: true,cursor: "move", cursorAt: { top: -5, left: -5 }, containment: ".HTMLgenerator", scroll: false,drag: function() {
             IdObjeto = $(this).attr('id');
      }, });
        
                 
                
                function remover() {
                        $( ".htmlMain" ).draggable({revert: true});
                        $("#"+IdObjeto).remove();
                } 
                function createAtribute(nombre) {
                    $("#A"+IddeInserssiondos).attr(nombre,"");
                    var bloqueString = WebBlocksArray[IdObjeto];
                    var numerotres = bloqueString.indexOf("id=''");
                    var Bloque = bloqueString.substr(0, numerotres+4) +"B"+ IdObjetoCreadoUnico +"T"+ tipodeObjeto +"O"+IdObjeto+ bloqueString.substr(numerotres+4);
                    BloqueCreado = Bloque;
                    $("#"+IddeInserssiondos).append(BloqueCreado);
                }

                function createCSS(nombre) {
                     $("#A"+IddeInserssiondos).css(nombre,"");
                    var bloqueString = WebBlocksArray[IdObjeto];
                    var numerotres = bloqueString.indexOf("id=''");
                    var Bloque = bloqueString.substr(0, numerotres+4) +"B"+ IdObjetoCreadoUnico +"T"+ tipodeObjeto +"O"+IdObjeto+ bloqueString.substr(numerotres+4);
                    BloqueCreado = Bloque;
                    $("#"+IddeInserssiondos).append(BloqueCreado);
                }
                
                function procesDos() {
                    $("#"+IddeInserssion).append(BloqueCreado);
                    $("#A"+IddeInserssion).append(EtiquetaCreada);
                }
                function procesTres() {
                    $("#"+IddeInserssion).append(BloqueCreado);;
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
