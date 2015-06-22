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
                      document.getElementById('asdfgh').innerHTML = data;
                  }
        });
    }    
    function event() {
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