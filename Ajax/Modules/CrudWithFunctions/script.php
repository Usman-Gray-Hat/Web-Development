<?php
include('dbConfig.php');
?>
<!-- Scripting -->
<script type="text/javascript">

    // Insert Record
    function insertRecord()
    {
        var name = $("#name").val();
        var age = $("#age").val();
        var gender = $("#gender").val();
        if(name=='' || age=='' || gender=='')
        {
            alert("All fields are required!");
        }
        else
        {
            $.ajax({
                type: "post",
                url: "insert.php",
                data: {name:name, age:age, gender:gender},
                success: function (data,status) 
                {
                    readRecord();
                    swal.fire({
                        title: "DATA INSERTED!",
                        text: "A new record has been creadted successfully.",
                        icon: "success",
                        confirmButtonColor: 'blue',
                        showCloseButton: true,
                        allowOutsideClick: false,
                        timer: 2000
                    });
                    $("#insertForm input").val("");
                    $("#insertModal").modal("hide");
                }
            });
        }
    }

    // Read Record
    function readRecord()
    {
        var rd = 'rd';
        if(rd!='')
        {
            $.ajax({
                type: "post",
                url: "records.php",
                data: {rd:rd},
                success: function (data,status) 
                {
                    $("#tableRecords").html(data);
                }
            });
        }
    }

    //Edit Record
    function editUser(id)
    {
        $("#hidden_id").val(id);
        if(id!='')
        {
            $.ajax({
                type: "post",
                url: "edit.php",
                data: {id:id},
                success:function(data,status) 
                {
                    var user = JSON.parse(data);
                    $("#update_name").val(user.name);
                    $("#update_age").val(user.age);
                    $("#update_gender").val(user.gender);
                    $("#updateModal").modal("show");
                }
            });
        }
    }

    // Update Record
    function updateRecord()
    {
        var hidden_id = $("#hidden_id").val();
        var update_name = $("#update_name").val();
        var update_age = $("#update_age").val();
        var update_gender = $("#update_gender").val();

        if(update_name=='' || update_age=='' || update_gender=='')
        {
            alert('All fields are required.!');
        }
        else
        {
            $.ajax({
                type: "post",
                url: "update.php",
                data: {hidden_id:hidden_id, update_name:update_name, update_age:update_age, update_gender:update_gender},
                success: function (data,status) 
                {
                    readRecord();
                    swal.fire({
                        title: "DATA UPDATED!",
                        text: "Record has been modified.",
                        icon: "success",
                        confirmButtonColor: 'blue',
                        showCloseButton: true,
                        allowOutsideClick: false,
                        timer: 2000
                    });
                    $("#updateModal").modal("hide");
                }
            });
        }
    }

    // Delete Record
    function deleteUser(id2)
    {
        if(id2!='')
        {
            swal.fire({
                title: "CONFIRM?",
                text: "Are you sure you want to delete this record?",
                icon: "question",
                confirmButtonColor: 'blue',
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonColor: 'red',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes',
                allowOutsideClick: false
            }).then((result) => {
                if(result.isConfirmed)
                {
                    $.ajax({
                    type: "post",
                    url: "delete.php",
                    data: {id2:id2},
                    success: function (data,status) 
                    {
                        readRecord();
                        swal.fire({
                        title: "DATA DELETED!",
                        text: "Record has been deleted successfully.",
                        icon: "success",
                        confirmButtonColor: 'blue',
                        showCloseButton: true,
                        allowOutsideClick: false,
                        timer: 2000
                        });
                    }
                  });                    
                }
            });
        }
    }
    
</script>
