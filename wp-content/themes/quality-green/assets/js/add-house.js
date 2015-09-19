/**
 * Created by Rachel on 6/09/15.
 */

jQuery(document).ready(function($){
    $('.pods-form-ui-row-name-rain-water-tank').
        prepend('<th class="icon"><span class="water-tank-icon"></span></th>');
    $('.pods-form-ui-row-name-house-picture').
        prepend('<th class="icon" rowspan="4"><span class="house-icon"></span></th>');
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
    $(".pods-form-ui-row-name-post-code").hide();
    $('#pods-form-ui-pods-meta-suburb').attr( 'autocomplete', 'off' );

    $('#pods-form-ui-pods-meta-suburb').autocomplete({
        showNoSuggestionNotice : true,
        noSuggestionNotice: "No matching suburb found",
        lookup: function(query, done) {
            var data = {
              action : 'titanium_lookup_suburb_add_house',
              query : query
            };

            // check for the suburbs and its code
            $.ajax({
                url: titanium.ajaxurl,
                type: "post",
                data: data,
                success: function(response){
                    done(response);
                }
            });
        },
        onSelect: function(suggestion){
            $('#pods-form-ui-pods-meta-post-code').val(suggestion.postcode);
            //$.Topic('get-house-community-information').publish(suggestion.data);
        }
    });
});


