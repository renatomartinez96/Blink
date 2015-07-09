<script src="assets/js/jquery.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/bootbox.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/scrolling-wnav.js"></script>
<script>
    var jump=function(e)
    {
       //prevent the "normal" behaviour which would be a "hard" jump
       e.preventDefault();
       //Get the target
       var target = $(this).attr("href");

       //perform animated scrolling
       $('html,body').animate(
       {
               //get top-position of target-element and set it as scroll target
               scrollTop: $(target).offset().top
       //scrolldelay: 2 seconds
       },2000,function()
       {
               //attach the hash (#jumptarget) to the pageurl
               location.hash = target;
       });

    }

    $(document).ready(function()
    {
           $('a[href*=#]').bind("click", jump);
           return false;
    });
</script>
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
<script>
    $(document).ready(function(){
        $(".nav-open").click(function(e) {
			e.preventDefault();
            $("#navbar-box-link").toggleClass("toggled");
            $("#login_form").toggleClass("hidden");
            $("body").toggleClass("body_no_scroll");
            $("#nav-open1").toggleClass("hidden");
            $("#nav-open2").toggleClass("hidden");
        });
    });
</script>
<script>
	$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $("#avatar").toggleClass("toggled");
        $(".sidebar-nav").toggleClass("toggled");
        $(".textos").toggleClass("toggled");
	});
</script>
<script>
        $(document).ready(function(){
            function validateEmail($email) {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                return emailReg.test( $email );
            }
            $("#submtoken").click(function(){
                if($("#mail").val() == ''){
                    bootbox.alert({
                        title: "<center><h2 class='junction-bold'>Box Link</h2></center>",
                        message: "<center><h5 class='junction-light'>You must provide your email paddress</h5></center>",
                    });
                }else{
                    if(validateEmail($("#mail").val())) {
                        var send = {"email" : $("#mail").val()};
                        $.ajax({
                            type: "POST",
                            url: "mailpass.php",
                            data: send,
                            success: function(response) {
                                bootbox.alert({
                                    title: "<center><h2 class='junction-bold'>Box Link</h2></center>",
                                    message: "<center><h5 class='junction-light'>"+response+"</h5></center>",
                                });
                            }
                        });
                    }else{
                        bootbox.alert({
                            title: "<center><h2 class='junction-bold'>Box Link</h2></center>",
                            message: "<center><h5 class='junction-light'>You must provide a real Email address</h5></center>",
                        });
                    }
                }
            });
        });
</script>
<script>
//Valida que en un campo solo se puedan ingresar letras
//Sintaxis html= onkeypress="txtletras()"
function txtletras() {
    if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
        event.returnValue = false;
}
//Valida que en un campo solo se puedan ingresar letras
//Sintaxis html= onkeypress="txtnumeros()"
function txtnumeros() {
    if ((event.keyCode < 48) || (event.keyCode > 57)){
        event.returnValue = false;

    }
}
var patron = new Array(4,2,2)
function mascara(d,sep,pat,nums){
    if(d.valant != d.value){
        val = d.value
        largo = val.length
        val = val.split(sep)
        val2 = ''
        for(r=0;r<val.length;r++){
            val2 += val[r]
        }
        if(nums){
            for(z=0;z<val2.length;z++){
                if(isNaN(val2.charAt(z))){
                    letra = new RegExp(val2.charAt(z),"g")
		            val2 = val2.replace(letra,"")
		        }
            }
        }
        val = ''
        val3 = new Array()
        for(s=0; s<pat.length; s++){
            val3[s] = val2.substring(0,pat[s])
		    val2 = val2.substr(pat[s])
        }
        for(q=0;q<val3.length; q++){
            if(q ==0){
		      val = val3[q]
            }else{
                if(val3[q] != ""){
                    val += sep + val3[q]
                }
            }
        }
            d.value = val
            d.valant = val
    }
}
</script>
