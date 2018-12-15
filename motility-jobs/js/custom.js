jQuery(document).ready(function(){
     // Set Onload defaults
    var marginCount     = 4; // left and right offest count of current button selected
    var endCount        = Math.floor((marginCount * 2) +1);
    var firstJobItem    = jQuery('.jobItem:first');
    jQuery('.jobPagination a').hide();
    for(i=1;i<=endCount;i++)
    {
        jQuery('#j'+i).show();
    }
    
    firstJobItem.show();
    jQuery('.jobPagination a:first').addClass('current');
    jQuery('.jobPagination li:first').next().addClass('current');
    
    var minHeight = parseInt(firstJobItem.height()) > 370 ? firstJobItem.height()+'px' : 370+'px';
    
    jQuery('.jobItems').css({'min-height':minHeight});
    
    // On pagination button click
    jQuery('.jobPagination a').click(function(){        
        var currentCount    = parseInt(jQuery(this).attr('href'));
        var startCount      = Math.floor(currentCount - marginCount);
        var endCount        = Math.floor(currentCount + marginCount);
        var totalCount      = jQuery('.jobPagination a').length;
        var showID          = jQuery(this).attr('rel');
        var minHeight       = parseInt(jQuery(showID).height()) > 370 ? jQuery(showID).height()+'px' : 370+'px';
        
        jQuery('.jobItem').fadeOut('slow');
        jQuery(showID).fadeIn('slow');
        jQuery('.jobItems').animate({'min-height':minHeight});
        jQuery('.jobPagination li, .jobPagination a').removeClass('current');        
        jQuery(this).addClass('current');
        jQuery(this).parent().addClass('current');
        jQuery('.jobPagination a').hide();
        
        if(startCount > 1 && endCount < totalCount)
        {   
            for(i=startCount;i<=endCount;i++)
            {
                jQuery('#j'+i).show();
            }
        }
        else 
        {
            if(startCount <= 1)
            {
                var endCount = Math.floor((marginCount * 2) +1);
                for(i=1;i<=endCount;i++)
                {
                    jQuery('#j'+i).show();
                }
            }
            else
            {
                var startCount = Math.floor(totalCount - (marginCount * 2));
                for(i=startCount;i<=totalCount;i++)
                {
                    jQuery('#j'+i).show();
                }
            }
        }        
        return false;        
    });
    
    jQuery('.next').click(function(){
        if(!jQuery('.jobPagination li:last').hasClass('current'))
        {
            jQuery('.jobPagination li.current').next().children('a').click();
        }        
    });
    
    jQuery('.prev').click(function(){
        if(!jQuery('.jobPagination li:first').hasClass('current'))
        {
            jQuery('.jobPagination li.current').prev().children('a').click();
        }
    });
});