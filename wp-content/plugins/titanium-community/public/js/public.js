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
     * @since 1.0.0
     */
    $('.search-suburb > input').autocomplete({
        lookup: titanium.autocompleteHouseSuggestion,
        onSelect: function(suggestion){
            $.Topic('get-house-community-information').publish(suggestion.data);
        }
    });

    /**
     * Callback function to get all the information about community
     * and the house
     * @var $id Id of house
     * @since 2.0.0
     */
    $.Topic('get-house-community-information').subscribe(function($id){

        var data = {
            action : 'titanium_compute_house_community_details',
            nonce : titanium.nonce,
            query : $id
        };

        /**
         * Ajax call to get the information about house and community
         */
        $.ajax({
            url: titanium.ajaxurl,
            type: "post",
            data: data,
            success: function(response) {
                $.Topic('display-property-info').publish(response.house_details);
                $.Topic('display-community-info').publish(response.community_details);

                /**Display Property Info**/
                $(".property-info").show();

                /**Display the container**/
                $("#community-container").show();

                /**Scroll down to result, animate **/
                $('html, body').animate({
                    scrollTop: $("#energy-rating-section").offset().top
                }, 1000);
            }
        });
    });

    /**
     * Callback function to display the property info
     * @var response information about the property
     * @since 2.0.0
     */
    $.Topic('display-property-info').subscribe(function(response){
        
        /**Set the addressof house**/
        $("#energy-rating-section h1").html(response.address);

        /**Set the image**/
        $('#house').attr('src', response.house_img);

    });

    /**
     * Callback function to display the community info
     * @var response information about the community
     * @since 1.0.0
     * @edited 2.0.0
     */
    $.Topic('display-community-info').subscribe(function(response){

        /**Display the suburb user searched for **/
        $("#suburb-name").html(response.suburb_info.suburb_name);

        /**
         * Compute Hospital information
         */
        var hospital_distance = $.grep(response.hospital, function(value){
            return value.type == "Emergency";
        });
        $("#hospital-head").html(hospital_distance[0].distance+" km to Hospital");
        $("#hospital-details").empty();
        /**Populate for pop ups **/
        $.each(response.hospital, function(index, value){
            var html = "<p>"+
                "<b>Hospital Type: </b>"+value.type+"</br>"+
                "<b>Name: </b>"+value.nearest_hospital+"</br>"+
                "<b>Distance: </b>"+value.distance+"</br>"+
                "</p>";
            $("#hospital-details").append(html);
        });

        /**
         * GPO information
         */
        $("#gpo-head").html(response.gpo.distance+" km to GPO");
        $("#gpo-details").html("GPO is "+response.gpo.distance+" KM far from this suburb. According to Victoria Open Data it is approx. "+response.gpo.travel_time+"mins travel time.");

        /**
         * Schools Information
         */
        $("#school-head").html(response.school.total_schools+" Schools");
        $(".no-of-child-care").html(response.school.childcare);
        $(".no-of-primary-school").html(response.school.primary_school);
        $(".no-of-secondary-school").html(response.school.secondary_school);
        $(".no-of-p12-school").html(response.school.p12_schools);
        $(".no-of-other-school").html(response.school.other_schools);

        /**
         * Aged Care Information
         */
        var agecarenumber = parseInt(response.agecare.high_care)
            +parseInt(response.agecare.low_care)
            +parseInt(response.agecare.srs);
        $("#age-care-head").html(agecarenumber+" Aged Cares");
        $(".no-of-high-care").html(response.agecare.high_care);
        $(".no-of-low-care").html(response.agecare.low_care);
        $(".no-of-srs").html(response.agecare.srs);

        /**
         * Health Centers Information
         */
        $("#health-care-head").html(response.healthCenters.total_hospital+" Health Centers");
        $(".no-of-pharmacies").html(response.healthCenters.pharmacies);
        $(".no-of-private-hospitals").html(response.healthCenters.private_hospital);
        $(".no-of-public-hospitals").html(response.healthCenters.public_hospital);
        $(".no-of-disable-centers").html(response.healthCenters.disability);
        $(".no-of-dental-centers").html(response.healthCenters.dental);
        $(".no-of-alternative-centers").html(response.healthCenters.alternative_health);
        $(".no-of-community-center").html(response.healthCenters.communit_health_centers);
        $(".no-of-gp").html(response.healthCenters.general_practice);
        $(".no-of-alliled").html(response.healthCenters.alliled_health);


        /**
         * Crime information
         */
        var crimeRate = [response.crime.crime_in_2012, response.crime.crime_in_2013, response.crime.crime_in_2014];
        new Chartist.Line('#crime-chart', {
            labels: [2012, 2013, 2014],
            series: [
                crimeRate
            ]
        }, {
            width: 200,
            height: 200
        });
    });

    /**
     * Displays the pop up feature on hovering over
     * the hexagon boxes.
     * Displays detailed information about the attributes
     * @since 1.0.0
     * @edited 2.0.0
     */
    $(".titanium-popup-container").qtip({
        content: {
            title: function(){
                return $(this).find('.titanium-popup-class').attr('title');
            },
            text: function(event, api){
                return $(this).find('.details').html();
            }
        },
        style: {
            classes: 'qtip-green qtip-shadow qtip-rounded'
        },
        position:{
            my: 'bottom center',
            at: 'top center'
        }
    });
});