<?php 

$conn=new mysqli('localhost','root','','cafe99');

if(mysqli_connect_errno()){
   echo "Connection Failed".mysqli_connect_errno();
}

$query=mysqli_query($conn,"SELECT * FROM fooditem");

echo "<select id='search'>";
echo "<option>Search for anything...</option>";
    while($row=mysqli_fetch_array($query)){
    $fname=$row['Food_name'];
    echo "<option>$fname</option>";
    }
  
echo "</select>";
    

mysqli_close($conn);

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<script>
$("#search").chosen();
</script>


?>