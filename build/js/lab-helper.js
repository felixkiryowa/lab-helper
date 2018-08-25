
function fill(Value) {

    //Assigning value to "search" div in "search.php" file.

    $('#search').val(Value);

    //Hiding "display" div in "search.php" file.

    $('#display').hide();

}

$(document).ready(function(){
    
    lab_testTable = $('#lab_test').DataTable();

    //Reception Date Picker
    $('#reception_datetime').datetimepicker({
        format: 'DD/MM/YYYY hh:mm:ss'
    });

    //Reception Date Picker
    $('#dispatch_datetime').datetimepicker({
        format: 'DD/MM/YYYY hh:mm:ss'
    });

    //getting searched data
    //On pressing a key on "Search box" in "search.php" file. This function will be called.

    $("#search").keyup(function () {

        //Assigning search box value to javascript variable named as "name".

        var name = $('#search').val();

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


    //creating a test
    $("#new_test").on('click', function() {
        // reset the form
        $("#createTestForm")[0].reset();

         // remove the error
        $(".form-group").removeClass('has-error').removeClass('has-success');
        $(".text-danger").remove();
        // empty the message div
        $(".messages").html("");

        // submit form
        $("#save_test").click(function(){

            $(".text-danger").remove();

            var form = $('#createTestForm');

            // validation
            var sample_id = $("#sample_id").val();
            var receptiondatetime = $("#receptiondatetime").val();
            var test = $("#search").val();

            if (sample_id == "") {
                $("#sample_id").closest('.form-group').addClass('has-error');
                $("#sample_id").after('The sample Id field input is required');
            } else {
                $("#sample_id").closest('.form-group').removeClass('has-error');
                $("#sample_id").closest('.form-group').addClass('has-success');
            }

            if (receptiondatetime == "") {
                $("#receptiondatetime").closest('.form-group').addClass('has-error');
                $("#receptiondatetime").after('The reception date and time field input is required');
            } else {
                $("#receptiondatetime").closest('.form-group').removeClass('has-error');
                $("#receptiondatetime").closest('.form-group').addClass('has-success');
            }

            if (test == "") {
                $("#test").closest('.form-group').addClass('has-error');
                $("#test").after('The test field input is required');
            } else {
                $("#test").closest('.form-group').removeClass('has-error');
                $("#test").closest('.form-group').addClass('has-success');
            }

            if (sample_id && receptiondatetime && search) {
                $('#loader-gif').html('<img src="images/loading.gif" /> Saving Data...');

                //submi the form to server
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: form.serialize(),
                    dataType: 'json',
                    success:function(response){
                        // remove the error
                        $(".form-group").removeClass('has-error').removeClass('has-success');

                        if (response.success == true) {
                            $('#loader-gif').hide();
                            $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
                                '</div>');

                            // reset the form
                            $("#createTestForm")[0].reset();

                            // reload the datatables
                            lab_testTable.ajax.reload(null, false);
                            // this function is built in function of datatables;
                            $('#details_section').load('php_action/details_about_a_test.php');
                            $('#total_test_in_db').load('php_action/total_tests.php');


                        } else {
                            $('#loader-gif').hide();
                            $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>' + response.messages +
                                '</div>');
                        } // /else
                    }
                });

            }


        });
    });

   //clicking a specific tes
    $('.specific_test').click(function(){
        var specific_test = $(this).attr("id");
        $(".my-progress-bar").html("");
        // alert(specific_test);
        $.ajax({
            url: "php_action/test_details.php",
            method: "POST",
            data: {
                specific_test: specific_test
            },
            dataType: [],
            success: function(response) {
                $('#details_about_a_test').modal('show');
                var res = $.parseJSON(response);
                // alert(res.result[0])
                var fine = res.result[0];
                var not_fine = res.result[1];
                var total = res.result[3];
                var percentage = parseInt((fine / total) * 100);
                var fine_percentage = 
                $('.test_title').html(res.result[2]);
                $('#fine').html(fine);
                $('#not_fine').html(not_fine);
                $(".my-progress-bar").circularProgress({
                    line_width: 4,
                    color: "red",
                    starting_position: 0, // 12.00 o' clock position, 25 stands for 3.00 o'clock (clock-wise)
                    percent: 0, // percent starts from
                    percentage: true,
                    text: "Completed " + res.result[2] + ", Tests Done In Required Time"
                }).circularProgress('animate',percentage, 2000);

            }
        });
   });
  
});

//refreshing a section sidebar holding test
$('#details_section').load('php_action/details_about_a_test.php');
$('#total_test_in_db').load('php_action/total_tests.php');

// function refresh() {
//     setTimeout(function(){
        
       

//         refresh();
//     },2000);
  
// }

// refresh();
//reloading a page whenever a close button is clicked
$('#close').click(function(){
    //location.reload(); 
    $(".my-progress-bar").html("");
});

//Time and date display
var interval = setInterval(function () {
    var momentNow = moment();
    $('#date-part').html(momentNow.format('YYYY MMMM DD') + ' '
        + momentNow.format('dddd')
            .substring(0, 3).toUpperCase());
    $('#time-part').html(momentNow.format('A hh:mm:ss'));
}, 100);


//for retrieving from the database
lab_testTable = $("#lab_test").DataTable({
    "dom": 'Bfrtip',
    "buttons": [
       'copy', 'csv', 'excel', 'pdf', 'print',
        // {
        //     extend:'copy',
        //     exportOptions: {
        //         columns:[0,1,2,3,4]
        //     }
        // },
        {
            extend: 'excel',
            exportOptions: {
                columns: [0, 1, 2]
             }
        },
        // {
        //     extend: 'print',
        //     exportOptions: {
        //         columns: [0, 1, 2, 3, 4]
        //     }   
        // }
    ],
    "ajax": "php_action/retrieve_all_tests.php",
    "order": [],
});

function completeTest(id) {

    if(id){

        // reset the form
        $("#completingTestForm")[0].reset();
        // remove the error
        $(".form-group").removeClass('has-error').removeClass('has-success');
        $(".text-danger").remove();
        // empty the message div
        $(".completion_messages").html("");

        // submit form
        $("#completion").click(function () {
            $(".text-danger").remove();

            var form = $('#completingTestForm');
            // validation
            var dispatchdatetime = $("#dispatchdatetime").val();

            if (dispatchdatetime == "") {
                $("#dispatchdatetime").closest('.form-group').addClass('has-error');
                $("#dispatchdatetime").after('The Dispatch Date And Time field input is required');
            } else {
                $("#dispatchdatetime").closest('.form-group').removeClass('has-error');
                $("#dispatchdatetime").closest('.form-group').addClass('has-success');
            }

            if (dispatchdatetime) {
                //submi the form to server
                $.ajax({
                        url: form.attr('action'),
                        type: form.attr('method'),
                        data: { test_id: id,dispatch:dispatchdatetime},
                        dataType: 'json',
                        success:function(response){
                            $('#loader-gif').html('<img src="images/loading.gif" /> Saving Data...');
                            // remove the error
                            $(".form-group").removeClass('has-error').removeClass('has-success');

                            //alert(response.messages);

                            if (response.success == true) {
                                $('#loader-gif').hide();
                                $(".completion_messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                    '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
                                    '</div>');

                                // reset the form
                                $("#completingTestForm")[0].reset();

                                // reload the datatables
                                lab_testTable.ajax.reload(null, false);
                                // this function is built in function of datatables;


                            }
                             else {
                                $('#loader-gif').hide();
                                $(".completion_messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                    '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>' + response.messages +
                                    '</div>');
                            } 
                        }
                });
                 
            }
           
             return false;
        });


    }else{
        alert("Error : Refresh the page again");
    }


}