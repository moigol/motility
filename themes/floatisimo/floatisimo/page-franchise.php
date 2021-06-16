<?php 
/*
Template Name: Franchise
*/
get_header(); ?>

<?php echo get_template_part('heading'); ?>

    <section class="page-content">
    	
    	<?php 
		foreach(get_field('franchise', $post->ID) as $fr) {
		?>
        	<div class="wrap f">
        	<div class="ftext">
            	<img src="http://beta.myfloatisimo.com/wp-content/uploads/2017/10/franchise.png" /><h4><?php echo $fr['title']; ?><span class="toggle-icon"><i class="fa fa-chevron-right" aria-hidden="true"></i><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
</h4>
            </div>            
            <div class="fcontent">
                <?php 
				foreach($fr['contents'] as $frc) { 
					switch($frc['acf_fc_layout']) {
						case 'toggle_list':
							$togglecnt = 0;
							?>
                            <div class="toggle_list">
                            <?php foreach($frc['content_list'] as $frcl) { $togglecnt++; ?>
                            	<div class="toggle_list_item">
                                    <span class="toggle faq-toggle" id="tog<?php echo $togglecnt; ?>"><?php echo $frcl['title']; ?></span>
                                    <p class="faq-pane"><?php echo $frcl['content']; ?></p>
                                </div>
                            <?php } ?>
                			</div>
                            <?php
						break;
						case 'list':
							$togglecnt = 0;
							?>
                            <div class="list">
                            <?php foreach($frc['content'] as $frcl) { $togglecnt++; ?>
                            	<div class="list_item"><span class="list_icon"><?php echo $togglecnt; ?></span>
                                    <?php echo $frcl['content']; ?>
                               	</div>
                            <?php } ?>
                			</div>
                            <?php
						break;
						case 'text':
						default:
							?>
                            <div class="text">
                            	<?php echo $frc['text_content']; ?>
                			</div>
                            <?php
						break;
					}
				}
				?>
            </div>
            <div class="clear"></div>
        </div>
        <?php 
		}
		?>        
    </section>
	<script type="text/javascript">
		jQuery.noConflict();
		
		jQuery(document).on('ready', function() {
			
			var accordIt = function($this,$toggle,$pane) {
				if ($this.next().hasClass('show')) {
					$this.next().removeClass('show');
					$this.next().slideUp(350);
					$this.removeClass('active');
				} else {
					$pane.removeClass('show');
					$pane.slideUp(350);
					$toggle.removeClass('active');
					$this.next().toggleClass('show');
					$this.toggleClass('active');
					$this.next().slideToggle(350);
				}
			}
			
			var accordPre = function($pane) {
				$pane.hide();
			}
			
			accordPre(jQuery('.fcontent, .faq-pane'));
			
			jQuery('.ftext').click(function(e) {
				e.preventDefault();
			  
				var $this = jQuery(this);
				var $toggle = jQuery('.ftext');
				var $pane = jQuery('.fcontent');
			  	accordIt($this,$toggle,$pane);
				
			});
			
			jQuery('.faq-toggle').click(function(e) {
				e.preventDefault();
			  
				var $this = jQuery(this);
				var $toggle = jQuery('.faq-toggle');
				var $pane = jQuery('.faq-pane');
			  	accordIt($this,$toggle,$pane);
				
			});
		});
	</script>
    <style>
		.ftext, .faq-toggle { cursor:pointer; }
	</style>
<?php get_footer(); ?>