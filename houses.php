<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House listings</title>
    
    <!--css-->

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-grid.min.css" />
    

<body>
    <h1>House listings</h1>
    <?php
        //connect
        $conn = new PDO('mysql:host=172.31.22.43;dbname=Chaitanyasinh200447336', 'Chaitanyasinh200447336', 'kcE6OUdADW');

        //prepare the query
        $sql = "SELECT * FROM house";

        //run the query and store the results
        $cmd = $conn->prepare($sql);
        $cmd -> execute();
        $house = $cmd->fetchAll();

        //start our grid
        echo '<table class="table table-striped table-hover"> <thead> <th>Type</th> <th>Owner</th> <th>Rooms</th>  <th>Edit</th> <th>Delete</th></thead><tbody>';

        //loop through the data and stat the results
        foreach ($house as $houses)
        {
            echo '<tr><td>' .$houses['type'] .'</td>
            <td>' . $houses['owner'] . '</td>
            <td>' . $houses['rooms'] . '</td>
            <td><a href="house.php?houses_id=' .$houses['house_id'] . '">Edit</a></td>
            <td><a onclick="return confirm(\'Are you sure you want to delete this house?\');" href="delete-house.php?house_id='.$houses['house_id'].'"> Delete </a></td></tr>';
        }

        //close the grid 
        echo '</tbody></table>';

        //disconnect
        $conn= null;
    ?>

<!--js adding here to load page faster--> 
<script src= "js/bootstrap.bundle.min.js"> </script>

</body>
</html>