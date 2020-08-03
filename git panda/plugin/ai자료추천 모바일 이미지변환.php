<?php

/*
  Plugin Name:get_m_image
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



add_shortcode('image2','image_func2');
    function image_func2(){ 
     $current_user_id = get_current_user_id();
?>

   <script>
   var id = '<?= $current_user_id;?>';
   jQuery(document).ready( function() {
	jQuery.getJSON("/wp-content/recommend_url.json", function(data) {
	 var uid_array = [];
		jQuery.each(data["data_id"], function(key, value) {
            		if (key == id) {uid_array.push(value);   return false;}
		});

	jQuery.getJSON("/wp-content/image_data.json", function(data) {
		var image = new Array();
		for(var i = 0;i<8;i++) {
			image[i] = 0;
 		}
		jQuery.each(data["image"], function(key, value) {
 		var i = 0;
            		if (key == uid_array[0][0]) {image[0] = value; i++;}
            		if (key == uid_array[0][1]) {image[1] = value; i++;}
            		if (key == uid_array[0][2]) {image[2] = value; i++;}
            		if (key == uid_array[0][3]) {image[3] = value; i++;}
            		if (key == uid_array[0][4]) {image[4] = value; i++;}
            		if (key == uid_array[0][5]) {image[5] = value; i++;}
            		if (key == uid_array[0][6]) {image[6] = value; i++;}
            		if (key == uid_array[0][7]) {image[7] = value; i++;}
            		if (i == 8) {return false;}
		});

		var url = 'http://54.180.73.119.xip.io/%ec%9e%90%eb%a3%8c%ea%b3%b5%ec%9c%a0/?mod=document&pageid=1&uid=';

		jQuery('#mimage1').attr("src", image[0]);jQuery('#mimage2').attr("src", image[1]);jQuery('#mimage3').attr("src", image[2]);jQuery('#mimage4').attr("src", image[3]);
		jQuery('#mimage5').attr("src", image[4]);jQuery('#mimage6').attr("src", image[5]);jQuery('#mimage7').attr("src", image[6]);jQuery('#mimage8').attr("src", image[7]);
		

  		jQuery('#murl1_i').attr("href", url + uid_array[0][0]);jQuery('#murl2_i').attr("href", url + uid_array[0][1]);jQuery('#murl3_i').attr("href", url + uid_array[0][2]);jQuery('#murl4_i').attr("href", url + uid_array[0][3]);
  		jQuery('#murl5_i').attr("href", url + uid_array[0][4]);jQuery('#murl6_i').attr("href", url + uid_array[0][5]);jQuery('#murl7_i').attr("href", url + uid_array[0][6]);jQuery('#murl8_i').attr("href", url + uid_array[0][7]);
  		
	});
	});
   });
</script>
    
<?php
}
?>