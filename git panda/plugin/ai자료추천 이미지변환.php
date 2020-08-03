<?php

/*
  Plugin Name:get_image
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



add_shortcode('image','image_func');
    function image_func(){ 
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
		for(var i = 0;i<20;i++) {
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
            		if (key == uid_array[0][8]) {image[8] = value; i++;}
            		if (key == uid_array[0][9]) {image[9] = value; i++;}
            		if (key == uid_array[0][10]) {image[10] = value; i++;}
            		if (key == uid_array[0][11]) {image[11] = value; i++;}
            		if (key == uid_array[0][12]) {image[12] = value; i++;}
            		if (key == uid_array[0][13]) {image[13]= value; i++;}
            		if (key == uid_array[0][14]) {image[14] = value; i++;}
            		if (key == uid_array[0][15]) {image[15] = value; i++;}
            		if (key == uid_array[0][16]) {image[16] = value; i++;}
            		if (key == uid_array[0][17]) {image[17] = value; i++;}
            		if (key == uid_array[0][18]) {image[18] = value; i++;}
            		if (key == uid_array[0][19]) {image[19] = value; i++;}
            		if (i == 20) {return false;}
		});

		var url = 'http://54.180.73.119.xip.io/%ec%9e%90%eb%a3%8c%ea%b3%b5%ec%9c%a0/?mod=document&pageid=1&uid=';

		jQuery('#image1').attr("src", image[0]);jQuery('#image2').attr("src", image[1]);jQuery('#image3').attr("src", image[2]);jQuery('#image4').attr("src", image[3]);
		jQuery('#image5').attr("src", image[4]);jQuery('#image6').attr("src", image[5]);jQuery('#image7').attr("src", image[6]);jQuery('#image8').attr("src", image[7]);
		jQuery('#image9').attr("src", image[8]);jQuery('#image10').attr("src", image[9]);jQuery('#image11').attr("src", image[10]);jQuery('#image12').attr("src", image[11]);
		jQuery('#image13').attr("src", image[12]);jQuery('#image14').attr("src", image[13]);jQuery('#image15').attr("src", image[14]);jQuery('#image16').attr("src", image[15]);
		jQuery('#image17').attr("src", image[16]);jQuery('#image18').attr("src", image[17]);jQuery('#image19').attr("src", image[18]);jQuery('#image20').attr("src", image[19]);

  		jQuery('#url1_i').attr("href", url + uid_array[0][0]);jQuery('#url2_i').attr("href", url + uid_array[0][1]);jQuery('#url3_i').attr("href", url + uid_array[0][2]);jQuery('#url4_i').attr("href", url + uid_array[0][3]);
  		jQuery('#url5_i').attr("href", url + uid_array[0][4]);jQuery('#url6_i').attr("href", url + uid_array[0][5]);jQuery('#url7_i').attr("href", url + uid_array[0][6]);jQuery('#url8_i').attr("href", url + uid_array[0][7]);
  		jQuery('#url9_i').attr("href", url + uid_array[0][8]);jQuery('#url10_i').attr("href", url + uid_array[0][9]);jQuery('#url11_i').attr("href", url + uid_array[0][10]);jQuery('#url12_i').attr("href", url + uid_array[0][11]);
  		jQuery('#url13_i').attr("href", url + uid_array[0][12]);jQuery('#url14_i').attr("href", url + uid_array[0][13]);jQuery('#url15_i').attr("href", url + uid_array[0][14]);jQuery('#url16_i').attr("href", url + uid_array[0][15]);
  		jQuery('#url17_i').attr("href", url + uid_array[0][16]);jQuery('#url18_i').attr("href", url + uid_array[0][17]);jQuery('#url19_i').attr("href", url + uid_array[0][18]);jQuery('#url20_i').attr("href", url + uid_array[0][19]);
	});
	});
   });
</script>
    
<?php
}
?>