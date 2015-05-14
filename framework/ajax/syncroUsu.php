<?php 
    if(isset($_POST['momento'],$_POST['leccion'],$_POST['bloques'],$_POST['resultado'],$_POST['ultimoId'])) {
       
             $name = "../../courses/".$_POST['leccion'].".txt";
             $moment = $_POST['momento'];
             $bloques = $_POST['bloques'];
            $historial = json_decode(stripslashes($_POST['ultimoId']));
//            algoritmo de correccion 2.0
//            $dom = new DOMDocument();
//            $dom->loadHTML($_POST['resultado']);
////            $dom->removeChild($dom->doctype);
////                $dom->replaceChild($dom->firstChild->firstChild->firstChild, $dom->firstChild);
////            foreach ($historial as $value) {
////                foreach ($dom->getElementsById($value) as $item) {
////                    //substr($dom->saveXML($dom->getElementsByTagName('div')->item(0)), 5, -6)
////                    $item->setAttribute('id', 'jojojo');
////                }
////             }
//            $resultado = $dom->saveHTML();
           $resultado = $_POST['resultado'];
            $fp = fopen($name, 'r');
            $datoss = fread($fp,filesize($name));
            fclose($fp);
            chmod($name, 0777);
            $momentos = explode("$$$", substr($datoss, 0, -3));
            $pista = "";
            $momentosTotales = count($momentos) - 1;
            $homepage = "";
            $correcto = 0; // todo bien
            $percent = 90;
            $percentDos = 100;
            if ($moment <= $momentosTotales) {
            
                if ($moment > 0) {
            $findvaluesPas = $momentos[$moment - 1];
            $separadosPas = explode("^^^", $findvaluesPas);
            foreach ($separadosPas as $key => $value) {
                if ($key == 2) {
                    similar_text($value, $bloques, $percent); 
                    //$percent = similar_text($value, $bloques);
                    $totalNum = strlen($value);
                    //$homepage .= "<h1>".$percent."</h1>";    
                  }elseif ($key == 3) {
                    similar_text($value, $resultado, $percentDos); 
                    //$percent = similar_text($value, $bloques);
                    $totalNum = strlen($value);
                    //$homepage .= "<h1>".$percentDos."</h1>";    
                  }
              }
            }
                if($percent >= 90 && $percentDos == 100) {
                    
                
                $findvalues = $momentos[$moment];
                $separados = explode("^^^", $findvalues);
                foreach ($separados as $key => $value) {
                    if ($key == 1) {
                    $string = $moment + 1 .")     ".$value;  
                    $homepage .= "<div class='panel-group animated fadeInDown' id='accordion' role='tablist' aria-multiselectable='true' style='margin-bottom:0px;'> 
                          <div class='panel panel-default'>
                                <div class='panel-heading' role='tab' id='headingTwo'>
                                  <h4 class='panel-title'>
                                    <div class='collapsed' data-toggle='collapse' data-parent='#accordion' href='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>
                                      <h4 class='pista'>".$string."</h4>
                                    </div>
                                  </h4>";
                    }
                    if ($key == 2) {
                    $homepage .= "</div>
                                <div id='collapseTwo' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingTwo'>
                                  <div id='changeSize' class='panel-body'>
                                    ".$value."
                                  </div>
                                </div>
                              </div>
                                </div>";

                  }
                $homepage .= "</div>";
                }
            }else {
                 $correcto = 1; // la cago
                $homepage .= "<div class='well well-lg redini animated fadeInDown' style='margin-bottom:0px;'>
                                <strong>Upppss!</strong>There´s a problem with your Website </a>.
                              </div>";
            }
            }else {
                $correcto = 2; //termino
                $homepage .= "<div class='well well-lg greenini animated fadeInDown' style='margin-bottom:0px;'>
                                <strong>Well done!</strong> You have successfully completed the lesson </a>.
                              </div>";

                }
                
                echo json_encode(array("stringhome"=>$homepage,"correcto"=>$correcto,"newresult"=>$resultado));
        }
    
?>