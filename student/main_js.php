<script src="../assets/js/jquery.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/bootbox.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui.js"></script>
<script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
	$("#menu-toggle").click(function(g){g.preventDefault(),$("#wrapper").toggleClass("toggled"),$("#avatar").toggleClass("toggled"),$(".sidebar-nav").toggleClass("toggled"),$(".textos").toggleClass("toggled")});
</script>
<script>
    $(document).ready(function(){
        
        function notNull(){
            var msg = "<?=$langprint['form-not-null']?>";
            bootbox.alert(msg, function() {
                
            });
        }
        function tooMuch(permitido){
            var msg = "<?=$langprint['form-max-length']?>" + permitido + ")";
            bootbox.alert(msg, function() {
                
            });
        }
        
        function sendDen(dty, dds, dcu, dus){
            $.ajax({
                type: "POST",
                url: "complaint-process.php",
                data: {dentype: dty, dendesc: dds, dencur: dcu, denusr: dus},
                success: function(data) {
                    bootbox.alert(data, function() {
                    });
                }
            });   
        }
        
        $(".displayinfo").click(function() {
            var cursdesc = $(this).attr("cursdesc");
            var cursname = $(this).attr("cursname");
            var cursimg = $(this).attr("cursimg");
            var curid = $(this).attr("curid");
            var aut = $(this).attr("aut");
            var autav = $(this).attr("autav");
            bootbox.dialog({
                title: "<h4 class='junction-regular'>Acerca de: "+cursname+"</h4>",
                message: "<div class='row'>"+
                            "<div class='col-md-2'>"+
                                "<img src='../assets/img/avatares/"+autav+".png' class='img-responsive' >"+
                                "<p class='text-center'><strong><a href='profile.php?user="+aut+"' class='alert-link'>"+aut+"</a></strong></p>"+
                            "</div>"+
                            "<div class='col-md-10'>"+
                                "<p class='text-justify'><strong>Descripcion: </strong>"+cursdesc+"</p>"+
                                "<div class='row'>"+
                                    "<div class='col-xs-8 pull-left'>"+
                                        "<i class='fa fa-users fa-lg'></i> 25 Inscritos"+
                                    "</div>"+
                                "</div>"+
                            "</div>"+
                        "</div>",
                buttons: {
                    danger: {
                        label: "Denunciar",
                        className: "btn-danger pull-left",
                        callback: function() {
                            bootbox.dialog({
                                title: "<h4 class='junction-bold text-warning text-center'><?=$langprint['dentitle']?> "+cursname+"?</h4>",
                                message: "<div class='row'>"+
                                            "<div class='form-group'>"+
                                              "<label class='col-md-4 control-label' for='radios'><?=$langprint['dentype']?></label>"+
                                              "<div class='col-md-8'>"+
                                                "<div class='radio'>"+
                                                    "<label for='radios-0'>"+
                                                        "<input name='dentype' class='dentype' id='radios-0' value='1' type='radio'>"+
                                                        "<?=$langprint['denop2']?>"+
                                                    "</label>"+
                                                "</div>"+
                                                "<div class='radio'>"+
                                                    "<label for='radios-1'>"+
                                                        "<input name='dentype' class='dentype' id='radios-1' value='2' type='radio'>"+
                                                        "<?=$langprint['denop1']?>"+
                                                    "</label>"+
                                                "</div>"+
                                                "<div class='radio'>"+
                                                    "<label for='radios-2'>"+
                                                        "<input name='dentype' class='dentype' id='radios-2' value='3' type='radio'>"+
                                                        "<?=$langprint['denop3']?>"+
                                                    "</label>"+
                                                "</div>"+
                                                "<div class='radio'>"+
                                                    "<label for='radios-3'>"+
                                                        "<input name='dentype' class='dentype' id='radios-3' value='4' type='radio'>"+
                                                        "<?=$langprint['denop4']?>"+
                                                    "</label>"+
                                                "</div>"+
                                              "</div>"+
                                            "</div>"+
                                            "<div class='form-group'>"+
                                              "<label class='col-md-4 control-label' for='dendesc'><?=$langprint['dendesc']?></label>"+
                                              "<div class='col-md-8'>"+                     
                                                "<textarea class='form-control dont-horizontal' id='dendesc' name='dendesc'></textarea>"+
                                              "</div>"+
                                            "</div>"+
                                            "</div>",
                                buttons: {
                                    default : {
                                    label: "<?=$langprint['btn-cancel']?>",
                                    className: "btn-default",
                                    callback: function() {
                                        }
                                    },
                                    success: {
                                    label: "Enviar denuncia",
                                    className: "btn-danger",
                                    callback: function() {
                                            var dentype = $('input:radio[name=dentype]:checked').val();
                                            var dendesc = $("#dendesc").val();
                                            var dendescl = dendesc.length;
                                            var denusr = <?=$_SESSION['user_id']?>;
                                            var dencur = curid;
                                            var maxl = 200;
                                            if(dendesc != "" && dentype != null)
                                            {
                                                
                                                if(dendescl > maxl)
                                                {
                                                    tooMuch(maxl);
                                                }
                                                else
                                                {
                                                    sendDen(dentype, dendesc, dencur, denusr);
                                                }
                                            }
                                            else
                                            {
                                                notNull();
                                            }
                                        }
                                    }
                                }
                            });
                        }   
                    },
                    info: {
                        label: "Más info",
                        className: "btn-info",
                        callback: function() {
                            
                        }
                    },
                    success: {
                        label: "OK",
                        className: "btn-success",
                        callback: function() {
                        
                        }
                    }
                }
            });
        });
        
        $( "#SearchString" ).on('input',function() {
            var searchString = $("#SearchString").val();
            var SearchResult = document.getElementById('SearchResult');
            var send = {"search" : searchString};
            $.ajax({
                type: "POST",
                url: "search.php",
                data: send,
                success: function(response) {
                    SearchResult.innerHTML = response;
                }
            });
        });
        $( "#SearchStringT" ).on('input',function() {
            var SearchStringT = $("#SearchStringT").val();
            var SearchResult = document.getElementById('SearchResult');
            var send = {"searcht" : SearchStringT};
            $.ajax({
                type: "POST",
                url: "searcht.php",
                data: send,
                success: function(response) {
                    SearchResult.innerHTML = response;
                }
            });
        });
    });
</script>
<?php 
$elidespecial = $_SESSION['user_id'];    
$temareal = "";
$query = "SELECT theme FROM user_config WHERE iduser = $elidespecial";
    if ($query = mysqli_query($mysqli, $query)) 
    {
        $totalderesultados = mysqli_num_rows($query);
        if($totalderesultados > 0)
        {
            $row = mysqli_fetch_assoc($query);
            
            $lel = $row["theme"];
            switch ($lel)
            {
                case 1;
                $temareal = "pastel_on_dark";
                break;
                case 2;
                $temareal = "chaos";
                break;
                case 3;
                $temareal = "solarized_dark";
                break;
                case 4;
                $temareal = "kuroir";
                break;
                case 5;
                $temareal = "textmate";
                break;
                case 6;
                $temareal = "xcode";
                break;
            }
        }
    }

?>
<script>
    $(document).ready(function(){
        var user = "<?=$user?>";
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/<?=$temareal?>");
        editor.getSession().setMode("ace/mode/html");
        editor.getSession().on('change', function(){
            $('#resultc')[0].contentWindow.location.reload(true);
            var dataString = editor.getSession().getValue()
            var send = {"codigo" : dataString,
                        "usuario" : user};
            $.ajax({
                type: "POST",
                url: "htmlup.php",
                data: send,
                success: function(data) {
                    $("#resul").append(data);
                }
            });
        });
        var editor1 = ace.edit("editor2");
        editor1.setTheme("ace/theme/<?=$temareal?>");
        editor1.getSession().setMode("ace/mode/css");
        editor1.getSession().on('change', function(){
            $('#resultc')[0].contentWindow.location.reload(true);
            var dataStringCss = editor1.getSession().getValue()
            var sendcss = {"codigo" : dataStringCss,
                        "usuario" : user};
            $.ajax({
                type: "POST",
                url: "cssup.php",
                data: sendcss,
                success: function(data) {
                    $("#resul").append(data);
                }
            });
        });
        $("#act").click(function(){
            $('#resultc')[0].contentWindow.location.reload(true);
            var dataString = editor.getSession().getValue()
            var send = {"codigo" : dataString,
                        "usuario" : user};
            $.ajax({
                type: "POST",
                url: "htmlup.php",
                data: send,
                success: function(data) {
                    $("#resul").append(data);
                }
            });
            var dataStringCss = editor1.getSession().getValue()
            var sendcss = {"codigo" : dataStringCss,
                        "usuario" : user};
            $.ajax({
                type: "POST",
                url: "cssup.php",
                data: sendcss,
                success: function(data) {
                    $("#resul").append(data);
                }
            });
        });
    });

</script>

<script>
function txtletras(){(32!=event.keyCode&&event.keyCode<65||event.keyCode>90&&event.keyCode<97||event.keyCode>122)&&(event.returnValue=!1)}function txtnumeros(){(event.keyCode<48||event.keyCode>57)&&(event.returnValue=!1)}function mascara(e,a,l,v){if(e.valant!=e.value){for(val=e.value,largo=val.length,val=val.split(a),val2="",r=0;r<val.length;r++)val2+=val[r];if(v)for(z=0;z<val2.length;z++)isNaN(val2.charAt(z))&&(letra=new RegExp(val2.charAt(z),"g"),val2=val2.replace(letra,""));for(val="",val3=new Array,s=0;s<l.length;s++)val3[s]=val2.substring(0,l[s]),val2=val2.substr(l[s]);for(q=0;q<val3.length;q++)0==q?val=val3[q]:""!=val3[q]&&(val+=a+val3[q]);e.value=val,e.valant=val}}var patron=new Array(4,2,2);
</script>