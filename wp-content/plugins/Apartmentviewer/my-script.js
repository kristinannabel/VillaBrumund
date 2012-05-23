jQuery(document).ready(function() {
var orig_send_to_editor = window.send_to_editor;
/**
En funksjon på knappen til meglerbildet, der Wordpress sin mediaopplaster åpnes.
Setter inn URL'en i overstående input-felt. Koden gjør det mulig å legge inn bilde både her og som vanlig i editoren.
*/
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
/**
Den samme funksjonen, men denne gangen for å hente en pdf-url, og legger denne i overstående input-felt
*/
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