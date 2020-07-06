<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House listings</title>
    
    <!--css-->
    
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kognise/water.css@latest/dist/light.min.css">    

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
            <td><a href="house.php?houses_id=' .$houses['house_id'] . '"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M17.263 2.177a1.75 1.75 0 012.474 0l2.586 2.586a1.75 1.75 0 010 2.474L19.53 10.03l-.012.013L8.69 20.378a1.75 1.75 0 01-.699.409l-5.523 1.68a.75.75 0 01-.935-.935l1.673-5.5a1.75 1.75 0 01.466-.756L14.476 4.963l2.787-2.786zm-2.275 4.371l-10.28 9.813a.25.25 0 00-.067.108l-1.264 4.154 4.177-1.271a.25.25 0 00.1-.059l10.273-9.806-2.94-2.939zM19 8.44l2.263-2.262a.25.25 0 000-.354l-2.586-2.586a.25.25 0 00-.354 0L16.061 5.5 19 8.44z"></path></svg></a></td>
            <td><a onclick="return confirm(\'Are you sure you want to delete this house?\');" href="delete-house.php?house_id='.$houses['house_id'].'"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M16 1.75V3h5.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75zm-6.5 0a.25.25 0 01.25-.25h4.5a.25.25 0 01.25.25V3h-5V1.75z"></path><path d="M4.997 6.178a.75.75 0 10-1.493.144L4.916 20.92a1.75 1.75 0 001.742 1.58h10.684a1.75 1.75 0 001.742-1.581l1.413-14.597a.75.75 0 00-1.494-.144l-1.412 14.596a.25.25 0 01-.249.226H6.658a.25.25 0 01-.249-.226L4.997 6.178z"></path><path d="M9.206 7.501a.75.75 0 01.793.705l.5 8.5A.75.75 0 119 16.794l-.5-8.5a.75.75 0 01.705-.793zm6.293.793A.75.75 0 1014 8.206l-.5 8.5a.75.75 0 001.498.088l.5-8.5z"></path></svg> </a></td></tr>';
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
