<?php
    // include 'connection.php';

    if (isset($_GET['input'])){
        $name = $_GET['input'];
        $sql = "SELECT * FROM bun WHERE title LIKE '%".$name."%'"; 
        $result = mysqli_query($db, $sql);
    }
    else{
        $sql = "SELECT * FROM bun"; 
        $result = mysqli_query($db, $sql);
    }

    $items = '';
    while($row = mysqli_fetch_assoc($result)){
            $items .= "<article>";
            $items .= "<img src='img/".$row['img_no']. ".jpg' alt='Bun'>";
            $items .= "<div class='text'>";
            $items .= "<h4>".$row['title']."</h4>";
            $items .= "<p>Product ID : ".$row['id']."</p>";
            $items .= "<p class='availability'>".$row['availability']."</p>";
            $items .= "</div>";
            $items .= "<form method='POST' action=''>";
            $items .= "<div class='btn-container'>";
            $items .= "<button class='available btn' type='submit' name='av' value='".$row['id']."'><i class='fas fa-check'></i></button>";
            $items .= "<button class='unavailable btn' type='submit' name='unav' value='".$row['id']."'><i class='fas fa-times'></i></button>";
            $items .= "</div>";
            $items .= "</form>";
            $items .= "</article>";    
    }

    if ($items=="") {
        $response="No suggestion";
    } 
    else {
        $response=$items;
    }
    echo $response;

?>