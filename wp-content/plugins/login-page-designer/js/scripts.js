jQuery(document).ready(function(){
   jQuery('#wlpd_login_form_border_color,#wlpd_login_background_color,#wlpd_login_form_bg,#wlpd_login_form_label_color,#wlpd_login_form_submit_bg,#wlpd_login_form_submit_border_color,#wlpd_login_form_submit_hover_border_color,#wlpd_login_form_submit_hover_bg,#wlpd_login_form_textbox_bg,#wlpd_login_form_textbox_border_color,#wlpd_login_form_textbox_hover_bg,#wlpd_login_form_textbox_hover_border_color,#wlpd_login_link_color,#wlpd_login_link_hover_color').wpColorPicker();
   
      var uploadID = ''; // setup the var in a global scope
   var original_send_to_editor = window.send_to_editor;
   
   jQuery('#upload_image_button').click(function() {
	 uploadID = jQuery(this).prev('input'); // set the uploadID variable to the value of the input before the upload button
	 formfield = jQuery('#wp_login_form_logo').attr('name');
	 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	 uploadBAR(); // Call if needed
	 return false;
	});
	 
	
	 jQuery('#upload_background_image_button').click(function() {
	 uploadID = jQuery(this).prev('input'); // set the uploadID variable to the value of the input before the upload button
	 formfield = jQuery('#wp_login_background_image').attr('name');
	 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	 uploadBAR(); // Call if needed
	 return false;
	});
	 
	
   window.send_to_editor = function(html) {
	 imgurl = jQuery('img',html).attr('src');
	 uploadID.val(imgurl); /*assign the value of the image src to the input*/
     tb_remove();
     window.send_to_editor = original_send_to_editor;//restore old send to editor function
	}
	
   


   
});



