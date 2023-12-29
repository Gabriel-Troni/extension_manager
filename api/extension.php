<?php
session_start();
require "checkLogin.php";
require "forceLogin.php";
require "extensionSQL.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/Images/favIcon.webp">
    <title>Extension Manager</title>
    <link rel="stylesheet" href="../assets/CSS/browserCompatibility.css"> 
    <link rel="stylesheet" type="text/css" href="../assets/CSS/extension.css">
</head>
<body>
    <header>
        <img src="/assets/Images/companyLogo.svg" alt="company's logo">
        <a href="logout.php">Logout</a>
    </header>
    <div class="gap"></div>
    <?php if($_SESSION["name"] == "admin" && $_SESSION["email"] == "admin@gmail.com"): ?>
        <section id="insert">
            <p>Add employee/extension</p>
            <form id="insert" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                <input required class="insert" name="employeeName" type="text" placeholder="Employee">
                <input required class="insert" name="employeeDepartment" type="text" placeholder="Department">
                <input required class="insert" name="employeeExtension" type="text" placeholder="Extension">
                <button type="submit" name="btn" value="insert" class="btn insert">Add</button>
            </form>
        </section>
    <?php endif ?>
    <section id="finder">
        <input class="search" type="search" autofocus placeholder="Search Employee">
        <input class="search" type="search" placeholder="Search Department">
        <input class="search" type="search" placeholder="Extension">
    </section>
    <section id="container">
        <?php
            $result = selectExtensions($conn);
            
            if(mysqli_num_rows($result) > 0) {
                while($employee = mysqli_fetch_assoc($result)){
                    echo "<div class='employee'>
                        <div class='buttonsAndName'>
                        <div class='buttons'>";
                    if($_SESSION["name"] == "admin" && $_SESSION["email"] == "admin@gmail.com"){
                        echo    "<form id='update' action='extension.php' method='POST'>
                                    <input type='hidden' name='name' value='".$employee["name"]."'>
                                    <input type='hidden' name='department' value='".$employee["department"]."'>
                                    <input type='hidden' name='extension' value='".$employee["extension"]."'>
                                    <button type='submit' class='update' name='btn' value='updateWindow'><img src='../assets/Images/updateIcon.png'></button>
                                </form>
                                <form id='delete' action='extension.php' method='POST'>
                                    <input type='hidden' name='name' value='".$employee["name"]."'>
                                    <button type='submit' class='delete' name='btn' value='delete'><img src='../assets/Images/deleteIcon.png'></button>
                                </form>";
                    }
                    echo    
                        "</div>
                        <li class='name'>".$employee["name"]."</li>
                    </div>
                    <li class='department'>".$employee["department"]."</li>
                    <li class='extension'>".$employee["extension"]."</li>
                    </div>";
                }
            }

    echo "</section>";

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if($_POST["btn"] == "updateWindow"){
                    $employeeName = $_POST["name"];
                    $employeeDepartment = $_POST["department"];
                    $employeeExtension = $_POST["extension"];
                    echo "<div class='updateWindow'>
                            <form class='updateWindow' action='extension.php' method='POST'>
                                <input type='hidden' name='oldName' value='".$employeeName."'>
                                <input required class='update' name='employeeName' type='text' value='".$employeeName."'>
                                <input required class='update' name='employeeDepartment' type='text' value='".$employeeDepartment."'>
                                <input required class='update' name='employeeExtension' type='text' value='".$employeeExtension."'>
                                <button type='submit' name='btn' value='cancel' class='btn cancel'>Cancel</button>
                                <button type='submit' name='btn' value='update' class='btn update'>Confirm</button>
                            </form>
                        </div>";
                }
            }
            disconnect($conn);
        ?>
    <footer></footer>
    <script src="/assets/Javascript/extensionFilter.js"></script>
</body>
</html>