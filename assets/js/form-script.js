$(document).ready(function () {
    console.log('ready!');
    $('#select_photo').on('click', function () {
        console.log('click!');
        $('#FormControlFile').trigger("click");
    })
});