<?php
include('connection.php');
if(isset($_POST['token']) && password_verify("signuptoken",$_POST['token']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];

    if($fname!="" && $lname!="" && $email!="" && $phone!="" && $gender!="" && $pass!="")
    {
        $query=$db->prepare("INSERT INTO users(fname,lname,email,phone,gender,pass) VALUES (?,?,?,?,?,?)");

        $data=array($fname,$lname,$email,$phone,$gender,password_hash($pass, PASSWORD_DEFAULT));

        $execute=$query->execute($data);
        if($execute)
        {
            echo 0;
        }
        else{
            echo"something went wrong";
        }
    }

}
else{
    echo "server error";
}
?>