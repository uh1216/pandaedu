<?php

/*
  Plugin Name:get_idplug
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



add_shortcode('test','custom_form_creation');
    function custom_form_creation(){ 
     $current_user_id = get_current_user_id();
?>

   <script>
   var id = '<?= $current_user_id;?>';
   jQuery(document).on("click", ".kboard-list-item", function() {
   var uid = jQuery(this).children(":first").attr("href");
   var uid_arr = uid.split('/');
   uid_loca = uid_arr[2].indexOf("uid");
   uid_end_loca = uid_arr[2].indexOf("&");
   if(uid_loca == 1) {
    uid = uid_arr[2].substring(uid_loca + 4, uid_end_loca);
   }
   else {
    uid = uid_arr[2].substr(uid_loca + 4);
   }

   jQuery.ajax({
         url : "<?php echo admin_url('admin-ajax.php'); ?>",
         type : "POST",
         dataType : "json",
         data : {
         action : 'get_id_uid',
         id : id,
         uid : uid
         }
    }); 
   });
</script>
    
<?php
}
?>