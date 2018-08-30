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

function get_months_for_plotting_graph() {
    $.ajax({
        url: "php_action/get_months.php",
        method: "GET",
        dataType: [],
        success: function (response) {
            //alert(response);
            var months = $.parseJSON(response);
            //alert(months.length);
            for (index = 0; index < months.length; index++) {
                $("#favourite_month").append("<option value='" + months[index] + "'>" + months[index] + "</option>");

            }
        }
    });
}

//populating a select with months 
$(document).ready(function () {
    get_months();
    get_months_for_deleting_data();
    get_months_for_plotting_graph()
    readRecords();

    $('#close').click(function(){
        window.location.href="../../dashboard.php";
    });
//plotting a graph
    $("#favourite_month").change(function () {
        var month = $(this).val();
        
        $.ajax({
            url: 'php_action/plot_graph.php',
            type: 'post',
            data: { month: month },
            dataType: [],
            success: function (response) {
                $('#analysis_modal').modal('show');
                //$('#myModalLabel').html();
                var test_data = JSON.parse(response);
                var tests_array = test_data[0];
                //alert(tests_array[0]);
                var save_fine = test_data[1];
                var save_not_fine = test_data[2]

                $('#my-chart').highcharts({

                chart: {

                    type: 'column'

                },

                title: {

                    text: "Tests Data Analysis In  " + month

                },

                xAxis: {

                    categories: tests_array

                },

                yAxis: {

                    title: {

                        text: 'No of Tests'

                    }

                },

                series: [{

                    name: 'Done In Time',

                    data: save_fine

                }, {

                    name: 'Not Done In Time',

                    data: save_not_fine

                }]

                });
            }
        });
    });


    $('#users').click(function(){
        $('#div_filter').hide();
        $('#display_users').show();
        $('#div_delete_data').hide();
        $('#div_manage_tests').hide();
        $('#div_grahp').hide();

    });

    $('#home').click(function(){
        $('#div_filter').show();
        $('#display_users').hide();
        $('#div_delete_data').hide();
        $('#div_manage_tests').hide();
        $('#div_grahp').hide();

    });


    $('#trash').click(function(){
        $('#div_filter').hide();
        $('#display_users').hide();
        $('#div_delete_data').show();
        $('#div_manage_tests').hide();
        $('#div_grahp').hide();

    });

     $('#tests_manager').click(function () {
         $('#div_filter').hide();
         $('#display_users').hide();
         $('#div_delete_data').hide();
         $('#div_grahp').hide();
         $('#div_manage_tests').show();
     });

    $('#tests_graph').click(function () {
        $('#div_filter').hide();
        $('#display_users').hide();
        $('#div_delete_data').hide();
        $('#div_grahp').show();
        $('#div_manage_tests').hide();
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


   


        $("#update_test").keyup(function () {

            //Assigning search box value to javascript variable named as "name".

            var name = $('#update_test').val();

            //Validating, if "name" is empty.

            if (name == "") {

                //Assigning empty value to "display" div in "search.php" file.

                $("#display").html("");

            }

            //If name is not empty.
            else {

                //AJAX is called.

                $.ajax({

                    //AJAX type is "Post".

                    type: "POST",

                    //Data will be sent to "ajax.php".

                    url: "../php_action/search.php",

                    //Data, that will be sent to "ajax.php".

                    data: {

                        //Assigning value of "name" into "search" variable.

                        search: name

                    },

                    //If result found, this funtion will be called.

                    success: function (html) {

                        //Assigning result to "display" div in "search.php" file.

                        $("#display").html(html).show();

                    }

                });

            }

        });

   
});