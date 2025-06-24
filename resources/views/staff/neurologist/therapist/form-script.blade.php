<script>
    $(document).ready(function() {

        $(document).on('click', '#addPlatform', function() {
            $.ajax({
                type: 'GET',
                url: '{!! route('staff.therapist.social') !!}',
                dataType: 'JSON',
                success: function(response) {
                    let html = `<tr>
                                        <td>
                                            <select name="online_platforms[]" id="online_platforms" class="form-control">
                                                <option id="">Select online platform</option>`;
                    $.each(response, function(key, value) {
                        html +=
                            `<option value="${value.id}">${value.name}</option>`;
                    });

                    html += `</select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="urls[]" id="urls" placeholder="Enter URL" />
                                        </td>
                                        <td>
                                            <button type="button" class="btn" id="removePlatform"><i class='bx bxs-trash'></i></button>
                                        </td>
                                    </tr>`;
                    $('table tbody').append(html);
                }
            });
        });

        $(document).on('click', '#removePlatform', function() {
            $(this).parent().parent().remove();
        });

        $('input.tags').tagsinput({
            maxTags: 10
        });
    });

    function cities() {
        var options = {
            types: ['(postal_code)']
        };
        var location = document.getElementById('location');
        var autoComplete = new google.maps.places.Autocomplete(location)
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.map_api_key') }}&libraries=places&callback=cities" type="text/javascript"></script>
