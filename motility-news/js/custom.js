jQuery(document).ready(function(){
     // Set Onload defaults
    var marginCount     = 4; // left and right offest count of current button selected
    var endCount        = Math.floor((marginCount * 2) +1);
    var firstNewsItem    = jQuery('.newsItem:first');
    jQuery('.newsPagination a').hide();
    for(i=1;i<=endCount;i++)
    {
        jQuery('#j'+i).show();
    }
    
    firstNewsItem.show();
    jQuery('.newsPagination a:first').addClass('current');
    jQuery('.newsPagination li:first').next().addClass('current');
    
    var minHeight = parseInt(firstNewsItem.height()) > 370 ? firstNewsItem.height()+'px' : 370+'px';
    
    jQuery('.newsItems').css({'min-height':minHeight});
    
    // On pagination button click
    jQuery('.newsPagination a').click(function(){        
        var currentCount    = parseInt(jQuery(this).attr('href'));
        var startCount      = Math.floor(currentCount - marginCount);
        var endCount        = Math.floor(currentCount + marginCount);
        var totalCount      = jQuery('.newsPagination a').length;
        var showID          = jQuery(this).attr('rel');
        var minHeight       = parseInt(jQuery(showID).height()) > 370 ? jQuery(showID).height()+'px' : 370+'px';
        
        jQuery('.newsItem').fadeOut('slow');
        jQuery(showID).fadeIn('slow');
        jQuery('.newsItems').animate({'min-height':minHeight});
        jQuery('.newsPagination li, .newsPagination a').removeClass('current');        
        jQuery(this).addClass('current');
        jQuery(this).parent().addClass('current');
        jQuery('.newsPagination a').hide();
        
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
        if(!jQuery('.newsPagination li:last').hasClass('current'))
        {
            jQuery('.newsPagination li.current').next().children('a').click();
        }        
    });
    
    jQuery('.prev').click(function(){
        if(!jQuery('.newsPagination li:first').hasClass('current'))
        {
            jQuery('.newsPagination li.current').prev().children('a').click();
        }
    });
});