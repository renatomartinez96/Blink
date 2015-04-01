<?php
sec_session_start();
sec_session_destroy();
echo "<script>window.location.href='index.php'</script>";