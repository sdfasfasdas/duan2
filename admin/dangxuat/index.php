<?php
if(isset($_SESSION['user_adm'])&&(count($_SESSION['user_adm'])>0)&&(is_array($_SESSION['user_adm']))){
    unset($_SESSION['user_adm']);
    header('location: login.php');
}
?>