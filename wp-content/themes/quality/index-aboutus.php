<?php
/**
 * Created by PhpStorm.
 * User: vivekbhusal
 * Date: 12/09/15
 * Time: 3:59 PM
 */
?>
<div class="container">

	<div class="row">
		<div class="qua_heading_title">
			<?php if($current_options['service_title']) { ?>
    <h1><?php echo $current_options['service_title']; ?></h1>
    <div class="qua-separator" id=""></div>
<?php } ?>

<?php if($current_options['service_description']) { ?>
    <p><?php echo $current_options['service_description']; ?></p>
<?php } ?>
</div>
