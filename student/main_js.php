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
$query = "SELECT theme FROM user_config WHERE iduser = $elidespecial";
    if ($query = mysqli_query($mysqli, $query)) 
    {
        $totalderesultados = mysqli_num_rows($query);
        if($totalderesultados > 0)
        {
            $row = mysqli_fetch_assoc($query);
            $temareal = "";
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
                $temareal = "solarized_on_dark";
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