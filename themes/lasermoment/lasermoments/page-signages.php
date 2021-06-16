<?php 
/*
Template Name: DoorWallTable Signages
*/
get_header(); ?>
        
        <?php echo get_template_part('heading'); ?>
        
        <section class="page-content">
        	<div class="wrap about-us">
                <div class="img-left">
                	<img src="<?php echo get_field('image_left', $p->ID); ?>" />
                </div>
                
                <div class="img-right">
                	<?php foreach(get_field('image_right', $post->ID) as $ir) { ?> 
                	<img src="<?php echo $ir['image']; ?>" />
                    <?php } ?>
                </div>
                <div class="clear"></div>
            
            </div>
            <div class="clear"></div>
            
        </section>
        
        <section class="custom-product">
            <div class="wrap">
                <div class="cp">
                	<h2 class="title"><?php echo apply_filters('the_title',get_field('custom_product_title', $post->ID)); ?></h2>
					
					<div class="custom-form">
						<input type="radio" name="shape" value="rectangle" checked> Rectangle
						<input type="radio" name="shape" value="oval"> Oval
						<span>Select Size:</span>
						<select name="shapes">
							<option value="Rectangular">2" x 12" Rectangular</option>
							<option value="Rectangular">2" x 12" Rectangular</option>
							<option value="Rectangular">2" x 12" Rectangular</option>
						</select>
					</div>
					
					<p>Preview</p>
					
					<img src="<?php echo IMG; ?>/signage.png" />
				
                </div>
                
                <div class="clear"></div>
            </div>
        </section>
        
        <section class="com-cat">
			<!-- Step 1 -->
            <div class="wrap">
                <div class="custom-left">
					<span>Material Type:</span><br/>
                	<input type="radio" name="shape" value="alum" checked> <img src="<?php echo IMG; ?>/2x10_material Brushed Aluminum.png" /><br/>
					<input type="radio" name="shape" value="gold"> <img src="<?php echo IMG; ?>/2x10_material Brushed Gold .png" /><br/>
					<input type="radio" name="shape" value="silver"> <img src="<?php echo IMG; ?>/2x10_material Brushed Silver.png" />
                </div>
				
				<div class="custom-right">
					<span>Color:</span>
					<p>Solid Colors</p>
					<img src="<?php echo IMG; ?>/2x10_with palettes.png" />
                	<p>Metallic Colors</p>
					<a href="#" class="about-btn">Back</a> <a href="#" class="about-btn">Next Step</a>
                </div>
                
                <div class="clear"></div>
            </div>
			
			<!-- Step 2 -->
			<div class="wrap">
                <div class="custom-left">
					<span>Adhesive Backing:</span>
					<select name="adhesives">
						<option value="adhesive">3M Adhesive</option>
						<option value="adhesive">3M Adhesive</option>
						<option value="adhesive">3M Adhesive</option>
					</select><br/>
					
					<span>JRS Metal Holders:</span>
					<select name="metalholders">
						<option value="dhp">Desk Holder Part No.48</option>
						<option value="dhp">Desk Holder Part No.48</option>
						<option value="dhp">Desk Holder Part No.48</option>
					</select><br/>
					
					<span>JRS Metal Holder Finish:</span>
					<select name="metals">
						<option value="metal">Bright Silver</option>
						<option value="metal">Bright Silver</option>
						<option value="metal">Bright Silver</option>
					</select><br/>
					
                </div>
				
				<div class="custom-right">
						<div class="fonts">
							<span>Font:</span>
							<select name="fonts">
								<option value="font">Arial</option>
								<option value="font">Arial</option>
								<option value="font">Arial</option>
							</select>
						</div>
						
						<div class="fonts">
							<span>Font Size:</span>
							<select name="fonts">
								<option value="font">Arial</option>
								<option value="font">Arial</option>
								<option value="font">Arial</option>
							</select>
						</div>
					
					<span>Text 1:</span>
					<input type="text" id="text1" name="text1">
					
					<span>Text 2:</span>
					<input type="text" id="text1" name="text1">
                </div>
                
                <div class="clear"></div>
            </div>
				
			<!-- Step 3 -->
			<div class="wrap">
                <div class="custom-left">
					<span>With Line Border?</span>
					<select name="border">
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select><br/>
					
					<span>Do you allow our experts to check and modify the setup?</span>
					<select name="experts">
						<option value="yes">Yes</option>
						<option value="no">No</option>
					</select><br/>
					
					<span>Upload and Inquire:</span>
					<select name="metals">
						<option value="icon">Upload Icon</option>
						<option value="icon">Upload Icon</option>
						<option value="icon">Upload Icon</option>
					</select><br/>
					
                </div>
				
				<div class="custom-right">
					<span>Not in the selection? Inquire</span>
					<input type="text" id="textbox" name="textbox">
					<div class="clear"></div>
					<a href="#" class="about-btn">Preview</a> <a href="#" class="about-btn">Save in PDF</a>
					<div class="clear"></div>
					<div class="fonts">
						<span>Quantity:</span>
						<input type="text" id="text1" name="text1" placeholder="1">
					</div>
					<div class="fonts">
						<span>Price:</span>
						<input type="text" id="text1" name="text1" placeholder="$ 30/sign"> <span>+ GST 5%</span>
					</div>
					
					<div class="total">
						<p>Total Cost: 30%</p> <a href="#" class="about-btn">Add to Cart</a>
					</div>
					
                </div>
                
                <div class="clear"></div>
            </div>
        </section>
        
<?php get_footer(); ?>