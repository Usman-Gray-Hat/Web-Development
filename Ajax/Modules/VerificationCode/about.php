<?php
include("dbConnect.php");
include("header.php");
if(!isset($_SESSION['LoginToken']))
{
    header("Location:index.php");
}
?>

<!-- Bootstrap Grid System -->
<div class="container mt-1">
    <div class="row">
        <div class="col-md-12">
            <h1 class="jumbotron text-center bg-dark text-white heading">ABOUT US PAGE</h1>
            <button type="button" class="btn btn-outline-danger mb-2" id="logoutBtn">Logout</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <a href="home.php" class="btn btn-outline-info" >PREV Page</a>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>

<script type="text/javascript">
// Confirmation before logout
$("#logoutBtn").click(function(){
    swal.fire({
        title: "CONFIRM?",
        text: "Are you sure you want to logout?",
        icon: "question",
        confirmButtonColor: "blue",
        showCloseButton: true,
        showCancelButton: true,
        cancelButtonColor: "red",
        cancelButtonText: "No",
        confirmButtonText: "Yes!",
        allowOutsideClick: false
    }).then(function(result){
        if(result.isConfirmed)
        {
            window.location.href="logout.php";
        }
    });
});
</script>