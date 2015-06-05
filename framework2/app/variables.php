
        var IdObjeto = "";
        var BloqueCreado = "";
        var EtiquetaCreada = "";
        var IddeInserssion = "";
        var IddeInserssiondos = "";
        var IddeInserssionAtriSty = "";
        var IdObjetoCreadoUnico = -1;
        var tipodeObjeto = "";
        var idAtributoactual = "";
        var IdObjetosupperior = "";
        var porpiedadCSSCreada = "";
        var momentoTo = 0;
        var historial = [];
        var estadoLec = 0;
        var fechaInicioD = ""; 
        var WebObjecsArray = ["div$0","h1$1","p$1","b$2","div$2","a$2","img$1","href$3","src$3","name$3","background-color$4","margin-left$4","width$4","height$4","del$5","margin-right$4","color$4","font-size$4","delete$5","table$2","tr$2","th$2","td$2","border$4"];
        //console.log("uno "+WebObjecsArray.length);
        var WebBlocksArray = ["<div id='' class='col-xs-3 col-lg-2 htmlParts yellow uno'><p>BODY</p></div>",
                              "<div id='' class='col-xs-3 htmlParts green withauto dos'><div class='col-xs-2'><button class='btn btn-sm'><i class='fa fa-info'></i></button></div><div class='col-xs-8'><p>TITLE</p></div><div class='col-xs-2'><button class='btn btn-sm'><i class='fa fa-plus-square'></i></button></div><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                              "<div id='' class='col-xs-3 htmlParts green withauto dos'><p>PARAGRAPH</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                                "<div id='' class='col-xs-3 htmlParts green withauto uno'><p>BOLD</p></div>",
                                "<div id='' class='col-xs-3 htmlParts green withauto uno'><p>DIVITION</p></div>",
                                "<div id='' class='col-xs-3 htmlParts green withauto uno'><p>LINK</p></div>",
                                "<div id='' class='col-xs-3 htmlParts green withauto uno'><p>IMAGE</p></div>",
                                 "<div id='' class='col-xs-3 htmlPartsAtriSty orange withauto dos'><p>HREF</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                                "<div id='' class='col-xs-3 htmlPartsAtriSty orange withauto dos'><p>SRC</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                                 "<div id='' class='col-xs-3 htmlPartsAtriSty orange withauto dos'><p>NAME</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                                      "<div id='' class='col-xs-3 htmlPartsAtriSty royal withauto dos'><p>BGCOLOR</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                                      "<div id='' class='col-xs-3 htmlPartsAtriSty royal withauto dos'><p>MARGIN-LEFT</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                                      "<div id='' class='col-xs-3 htmlPartsAtriSty royal withauto dos'><p>WIDTH</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                                       "<div id='' class='col-xs-3 htmlPartsAtriSty royal withauto dos'><p>HEIGHT</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                                        "",
                                        "<div id='' class='col-xs-3 htmlPartsAtriSty royal withauto dos'><p>MARGIN-RIGHT</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                                        "<div id='' class='col-xs-3 htmlPartsAtriSty royal withauto dos'><p>COLOR</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                                        "<div id='' class='col-xs-3 htmlPartsAtriSty royal withauto dos'><p>FONT-SIZE</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                              "",
                             "<div id='' class='col-xs-3 htmlParts green withauto uno'><p>TABLE</p></div>",
                             "<div id='' class='col-xs-3 htmlParts green withauto uno'><p>T ROW</p></div>",
                             "<div id='' class='col-xs-3 htmlParts green withauto uno'><p>T HEAD</p></div>",
                                "<div id='' class='col-xs-3 htmlParts green withauto uno'><p>T CELL</p></div>",
                              "<div id='' class='col-xs-3 htmlPartsAtriSty royal withauto dos'><p>BORDER</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>"];
        //console.log("dos "+WebBlocksArray.length);
        var FinalString = "";
