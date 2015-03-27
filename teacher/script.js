$(document).ready(function() {
    function loadCursos() {
    $(".results").html("");
    $.ajax({
          method: "POST",
          url: "loadCur.php",
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
    function event() {
        $(".loadLessons").click(function() {
            var idcursi = $(this).attr('id');
            $(".results").html("");
            $.ajax({
                  method: "POST",
                  url: "loadLes.php",
                  data: { idcurso: idcursi},
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
        $(".backhome").click(function() {
            loadCursos();
         });
    }
});
