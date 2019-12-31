<?php

echo $img=$_REQUEST['img'];
$Blog_ID=$_REQUEST['Blog_ID'];

include '../../connection.php';
$delete=$db->query("DELETE FROM blog WHERE Blog_ID='$Blog_ID'");
if ($delete){
    unlink("../../reportimages/blog/".$img);
    $ms = "Successfully Deleted";
    //echo "<script>window.top.location='../index.php?msg=$ms'</script>";
}else{
    $ms = "something was wrong,please try again";
    //echo "<script>window.top.location='../index.php?msg=$ms'</script>";
}
?>