
function suscribe(docente,usuario){
    
    var accion = 'sus';
    var send = {
                "accion" : accion,
                "docente" : docente,
                "usuario" : usuario
               };
        $.ajax({
            type: "POST",
            url: "assets/ajax/subs.php",
            data: send,
            success: function(response) {
                window.location.href = 'teachers.php';
            }
        });
}
function unsuscribe(docente,usuario){
    var accion = 'des';
    var send = {
                "accion" : accion,
                "docente" : docente,
                "usuario" : usuario
               };
        $.ajax({
            type: "POST",
            url: "assets/ajax/subs.php",
            data: send,
            success: function(response) {
                window.location.href = 'teachers.php';
            }
        });
}       
    