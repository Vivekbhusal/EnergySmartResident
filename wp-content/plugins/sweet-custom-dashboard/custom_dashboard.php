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
<h1>Welcome, (Username)</h1>
	<div class="logo">
		<a href=""><span class="logo-photo"/></a>
	</div>
<p id="dashboard-p">
	Energy Smart Resident is build on concept to measure <b>'How green is your neighbourhood?'</b>.<br/>
	On this user personal page, you are able to add new properties by clicking <a href="/wp-admin/post-new.php?post_type=house">Add New House</a>.<br/>
	Also, you can make some posts to our blog.
</p>
<!--	Delete till here-->

</div>
