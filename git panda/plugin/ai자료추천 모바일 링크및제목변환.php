<?php

/*
  Plugin Name:get_idplug3
  Plugin URL:http://54.180.79.119
  Description:Template for createing new plugin
  Version:0.1
  Author:user
  Author URL:http://user@example.com
  License:GPL2
*/

/**
 *HtmlForm
 */



add_shortcode('test3','custom_form_creation3');
    function custom_form_creation3(){ 
     $current_user_id = get_current_user_id();
?>

   <script>
   var id = '<?= $current_user_id;?>';
   jQuery(document).ready( function() {
	var uid_array = [];
	jQuery.getJSON("/wp-content/recommend_url.json", function(data) {
		jQuery.each(data["data_id"], function(key, value) {
            		if (key == id) {uid_array.push(value);   return false;}
		});

	jQuery.getJSON("/wp-content/title_data.json", function(data) {
		var title = new Array();
		for(var i = 0;i<8;i++) {
			title[i] = 0;
 		}
		jQuery.each(data["title"], function(key, value) {
 		var i = 0
            		if (key == uid_array[0][0]) {title[0] = value; i++;}
            		if (key == uid_array[0][1]) {title[1] = value; i++;}
            		if (key == uid_array[0][2]) {title[2] = value; i++;}
            		if (key == uid_array[0][3]) {title[3] = value; i++;}
            		if (key == uid_array[0][4]) {title[4] = value; i++;}
            		if (key == uid_array[0][5]) {title[5] = value; i++;}
            		if (key == uid_array[0][6]) {title[6] = value; i++;}
            		if (key == uid_array[0][7]) {title[7] = value; i++;}
            		if (i == 8) {return false;}
		});

		var url = 'http://m.54.180.73.119.xip.io/%ec%9e%90%eb%a3%8c%ea%b3%b5%ec%9c%a0/?mod=document&pageid=1&uid=';

		jQuery('#m_url1').text(title[0]);jQuery('#m_url2').text(title[1]);jQuery('#m_url3').text(title[2]);jQuery('#m_url4').text(title[3]);
		jQuery('#m_url5').text(title[4]);jQuery('#m_url6').text(title[5]);jQuery('#m_url7').text(title[6]);jQuery('#m_url8').text(title[7]);	


		jQuery('#m_url1').attr("href", url + uid_array[0][0]);jQuery('#m_url2').attr("href", url + uid_array[0][1]);jQuery('#m_url3').attr("href", url + uid_array[0][2]);jQuery('#m_url4').attr("href", url + uid_array[0][3]);
		jQuery('#m_url5').attr("href", url + uid_array[0][4]);jQuery('#m_url6').attr("href", url + uid_array[0][5]);jQuery('#m_url7').attr("href", url + uid_array[0][6]);jQuery('#m_url8').attr("href", url + uid_array[0][7]);
	});
	});

   });
</script>
    
<?php
}
?>