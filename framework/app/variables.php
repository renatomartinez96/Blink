
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
        var WebBlocksArray = ["<div id='' class='col-xs-3 col-lg-3 text-center yellow outoff fullo bg-primary U D A'><h4>BODY</h4></div>",
                              "<div id='' class='col-xs-3 htmlParts green withauto D A'><p>TITLE</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                              "<div id='' class='col-sm-10 col-sm-offset-1 fullo bg-primary D A'><div class='col-xs-12 full text-center'><h4>PARAGRAPH</h4></div><div class='col-xs-12 full'><textarea class='form-control input-sm T' style='resize: vertical;' rows='3'></textarea></div><div class='col-xs-12 full' style='padding-top:5px;padding-bottom:5px;'><div class='col-xs-4 text-center'></div><div class='col-xs-4 text-center'><a id='export' href='#' class='btn btn-primary P' data-toggle='popover' tabindex='0' data-trigger='focus' data-html='true' title='HTML code' data-content='<h1>Works!</h1><h6>Kind of</h6>' data-placement='top'><i class='fa fa-info'></i></a></div><div class='col-xs-4 text-center'></div></div></div>",
                               "<div id='' class='col-xs-3 htmlParts green withauto uno'><p>BOLD</p></div>",
                                "<div id='' class='col-xs-3 htmlParts green withauto uno'><p>DIVITION</p></div>",
                                "<div id='' class='col-xs-3 htmlParts green withauto uno'><p>LINK</p></div>",
                                "<div id='' class='col-xs-3 htmlParts green withauto uno'><p>IMAGE</p></div>",
                                 "<div id='' class='col-xs-3 htmlPartsAtriSty orange withauto dos'><p>HREF</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                                "<div id='' class='col-xs-3 htmlPartsAtriSty orange withauto dos'><p>SRC</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                                 "<div id='' class='col-xs-3 htmlPartsAtriSty orange withauto dos'><p>NAME</p><div class='form-group'><input type='text' class='form-control textinp'></div></div>",
                                      "<div id='' class='col-xs-10 col-sm-offset-1 fullo bg-info'><div class='col-xs-12 full text-center'><h4>BGCOLOR</h4></div> <div class='input-group inColor'><input type='text' value='#ffffff' class='form-control colorpicker-element T' maxlength='7' data-format='hex'/><span class='input-group-addon'><i></i></span></div></div>",
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
