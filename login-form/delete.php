
<?php

include("connection.php");
if(isset($_GET['delete'])){

    $id= $_GET['delete'];
    
  delete_data($connection, $id);

}

// delete data query
function delete_data($connection, $id){
   
    $query="DELETE from login WHERE id=$id";
    $results= mysqli_query($connection,$query);

    if($results){
      header('location:view.php');
    }else{
        $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
      echo $msg;
    }
}
?>