<?php
echo $U_ID=$_REQUEST['U_ID'];
$gps=$_POST['gps'];
$desc=$_POST['desc'];
$location=$_POST['location'];

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
$Post_Status="0";
$Manager_ID="0";
if(($extension=='png') || ($extension=='jpg') || ($extension=='jpeg') || ($extension=='JPG')) {

    if (move_uploaded_file($temp, "../../reportimages/".$img_link)) {//image path
        include '../../connection.php';
        $insert=$db->query("INSERT INTO reports(R_ID,R_URL,Location,Upload_U_ID,Post_Status,Desciption,gps,Manager_ID,Post_Date) VALUES ('','$img_link','$location','$U_ID','$Post_Status','$desc','$gps','$Manager_ID','$Post_Date')");

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
?>