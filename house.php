<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>House Info</title>

     <!--css-->

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kognise/water.css@latest/dist/dark.min.css">
    

</head>
<body>

<h1>House details</h1>

    <form method="post" action="save-house.php">
        <div>
        <label for= "type">House type: </label>
        <input name= "type" id="type"  />
        </div>
        <div>
        <label for= "owner">Owner: </label>
        <input name= "owner" id="owner"  />
        </div>
        <div>
        <label for= "rooms">Rooms: </label>
        <input name= "rooms" id="year"/>
        </div>

        <input name="house_id" type="hidden" value="<?php echo $house_id; ?>" />

        <button>Submit</button>
    </form>

   
</body>
</html>