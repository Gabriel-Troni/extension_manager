<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once("connection.php");
    $conn = connect();
    
    function checkForm($conn, $text) {
        $text = trim($text);
        $text = stripslashes($text);
        $text = htmlspecialchars($text);
        $text = mysqli_real_escape_string($conn, $text);
        return $text;
    }

    global $error;
    $button = $_POST["btn"];
    
    if($button == "login"){
        if(empty($_POST["email"]) || empty($_POST["password"])){
            $error = "All fields are mandatory!";
            header("location: index.php?error=".$error);
            exit();
        } else {
            $userEmail = checkForm($conn, $_POST["email"]);
            $userPassword = md5(checkForm($conn, $_POST["password"]));

            $sql = "SELECT name, email, password FROM login WHERE email = '".$userEmail."' AND password = '".$userPassword."'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);
            if(mysqli_num_rows($result) == 1){
                $_SESSION["name"] = $user["name"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["password"] = $user["password"];
            } else {
                $error = "Incorrect email or password!";
                header("location: index.php?error=".$error);
                exit();
            }
        }
    }
}
?>