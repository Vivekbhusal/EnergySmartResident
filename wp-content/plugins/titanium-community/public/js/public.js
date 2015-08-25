/**
 * Created by vivekbhusal on 22/08/15.
 */
jQuery(document).ready(function($){
    /**
     * the team menu becomes active automatically on home page..
     * This line of javascript removes that.
     */
    $("#menu-item-42").removeClass("active");

    /**
     * The autocomplete functionality at home page to select the suburbs
     */
    $('.search-suburb > input').autocomplete({
        lookup: function(query, done) {
            var data = {
                action: 'titanium_lookup_suburb',
                query: query
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
            $.Topic('get-community-info').publish(suggestion.data);
        }
    });

    /**
     * Callback function to check for the community info
     * @var suburb_id Id of suburb
     */
    $.Topic('get-community-info').subscribe(function(suburb_id){

        var data = {
            action : 'titanium_compute_community_details',
            query  : suburb_id
        };

        $.ajax({
            url: titanium.ajaxurl,
            type: "post",
            data: data,
            success: function(response){
                $("#suburb-name").html(response.suburb_info.suburb_name);

                /**
                 * Compute Hospital information
                 */
                var hospital_distance = $.grep(response.hospital, function(value){
                    return value.type == "Emergency";
                });
                $("#hospital-head").html(hospital_distance.distance+" km to Hospital");
                //$.each(response.hospital, function(value){
                //
                //});
                //$("#hospital-details").html();

                $("#community-container").show();
            }
        });

    });

    $(".hexagon-box").qtip({
       content: {
           title: function(){
               return $(this).parent().find('h2').attr('title');
           },
           text: function(event, api){
               return $(this).parent().find('.details').html();
           }
        },
        style: {
            classes: 'qtip-green qtip-shadow qtip-rounded'
        }
    });
});
