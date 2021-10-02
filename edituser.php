<?php
include 'sever.php';
session_start();
$id = $_SESSION['id'];
mysqli_set_charset($conn, "utf8");
$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
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
            margin-top: 150px;
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
        <h1 class="a">Edit Account</h1>
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
        <form action="edituser_db.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="fistname" class="form-label">Fistname</label>
                <input type="text" name="fistname" class="form-control" value="<?php echo $row['fistname'] ?>">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Lastname</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $row['lastname'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $row['email'] ?>">
            </div>
            <div class=" mb-3">
                <label for="birthdate" class="form-label">Birthdate</label>
                <input type="date" name="birthdate" class="form-control" value="<?php echo $row['birthdate'] ?>" >
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" name="gender" id=gender" class="form-select" >
                    <option value="Male"<?php if($row['gender'] == "Male" ){ echo "selected"; }else { echo '';}?>>Male</option>
                    <option value="Female"<?php if($row['gender'] == "Female" ){ echo "selected"; }else { echo '';}?>>Female</option>
                </select>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
                <a href="resetpassword.php"class="btn btn-success">Reset Password</a>
                <button type="submit" name="edituser" class="btn btn-info">Submit</button>
            </div>

        </form>
    </div>
</body>

</html>