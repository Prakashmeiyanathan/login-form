<?php

include('connection.php');


if(isset($_GET['edit'])){

    $id= $_GET['edit'];
  $editData= edit_data($connection, $id);
}

if(isset($_POST['update']) && isset($_GET['edit'])){

  $id= $_GET['edit'];
    update_data($connection,$id);
    
    
} 
function edit_data($connection, $id)
{
 $query= "SELECT * FROM login WHERE id= $id";
 $results = mysqli_query($connection, $query);
 $row= mysqli_fetch_assoc($results);
 return $row;
}

// update data query
function update_data($connection, $id){

    $name= legal_input($_POST['name']);
      $email= legal_input($_POST['email']);
      $username = legal_input($_POST['username']);
      $password = legal_input($_POST['password']);

      $query="UPDATE login 
            SET name='$name',
                email='$email',
                username= '$username',
                password='$password'  WHERE id=$id";

      $results= mysqli_query($connection,$query);
  
      if($results){
         header('location:view.php');
      
      }else{
         $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
         echo $msg;  
      }
}

// convert illegal input to legal input
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body>
<!--====form section start====-->
<div class="user-detail">
    <div class="form-title">
    <h2>Create Form</h2>
    
    
    </div>
 
    <p style="color:red">
    
<?php if(!empty($msg)){echo $msg; }?>
</p>
    <form method="post" action="">
          <label>Full Name</label>
        
<input type="text" placeholder="Enter Full Name" name="name" required value="<?php echo isset($editData) ? $editData['name'] : '' ?>"><br><br>
          <label>Email Address</label>
        
<input type="email" placeholder="Enter Email Address" name="email" required value="<?php echo isset($editData) ? $editData['email'] : '' ?>"><br><br>
          <label>User name</label>
<input type="city" placeholder="Enter Full City" name="username" required value="<?php echo isset($editData) ? $editData['username'] : '' ?>"><br><br>
          <label>Password</label>
        
<input type="text" placeholder="Enter Full Country" name="password" required value="<?php echo isset($editData) ? $editData['password'] : '' ?>"><br><br>
        
          <button type="submit" name="update">Submit</button>
    </form>
        </div>
</div>
<!--====form section start====-->
</body>
</html>
    
</body>
</html>