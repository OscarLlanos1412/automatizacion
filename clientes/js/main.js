$(document).ready(function() {
    $('#search').keyup(function(event) {
        event.preventDefault();
        let datos = $('#form').serializeArray();
        $.post({
            url: 'actions.php',
            data: datos,
            success: function(response) {
                $('#response').html(response);
            }
        })
    })

});