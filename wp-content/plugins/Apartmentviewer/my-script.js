jQuery(document).ready(function() {
var orig_send_to_editor = window.send_to_editor;

jQuery('#upload_image_button_megler').click(function() {
    formfield = jQuery(this).prev('input');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');

        window.send_to_editor = function(html) {
            var regex = /src="(.+?)"/;
            var rslt =html.match(regex);
            var imgurl = rslt[1];
            formfield.val(imgurl);
            tb_remove();
        jQuery('#show_'+formfield.attr('name')).html('<img src="'+imgurl+'" width="150" />')
            window.send_to_editor = orig_send_to_editor;
        }
        return false;
    });
jQuery('#upload_pdf_button').click(function() {
    formfield = jQuery(this).prev('input');
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');

        window.send_to_editor = function(html) {
			imgurl = jQuery(html).attr('href');
            formfield.val(imgurl);
            tb_remove();
        jQuery('#show_'+formfield.attr('name')).html('<a href="'+imgurl+'">'+imgurl+'</a>')
            window.send_to_editor = orig_send_to_editor;
        }
        return false;
    });
});