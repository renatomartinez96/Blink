// BLOQUEAR LECCIÓN -- PARTE 1
function dropless(revid, revname, revstatus)
{
//    var changes = $(this).attr("actual-id");
    $.ajax({
              method: "POST",
              url: "dropLess.php",
              data: {revid: revid, revname: revname, revstatus: revstatus},
              beforeSend: function() {
              },
              success: function(data) {
                  document.getElementById('signal').innerHTML = data;
                  //changes.addClass("changes-done");
              }
    });
}
// / BLOQUEAR LECCIÓN -- PARTE 1

// EDITAR LECCIÓN -- PARTE 1
function editless(revid, revname, revdesc, revteo)
{
    $.ajax({
              method: "POST",
              url: "editLess.php",
              data: {revid: revid, revname: revname, revdesc: revdesc, revteo: revteo},
              beforeSend: function() {
              },
              success: function(data) {
                  document.getElementById('signal').innerHTML = data;
              }
    });
}
// / EDITAR LECCIÓN -- PARTE 1

// BLOQUEAR LECCIÓN -- PARTE 2
$(".dropless").click(function() {
    var envioid = $(this).attr("actual-id");
    var envionombre = $(this).attr("actual-name");
    var envioestado = $(this).attr("actual-status");

    bootbox.dialog({
        title: "<h4 class='text-warning'>¿Estas seguro de bloquear la lección <strong>&quot;"+envionombre+"&quot;</strong>?</h4>",
        message: "Tus estudiantes no podran completar las leccion, a menos que la actives de nuevo. Además que se reducira la cantidad de lecciones para promediar la nota.",
        buttons: {
            main: {
                label: "<?=$langprint['btn-cancel']?>",
                className: "btn-default",
                callback: function() {
                    // Se cancela :v
                }
            },
            danger: {
                label: "Bloquear la lección",
                className: "btn-primary",
                callback: function() {
                    dropless(envioid, envionombre, envioestado);
                }
            }
        }
    });
});
// / BLOQUEAR LECCIÓN -- PARTE 2

// EDITAR LECCIÓN -- PARTE 2
$(".editless").click(function() {
    var sendid = $(this).attr("actual-id");
    var sendname = $(this).attr("actual-name");
    var senddesc = $(this).attr("actual-desc");
    var sendteo = $(this).attr("actual-teo");

    bootbox.dialog({
        title: "<h4>Editar la lección <strong>&quot;"+sendname+"&quot;</strong></h4>",
        message: "<div class='row'>" +
                    "<div class='col-md-12'> " +
                    "<form class='form-horizontal'> " +
                        "<div class='form-group'> " +
                            "<label class='col-md-4 control-label' for='name'>Nombre</label> " +
                            "<div class='col-md-6'> " +
                                "<input id='newname' name='newname' type='text' value='" + sendname + "' class='form-control input-md'> " +
                            "</div>" +
                        "</div> " +
                        "<div class='form-group'> " +
                            "<label class='col-md-4 control-label' for='newdesc'>Descripción</label> " +
                            "<div class='col-md-6'> " +
                                "<textarea class='form-control' style='resize: vertical;' name='newdesc' id='newdesc' rows='3'>" + senddesc + "</textarea> " +
                            "</div>" +
                        "</div> " +
                        "<div class='form-group'> " +
                            "<label class='col-md-4 control-label' for='newteo'>Introducción teorica</label> " +
                            "<div class='col-md-6'> " +
                                "<textarea class='form-control' style='resize: vertical;' name='newteo' id='newteo' rows='3'>" + sendteo + "</textarea> " +
                            "</div>" +
                        "</div> " +
                    "</form>" +
                    "</div>" +
                "</div>",
        buttons: {
            main: {
                label: "<?=$langprint['btn-cancel']?>",
                className: "btn-default",
                callback: function() {
                    // Se cancela :v
                }
            },
            danger: {
                label: "Guardar los cambios",
                className: "btn-success",
                callback: function() {
                    var newname = $("#newname").val();
                    var newdesc = $("#newdesc").val();
                    var newteo = $("#newteo").val();
                    editless(sendid, newname, newdesc, newteo);
                }
            }
        }
    });
});

// / EDITAR LECCIÓN -- PARTE 2

// MÁS INFORMACIÓN ACERCA DE LA LECCIÓN
$(".moreabout").click(function (){
    var sendid = $(this).attr("actual-id");
    var sendname = $(this).attr("actual-name");
    var senddesc = $(this).attr("actual-desc");
    var sendteo = $(this).attr("actual-teo");
    bootbox.dialog({
        title: "<h4>Información de la lección: <strong>&quot;"+sendname+"&quot;</strong></h4>",
        message: "<p><strong>Nombre: </strong><br>"+sendname+"</p><p><strong>Descripción: </strong><br>"+senddesc+"</p><p><strong>Introducción teorica: </strong><br>"+sendteo+"</p>",
        buttons: {
            success: {
            label: "OK",
            className: "btn-success",
            callback: function() {
                //nada :v
                }
            }
        }
    });
});
// / MÁS INFORMACIÓN ACERCA DE LA LECCIÓN