/**
 * Created by Rachel on 6/09/15.
 */

jQuery(document).ready(function($){
    $('.pods-form-ui-row-name-house-picture').
        prepend('<td valign="top" class="icon" rowspan="2"><span class="house-icon"></span></td>');
    $('.pods-form-ui-row-name-rain-water-tank').
        prepend('<th class="icon"><span class="water-tank-icon"></span></th>');
    $('.pods-form-ui-row-name-type-of-window-frame').
        prepend('<th class="icon" rowspan="3"><span class="window-icon"></span></th>');
    $('.pods-form-ui-row-name-house-has-air-conditioner').
        prepend('<th class="icon" rowspan="2"><span class="air-conditioner-icon"></span></th>');
    $('.pods-form-ui-row-name-has-skylight').
        prepend('<th class="icon" rowspan="1"><span class="skylight-icon"></span></th>');
    $('.pods-form-ui-row-name-solar-hot-water-system').
        prepend('<th class="icon" rowspan="2"><span class="hot-water-system-icon"></span></th>');

    $('.pods-form-ui-row-name-has-thermostat').
        prepend('<th class="icon" rowspan="1"><span class="thermostat-icon"></span></th>');

    $('.pods-form-ui-row-name-has-energy-saver-system').
        prepend('<th class="icon" rowspan="2"><span class="energy-saver-system-icon"></span></th>');

    $('.pods-form-ui-row-name-has-external-shading').
        prepend('<th class="icon" rowspan="2"><span class="external-shading-icon"></span></th>');

    $('.pods-form-ui-row-name-house-has-electric-heaters').
        prepend('<th class="icon" rowspan="2"><span class="heater-icon"></span></th>');

    $('.pods-form-ui-row-name-is-property-inspection').
        prepend('<th class="icon" rowspan="2"><span class="nathers-icon"></span></th>');

    //$('#pods-form-ui-pods-meta-post-code').attr('disabled','disabled');

    $(".pods-form-ui-row-name-house-number").hide();
    $(".pods-form-ui-row-name-street-name").hide();
    $(".pods-form-ui-row-name-suburb").hide();
    $(".pods-form-ui-row-name-post-code").hide();
    $('#pods-form-ui-pods-meta-suburb').attr( 'autocomplete', 'off' );

    var componentForm = {
        subpremise: 'short_name',
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    var autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("pods-form-ui-pods-meta-full-address"),
        {
            types: ['geocode'],
            componentRestrictions: {country: "au"}
        }
    );

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        var value;
        var addressDetails = [];
        if(place.address_components){
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    value = place.address_components[i][componentForm[addressType]];
                    addressDetails[addressType] = value;
                }
            }
            if(addressDetails['administrative_area_level_1'] == "VIC") {
                if(addressDetails.street_number == undefined) {
                    swal("Dear User,", "Please enter your full house address, we couldn't find your house number.", "error");
                } else {
                    if(addressDetails.subpremise)
                        $("#pods-form-ui-pods-meta-house-number").val(addressDetails.subpremise+"/"+addressDetails.street_number);
                    else
                        $("#pods-form-ui-pods-meta-house-number").val(addressDetails.street_number);

                    $("#pods-form-ui-pods-meta-street-name").val(addressDetails.route);
                    $("#pods-form-ui-pods-meta-suburb").val(addressDetails.locality);
                    $('#pods-form-ui-pods-meta-post-code').val(addressDetails.postal_code);
                }
            } else {
                swal("Dear User,", "We are really glad to receive your support. We would be more then happy to add your house on on our system but currently we only operate for Victoria. We will contact you soon with further information.", "info");
            }
        }
    });
});


