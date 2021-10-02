<?php
include 'sever.php';
session_start();
if (isset($_POST["search"])) {
    $search = $_POST["search"];
    $sql = "SELECT * FROM addloca WHERE attraction LIKE '%$search%' ";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
} else {
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gluten:wght@100;300&display=swap" rel="stylesheet">

</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info " style="font-family: 'Gluten', cursive;">
        <div class="container-fluid">
            <a class="navbar-brand fs-3" href="index.php">Go Travel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
            if (isset($_SESSION['username'])) {
            ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="edituser.php"><?php echo $_SESSION['fistname'] . ' ' . $_SESSION['lastname'] ?></a>
                        </li>
                    <?php
                }
                    ?>
                    </ul>
                </div>
                <form class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        if (isset($_SESSION['username']) && $_SESSION['usergroup']  == 'A') {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active fs-5" aria-current="page" href="addInformation.php">Add Travel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fs-5" aria-current="page" href="edituser.php">Edit Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fs-5" aria-current="page" href="logout.php">Logout</a>
                            </li>

                        <?php
                        } elseif (isset($_SESSION['username']) && $_SESSION['usergroup']  == 'P') {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active fs-5" aria-current="page" href="edituser.php">Edit Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fs-5" aria-current="page" href="logout.php">Logout</a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active fs-5" aria-current="page" href="singup.php">Singup</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active btn btn-outline-warning fs-5" aria-current="page" href="singin.php">Singin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fs-5" aria-current="page" href="singin.php"></a>
                            </li>
                        <?php
                        }

                        ?>

                    </ul>
                </form>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <?php if ($count > 0) { ?>
        <center>
            <a href="index.php"><button class="btn btn-primary">HOME</button></a>
            <br>
            <br>
            <input type="text" class="btn btn-success" value="There are <?php echo $count; ?> Places">
        </center>
        <br><br>

        <div class="container ">
            <div class="row row-cols-3 ">

                <?php
                while ($row = $result->fetch_object()) { ?>
                    <div class="col">
                        <div class="card" style="width: 20rem;">
                            <img src="images/<?php echo $row->file; ?>" class="card-img-top" alt="img">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row->attraction; ?></h5>
                                <p class="card-text"><?php echo $row->history; ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?php echo $row->address; ?></li>
                            </ul>
                            <div class="card-body">
                                <center>
                                    <a href="<?php echo $row->link; ?>" class="btn btn-primary">Location</a>
                                </center>
                            </div>
                            <?php
                            if (isset($_SESSION['username']) && $_SESSION['usergroup']  == 'A') {
                            ?>
                                <ul class="list-group list-group-flush">
                                    <a class="btn btn-warning" href="editdata.php?id=<?php echo $row->id; ?>"><button>Edit</button></a>
                                </ul>
                                <ul class="list-group list-group-flush">
                                    <a class="btn btn-danger" href="deletedata.php?id=<?php echo $row->id; ?>">Delete</a>
                                </ul>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-danger">
            <center>
                <h1>No Found !!</h1>
                <h3>Sorry, the place you are looking for doesn't exist.</h3>
                <a href="index.php"><button class="btn btn-primary">HOME</button></a>
            </center>
        </div>
    <?php } ?>
</body>

</html>