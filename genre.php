<?php 
include 'header.php';
include 'ft.php';
?>
<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
   // echo "This is full encrypted ID  ".$id."<br>";
foreach ($_GET as $key => $id){
   $data = $_GET['$key'] = base64_decode(urldecode($id));
  // echo "This is Decode with Base64  ".$data."<br>";
   $dec1 = ((($data*956783)/54321)/123456789);
  // echo "This is fully decrypt  ".$dec1."<br>";

  $query = "Select * from movie,genre where genre.id=movie.genre_id and genre.id=$dec1";

  $run = mysqli_query($con,$query);
  if(mysqli_num_rows($run)>0){
    while ($row=mysqli_fetch_assoc($run)){
  echo $row['mv_name'];
    }
  }
  else{
    echo "No Movie Found";
  }
}
    
}

?>