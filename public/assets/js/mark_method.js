$(document).ready(function(){ /* PREPARE THE SCRIPT */
    $("[name='course_id']").change(function() {
        $('div.table-wrapper').show();
        $('form button[type="submit"]').show();
        jQuery.ajax({
            url: $(this).data('route'),
            method: 'get',
            data: {
               id: $(this).val(),
            },
            success: function(result) {
                $.each(result, function (key, value) {
                    $('input[name="' + key + '"]').val(value);
                });
                $('form button[type="submit"]').toggle(!result.seted);
                $('tbody input').prop('disabled', result.seted);
            }
          });      
    });
  });