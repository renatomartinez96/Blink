$(document).ready(function() {
     var usuario = "<?php echo $user; ?>";
     var usuarioid = "<?php echo $userid; ?>";
     var tipo = "<?php echo $tipo; ?>";
    
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
    loadCursos();
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
    function loadLessons() {
        var idcursi = $(".botoncrearLe").attr('id');
            $(".results").html("");
            $.ajax({
                  method: "POST",
                  url: "loadLes.php",
                  data: {usuario: usuario,usuarioid: usuarioid,tipo: tipo,idcurso: idcursi},
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
    $(".createLes").click(function() {
            var nombre = $(".nameCur5").val();
            var decrip = $(".descripCur5").val();
            var teoria = $(".TeoCur").val();
            var idcursi = $(".botoncrearLe").attr('id');
            $.ajax({
                  method: "POST",
                  url: "crearLes.php",
                  data: {usuario: usuario,usuarioid: usuarioid,tipo: tipo,nombre: nombre,descrip:decrip,teoria:teoria,idcurso:idcursi},
                  beforeSend: function() {
                    $(".loading").css('display','block');
                  },
                  success: function(data) {
                    $(".loading").css('display','none');
                    $('#modalLes').modal('hide');
                    $(".nameCur").val("");
                    $(".descripCur").val("");
                    $(".TeoCur").val("");
                    $(".results").html(data);
                     
                  }
            });
            
         });
    
    function event() {
        $(".loadLessons").click(function() {
            var idcursi = $(this).attr('id');
            $(".results").html("");
            $.ajax({
                  method: "POST",
                  url: "loadLes.php",
                  data: {usuario: usuario,usuarioid: usuarioid,tipo: tipo,idcurso: idcursi},
                  beforeSend: function() {
                    $(".loading").css('display','block');
                  },
                  success: function(data) {
                    $(".loading").css('display','none');
                    $(".results").html(data);
                      event();
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
});
