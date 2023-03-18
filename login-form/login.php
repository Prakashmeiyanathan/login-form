<?php session_start(); ?>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
</head>

<body>
<a class='btn btn-success' href="index.php">Home</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($connection, $_POST['username']);
    $pass = mysqli_real_escape_string($connection, $_POST['password']);

    if($user == "" || $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a class='btn btn-success' href='login.php'>Go back</a>";
    } else {
        $result = mysqli_query($connection, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
        or die("Could not execute the select query.");
		
        $row = mysqli_fetch_assoc($result);
		
        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
        } else {
            echo "Invalid username or password.";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
        }

        if(isset($_SESSION['valid'])) {
            header('Location: index.php');			
        }
    }
} else {
?>
    <p><font size="+2">Login</font></p>
    <form name="form1" method="post" action="">
        <table width="75%" border="0">
            <tr> 
                <td width="10%">Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr> 
                <td> </td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
<?php
}
?>
</body>
</html>