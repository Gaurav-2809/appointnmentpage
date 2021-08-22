<?php
    include('connection.php');
    session_start();
    if(isset($_POST['token']) && password_verify("logintoken",$_POST['token']))
    {
        $Username = $_POST['Username'];
        $pass = $_POST['pass'];

        $query = $db->prepare('SELECT * FROM users WHERE fname=?');
        $data = array($Username);
        $execute = $query->execute($data);
        if($query->rowcount()>0)
        {
            while($datarow=$query->fetch())
            {
                if(password_verify($pass,$datarow['pass']))
                {
                    $_SESSION['id']=$datarow['uid'];
                    $_SESSION['fname']=$datarow['fname'];
                    echo 0;
                }
                else
                {
                    echo "something went wrong";
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