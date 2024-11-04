
$('#btnfilter').on('click', function() {
  // Get the values and make the AJAX request
  var chr_id = $('#chr_id').val();
  var start_date = $('#from_date').val();
  var end_date = $('#to_date').val();
  get_values(chr_id, start_date, end_date);
});



var chr_id = $('#chr_id').val();
var start_date="";

var end_date="";

function get_values(chr_id, start_date, end_date) {
    var url = get_base_url(); // Assuming the `get_base_url` function is defined and returns a valid URL
    $.ajax({
      url: base_url + "/dashboard/getvalues",
      method: 'POST',
      data: {
        chr_id: chr_id,
        start_date: start_date,
        end_date: end_date
      },
      dataType: 'json', // Ensure the response is automatically parsed as JSON

      success: function(response) {
        // Handle the success response here
        var data = response;
        
       
        // Access the response directly
 
        // Set each value in separate <span> tags
        $('#get_All_visitors').text(data.get_All_visitors);
        $('#first_time_visitors').text(data.first_time_visitors);
        $('#get_returning_visitors').text(data.get_returning_visitors);
        $('#member_in_att').text(data.member_in_att);
        $('#Congregation_in_Attendance').text(data.memberinattendance);
      },
      error: function(xhr, status, error) {
        // Handle the error here
        console.error(error);
      }
    });
  }
  
  

get_values(chr_id, start_date, end_date);




