
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="example.php" method="get">
        Name:<input name="username" placeholder="name..."><br><br>
        Email:<input name="email" placeholder="email..."><br><br>
        Number:<input name="number" placeholder="number..."><br><br>
        password:<input name="password" placeholder="password..."><br><br>
        <button type="submit" value="submit" name="submit">submit</button><br>
        welcome : <?php echo $_GET["username"];?> <br>
        Your email  :<?php echo $_GET["email"];?>
    </form>
</body>
</html>