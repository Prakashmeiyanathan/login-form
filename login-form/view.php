$pass = $_POST['password'];

<?php
include('connection.php');

$fetchData = fetch_data($connection);

// fetch query
function fetch_data($connection)
{
    $query = "SELECT * from login ORDER BY id DESC";
    $results = mysqli_query($connection, $query);
    if (mysqli_num_rows($results) > 0) {
        $row = mysqli_fetch_all($results, MYSQLI_ASSOC);
        return $row;
    } else {
        return $row = [];
    }
}
?>


<?php
//including the database connection file
// include_once("connection.php");

//fetching data in descending order (lastest entry first)
// $result = mysqli_query($mysqli, "SELECT * FROM users WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
// 
?>

<html>

<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>   

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <a class="btn btn-warning" href="index.php">Home</a> | <a class="btn btn-success" href="add.html">Add New Data</a> | <a class="btn btn-success" href="logout.php">Logout</a>
                <br /><br />
                <table class="table">
                    <tr bgcolor='#CCCCCC'>
                        <th class=" text-center">Item no</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php
                    if (count($fetchData) > 0) {
                        $sn = 1;
                        foreach ($fetchData as $data) {
                    ?>
                            <tr>
                                <td class="text-center"><?php echo $sn; ?></td>
                                <td><?php echo $data['name'] ?></td>
                                <td><?php echo $data['email'] ?></td>
                                <td><?php echo $data['username'] ?></td>
                                <td class="text-center"><?php echo $data['password'] ?></td>
                                <td class="text-center">
                                    <button><a class="btn btn-success" href="edit.php?edit=<?php echo $data['id']; ?>">Edit</a></button>
                                    <button><a class="btn btn-success" href="delete.php?delete=<?php echo $data['id']; ?>">Delete</a></button>
                                </td>
                            </tr>
                        <?php
                            $sn++;
                        }
                        ?>
                    <?php
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</body>

</html>