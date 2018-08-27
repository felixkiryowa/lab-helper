function get_months() {
    $.ajax({
        url: "php_action/get_months.php",
        method: "GET",
        dataType: [],
        success: function (response) {
            //alert(response);
            var months = $.parseJSON(response);
            //alert(months.length);
            for (index = 0; index < months.length; index++) {
                $("#sel_month").append("<option value='" + months[index] + "'>" + months[index] + "</option>");

            }
        }
    });
}


//populating a select with months 
$(document).ready(function () {
    get_months();
    readRecords();

    $("#sel_month").change(function () {
        
    });


    $('#users').click(function(){
        $('#div_filter').hide();
        $('#display_users').show();
    });

    //adding a user
    // Add Record

    // READ records
    function readRecords() {
        $.get("php_action/users/read_records.php", {}, function (data, status) {
            $(".records_content").html(data);
        });
    }

    $('#adding_users').click(function(){
        // get values
        var name = $("#names").val();
        var username = $("#username").val();
        var password = $("#password").val();

        // Add record
        $.post("php_action/users/add_user.php", {
            name: name,
            username: username,
            password: password
        }, function (data, status) {
            // close the popup
            $("#add_new_user_modal").modal("hide");

            // read records again
            readRecords();

            // clear fields from the popup
            $("#names").val("");
            $("#username").val("");
            $("#password").val("");
        });
    });
      
    function DeleteUser(id) {
        var conf = confirm("Are you sure, do you really want to delete User?");
        if (conf == true) {
            $.post("php_action/users/delete_user.php", {
                id: id
            },
                function (data, status) {
                    // reload Users by using readRecords();
                    readRecords();
                }
            );
        }
    }  

    $('#summary').DataTable({
        "dom": 'Bfrtip',
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print',
        ]
    });

});