<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving your registration...</title>
</head>
<body>

<?php

//create and fill a local variable from the form input
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];

$ok = true;

// check each value
if (empty($username)) 
{
    // notify the user
    echo 'Username is required <br />';
   
    // change $ok to false so we know not to save
    $ok = false;
}

if (empty($password)) 
{
    // notify the user
    echo 'Password is required <br />';
   
    // change $ok to false so we know not to save
    $ok = false;
}

if ($password!=$confirm)
{
    echo 'Password does not match <br/>';
    $ok = false;
}

if ($ok)
{
    $password = password_hash($password, PASSWORD_DEFAULT);

// connect to the database. Again check your email / credentials for proper values
$conn = new PDO('mysql:host=172.31.22.43;dbname=Chaitanyasinh200447336', 'Chaitanyasinh200447336', 'kcE6OUdADW');

$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";

// create a command object and fill the parameters with the form values
$cmd = $conn->prepare($sql);

$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);

// execute the command
$cmd->execute();

// disconnect from the database
$conn = null;


header('location:login.php');

}

?>

</body>
</html>



