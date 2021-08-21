<?php
    include('connection.php');
    session_start();
    if(isset($_POST['token']) && password_verify("logintoken",$_POST['token']))
    {
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];

        $query = $db->prepare('SELECT * FROM users WHERE fname=?');
        $data = array($Username);
        $execute = $query->execute($data);
        if($query->rowcount()>0)
        {
            while($datarow=$query->fetch())
            {
                if(password_verify($Password,$datarow['Password']))
                {
                    $_SESSION['id']=$datarow['uid'];
                    $_SESSION['fname']=$datarow['fname'];
                    echo 0;
                }
            }
        }
        else{
            echo "Please signup....no data found";
        }
        
    }
    else{
        echo "server error";
    }


?>