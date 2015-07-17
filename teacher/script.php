$(document).ready(function() {
     var usuario = "<?php echo $user; ?>";
     var usuarioid = "<?php echo $userid; ?>";
     var tipo = "<?php echo $tipo; ?>";
    
    // no hace submit D:
    
    // / no hace submit D:
    
    function loadCursos() {
    $(".results").html("");
   
    $.ajax({
          method: "POST",
          url: "loadCur.php",
          data: { usuario: usuario,usuarioid: usuarioid,tipo: tipo},
          beforeSend: function() {
            $(".loading").css('display','block');
          },
          success: function(data) {
            $(".loading").css('display','none');
            $(".results").html(data);
            event();
          }
    });
    }

    $(".createCou").click(function() {
            var nombre = $(".nameCur").val();
            var decrip = $(".descripCur").val();
            $.ajax({
                  method: "POST",
                  url: "crearCur.php",
                  data: {usuario: usuario,usuarioid: usuarioid,tipo: tipo,nombre: nombre,descrip:decrip},
                  beforeSend: function() {
                    $(".loading").css('display','block');
                  },
                  success: function(data) {
                    $(".loading").css('display','none');
                    $('#modalDesc').modal('hide');
                    $(".nameCur").val("");
                    $(".descripCur").val("");
                    loadCursos();  
                  }
            });
            
         });
    function dropCur(codigo, curnombre)
    {
        $.ajax({
                  method: "POST",
                  url: "dropCur.php",
                  data: {codigo: codigo, curnombre: curnombre},
                  beforeSend: function() {
                  },
                  success: function(data) {
                      document.getElementById('signal').innerHTML = data;
                  }
        });
    } 
    function editCur(editid, editnombre, editdesc)
    {
        $.ajax({
                  method: "POST",
                  url: "editCur.php",
                  data: {editid: editid, editnombre: editnombre, editdesc: editdesc},
                  beforeSend: function() {
                  },
                  success: function(data) {
                      document.getElementById('signal').innerHTML = data;
                  }
        });
    }
    function changeImg(curid, setimg)
    {
        $.ajax({
                  method: "POST",
                  url: "changeCurImg.php",
                  data: {curid: curid, setimg: setimg},
                  beforeSend: function() {
                  },
                  success: function(data) {
                      document.getElementById('signal').innerHTML = data;
                  }
        });
    }
    function event() {
        
        $(".editcur").click(function() {
            var curid = $(this).attr("valid");
            var ocurnombre = $(this).attr("valname");
            var ocurdesc = $(this).attr("valdesc");

            bootbox.dialog({
                title: "<?= $langprint['F-40']?>"+ocurnombre+".",
                message: "<div class='row'>" +
                            "<div class='col-md-12'> " +
                            "<form class='form-horizontal'> " +
                                "<div class='form-group'> " +
                                    "<label class='col-md-4 control-label' for='name'><?= $langprint['F-28']?></label> " +
                                    "<div class='col-md-6'> " +
                                        "<input id='newname' name='newname' type='text' value='" + ocurnombre + "' class='form-control input-md'> " +
                                    "</div>" +
                                "</div> " +
                                "<div class='form-group'> " +
                                    "<label class='col-md-4 control-label' for='name'><?= $langprint['F-29']?></label> " +
                                    "<div class='col-md-6'> " +
                                        "<textarea class='form-control' style='resize: vertical;' name='newdesc' id='newdesc' rows='3'>" + ocurdesc + "</textarea> " +
                                    "</div>" +
                                "</div> " +
                            "</form>" +
                            "</div>" +
                        "</div>",
                buttons: {
                    main: {
                        label: "<?= $langprint['btn-cancel']?>",
                        className: "btn-default",
                        callback: function() {
                            // Se cancela :v
                        }
                    },
                    success: {
                        label: "<?= $langprint['F-19']?>",
                        className: "btn-success",
                        callback: function() {
                            var curnombre = $("#newname").val();
                            var curdesc = $("#newdesc").val();
                            editCur(curid, curnombre, curdesc);
                        }
                    }
                }
            });

        });
        
        // BLOQUEAR UN CURSO abajo
        $(".dropcur").click(function() {
            var envio = $(this).attr("id");
            var envionombre = $(this).attr("curnombre");
            
            bootbox.dialog({
                title: "<h4 class='text-warning'><?= $langprint['F-42']?> <strong>&quot;"+envionombre+"&quot;</strong>?</h4>",
                message: "<?= $langprint['F-43']?>",
                buttons: {
                    main: {
                        label: "<?= $langprint['btn-cancel']?>",
                        className: "btn-default",
                        callback: function() {
                            // Se cancela :v
                        }
                    },
                    danger: {
                        label: "<?= $langprint['F-41']?>",
                        className: "btn-primary",
                        callback: function() {
                            dropCur(envio, envionombre);
                        }
                    }
                }
            });
        });
        
//        $(".changetro").click(function() {            
//            for (x=0; x<=3; x++)
//            {
//                content = content + "<div class='col-md-3 full' id='"+x+"'><img src='../assets/img/pro/"+x+".png' class='img-responsive newimg' ></div>";
////            }
//            $('#lel').modal('toggle');
//            var curimgid = $(this).attr("curimgid");
//            var currentimg = $(this).attr("currentimg");
//            var curimgnombre = $(this).attr("curimgnombre");
//            var nimg = "";
//            
//            var content = "";
//        });
//        
//        $(".newimg").click(function() {  
//            var flow = $(this).attr("id");
//            var jam = document.getElementById('pearl');
//            
//            jam.value = flow;
////            $(this).addClass("selected-thing");
//            for (i = 0; i < 4; i++) 
//            {
//                if(i == flow)
//                {
//                    $(flow).addClass("selected-thing");
//                }
//                else
//                {
//                        $("#rt"+i+"").removeClass("selected-thing");
//                }
//            }
//        });
        
         $(".botoncrear").click(function() {
            $('#modalDesc').modal('toggle');
         });
        $(".botoncrearLe").click(function() {
            $('#modalLes').modal('toggle');
         });
        $(".backhome").click(function() {
            loadCursos();
         });
        
 
    }