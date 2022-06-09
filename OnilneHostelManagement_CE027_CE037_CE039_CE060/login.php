<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST["email"]) and !empty($_POST["pwd"]) and !empty($_POST["captcha"]) and isset($_POST["captcha"]) and isset($_POST["email"]) and isset($_POST["pwd"])) {
        $uname = $_POST["email"];
        $password = $_POST["pwd"];
        $captcha = $_POST["captcha"];
            session_start();
        if ($uname == "abc@gmail.com" and $password == "abc@123" and $captcha == $_SESSION["CAPTCHA_CODE"]) {
            $_SESSION[$uname] = "abc";
            $parts = explode("@", $uname);
            $param = urlencode(base64_encode($parts[0]));
            header("Location:Homepage.html?uname=$param");

        } else {
            if($captcha != $_SESSION["CAPTCHA_CODE"]){
                echo "<h1>Invalid Captcha. Please enter a valid captcha.</h1>";
            }
            else{
                echo "<h1>Incorrect username and/or password. Please retry.</h1>";
            }
        }
    }
}
?>

<?php
if (isset($_GET['msg'])) {
    echo "<h1>{$_GET['msg']}</h1>";
}
?>