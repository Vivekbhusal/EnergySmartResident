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
    //$('.search-suburb > input').autocomplete({
    //    showNoSuggestionNotice : true,
    //    noSuggestionNotice: "No result found. Please check address again.",
    //    lookup: titanium.autocompleteHouseSuggestion,
    //    onSelect: function(suggestion){
    //        $.Topic('get-house-community-information').publish(suggestion.data);
    //    }
    //});

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
        document.getElementById("search-address-bar"),
        {
            types: ['geocode'],
            componentRestrictions: {country: "au"}
        }
    );

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        var value;
        var addressDetails = {};
        if(place.address_components){
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    value = place.address_components[i][componentForm[addressType]];
                    addressDetails[addressType] = value;
                }
            }

            if(!addressDetails.locality) {
                swal("Dear User,", "Sorry we don't have information you are looking for. Please type house address or suburb", "warning");
                return;
            }
            if(addressDetails['administrative_area_level_1'] != "VIC") {
                swal("Dear User,", "Sorry to upend your adventure. We are very happy to see that you are enjoying our service and searching address all over Australia, but currently we only operate for Victoria. ", "info");
                return;
            }

            //console.log(addressDetails);
            $.Topic('get-house-community-information').publish(addressDetails);
        }
    });

    /**
     * Callback function to get all the information about community
     * and the house
     * @var $id Id of house
     * @since 2.0.0
     */
    $.Topic('get-house-community-information').subscribe(function(addressDetails){

        var data = {
            action : 'titanium_compute_house_community_details',
            nonce : titanium.nonce,
            query : addressDetails
        };

        /**
         * Ajax call to get the information about house and community
         */
        $.ajax({
            url: titanium.ajaxurl,
            type: "post",
            data: data,
            success: function(response) {
                //if(response.success) {
                //   $(".titanium-property-alert").hide();
                //} else if (!response.success) {
                //    $(".titanium-property-alert").show();
                //    $(".titanium-alert-message").html(response.message);
                //}

                // Display house only if the query is for house
                if(response.house_details)
                    $.Topic('display-property-info').publish(response.house_details);
                else
                    $(".property-info").hide();

                // Display community details
                if(response.community_details)
                    $.Topic('display-community-info').publish(response.community_details);
                else
                    $("#community-container").hide();

                $("#recommended-property-container").show();

                /**Scroll down to result, animate **/
                $('html, body').animate({
                    scrollTop: $("#titanium-result-anchor").offset().top
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

        /**Set window information**/
        (response.window)
            ? $("#window-details").html(response.window)
            : $("#window-details").html("No information found");

        /**Set rain water tank information**/
        (response.water_tank.text)
            ? $("#water-tank-details").html(response.water_tank.text)
            : $("#water-tank-details").html("No information found");

        //Change appropriate icon of water tank
        (response.water_tank.has == '0')
            ? $(".titanium-water-tank").removeClass("water-tank-icon").addClass("water-tank-icon-grey")
            : $(".titanium-water-tank").removeClass("water-tank-icon-grey").addClass("water-tank-icon");

        /**Set Air conditioner information**/
        (response.air_conditioner.text)
            ? $("#air-conditioner-details").html(response.air_conditioner.text)
            : $("#air-conditioner-details").html("No information found");

        //Change appropriate icon of air conditioner
        (response.air_conditioner.has == '0')
            ? $(".titanium-air-conditioner").removeClass("air-conditioner-icon").addClass("air-conditioner-icon-grey")
            : $(".titanium-air-conditioner").removeClass("air-conditioner-icon-grey").addClass("air-conditioner-icon");

        /**Set skylight information**/
        (response.sky_light.text)
            ? $("#skylight-details").html(response.sky_light.text)
            : $("#skylight-details").html("No information found");

        //Change appropriate icon of skylight
        (response.sky_light.has == '0')
            ? $(".titanium-skylight").removeClass("skylight-icon").addClass("skylight-icon-grey")
            : $(".titanium-skylight").removeClass("skylight-icon-grey").addClass("skylight-icon");

        /**Set solar water heater**/
        (response.solar_water.text)
            ? $("#solar-water-heating-details").html(response.solar_water.text)
            : $("#solar-water-heating-details").html("No information found");

        //Change appropriate icon of solar water heater
        (response.solar_water.has == '0')
            ? $(".titanium-solar-water-heating").removeClass("solar-water-heating-icon").addClass("solar-water-heating-icon-grey")
            : $(".titanium-solar-water-heating").removeClass("solar-water-heating-icon-grey").addClass("solar-water-heating-icon");

        /**Set thermostat information**/
        (response.thermostat.text)
            ? $("#thermostats-details").html(response.thermostat.text)
            : $("#thermostats-details").html("No information found");

        //Change appropriate icon of thermostat
        (response.thermostat.has == '0')
            ? $(".titanium-thermostats").removeClass("thermostats-icon").addClass("thermostats-icon-grey")
            : $(".titanium-thermostats").removeClass("thermostats-icon-grey").addClass("thermostats-icon");

        /**Energy saver system**/
        (response.energy_saver.text)
            ? $("#energy-saver-system-details").html(response.energy_saver.text)
            : $("#energy-saver-system-details").html("No information found");

        //Change appropriate icon of energy saver system
        (response.energy_saver.has == '0')
            ? $(".titanium-energy-saver-system").removeClass("energy-saver-system-icon").addClass("energy-saver-system-icon-grey")
            : $(".titanium-energy-saver-system").removeClass("energy-saver-system-icon-grey").addClass("energy-saver-system-icon");

        /**External shading**/
        (response.shading.text)
            ? $("#external-shading-details").html(response.shading.text)
            : $("#external-shading-details").html("No information found");

        //Change appropriate icon of energy saver system
        (response.shading.has == '0')
            ? $(".titanium-external-shading").removeClass("external-shading-icon").addClass("external-shading-icon-grey")
            : $(".titanium-external-shading").removeClass("external-shading-icon-grey").addClass("external-shading-icon");

        /**Heater details**/
        (response.heater.text)
            ? $("#heater-details").html(response.heater.text)
            : $("#heater-details").html("No information found");

        //Change appropriate icon of energy saver system
        (response.heater.has == '0')
            ? $(".titanium-heater").removeClass("heater-icon").addClass("heater-icon-grey")
            : $(".titanium-heater").removeClass("heater-icon-grey").addClass("heater-icon");


        /**Nathers details**/
        (response.nathers.text)
            ? $("#nathers-details").html(response.nathers.text)
            : $("#nathers-details").html("No information found");

        if(response.nathers.has == "1") {
            $(".titanium-nathers").wrap("<a target='_blank' href='"+response.nathers.file+"' class='nather-file-attachment'></a>");
            $("#verified").show();
            $("#unverified").hide();
            $(".titanium-nather").removeClass("nathers-icon-grey").addClass("nathers-icon");
        } else {
            if($(".nather-file-attachment").length > 0)
                $(".titanium-nathers").unwrap();
            $("#verified").hide();
            $("#unverified").show();
            $(".titanium-nather").removeClass("nathers-icon").addClass("nathers-icon-grey");
        }

        $(".property-info").show();


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

        /**Display the container**/
        $("#community-container").show();
    });

    /**
     * Displays the pop up feature on hovering over
     * the hexagon boxes.
     * Displays detailed information about the attributes
     * @since 1.0.0
     * @edited 2.0.0
     */
    $(".titanium-community-popup-container").qtip({
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

    $(".titanium-property-popup-container").qtip({
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
            my: 'top center',
            at: 'bottom center'
        }
    });
});