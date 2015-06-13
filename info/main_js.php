<script src="../assets/js/jquery.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/bootbox.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery.easing.min.js"></script>
<script src="../assets/js/scrolling-wnav.js"></script>
<script>
    $(document).ready(function() {
        $( "body" ).scroll(function() {
          if ($(".navbar").offset().top >= $("#homevideo").offset().top &&  $(".navbar").offset().top < $("#about").offset().top ) 
          {
            $("#nav1").addClass("active");
            $("#nav2").removeClass("active");
            $("#nav3").removeClass("active");
            $("#nav4").removeClass("active");
          }
          if($(".navbar").offset().top >= $("#about").offset().top && $(".navbar").offset().top < $("#devs").offset().top )
          {
            $("#nav2").addClass("active");
            $("#nav1").removeClass("active");
            $("#nav3").removeClass("active");
            $("#nav4").removeClass("active");
          }
          if($(".navbar").offset().top >= $("#devs").offset().top && $(".navbar").offset().top < $("#contact").offset().top)
          {
            $("#nav3").addClass("active");
            $("#nav1").removeClass("active");
            $("#nav2").removeClass("active");
            $("#nav4").removeClass("active");
          }
          if($(".navbar").offset().top >= $("#contact").offset().top)
          {
            $("#nav4").addClass("active");
            $("#nav1").removeClass("active");
            $("#nav2").removeClass("active");
            $("#nav3").removeClass("active");
          }
        });
    }); 
</script>
