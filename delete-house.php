<?php
        $house_id = $_GET['house_id'];

        // connect
        $conn = new PDO('mysql:host=172.31.22.43;dbname=Chaitanyasinh200447336', 'Chaitanyasinh200447336', 'kcE6OUdADW');

        // set up the SQL command
        $sql = "DELETE FROM house WHERE house_id = :house_id";

        // create a command object so we can populate the movie_id value, the run the deletion
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':house_id', $house_id, PDO::PARAM_INT);
        $cmd->execute();

        //disconnect
        $conn = null;
        header('location:houses.php');
?>
