<?php
/**
 * Our custom dashboard page
 */

/** WordPress Administration Bootstrap */
require_once( ABSPATH . 'wp-load.php' );
require_once( ABSPATH . 'wp-admin/admin.php' );
require_once( ABSPATH . 'wp-admin/admin-header.php' );
?>
<div class="wrap about-wrap">

	<!--	//Write whatever you want here...-->
	<h1 class="user-welcome">Welcome <?php echo wp_get_current_user()->display_name; ?>,</h1>
	<div class="logo">
		<a href=""><span class="logo-photo"/></a>
	</div>
	<p id="dashboard-p">
		Energy Smart Resident is build on the concept to measure <b>'How green is your neighbourhood?'</b>.<br/>
		On this user personal page, you are able to add new properties by clicking Add House.<br/>
		Users can edit their account information on <a href="/wp-admin/profile.php">Profile Page</a>.<br/>
		Also, you can make some posts to our <a href="/wp-admin/post-new.php">Blog</a>.
	</p>
	<div class="add-button-row">
		<div class="add-house">
			<a href="/wp-admin/post-new.php?post_type=house">
			<span class="add-house-block">
			</span>
				<h2 class="add-house-title">Add House<h2>
			</a>
		</div>
		<!--		<p>-->
		<!--			<h3>You Can:</h3>-->
		<!--			<h4>Add New Property  <a href="/wp-admin/post-new.php?post_type=house"><span class="add"></span></a></h4>-->
		<!--			<h4>Edit Account Information  <a href="/wp-admin/profile.php"><span class="edit"></span></a></h4>-->
		<!--			<h4>Make Posts On The Blog  <a href="/wp-admin/edit.php"><span class="post"></span></a></h4>-->
		<!--		</p>-->
	</div>
	<!--	Delete till here-->

</div>