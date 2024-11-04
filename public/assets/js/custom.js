$(document).ready(function(){

    $('input').on('change', function(event){
       var val = $(this).val();
     if (val) {
        // If val is not empty (contains some value)
        $(this).next('img').show(); // Show the image when the input has a value
    } else {
        // If val is empty (no value)
        $(this).next('img').hide(); // Hide the image when the input is empty
    }
});



});