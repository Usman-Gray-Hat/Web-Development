<?php
include('dbConfig.php');
?>


<!-- Scripting -->
<script type="text/javascript">

    // For Signup
    function Signup()
    {
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var gender = $("#gender").val();
        var age = $("#age").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        if(fname=='' || lname=='' || gender=='' || age=='' || email=='' || password=='' || cpassword=='')
        {
            alert('All fields are required');
        }
        else
        {
            if(password!=cpassword)
            {
                alert('Password and confirm password is not identical');
            }
            else
            {
                $.ajax({
                    type: "post",
                    url: "signup.php",
                    data: {fname:fname, lname:lname, gender:gender, age:age, email:email, password:password, cpassword:cpassword},
                    success: function (data,status) 
                    {
                        if(data==1)
                        {
                            $("#signupForm input,select").val("");
                            $("#signupModal").modal("hide");
                            alert('Registration Successfull!');
                        }
                        else if(data==0)
                        {
                            $("#signupForm input,select").val("");
                            $("#signupModal").modal("hide");
                            alert('Registration Failed!');
                        }
                    }
                });
            }
        }
    }

    // For Login
    function Login()
    {
        var email_login = $("#email_login").val();
        var password_login = $("#password_login").val();
        if(email_login=='' || password_login=='')
        {
            alert('All fields are required');
        }
        else
        {
            $.ajax({
                type: "post",
                url: "login.php",
                data: {email_login:email_login, password_login:password_login},
                success: function (data,status) 
                {
                    if(data==1)
                    {
                        $("#loginForm input").val("");
                        $("#loginModal").modal("hide");
                        alert('Login successfull!');
                        window.location.href='home.php';
                    }
                    else if(data==0)
                    {
                        alert('Invalid email or password!');
                    }
                }
            });  
        }
    }
</script>