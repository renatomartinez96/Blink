$(document).ready(function() {
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
                  }
            });
        });
    }
});
