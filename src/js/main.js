$(document).ready(function() {

    $('#form').submit(function (event) {

       event.preventDefault();

       $.ajax({
           type:  $(this).attr('method'),
           url: $(this).attr('action'),
           data: new FormData(this),
           contentType: false,
           cache: false,
           processData: false,
           success: function() {
               $('#result').text(result);
           },
           // success: function(result) {
           //  alert(result);
       });
    });

    $(function() {
        $("#datepicker").datepicker();
    });

    $("#deposit-amount-range").on("input", function(){
        $("#deposit-amount-field").val(this.value);
    });

    $("#deposit-replenishment-range").on("input", function(){
        $("#deposit-replenishment-amount").val(this.value);
    });

    $('.calculator-form__label').change(function(e) {
        $('#deposit-replenishment-amount').prop('disabled', !+$(e.target).val());
        $('#deposit-replenishment-range').prop('disabled', !+$(e.target).val());
        $('#deposit-replenishment-amount').val('');
    });




});