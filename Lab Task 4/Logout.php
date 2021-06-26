  
<?php
    
    setcookie('STATUS', 'OK', time()-3600, '/');

    header('location:login.html');

?>