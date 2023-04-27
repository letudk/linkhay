jQuery(document).ready(function(){
    var down = false; 
    jQuery('#bell').click(function(e){ 
        var color = jQuery(this).text();
        if(down){ 
            jQuery('#box').css('height','0px');
            jQuery('#box').css('opacity','0');
            down = false;
        }else{ 
            jQuery('#box').css('height','auto');
            jQuery('#box').css('opacity','1');
            down = true; 
        } 
    }); 
});