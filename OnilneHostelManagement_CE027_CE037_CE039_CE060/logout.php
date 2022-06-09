<?php
        session_unset();
        unset($_SESSION["pwd"]);
        unset($_SESSION["email"]);
        header("Location:index.html?msg=You have successfully loged out");
?>