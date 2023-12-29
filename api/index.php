<?php session_start() ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/Images/favIcon.webp">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/CSS/login.css">
    <title>Login</title>
</head>
<body>
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6">
    <div class="mt-5 card-custom">
        <div class="card-header">
            <h3 class="text-center">Login</h3>
        </div>
        <div class="card-body">
            <?php if(isset($_GET["error"])):?>
                <div class="alert alert-danger"><?=$_GET["error"]?></div>
            <?php endif ?>
            <form action="<?= "extension.php" ?>" method="POST" id="form">
                <div class="form-group">
                    <label for="email" class="text-white">Email</label>
                    <input required type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                    <div id="error-email"></div>
                </div>
                <div class="form-group">
                    <label for="password" class="text-white">Password</label>
                    <input required type="password" name="password" id="password" class="form-control"
                        placeholder="Enter your password">
                        <div id="error-password"></div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block" name="btn" value="login">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<script src="/assets/Javascript/checkLogin.js"></script>
</body>
</html>