$(document).ready(function() {
     var usuario = "<?php echo $user; ?>";
     var usuarioid = "<?php echo $userid; ?>";
     var tipo = "<?php echo $tipo; ?>";
    
    // no hace submit D:
    
    // / no hace submit D:
    
    function loadCursos() {
    $(".results").html("");
   
    $.ajax({
          method: "POST",
          url: "loadCur.php",
          data: { usuario: usuario,usuarioid: usuarioid,tipo: tipo},
          beforeSend: function() {
            $(".loading").css('display','block');
          },
          success: function(data) {
            $(".loading").css('display','none');
            $(".results").html(data);
            event();
          }
    });
    }

    $(".createCou").click(function() {
            var nombre = $(".nameCur").val();
            var decrip = $(".descripCur").val();
            $.ajax({
                  method: "POST",
                  url: "crearCur.php",
                  data: {usuario: usuario,usuarioid: usuarioid,tipo: tipo,nombre: nombre,descrip:decrip},
                  beforeSend: function() {
                    $(".loading").css('display','block');
                  },
                  success: function(data) {
                    $(".loading").css('display','none');
                    $('#modalDesc').modal('hide');
                    $(".nameCur").val("");
                    $(".descripCur").val("");
                    loadCursos();  
                  }
            });
            
         });
    function dropCur(codigo, curnombre)
    {
        $.ajax({
                  method: "POST",
                  url: "dropCur.php",
                  data: {codigo: codigo, curnombre: curnombre},
                  beforeSend: function() {
                  },
                  success: function(data) {
                      document.getElementById('signal').innerHTML = data;
                  }
        });
    } 
    function editCur(editid, editnombre, editdesc)
    {
        $.ajax({
                  method: "POST",
                  url: "editCur.php",
                  data: {editid: editid, editnombre: editnombre, editdesc: editdesc},
                  beforeSend: function() {
                  },
                  success: function(data) {
                      document.getElementById('signal').innerHTML = data;
                  }
        });
    }    
    function event() {
        
        $(".editcur").click(function() {
            var curid = $(this).attr("valid");
            var ocurnombre = $(this).attr("valname");
            var ocurdesc = $(this).attr("valdesc");

            bootbox.dialog({
                title: "Editar el curso "+ocurnombre+".",
                message: "<div class='row'>" +
                            "<div class='col-md-12'> " +
                            "<form class='form-horizontal'> " +
                                "<div class='form-group'> " +
                                    "<label class='col-md-4 control-label' for='name'>Nombre</label> " +
                                    "<div class='col-md-6'> " +
                                        "<input id='newname' name='newname' type='text' value='" + ocurnombre + "' class='form-control input-md'> " +
                                    "</div>" +
                                "</div> " +
                                "<div class='form-group'> " +
                                    "<label class='col-md-4 control-label' for='name'>Descripción</label> " +
                                    "<div class='col-md-6'> " +
                                        "<textarea class='form-control' style='resize: vertical;' name='newdesc' id='newdesc' rows='3'>" + ocurdesc + "</textarea> " +
                                    "</div>" +
                                "</div> " +
                            "</form>" +
                            "</div>" +
                        "</div>",
                buttons: {
                    main: {
                        label: "Cancelar",
                        className: "btn-default",
                        callback: function() {
                            // Se cancela :v
                        }
                    },
                    success: {
                        label: "Guardar cambios",
                        className: "btn-success",
                        callback: function() {
                            var curnombre = $("#newname").val();
                            var curdesc = $("#newdesc").val();
                            editCur(curid, curnombre, curdesc);
                        }
                    }
                }
            });

        });
        
        // BLOQUEAR UN CURSO abajo
        $(".dropcur").click(function() {
            var envio = $(this).attr("id");
            var envionombre = $(this).attr("curnombre");
            
            bootbox.dialog({
                title: "<h4 class='text-warning'>¿Estas seguro de bloquear el curso <strong>&quot;"+envionombre+"&quot;</strong>?</h4>",
                message: "Tus estudiantes no podran completar las lecciones que este curso contiene, a menos que la actives de nuevo.",
                buttons: {
                    main: {
                        label: "Cancelar",
                        className: "btn-default",
                        callback: function() {
                            // Se cancela :v
                        }
                    },
                    danger: {
                        label: "Bloquear el curso",
                        className: "btn-primary",
                        callback: function() {
                            dropCur(envio, envionombre);
                        }
                    }
                }
            });

            
        });
         $(".botoncrear").click(function() {
            $('#modalDesc').modal('toggle');
         });
        $(".botoncrearLe").click(function() {
            $('#modalLes').modal('toggle');
         });
        $(".backhome").click(function() {
            loadCursos();
         });
        
 
    }