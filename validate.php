<?php ob_start(); ?>

<!DOCTYPE html>
<html>

<body>

<?php
// store the inputs & hash the password
$username = $_POST['username'];
$password = $_POST['password'];

// connect
$conn = new PDO('mysql:host=172.31.22.43;dbname=Chaitanyasinh200447336', 'Chaitanyasinh200447336', 'kcE6OUdADW');

// write the query
$sql = "SELECT * FROM users WHERE username = :username";

// create the command, run the query and store the result
$cmd = $conn->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->execute();
$user = $cmd->fetch();

// if count is 1, we found a matching username in the database.  Now check the password
if (password_verify($password, $user['password'])) 
{
    // user found
    session_start();
    $_SESSION['user_id'] = $user['user_id'];
}

else 
{
    // user not found
    
    echo("Error: The file does not exist.");
    header('location:login.php?invalid=true');
    exit();
}

$conn = null;
header('location:menu.php');

?>

</body>
</html>
<?php ob_flush(); ?>