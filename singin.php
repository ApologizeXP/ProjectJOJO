<?php
include 'sever.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gluten:wght@100;300&display=swap" rel="stylesheet">
    <style>
        body{
            background-color: #ccffff;
        }
        .center {
            margin: auto;
            margin-top: 200px;
            width: 30%;
            background-color: #FFC106;
            border-radius: 12px;
            padding: 10px;
        }

        h1.a {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container center"  style="font-family: 'Gluten', cursive;">
        <h1 class="a" >Sing In</h1>
        <?php
        if (isset($_SESSION['error'])) :
        ?>
            <h5 class="a" style="color: red">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </h5>
        <?php
        endif
        ?>
        <form method="post" action="singin_db.php">
            <div class="mb-2">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
            <button type="submit" name="singin" class="btn btn-info">Submit</button>
            </div>
            
        </form>
    </div>
</body>

</html>