<script src="assets/js/jquery.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/bootbox.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script>
//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
</script>
<script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
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