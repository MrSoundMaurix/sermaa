$(document).ready(function() {
    $('#provincia').on('change', function() {
        var provincia = $(this).val();
        if ($.trim(provincia) != '') {
            $.ajax({
                type: "get",
                url: "{{url('/getCanton')}}/" + provincia,
                success: function(res) {
                    if (res) {
                        $('#canton').empty();
                        $('#state').append('<option>Ingrese</option>');
                        $.each(res, function(key, value) {
                            $("#canton").append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                }
            });
        }
    });
});