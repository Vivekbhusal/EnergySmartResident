<?php 

  // Template Name: API

/**
 * Parameters:
 * country
 * state
 * suburb
 * street_name
 * street_number
 * subpremise
 */


if(!isset($_REQUEST['country'], $_REQUEST['state'], $_REQUEST['suburb'])) {
    $errorMessage = array('message'=> 'Missing parameters. Please follow the API documentation for more information');
    wp_send_json_error($errorMessage);
}

if($_REQUEST['country'] != 'AU' || $_REQUEST['state'] != 'VIC') {
    $errorMessage = array('message'=> 'We only support Victoria state of Australia. We will update the API documentation as with expand our support.');
    wp_send_json_error($errorMessage);
}

$suburb = $_REQUEST['suburb'];
global $wpdb;
$suburb_info = $wpdb->get_row($wpdb->prepare("SELECT * from suburb where suburb_name = %s", $suburb));
if ($suburb_info == null) {
    $errorMessage = array('message'=> "Please check the suburb. Couldn't find the provided suburb.");
    wp_send_json_error($errorMessage);
}
$postal_code = $suburb_info->postcode;

// Checks if the query is for full house address
if(isset($_REQUEST['street_number'])) {
    // Send both house details and community details
    $title = getHouseTitle($postal_code);
    $post = get_page_by_title($title, OBJECT, 'house');
    if ($post != null && $post instanceof \WP_Post) {
        // Get both house and community by post id
        $post_id = $post->ID;
        $propertyDetails['success'] = true;
        $propertyDetails['data'] = \titanium\TitaniumCommunityClass::getPropertyDetailsByPostID($post_id);

    } else {
        $propertyDetails['success'] = false;
        $propertyDetails['message'] = "The information about this address <b>".$title."</b> is not available.<br/>We will try to get the information as soon as possible, meanwhile you can view the<br/>information related to that suburb. Also please make sure address you search is case sensetive";
    }
}
// Send community details anyway
// Get only community and near by house
$communityDetails['data'] = \titanium\TitaniumCommunityClass::getCommunityDetailsBySuburb($suburb);
//unset($communityDetails['data']['suburb_info']);

$response = array();
//Add property details to response array
if(isset($propertyDetails))
    $response['resident'] = $propertyDetails;

//Add community details to response array
if(isset($communityDetails))
    $response['community'] = $communityDetails;

//Output the final design
wp_send_json_success($response);


/**
 * Building the title of post with address
 * @param $postcode String postcode of suburb
 * @return string
 */
function getHouseTitle($postcode)
{
    $title = "";

    if (isset($_REQUEST['subpremise'])) {
        $title = $_REQUEST['subpremise']."/".$_REQUEST['street_number']." ";
    } else {
        $title = $_REQUEST['street_number']." ";
    }

    if (isset($_REQUEST['street_name'])) {
        $title .= $_REQUEST['street_name'].", ";
    }

    if(isset($_REQUEST['suburb'])) {
        $title .= $_REQUEST['suburb'].", ";
    }

    $title .= $postcode;


    return $title;
}