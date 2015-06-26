<?php 
    include_once '../../assets/includes/db_conexion.php';
    include_once '../../assets/includes/funciones.php';
    sec_session_start();
    $user = $_SESSION['username'];
    if (isset($_POST['imagen'],$_POST['nombre'])) 
    {
        $uploaddir = '../../users/' . $user . '/video/';
        $image = $_POST['imagen'];
        $new_image_name = $_POST['nombre'];
        $subject = $image;
        $search = 'data:image/gif;base64,';
        $trimmed = str_replace($search, '', $subject);
        function base64_to_jpeg($base64_string, $output_file) {
            $ifp = fopen($output_file, "wb"); 
            $code_binary = base64_decode($base64_string);
            fwrite($ifp, $code_binary); 
            fclose($ifp); 
            echo "hola";
        }
        $gif_file = $uploaddir . "/thumbs/" . $new_image_name . ".gif";
        $image = base64_to_jpeg( $trimmed , $gif_file );
    }
?>