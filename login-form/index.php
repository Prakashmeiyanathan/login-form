<?php session_start(); ?>
<html>

<head>
    <title>Homepage</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex">
            <div class="col-md-9 justify-content-center">
                <div id="header">
                    Welcome to my page!
                </div>
                <?php
                if (isset($_SESSION['valid'])) {
                    include("connection.php");
                    $result = mysqli_query($connection, "SELECT * FROM login");
                ?>
                    Welcome <?php echo $_SESSION['name'] ?> ! <a class="btn btn-success" href='logout.php'>Logout</a><br />
                    <br />
                    <a class="btn btn-secondary" href='view.php'>View and Add Products</a>
                    <br /><br />
                <?php
                } else {
                    echo "You must be logged in to view this page.<br/><br/>";
                    echo "<a class='btn btn-success' href='login.php'>Login</a> | <a class='btn btn-success' href='create.php'>Register</a>";
                }
                ?>
            </div>
        </div>
    </div>


</body>

</html>