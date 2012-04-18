jQuery(document).ready(function() {
jQuery('#upload_image_button_megler').click(function() {
 formfield = jQuery('#meglerbildevalue').attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
window.send_to_editor = function(html) {
 bildeurl = jQuery('img',html).attr('src');
 jQuery('#meglerbildevalue').val(bildeurl);
 tb_remove();
}
});