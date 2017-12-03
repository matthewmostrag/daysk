// Datepicker
var $due_date = $('#due_date');
var dp = $due_date.datepicker({
    minDate: new Date()
}).data('datepicker');

var default_date = $due_date.val();
if (default_date != '') {
    dp.selectDate(new Date(default_date));
}
