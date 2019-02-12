<?php

require_once 'init.php';

if (!isLoggedIn())
{
//    header('Location:index.html');
 ?>
    <script>
        //alert('Usuário(a) ou senha incorretos');
        document.location.href = 'login/index.html';
    </script>
<?php
    //header('Location: page-publicacao.php');
}
?>