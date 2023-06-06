<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Toaster CSS File -->
    <link rel="stylesheet" href="Toaster/toaster.css">
    <title>Generate Discount Coupon</title>
</head>
<body>
  <style>

*{
    font-family: sans-serif;
}

.card-title{
    font-weight: 900;
    letter-spacing: 1px;
}
</style>
      
        <!-- Bootstrap Grid System -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <!-- Card -->
                    <div class="card shadow">
                        <div class="card-header">
                            <h1 class="card-title text-center">DISCOUNT COUPON</h1>
                        </div>
                        <div class="card-body">

                            <!-- Discount Value (Enter By User) -->
                            <div class="form-group">
                                <label for="">Discount value (1 - 100)%</label>
                                <input type="number" class="form-control" name="discount" id="discount" placeholder="Enter your discount value">
                                <small id="helpId" class="form-text text-muted">Type the discount to generate</small>
                              </div>

                              <!-- Discount Coupon (Auto-Generated) -->
                              <div class="form-group">
                                <label for="">Your discount coupon</label>
                                <input type="text" class="form-control" name="coupon" id="coupon" placeholder="Will be generated here" readOnly>
                                <small id="helpId" class="form-text text-muted">Don't share discount coupon with others</small>
                              </div>

                              <!-- Coupon Expiration With Timer  -->
                              <div class="form-group">
                                <label for="">Discount coupon to be expire within 30 seconds</label>
                                <input type="text" class="form-control" name="timer" id="timer" value="00:30" readOnly>
                                <small id="helpId" class="form-text text-muted">Use it before expire</small>
                              </div>

                              <!-- Buttons -->
                              <button type="button" class="btn btn-outline-primary mb-2" id="generateDiscountBtn">Generate Discount Code</button> <br>
                              <a href="EnterCode.php" target="_blank" class="btn btn-outline-success" id="generateDiscountBtn">Go to next page</a>
                        </div>
                        <div class="card-footer">
                          <h5>You can ask for new coupon after every 30 seconds.</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- JS Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <!-- Toaster JS File -->
    <script src="Toaster/toaster.js"></script>
    <?php
    include('Toaster/ToasterOptions.php');
    ?>

    <script type="text/javascript">
      $("#generateDiscountBtn").click(function(){
      let time = localStorage.getItem('timer') || 30; //  30 seconds
      let timer;
      var discount = $("#discount").val();
      if(discount=='')
      {
        toastr.error("Please enter discount value","Error occured!");
      }
      else
      {
        if(discount < 1 || discount > 100)
        {
          toastr.error("Please enter valid discount value","Error occured!");
        }
        else
        {
          // Generating Coupon Using Random String Technique  
          var randomString = '';
          var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
          for (var i = 0; i < 8; i++) 
          {
            var randomIndex = Math.floor(Math.random() * characters.length);
            randomString += characters[randomIndex];
          }
          $("#coupon").val(randomString);
          localStorage.setItem('current_coupon',randomString);
          localStorage.setItem('current_discount_value',discount);
          toastr.success("Use your coupon within 30 seconds.","Your Discount Coupon Generated!");
          $("#discount").attr("disabled",true);
          
          //   Timer
          timer = setInterval(function() {
          var minutes = Math.floor(time / 60);
          var seconds = time % 60;
          var formattedTime = (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
          $('#timer').val(formattedTime);
          time--;
          if (time < 0) 
          {
            clearInterval(timer);
            toastr.warning("Your discount coupon has expired. Ask for new one.","Coupon Expired!");
            localStorage.removeItem('timer');
            localStorage.removeItem('current_coupon');
            localStorage.removeItem('current_discount_value');
            $("#discount").attr("disabled",false);
            $("#discount").val("");
            $("#coupon").val("");
            $("#timer").val("00:30");
          } 
          else
          {
            localStorage.setItem('timer', time);
          }
          }, 1000);
        }
      }
    });

    $(document).ready(function () {
    let time = localStorage.getItem('timer') || 30; // 30 seconds
    let timer;
    // Check if there is a timer value stored in local storage
    if (localStorage.getItem('timer')) 
    {
        let current_coupon = localStorage.getItem("current_coupon");
        let current_discount_value = localStorage.getItem('current_discount_value');
        $("#discount").attr("disabled",true);
        $("#discount").val(current_discount_value);
        $("#coupon").val(current_coupon);
        timer = setInterval(function() {
        var minutes = Math.floor(time / 60);
        var seconds = time % 60;
        var formattedTime = (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
        $('#timer').val(formattedTime);
        time--;
        if (time < 0) 
        {
          clearInterval(timer);
          toastr.warning("Your discount coupon has expired. Ask for new one.","Coupon Expired!");
          localStorage.removeItem('timer');
          localStorage.removeItem('current_discount_value');
          localStorage.removeItem('current_coupon');
          $("#discount").attr("disabled",false);
          $("#discount").val("");
          $("#coupon").val("");
          $("#timer").val("00:30");
        } 
        else 
        {
          localStorage.setItem('timer', time);
      }
    }, 1000);
  }
});
    </script>
  </body>
</html>