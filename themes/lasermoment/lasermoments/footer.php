		<footer class="foot">
            <div class="wrap">
				<div class="m-left">
                    <ul class="footer-menu">
						<?php 
                            $MainMenu = array(
                              'container' => false, 
                              'theme_location'  => 'main_menu',
                              'menu_class'      => 'footer-menu',
                              'items_wrap' => __('%3$s')
                            );	
        
                            wp_nav_menu( $MainMenu ); 
                        ?>
                    </ul><br />
                    
                     <?php echo get_field('copyright', 'option'); ?>
                </div>
                
                <div class="c-right">
                   <?php echo get_field('design_by', 'option'); ?><br />
                   <a href="<?php echo get_field('ci_link', 'option'); ?>" class="logo"><img src="<?php echo get_field('ci_logo', 'option'); ?>" /></a>
                </div>
            </div>
            <div class="clear"></div>
            
        </footer>

        <script type="text/javascript">
			jQuery.noConflict();

			jQuery(document).on('ready', function() {
				jQuery('.boxes').slick({
					dots: true,
					infinite: true,
					slidesToShow: 5,
					slidesToScroll: 1,
					speed: 500,
					fade: false,
					cssEase: 'linear',
					autoplay: true,
					autoplaySpeed: 2000,
					responsive: [
								{
								  breakpoint: 1024,
								  settings: {
									slidesToShow: 3,
									slidesToScroll: 3,
									infinite: true,
									dots: true
								  }
								},
								{
								  breakpoint: 600,
								  settings: {
									slidesToShow: 2,
									slidesToScroll: 2
								  }
								},
								{
								  breakpoint: 480,
								  settings: {
									slidesToShow: 1,
									slidesToScroll: 1
								  }
								}
								// You can unslick at a given breakpoint now by adding:
								// settings: "unslick"
								// instead of a settings object
  							]
				});
				jQuery('.banner-slider').slick({
					dots: true,
					infinite: true,
					speed: 500,
					cssEase: 'linear',
					autoplay: true,
					autoplaySpeed: 2000,
				});
				jQuery('.cform .r-item').click(function(){
					var rtype = jQuery(this).html();
					jQuery('.cform .r-item').removeClass('active');
					jQuery(this).addClass('active');
					jQuery('#rtype').val(rtype);
					return false;
				});
				
				jQuery('#qty').change(function(){
					var qty = jQuery(this).val();
					var price = jQuery(this).attr('rel');
					var total = parseInt(qty*price);
					var tax = parseInt(total * 0.05);
					var gtotal = parseInt(total+tax);
					jQuery('.tprice').html(gtotal);
					jQuery('input[name="amount"]').val(gtotal);
				});
								
				jQuery('#addToCartButton').live('click',function(){
					jQuery('#submit-loading').show();
					jQuery('#signform').slideUp();
					var qty = jQuery('#qty').val();
					var price = jQuery('#qty').attr('rel');
					var total = parseInt(qty*price);
					var tax = parseInt(total * 0.05);
					var gtotal = parseInt(total+tax);
					jQuery('.tprice').html(gtotal);
					jQuery('input[name="amount"]').val(gtotal);
					
					jQuery.post('<?php echo SITEURL; ?>/pdf.php', jQuery('#signform').serialize(), function(response) {
						jQuery('button.paypal-button').click();
					});
					
					return false;
				});

			});			
			
			jQuery(function () {
				jQuery('.img-compare-holder').each(function() {
					var imagesCompareElement = jQuery(this).find('.js-img-compare').imagesCompare();
					var imagesCompare = imagesCompareElement.data('imagesCompare');
					var events = imagesCompare.events();
	
					imagesCompare.on(events.changed, function (event) {
						console.log(events.changed);
						console.log(event.ratio);
						if (event.ratio < 0.4) {
							console.log('We see more than half of the back image');
						}
						if (event.ratio > 0.6) {
							console.log('We see more than half of the front image');
						}
	
						if (event.ratio <= 0) {
							console.log('We see completely back image');
						}
	
						if (event.ratio >= 1) {
							console.log('We see completely front image');
						}
					});
	
					jQuery(this).find('.js-front-btn').on('click', function (event) {
						event.preventDefault();
						imagesCompare.setValue(1, true);
					});
	
					jQuery(this).find('.js-back-btn').on('click', function (event) {
						event.preventDefault();
						imagesCompare.setValue(0, true);
					});
	
					jQuery(this).find('.js-toggle-btn').on('click', function (event) {
						event.preventDefault();
						if (imagesCompare.getValue() >= 0 && imagesCompare.getValue() < 1) {
							imagesCompare.setValue(1, true);
						} else {
							imagesCompare.setValue(0, true);
						}
					});
				});

			});

			jQuery(document).on('ready', function() {
			    // jQuery('#dootwizard').bootstrapWizard({
			    // 	'nextSelector' : '.next-btn',
			    // 	'previousSelector' : '.back-btn',
			    // 	'finishSelector' : '.last-btn'
			    // });;


			    // Font Sizes
			    jQuery('.text1size').change(function() {
		        	jQuery('#prevtext1').css({"font-size" : jQuery(this).val()});
		        });
		        jQuery('.text2size').change(function() {
		        	jQuery('#prevtext2').css({"font-size" : jQuery(this).val()});
		        });
		        jQuery('.text3size').change(function() {
		        	jQuery('#prevtext3').css({"font-size" : jQuery(this).val()});
		        });
		        jQuery('.text4size').change(function() {
		        	jQuery('#prevtext4').css({"font-size" : jQuery(this).val()});
		        });

		        // Custom Color Pallete
		        jQuery('.coloropt').change(function() {
		        	var fcolorname = jQuery(this).attr('colorname')
		        	jQuery('#prevname').css({"color" : jQuery(this).val()});
		        	jQuery('.border-prev').css({"border-color" : jQuery(this).val()});

		        	// put value in hidden fields
		        	jQuery("input[name='fontcolor']").val(jQuery(this).val());
		        	jQuery("input[name='fontcolorname']").val(fcolorname);
		        });

		        // Text Alignment
		        jQuery(".text1-alignment").change(function() {
		        	jQuery('#prevtext1').css({"text-align" : jQuery(this).val()});
		        });

		        jQuery(".text2-alignment").change(function() {
		        	jQuery('#prevtext2').css({"text-align" : jQuery(this).val()});
		        });

		        jQuery(".text3-alignment").change(function() {
		        	jQuery('#prevtext3').css({"text-align" : jQuery(this).val()});
		        });

		        jQuery(".text4-alignment").change(function() {
		        	jQuery('#prevtext4').css({"text-align" : jQuery(this).val()});
		        });

		        jQuery(".text1-vertical-alignment").change(function() {
		        	jQuery('#prevtext1').css({"vertical-align" : jQuery(this).val()});
		        });

		        jQuery(".text2-vertical-alignment").change(function() {
		        	jQuery('#prevtext2').css({"vertical-align" : jQuery(this).val()});
		        });

		        jQuery(".text3-vertical-alignment").change(function() {
		        	jQuery('#prevtext3').css({"vertical-align" : jQuery(this).val()});
		        });

		        jQuery(".text4-vertical-alignment").change(function() {
		        	jQuery('#prevtext4').css({"vertical-align" : jQuery(this).val()});
		        });

		        // Shape Options
		        jQuery("input[name='shape']").change(function() {
		        	if(jQuery(this).val() == "oval"){
		        		jQuery('.contentprev').css({"border-radius" : '50% / 50%', "width" : '70%'});
		        		jQuery('.border-prev').css({"border-radius" : '50% / 50%', "padding" : '5%'});
		        		jQuery('#prevname').css({"border-radius" : '50% / 50%'});
		        	}else{
		        		jQuery('.contentprev').css({"border-radius" : '0', "width" : '100%'});
		        		jQuery('.border-prev').css({"border-radius" : '0', "padding" : '0'});
		        		jQuery('#prevname').css({"border-radius" : '0'});
		        	}
		        });

		        // Shape Changes
		        if(jQuery('.shapes').val() == 'rectangle'){
	        		jQuery('.dimension-rectangle').show();
	        		jQuery('.dimension-rectangle').attr('name', 'dimension');
	        		jQuery('.dimension-oval').hide();
	        		jQuery('.dimension-oval').attr('name', '');
	        	}else{
	        		jQuery('.dimension-rectangle').hide();
	        		jQuery('.dimension-rectangle').attr('name', '');
	        		jQuery('.dimension-oval').show();
	        		jQuery('.dimension-oval').attr('name', 'dimension');
	        	}

		        jQuery('.shapes').change(function(){
		        	$val = jQuery(this).val();
		        	if($val == 'rectangle'){
		        		jQuery('.dimension-rectangle').show();
		        		jQuery('.dimension-rectangle').attr('name', 'dimension');
		        		jQuery('.dimension-oval').hide();
		        		jQuery('.dimension-oval').attr('name', '');
		        	}else{
		        		jQuery('.dimension-rectangle').hide();
		        		jQuery('.dimension-rectangle').attr('name', '');
		        		jQuery('.dimension-oval').show();
		        		jQuery('.dimension-oval').attr('name', 'dimension');
		        	}
		        });

		        // Text 1 & Text 2 Fields
		        jQuery('#text1').keyup(function() {
		        	jQuery('#prevtext1').text(jQuery(this).val());
		        });

		        jQuery('#text2').keyup(function() {
		        	jQuery('#prevtext2').text(jQuery(this).val());
		        });

		        jQuery('#text3').keyup(function() {
		        	if(jQuery(this).val().length > 0 && jQuery(this).val() != "Optional"){		        		
		        		jQuery('.tr-prevtext3').slideDown();
		        		jQuery('#prevtext3').text(jQuery(this).val());
		        		jQuery('.optionaltext3').slideDown();
		        	}else{
		        		jQuery('.tr-prevtext3').slideUp();
		        		jQuery('.optionaltext3').slideUp();
		        		jQuery(this).val('Optional');
		        	}
		        });

		        jQuery('#text4').keyup(function() {
		        	if(jQuery(this).val().length > 0 && jQuery(this).val() != "Optional"){		        		
		        		jQuery('.tr-prevtext4').slideDown();
		        		jQuery('#prevtext4').text(jQuery(this).val());
		        		jQuery('.optionaltext4').slideDown();
		        	}else{
		        		jQuery('.tr-prevtext4').slideUp();
		        		jQuery('.optionaltext4').slideUp();
		        		jQuery(this).val('Optional');
		        	}
		        });

		        // Preset Color - Background & Text Color
		        jQuery('.colormap-opt').each(function() {
		        	jQuery(this).on("click", function(){
		        		var bgopt = jQuery(this).attr('bgopt');
		        		var bg_name = jQuery(this).attr('bg_name');
		        		var bgimage = jQuery(this).attr('bgimage');
				        var bgcolor = jQuery(this).attr('bgcolor');
				        var txtcolor = jQuery(this).attr('txtcolor');
				        var defcolorname = jQuery(this).attr('defcolorname');
				        var colorsid = jQuery(this).attr('colorsid');
				        var title = jQuery(this).attr('title');
				        
				        jQuery('.border-prev').css({"border-color" : txtcolor});

				        if(bgopt == "Image"){
				        	jQuery('.contentprev').css({"background-image" : 'url('+bgimage+')' });
				        	jQuery("input[name='backgroundcolor']").val('');
				        	jQuery("input[name='materialtypecode']").val(title);
				        	jQuery("input[name='materialtypeimg']").val(bgimage);
				        	jQuery('.contentprev').css({"background-color" : 'none' });
				        }else{
				        	jQuery("input[name='backgroundcolor']").val(bgcolor);
				        	jQuery('.contentprev').css({"background-image" : 'none' });

				        	jQuery("input[name='materialtypecode']").val(title);
				        	jQuery("input[name='materialtypeimg']").val('');

				        	jQuery('.contentprev').css({"background-color" : bgcolor });
				        }

				        jQuery('.color-options').hide(300);
				        jQuery('#'+colorsid).show(300);
				        
				        jQuery('#prevname').css({"color" : txtcolor });
				        jQuery("input[name='fontcolor']").val(txtcolor);
				        jQuery("input[name='fontcolorname']").val(defcolorname);
				        jQuery("input[name='backgroundcolorname']").val(title);
				        
			        });
		        });

		        jQuery(window).scroll(function(){
					if (jQuery(this).scrollTop() > 1000) {
						jQuery('.custom-product-prev').addClass('fixed');
						jQuery('.div-spacer').show();						
					} else {
						jQuery('.custom-product-prev').removeClass('fixed');
						jQuery('.div-spacer').hide();
					}
				});	

		        // Font style & Diviver Modal Func		        

		        jQuery('.divider-optns').each(function() {
		        	jQuery(this).on("click", function(){
		        		var title = jQuery(this).attr('title');				        
				        jQuery(".divider-modalprev").val(title);
				        jQuery("input[name='laserdivider']").val(title);
			        });
		        });

		        jQuery('.divider-remove').on("click", function(){		        
			        jQuery(".divider-modalprev").val('');
			        jQuery("input[name='laserdivider']").val('');
		        });

		        jQuery('#fontstyle-optns').change(function(){
		        	$val = jQuery(this).val();
		        	jQuery('#prevname').css({'font-family' : $val});
		        });

		        // Border Option
		        jQuery('#borderopt').change(function() {
		        	if(jQuery(this).val() == 'Yes'){
		        		jQuery('.border-prev').css({"border-width" : '2px'});
		        	}else{
		        		jQuery('.border-prev').css({"border-width" : '0px'});
		        	}		        	
		        });

		        // Material Type Option
		        var onprevimg = jQuery("input[name='materialtype']").val();
        		onprevimg = onprevimg.split('|');
	        	jQuery("input[name='materialtypecode']").val(onprevimg[0]);
	        	jQuery("input[name='materialtypeimg']").val(onprevimg[1]);
	        	jQuery("input[name='backgroundcolor']").val(onprevimg[2]);

		        jQuery("input[name='materialtype']").change(function() {
	        		var previmg = jQuery(this).val();
	        		previmg = previmg.split('|');
	        		jQuery('.contentprev').css({"background-color" : 'none' });
		        	jQuery('.contentprev').css({"background-image" : 'url('+previmg[1]+')' });
		        	jQuery('.border-prev').css({"border-color" : '#000000' });
		        	jQuery('#prevname').css({"color" : '#000000' });

		        	// put value in hidden fields
		        	jQuery("input[name='materialtypecode']").val(previmg[0]);
		        	jQuery("input[name='materialtypeimg']").val(previmg[1]);
		        	jQuery("input[name='backgroundcolor']").val(previmg[2]);
		        	jQuery("input[name='fontcolor']").val('#000000');
		        });

		        // Custom Signage Preview into PDF
		        jQuery('#signform').submit(function(){
		        	var signage = jQuery('#preview-image').html();
		        	jQuery("input[name='previmage']").val(signage);
		        });
			});

		</script>

		<?php wp_footer(); ?>

    </body>
</html>