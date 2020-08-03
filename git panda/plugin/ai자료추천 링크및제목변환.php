<?php

/*
  Plugin Name:get_idplug2
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



add_shortcode('test2','custom_form_creation2');
    function custom_form_creation2(){ 
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

	jQuery.getJSON("/wp-content/title_data.json", function(data) {
		var title = new Array();
		for(var i = 0;i<20;i++) {
			title[i] = 0;
 		}
		jQuery.each(data["title"], function(key, value) {
 		var i = 0;
            		if (key == uid_array[0][0]) {title[0] = value; i++;}
            		if (key == uid_array[0][1]) {title[1] = value; i++;}
            		if (key == uid_array[0][2]) {title[2] = value; i++;}
            		if (key == uid_array[0][3]) {title[3] = value; i++;}
            		if (key == uid_array[0][4]) {title[4] = value; i++;}
            		if (key == uid_array[0][5]) {title[5] = value; i++;}
            		if (key == uid_array[0][6]) {title[6] = value; i++;}
            		if (key == uid_array[0][7]) {title[7] = value; i++;}
            		if (key == uid_array[0][8]) {title[8] = value; i++;}
            		if (key == uid_array[0][9]) {title[9] = value; i++;}
            		if (key == uid_array[0][10]) {title[10] = value; i++;}
            		if (key == uid_array[0][11]) {title[11] = value; i++;}
            		if (key == uid_array[0][12]) {title[12] = value; i++;}
            		if (key == uid_array[0][13]) {title[13] = value; i++;}
            		if (key == uid_array[0][14]) {title[14] = value; i++;}
            		if (key == uid_array[0][15]) {title[15] = value; i++;}
            		if (key == uid_array[0][16]) {title[16] = value; i++;}
            		if (key == uid_array[0][17]) {title[17] = value; i++;}
            		if (key == uid_array[0][18]) {title[18] = value; i++;}
            		if (key == uid_array[0][19]) {title[19] = value; i++;}
            		if (i == 20) {return false;}
		});

		var url = 'http://54.180.73.119.xip.io/%ec%9e%90%eb%a3%8c%ea%b3%b5%ec%9c%a0/?mod=document&pageid=1&uid=';
		
		jQuery('#url1').text(title[0]);jQuery('#url2').text(title[1]);jQuery('#url3').text(title[2]);jQuery('#url4').text(title[3]);
		jQuery('#url5').text(title[4]);jQuery('#url6').text(title[5]);jQuery('#url7').text(title[6]);jQuery('#url8').text(title[7]);
		jQuery('#url9').text(title[8]);jQuery('#url10').text(title[9]);jQuery('#url11').text(title[10]);jQuery('#url12').text(title[11]);
		jQuery('#url13').text(title[12]);jQuery('#url14').text(title[13]);jQuery('#url15').text(title[14]);jQuery('#url16').text(title[15]);
		jQuery('#url17').text(title[16]);jQuery('#url18').text(title[17]);jQuery('#url19').text(title[18]);jQuery('#url20').text(title[19]);

		
		jQuery('#url1').attr("href", url + uid_array[0][0]);jQuery('#url2').attr("href", url + uid_array[0][1]);jQuery('#url3').attr("href", url + uid_array[0][2]);jQuery('#url4').attr("href", url + uid_array[0][3]);
		jQuery('#url5').attr("href", url + uid_array[0][4]);jQuery('#url6').attr("href", url + uid_array[0][5]);jQuery('#url7').attr("href", url + uid_array[0][6]);jQuery('#url8').attr("href", url + uid_array[0][7]);
		jQuery('#url9').attr("href", url + uid_array[0][8]);jQuery('#url10').attr("href", url + uid_array[0][9]);jQuery('#url11').attr("href", url + uid_array[0][10]);jQuery('#url12').attr("href", url + uid_array[0][11]);
		jQuery('#url13').attr("href", url + uid_array[0][12]);jQuery('#url14').attr("href", url + uid_array[0][13]);jQuery('#url15').attr("href", url + uid_array[0][14]);jQuery('#url16').attr("href", url + uid_array[0][15]);
		jQuery('#url17').attr("href", url + uid_array[0][16]);jQuery('#url18').attr("href", url + uid_array[0][17]);jQuery('#url19').attr("href", url + uid_array[0][18]);jQuery('#url20').attr("href", url + uid_array[0][19]);

	});
	});
   });
</script>
    
<?php
}
?>