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
    <title>Sing up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gluten:wght@100;300&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #ccffff;
        }

        .center {
            margin: auto;
            margin-top: 50px;
            width: 30%;
            background-color: #FFC106;
            border-radius: 12px;
            padding: 10px;
        }

        h1.a,h5.a {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container center" style="font-family: 'Gluten', cursive;">
        <h1 class="a">Sing Up</h1>
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
        <form action="singup_db.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="mb-3">
                <label for="fistname" class="form-label">Fistname</label>
                <input type="text" name="fistname" class="form-control">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Lastname</label>
                <input type="text" name="lastname" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control"" >
            </div>
            <div class=" mb-3">
                <label for="birthdate" class="form-label">Birthdate</label>
                <input type="date" name="birthdate" class="form-control">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" name="gender" id=gender" class="form-select">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password1" class="form-label">Password</label>
                <input type="password" name="password1" class="form-control" id="password1">
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Confirm Password</label>
                <input type="password" name="password2" class="form-control" id="password2">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" name="singup" class="btn btn-info">Submit</button>
            </div>

        </form>
    </div>
</body>

</html>