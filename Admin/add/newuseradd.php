<?php
$F_Name=$_POST['fname'];
$L_Name=$_POST['lname'];
$Username=$_POST['uname'];
$password=$_POST['pass'];
$cpassword=$_POST['cpass'];
$role=$_POST['role'];

$U_ID=$_REQUEST['U_ID'];

$Added_ID=$U_ID;
$Status=$role;
$Active="1";

$pass=md5($cpassword);

if (empty($F_Name) || empty($L_Name) || empty($Username) || empty($password) || empty($cpassword)){
    echo "Can not save empty Data";
}else{

    if ($password==$cpassword){

        if ($role=="0"){
            echo "Please select the Role";
        }else{

            include '../../connection.php';

            $query=$db->query("INSERT INTO users(U_ID,U_Name,F_Name,L_Name,password,Active,Status,Added_ID) VALUES ('','$Username','$F_Name','$L_Name','$pass','$Active','$Status','$Added_ID')");
            if ($query){
                echo $msg="Successfully registered";
                echo "<script>window.top.location='index.php?msg=$msg'</script>";
            }else{
                echo "Can not save data in database";
            }

        }


    }else{
        echo "Passwords are not Matched";
    }
}

?>
