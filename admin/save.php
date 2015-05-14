/////////////
<link href="../assets/css/editor.css" rel="stylesheet">
///////////////
<h5 class="modal-title text-center">Tema del editor</h5>
                                                <div class="col-md-12 full" id="themechange" >
                                                    <div class="col-sm-7 full">
                                                        <div class="panel panel-success full">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title"><strong class="junction-light">HTML</strong>(HyperText Markup Language)</h3>
                                                            </div>
                                                            <div class="panel-body full">
                                                                <pre id="editor"><?php echo htmlentities(file_get_contents("../users/".$user."/index.html")); ?></pre>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-5 full">
                                                        <div class="panel panel-success full">
                                                            <div class="panel-heading ">
                                                                <h3 class="panel-title"><strong class="junction-light">CSS</strong>(Cascading Style Sheets)</h3>
                                                            </div>
                                                            <div class="panel-body full">
                                                                <pre id="editor2"><?php echo htmlentities(file_get_contents("../users/".$user."/css/index.css")); ?></pre>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 full">
                                                    <input type="hidden" value="" name="themeselect" id="themeselect" >
                                                    <div class="col-md-2 full" id="idtheme1">
                                                        <img class="img-responsive" src="../assets/img/temas/tema1.png" onmouseover="showTheme(1)"></div>
                                                    <div class="col-md-2 full" id="idtheme2">
                                                        <img class="img-responsive" src="../assets/img/temas/tema2.png" onmouseover="showTheme(2)"></div>
                                                    <div class="col-md-2 full" id="idtheme3">
                                                        <img class="img-responsive" src="../assets/img/temas/tema3.png" onmouseover="showTheme(3)"></div>
                                                    <div class="col-md-2 full" id="idtheme4">
                                                        <img class="img-responsive" src="../assets/img/temas/tema4.png" onmouseover="showTheme(4)"></div>
                                                    <div class="col-md-2 full" id="idtheme5">
                                                        <img class="img-responsive" src="../assets/img/temas/tema5.png" onmouseover="showTheme(5)"></div>
                                                    <div class="col-md-2 full" id="idtheme6">
                                                        <img class="img-responsive" src="../assets/img/temas/tema6.png" onmouseover="showTheme(6)"></div>
                                                </div>
//////////////////////
function showTheme(inserttheme)
        {   
            var editor1 = ace.edit("editor2");
            editor1.setTheme("ace/theme/chaos");
            document.getElementById("themeselect").setAttribute("value", inserttheme); 
            for (i = 1; i < 7; i++) {
                if(i == insertimg)
                {
                    document.getElementById("idtheme"+inserttheme).style.border = "2px solid #ffffff";
                }
                else
                {
                    document.getElementById("idtheme"+i).removeAttribute("style");
                }
            } 
        }
//////////////////////////
<script src="../assets/ace/ace.js" type="text/javascript" charset="utf-8"></script>
        <script>
    $(document).ready(function(){
        var user = "<?=$user?>";
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/pastel_on_dark");
        editor.getSession().setMode("ace/mode/html");    
        var editor1 = ace.edit("editor2");
        editor1.setTheme("ace/theme/pastel_on_dark");
        editor1.getSession().setMode("ace/mode/css");
    });

</script>