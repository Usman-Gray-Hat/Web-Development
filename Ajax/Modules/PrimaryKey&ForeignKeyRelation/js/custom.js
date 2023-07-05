// Toaster function need to define seconds to be live and the text to be shown. 
function toaster(text, duration)
{
    Toastify({
      text: text,
      duration: duration*1000,
      newWindow: true,
      close: true,
      gravity: "top",
      position: "center",
      pauseOnHover: true,
      style: {
        "background": "rgb(68 67 67 / 84%)",
        "backdrop-filter": "saturate(180%) blur(20px)",
        "-webkit-backdrop-filter": "saturate(180%) blur(20px)",
        "border-radius": "20px",
      }, 
      onClick: function(){} 
    }).showToast();
}
// Global Declaration Of Key
var key;

// Login
$("#loginBtn").click(function(){
    key = "Login";
    let email = $("#email").val();
    let password = $("#password").val();
    if(email=='' || password=='')
    {
        toaster("You can't left email or password field empty!",5);
    }
    else
    {
        $.ajax({
            type: "POST",
            url: "../../practice/ajax/login.php",
            data: {key:key, email:email, password:password},
            success: function (response,status) 
            {
                if(response==="Login successful..!")
                {
                    window.location.href="home.php";
                }
                else if(response==="Invalid email or password..!")
                {
                    toaster(response,5);
                }
            }
        });
    }
});

// Fetch Records
function readRecord()
{
    key = "FetchUsers";
    $.ajax({
        type: "POST",
        url: "../../practice/ajax/fetch.php",
        data: {key:key},
        success: function (response,status) 
        {
            $("#userTable").html(response);
        }
    });
}

// Load Records On Page Initialization
$(document).ready(function () {
    readRecord();
});

// Add User
$("#btnAddUser").click(function(){
    key = "AddUser";
    let name = $("#name").val();
    let gender = $("#gender").val();
    let age = $("#age").val();
    let qualification = $("#qualification").val();
    if(name=='' || gender=='' || age=='' || qualification=='')
    {
        toaster("All fields are required!",5);
    }
    else
    {
        $.ajax({
            type: "POST",
            url: "../../practice/ajax/addUser.php",
            data: {key:key, name:name, gender:gender, age:age, qualification:qualification},
            success: function (response,status) 
            {
                if(response==="New user has been added!")
                {
                    readRecord();
                    toaster(response,5);
                    $("#addUserForm input,select").val("");
                    $("#addUserModal").modal("hide");
                }
                else if(response==="User not added!")
                {
                    toaster(response,5);
                }
            }
        });
    }
});