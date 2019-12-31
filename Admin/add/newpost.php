<?php
$U_ID=$_REQUEST['U_ID'];
$title=$_POST['title'];
$title_desc=$_POST['title_desc'];
$main_desc=$_POST['main_desc'];


date_default_timezone_set("Asia/Colombo");
$Post_Date=date("Y-m-d");

$name=$_FILES["image"] ["name"];
$type=$_FILES["image"] ["type"];
$size=$_FILES["image"] ["size"];
$temp=$_FILES["image"] ["tmp_name"];
$error=$_FILES["image"] ["error"];

$extension=strtolower(substr($name,strpos($name, '.') + 1));
$img_No=rand();
$img_link=$img_No.".".$extension;

if (empty($main_desc) || empty($title) || empty($title_desc)){
    $ms = "Can not save empty data";
    echo "<script>window.top.location='../index.php?msg=$ms'</script>";
}else{

    if(($extension=='png') || ($extension=='jpg') || ($extension=='jpeg') || ($extension=='JPG')) {

        if (move_uploaded_file($temp, "../../reportimages/blog/".$img_link)) {//image path
            include '../../connection.php';
            $insert=$db->query("INSERT INTO blog (Blog_ID,Blog_Title,Title_desc,img_url,Main_Desc,Date,Added_ID) VALUES ('','$title','$title_desc','$img_link','$main_desc','$Post_Date','$U_ID')");

            if ($insert) {
                $ms = "Successfully uploaded";
                echo "<script>window.top.location='../index.php?msg=$ms'</script>";
            } else {
                $ms = "Something was Wrong! Please Contact System Developer";
                echo "<script>window.top.location='../index.php?msg=$ms'</script>";
            }
        }else{

            $ms = "file Not moved to folder";
            echo "<script>window.top.location='../index.php?msg=$ms'</script>";
        }
    }


}
?>