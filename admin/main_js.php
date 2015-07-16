<script src="../assets/js/jquery.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/bootbox.min.js" type="text/javascript"></script>
<script>
    $( document ).ready(function() {
        $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
                $("#avatar").toggleClass("toggled");
                $(".sidebar-nav").toggleClass("toggled");
                $(".textos").toggleClass("toggled");
        });
        
        $(".sendmsg").click(function() {
            var msgaddid = $(this).attr("msgaddid");
            var msgadd = $(this).attr("msgadd");
            var msgcur = $(this).attr("msgcur");
            var msgcurname = $(this).attr("msgcurname");
            var msgtitle = $(this).attr("msgtitle");
            var msgfec = $(this).attr("msgfec");
            var denid = $(this).attr("denid");
            
            switch (msgtitle) {
                case "1":
                    msgtitle = "<?=$langprint['denop1']?>";
                break;
                case "2":
                    msgtitle = "<?=$langprint['denop2']?>";
                break;
                case "3":
                    msgtitle = "<?=$langprint['denop3']?>";
                break;
                case "4":
                    msgtitle = "<?=$langprint['denop4']?>";
                break;
            } 
            
            bootbox.dialog({
                title: "<?=$langprint["aden-msg-write"]?> <strong>"+msgcurname+"</strong>",
                message: "<div class='row'>"+
                            "<div class='col-xs-6'>"+
                                "<p><small><strong><?=$langprint['aden-msg-issue']?>: </strong>"+msgtitle+"</small></p>"+
                                "<p><small><strong><?=$langprint['aden-msg-date']?>: </strong>"+msgfec+"</small></p>"+
                            "</div>"+
                            "<div class='col-xs-6'>"+
                                "<p><small><strong><?=$langprint['aden-msg-aut']?>: </strong>"+msgadd+"</small></p>"+
                                "<p><small><strong><?=$langprint['aden-msg-curname']?>: </strong>"+msgcurname+"</small></p>"+
                            "</div>"+
                            "<div class='col-xs-12'>"+
                                "<div class='form-group'>"+
                                    "<label class='control-label' for='adminmsg'><?=$langprint["aden-msg-con"]?>:</label>"+
                                    "<textarea class='form-control dont-horizontal msgcontent' rows='3' id='adminmsg' name='adminmsg'></textarea>"+
                                    "<span class='help-block'><strong><?=$langprint['form-max-length-sig']?>: 375</strong></span>"+
                                "</div>"+
                            "</div>"+
                        "</div>",
                buttons: {
                    success: {
                    label: "<?=$langprint['btn-cancel']?>",
                    className: "btn-default",
                    callback: function() {
                        
                        }
                    },
                    main: {
                    label: "<?=$langprint['btn-send-msg']?>",
                    className: "btn-primary",
                    callback: function() {
                        var msg = $("#adminmsg").val();
                            $.ajax({
                                method: "POST",
                                url: "sendMsg.php",
                                data: {msgaddid: msgaddid, msgcontent: msg, denid: denid},
                                beforeSend: function() {
                                },
                                success: function(data) {
                                        bootbox.alert(data, function() {
                                        });
                                    }
                            });
                        }
                    }
                }
            });

        });
        $(".dropden").click(function() {
            var dencur = $(this).attr('curden');
            bootbox.confirm("<?=$langprint['aden-drop-sure']?>", function(result) {
                if(result === true)
                {
                    
                    $.ajax({
                          method: "POST",
                          url: "dropDen.php",
                          data: {dencur: dencur},
                          beforeSend: function() {
                          },
                          success: function(data) {
                            bootbox.alert(data, function() {
                            });
                          }
                    });
                }                
            });
            
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