<?php 
    if(isset($_POST['momento'],$_POST['leccion'])) {
             $name = "../../courses/".$_POST['leccion'].".txt";
             $moment = $_POST['momento'];
            $fp = fopen($name, 'r');
            $datoss = fread($fp,filesize($name));
            fclose($fp);
            chmod($name, 0777);
            $momentos = explode("$$$", substr($datoss, 0, -3));
            $pista = "";
            $momentosTotales = count($momentos) - 1;
            $homepage = "";
            if ($moment <= $momentosTotales) {
                
            $findvalues = $momentos[$moment];
            $separados = explode("^^^", $findvalues);
            foreach ($separados as $key => $value) {
                if ($key == 1) {
                $string = $moment + 1 .")     ".$value;
//            $homepage .= "<div class='well well-lg animated fadeInDown'>";
//              $homepage .= "<h4 class='pista'>".$string."</h4>";  
                $homepage .= "<div class='panel-group animated fadeInDown' id='accordion' role='tablist' aria-multiselectable='true'>
                      <div class='panel panel-default'>
                            <div class='panel-heading' role='tab' id='headingTwo'>
                              <h4 class='panel-title'>
                                <a class='collapsed' data-toggle='collapse' data-parent='#accordion' href='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>
                                  <h4 class='pista'>".$string."</h4>
                                </a>
                              </h4>";
                }
                if ($key == 2) {
                $homepage .= "</div>
                            <div id='collapseTwo' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingTwo'>
                              <div class='panel-body'>
                                ".$value."
                              </div>
                            </div>
                          </div>
                            </div>";
             
            }
}
            $homepage .= "</div>";
                
        }else {
            $homepage .= "<div class='alert alert-dismissible alert-success animated fadeInDown'>
                              
                              <strong>Well done!</strong> You have successfully completed the lesson </a>.
                            </div>";
            }
            echo $homepage;
    }
    
?>