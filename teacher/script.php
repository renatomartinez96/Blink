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
    function event() {
        $(".dropcur").click(function() {
            var codigo = $(this).attr("id");
            $.ajax({
                  method: "POST",
                  url: "dropCur.php",
                  data: {codigo: codigo},
                  beforeSend: function() {
                      alert("¿Esta segurito beibi?");
                  },
                  success: function(data) {

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