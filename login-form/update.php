<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
    $id = $_POST['id'];
	
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];	
    $password = $_POST['password'];	
	
    // checking empty fields
    if(empty($name) || empty($email) || empty($username) || empty($password)) {				
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
		
        if(empty($email)) {
            echo "<font color='red'>Quantity field is empty.</font><br/>";
        }
		
        if(empty($username)) {
            echo "<font color='red'>Price field is empty.</font><br/>";
        }		
        if(empty($password)) {
            echo "<font color='red'>Price field is empty.</font><br/>";
        }	
    } else {	
        //updating the table
        $results = mysqli_query($mysqli, "UPDATE login SET name='$name', email='$email', username='$username',password='$password' WHERE id=$id");
		
        //redirectig to the display page. In our case, it is view.php
        header("Location: view.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$results = mysqli_query($connection, "SELECT * FROM `login` WHERE id = $id");
// $results= mysqli_query($connection,$query);


while($res = mysqli_fetch_array($results))
{
    $name = $res['name'];
    $email = $res['email'];
    $username = $res['username'];
    $password = $res['password'];
}
?>

<html>
<head>	
    <title>Edit Data</title>
</head>

<body>
    <a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
    <br/><br/>
	
    <form name="form1" method="post" action="update.php">
        <table border="0">
        <tr> 
                <td>ID</td>
                <td><input type="text" name="name" value="<?php echo $id;?>"></td>
            </tr>
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr> 
                <td>username</td>
                <td><input type="text" name="username" value="<?php echo $username;?>"></td>
            </tr>
            <tr> 
                <td>password</td>
                <td><input type="text" name="password" value="<?php echo $password;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>