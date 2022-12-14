<?php

include 'header.php';
include 'ft.php';
include 'sidebar.php';

?>

<?php 
if (isset($_POST['submit'])){
    $input = $_POST['search'];
    $search = preg_replace("#[^0-9a-z]#i","",$input);
    $query = "SELECT * FROM movie where mv_name LIKE '%$search%' OR mv_tag LIKE '%$search%' OR lang LIKE '%$search%' OR director LIKE 
    '%$search%' OR meta_description LIKE '%$search%'";
    $run = mysqli_query($con,$query);
    $count = mysqli_num_rows($run);
    if($count > 0 ){
   
        while($row = mysqli_fetch_assoc($run)){
            ?>

                <?php echo$row['mv_name']; ?>
               

            <?php
        }
    }

}else{
    echo"<div style='text-align:center;'><h1>No Movie Searched</h1> <p>(Please Search Some Keyword)</p></div>";    
}
// category
if (isset($_POST['submit'])){
    $input1 = $_POST['search'];
    $search1 = preg_replace("#[^0-9a-z]#i","",$input1);

$query1 = "SELECT * FROM category where category_name LIKE '%$search1%'";


 $run1 = mysqli_query($con,$query1);
    $count1 = mysqli_num_rows($run1);
    if($count1>0){
   
        while($row1 = mysqli_fetch_assoc($run1)){
            ?>

                <?php echo$row1['category_name']; ?>
               

            <?php
        }
    }
}
if (isset($_POST['submit'])){
    $input2 = $_POST['search'];
    $search2 = preg_replace("#[^0-9a-z]#i","",$input2);
$q2 = "SELECT * FROM genre where genre_name LIKE '%$search2%'";

$run2 = mysqli_query($con,$q2);
$count2 = mysqli_num_rows($run2);
if($count2>0){

    while($row2 = mysqli_fetch_assoc($run2)){
        ?>

            <?php echo$row2['genre_name']; ?>
           

        <?php
    }
}
}
else{
    echo"<div style='text-align:center;'><h1>No Category Found</h1> <p>(Please Search Some Keyword)</p></div>";    
}

?>
