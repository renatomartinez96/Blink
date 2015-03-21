<script async src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script async src="../assets/js/jquery.js" type="text/javascript"></script>
<script async src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script async src="../assets/js/angular.min.js"></script>
<script>
	$("#menu-toggle").click(function(g){g.preventDefault(),$("#wrapper").toggleClass("toggled"),$("#avatar").toggleClass("toggled"),$(".sidebar-nav").toggleClass("toggled"),$(".textos").toggleClass("toggled")});
</script>
<script>
    $(document).ready(function(){var e="<?=$user?>",s=ace.edit("editor");s.setTheme("ace/theme/pastel_on_dark"),s.getSession().setMode("ace/mode/html"),s.getSession().on("change",function(){var t=s.getSession().getValue(),a={codigo:t,usuario:e};$.ajax({type:"POST",url:"htmlup.php",data:a,success:function(e){$("#resul").append(e)}})});var t=ace.edit("editor2");t.setTheme("ace/theme/pastel_on_dark"),t.getSession().setMode("ace/mode/css"),t.getSession().on("change",function(){var s=t.getSession().getValue(),a={codigo:s,usuario:e};$.ajax({type:"POST",url:"cssup.php",data:a,success:function(e){$("#resul").append(e)}})})});
</script>
<script>
function txtletras(){(32!=event.keyCode&&event.keyCode<65||event.keyCode>90&&event.keyCode<97||event.keyCode>122)&&(event.returnValue=!1)}function txtnumeros(){(event.keyCode<48||event.keyCode>57)&&(event.returnValue=!1)}function mascara(e,a,l,v){if(e.valant!=e.value){for(val=e.value,largo=val.length,val=val.split(a),val2="",r=0;r<val.length;r++)val2+=val[r];if(v)for(z=0;z<val2.length;z++)isNaN(val2.charAt(z))&&(letra=new RegExp(val2.charAt(z),"g"),val2=val2.replace(letra,""));for(val="",val3=new Array,s=0;s<l.length;s++)val3[s]=val2.substring(0,l[s]),val2=val2.substr(l[s]);for(q=0;q<val3.length;q++)0==q?val=val3[q]:""!=val3[q]&&(val+=a+val3[q]);e.value=val,e.valant=val}}var patron=new Array(4,2,2);
</script>