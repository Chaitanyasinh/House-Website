<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Final Message </title>
</head>
<body>

<?php

$house_id = $_POST['house_id'];

//create and fill a local variable from the form input
$type = $_POST['type'];
$owner = $_POST['owner'];
$rooms = $_POST['rooms'];


$ok = true;

// check each value
if (empty($type)) {
    // notify the user
    echo 'Type is required<br />';
   
    // change $ok to false so we know not to save
    $ok == false;
}

if (empty($owner)) {
    // notify the user
    echo 'Owner is required<br />';
   
    // change $ok to false so we know not to save
    $ok == false;
}

if (empty($rooms)) {
    // notify the user
    echo 'Number of Rooms are required<br />';
   
    // change $ok to false so we know not to save
    $ok == false;
}
elseif (is_numeric($rooms) == false) {
    echo 'Number of Room is invalid<br />';
    $ok == false;
}

// check the $ok variable and save the data if $ok is still true (meaning we didn't find any errors)

// if ($ok == true) {

//    // move all the save code we wrote last week in here, starting with the database connection and ending with the disconnect command

// }
// connect to the database. Again check your email / credentials for proper values
$conn = new PDO('mysql:host=172.31.22.43 ;dbname=Chaitanyasinh200447336', 'Chaitanyasinh200447336', 'kcE6OUdADW');
// set up the SQL INSERT command
if (empty($house_id)) {
    // set up the SQL INSERT command
    $sql = "INSERT INTO house(type, owner, rooms) VALUES (:type, :owner, :rooms)";
}
else {
    // set up the SQL UPDATE command to modify the existing movie
    $sql = "UPDATE house SET type = :title, owner = :owner, rooms = :rooms WHERE house_id = :house_id";
}
// create a command object and fill the parameters with the form values
$cmd = $conn->prepare($sql);
$cmd->bindParam(':type', $type, PDO::PARAM_STR, 50);
$cmd->bindParam(':owner', $owner, PDO::PARAM_STR, 50);
$cmd->bindParam(':rooms', $rooms, PDO::PARAM_INT);

if (!empty($house_id)) {
    $cmd->bindParam(':house_id', $house_id, PDO::PARAM_INT);
}

// execute the command
$cmd->execute();

// disconnect from the database
$conn = null;

header('location:houses.php');

?>

</body>
</html>
<?php ob_flush(); ?>
