<html>

<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
</head>

<body>

    <div class="container justify-content-center d-flex ">
        <div class="row">
            <div class="col-12">

                <a class='btn btn-success' href="index.php">Home</a> <br />
                <?php
                include("connection.php");
                session_start();

                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $user = $_POST['username'];
                    $pass = $_POST['password'];

                    if ($user == "" || $pass == "" || $name == "" || $email == "" ) {
                        echo "All fields should be filled. Either one or many fields are empty.";
                        echo "<br/>";
                        echo "<a class='btn btn-success' href='create.php'>Go back</a>";
                    } else {
                        mysqli_query($connection, "INSERT INTO login(name, email, username, password)
                         VALUES('$name', '$email', '$user', md5('$pass'))")
                            or die("Could not execute the insert query.");

                        echo "Registration successfully";
                        echo "<br/>";
                        // echo "<a href='login.php'>Login</a>";
                        header('Location: login.php');
                    }
                } else {
                ?>
                    <h4 class="text-center">Register</h4>
                    <form  class="border border-primary p-3 w-100"  name="form1" method="post" action="create.php" enctype="multipart/form-data"> 
                    
                            
                                <label> Name</label>
                                <input class="form-control" type="text" name="name"><br>
                            
                         
                                <label> Email</label>
                                <input class="form-control" type="email" name="email"><br>
                            
                                <label> Username</label>
                                <input class="form-control" type="text" name="username"><br>
                            
                                <label> password</label>
                                <input class="form-control" type="password" name="password"><br>
                                
                             

                            
                           
                               
                                <input class="btn btn-success text-center" type="submit" name="submit" value="Submit">
                            
                        
                    </form>
                    
                <?php
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>