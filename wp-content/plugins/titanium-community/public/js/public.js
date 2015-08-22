/**
 * Created by vivekbhusal on 22/08/15.
 */
jQuery(document).ready(function($){
    $('.search-suburb > input').autocomplete({
        lookup: function(query, done) {
            var data = {
                action: 'titanium_lookup_suburb',
                query: query
            };

            //Check if agreement exists
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
            console.log(suggestion);
        }
    });
});
