<?php
$Blog_ID=$_REQUEST['Blog_ID'];
$title=$_POST['title'];
$Title_desc=$_POST['title_desc'];
$Main_Desc=$_POST['main_desc'];
$img=$_REQUEST['img'];

$name=$_FILES["image"] ["name"];
$type=$_FILES["image"] ["type"];
$size=$_FILES["image"] ["size"];
$temp=$_FILES["image"] ["tmp_name"];
$error=$_FILES["image"] ["error"];

if (empty($name)){
    // if image not in

    include '../../connection.php';
    $insert=$db->query("UPDATE blog SET Blog_Title='$title',Title_desc='$Title_desc',Main_Desc='$Main_Desc' WHERE Blog_ID='$Blog_ID'");

    if ($insert) {
        $ms = "Successfully Changed";
        echo "<script>window.top.location='../index.php?msg=$ms'</script>";
    } else {
        $ms = "Something was Wrong! Please Contact System Developer";
       echo "<script>window.top.location='../index.php?msg=$ms'</script>";
    }


}else{

    // if image in

    $extension=strtolower(substr($name,strpos($name, '.') + 1));
     $img_No=rand();
     $img_link=$img_No.".".$extension;

    if(($extension=='png') || ($extension=='jpg') || ($extension=='jpeg') || ($extension=='JPG')) {

        if (move_uploaded_file($temp, "../../reportimages/blog/".$img_link)) {//image path

            unlink("../../reportimages/blog/".$img);
            include '../../connection.php';
            $insert=$db->query("UPDATE blog SET Blog_Title='$title',Title_desc='$Title_desc',img_url='$img_link',Main_Desc='$Main_Desc' WHERE Blog_ID='$Blog_ID'");

            if ($insert) {
                $ms = "Successfully Changed";
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