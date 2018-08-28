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

function get_months_for_deleting_data() {
    $.ajax({
        url: "php_action/get_months.php",
        method: "GET",
        dataType: [],
        success: function (response) {
            //alert(response);
            var months = $.parseJSON(response);
            //alert(months.length);
            for (index = 0; index < months.length; index++) {
                $("#selected_month").append("<option value='" + months[index] + "'>" + months[index] + "</option>");

            }
        }
    });
}

//populating a select with months 
$(document).ready(function () {
    get_months();
    get_months_for_deleting_data()
    readRecords();

    $("#sel_month").change(function () {
        
    });


    $('#users').click(function(){
        $('#div_filter').hide();
        $('#display_users').show();
        $('#div_delete_data').hide();
        $('#div_manage_tests').hide();
    });

    $('#home').click(function(){
        $('#div_filter').show();
        $('#display_users').hide();
        $('#div_delete_data').hide();
        $('#div_manage_tests').hide();
    });


    $('#trash').click(function(){
        $('#div_filter').hide();
        $('#display_users').hide();
        $('#div_delete_data').show();
        $('#div_manage_tests').hide();
    });

     $('#tests_manager').click(function () {
         $('#div_filter').hide();
         $('#display_users').hide();
         $('#div_delete_data').hide();
         $('#div_manage_tests').show();
     });

    $("#manage_tests").DataTable({
        "dom": 'Bfrtip',
        "buttons": [
            //'copy', 'csv', 'excel', 'pdf',
            {
                extend:'copy',
                exportOptions: {
                    columns:[0,1,2,3,4]
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: [0, 1, 2,3,4]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4]
                }   
            }
        ],
        "ajax": "php_action/manage_tests.php",
        "order": [],
    });

    //Reception Date Picker
    $('#reception_datetime').datetimepicker({
        format: 'DD/MM/YYYY hh:mm:ss'
    });

    //Reception Date Picker
    $('#dispatch_datetime').datetimepicker({
        format: 'DD/MM/YYYY hh:mm:ss'
    });

   
});