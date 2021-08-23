<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>appointment page</title>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section>
        <div class="col-sm-12">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="top">
                    APPOINTMENT BOOKING SYSTEM
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="col-sm-6">
                    <div class="button1">
                        <button class="btn0" id="bttn0">LOG IN</button>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="button1">
                        <button class="btn1" id="bttn1">SIGN UP</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4"></div>
        <div class="col-sm-12">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form>
                    <div class="form1" id="formm1">
                        <label for="fname">Username:</label><br>
                        <input type="text" placeholder="Enter Username" class="form-control" name="Username" id="Username"><br>
                        <label for="password">Password:</label><br>
                        <input type="password" class="form-control" placeholder="Enter Password" name="pass" id="pass1"><br>
                        <div class="button2">
                            <button class="btn5" onclick="sendlogin();">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form>
                    <div class="form2 show hidden" id="formm2">
                        <label for="fname">First Name:</label><br>
                        <input type="text" placeholder="Enter your first name" class="form-control" name="fname" id="fname"><br>
                        <label for="lname">Last Name:</label><br>
                        <input type="text" class="form-control" placeholder="Enter your last name" name="lname" id="lname"><br>
                        <label for="email">Email:</label><br>
                        <input type="text" class="form-control" placeholder="Enter your Email" name="email" id="email"><br>
                        <label for="phone">Phone:</label><br>
                        <input type="text" class="form-control" placeholder="enter your Phone" name="Phone" id="phone"><br>
                        <label for="gender">Gender:</label><br>
                        <select name="gender" id="gender" class="form-control">
                        <option value="Choose Gender">Choose Gender</option>
                        <option value="MALE">MALE</option>
                        <option value="FEMLALE">FEMALE</option>
                        <option value="TRANSGENDER">TRANSGENDER</option>
                        </select><br>
                        <label for="password">Password:</label><br>
                        <input type="password" class="form-control" placeholder="Choose Password" name="pass" id="pass"><br>
                        <label for="cpass">Confirm Password:</label><br>
                        <input type="password" class="form-control" placeholder="enter Password" name="cpass" id="cpass"><br>
                        <div class="button2">
                            <button class="btn5" onclick="sendsignup();">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>  
    </section>

</body>

<script type="text/javascript">
    document.getElementById('formm2').style.display = 'none';
    var btn = document.getElementById('bttn0');
    btn.addEventListener("click", function(){
        var login=document.getElementById('formm1')
        var signup=document.getElementById('formm2')
        signup.classList.add('hidden')
        login.classList.remove('hidden')
        login.classList.add('show')

    });

    var btn1 = document.getElementById('bttn1');
    btn1.addEventListener("click", function(){
        var login=document.getElementById('formm1')
        var signup=document.getElementById('formm2')
        login.classList.add('hidden')
        signup.classList.remove('hidden')
        signup.classList.add('show')

    });

    function sendlogin()
    {
       var Username = document.getElementById('Username').value;
       var pass1 = document.getElementById('pass1').value;
       var token = "<?php echo password_hash("logintoken", PASSWORD_DEFAULT);?>"
       if(Username!=="" && pass1!=="")
       {
        $.ajax(
                   {
                       type: 'POST',
                       url:"ajax/login.php",
                       data:{Username:Username,pass1:pass1,token:token},
                       success:function(data)
                       {
                        if(data==0)  {
                            alert('login successfull');
                            window.location="dashboard.php";
                        }       
                       }
                    }
               );
       } 
       else
       {
           alert('please fill all details');
       }
    }

    function sendsignup()
    {
       var fname = document.getElementById('fname').value;
       var lname = document.getElementById('lname').value;
       var email = document.getElementById('email').value;
       var phone = document.getElementById('phone').value;
       var gender = document.getElementById('gender').value;
       var pass = document.getElementById('pass').value;
       var cpass = document.getElementById('cpass').value;
       var token = "<?php echo password_hash("signuptoken", PASSWORD_DEFAULT);?>"
       if(fname!="" && lname!="" && email!="" && phone!="" && gender!="" && pass!="" && cpass!="")
       {
           if(pass==cpass){
        $.ajax(
                   {
                       type: 'POST',
                       url:"ajax/signup.php",
                       data:{fname:fname,lname:lname,email:email,phone:phone,gender:gender,pass:pass,cpass:cpass,token:token},
                       success:function(data)
                       {
                         if(data ==0)
                         {
                             alert('user create');
                             window.location="appointment.php"
                         }
                       }
                    }
               );
            }
            else{
                alert('something went wrong')
            }
       } 
       else
       {
           alert('please fill all details');
       }
    }
   </script>
   <script type=text/javascript>
    $('form').submit(function(e){
        e.preventDefault();
    });
   </script>
   
</html>
