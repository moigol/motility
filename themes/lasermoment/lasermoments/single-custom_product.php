<?php global $post; 
	get_header(); ?>
        <?php echo get_template_part('heading'); $sku = date('Ymd').'_'.strtoupper(md5(microtime())); ?>

        <section class="page-content">
        	<div class="wrap about-us">
                <div class="img-left">
                	<img src="<?php echo get_field('image_left', $post->ID); ?>" />
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
        
        <form id="signform" method="post" action="" onsubmit="return false">
    	<input type="hidden" name="action" value="customsignage">
		<input type="hidden" name="SKU" value="<?php echo $sku; ?>">
    	<input type="hidden" name="materialtypecode" value="">
    	<input type="hidden" name="materialtypeimg" value="">
    	<input type="hidden" name="previmage" value="">
    	<input type="hidden" name="backgroundcolor" value="">
    	<input type="hidden" name="backgroundcolorname" value="">
    	<input type="hidden" name="fontcolor" value="">
    	<input type="hidden" name="fontcolorname" value="">

	        <section class="custom-product">
	            <div class="wrap">
	                <div class="cp" style="padding: 20px 0 0;">
	                	<h2 class="title"><?php echo apply_filters('the_title',get_field('custom_product_title', $post->ID)); ?></h2>

						<div class="custom-form"  id="preview">
							<label><input type="radio" name="shape" class="shapes" value="rectangle" checked> Rectangle</label>
							<label><input type="radio" name="shape" class="shapes" value="oval"> Oval</label>
							<span>Select Size:</span>
							<select name="dimension" class="dimension-rectangle">
								<?php foreach(get_field('size', $post->ID) as $s) { ?>
									<?php if($s['shape'] == 'rectangle'){ ?>
									<option data-value='<?php echo $s['name'];?> <?php echo $s['shape'];?> <?php echo $s['dimension'];?> <?php echo $s['max_line'];?>' value='<?php echo $s['name'];?> <?php echo $s['shape'];?> <?php echo $s['dimension'];?>'><?php echo $s['name'];?> <?php echo $s['shape'];?> <?php echo $s['dimension'];?></option>
									<?php } ?>
								<?php } ?>
							</select>
							<select name="dimension" class="dimension-oval">
								<?php foreach(get_field('size', $post->ID) as $s) { ?>
									<?php if($s['shape'] == 'oval'){ ?>
									<option data-value='<?php echo $s['name'];?> <?php echo $s['shape'];?> <?php echo $s['dimension'];?> <?php echo $s['max_line'];?>' value='<?php echo $s['name'];?> <?php echo $s['shape'];?> <?php echo $s['dimension'];?>'><?php echo $s['name'];?> <?php echo $s['shape'];?> <?php echo $s['dimension'];?></option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
						
						<p>Preview</p>
						
						
					
	                </div>
	                
	                <div class="clear"></div>
	            </div>
	        </section>

	        <section class="custom-product-prev">
	        	<div class="wrap"  style="padding: 0px 0 40px;">
	        		<div id="preview-image">
							
						<div id="contentprev" class="contentprev" style="background-image: url(<?php echo SITEURL; ?>/wp-content/uploads/2017/10/2x10_material20Brushed20Silver1.png); box-shadow: 0 0 10px #5a5a5a; padding: 15px 15px;">
							<div class="border-prev" style="border: 0px solid #000;">
								<table id="prevname" style="text-shadow: 2px 2px 2px rgb(59, 59, 59);">
									<tr class="tr-prevtext1">
										<td id="prevtext1" style="">John Smith</td>
									</tr>
									<tr class="tr-prevtext2">
										<td id="prevtext2" style="font-size: 50px; ">President</td>
									</tr>
									<tr class="tr-prevtext3" style="display: none;">
										<td id="prevtext3" style="">John Smith</td>
									</tr>
									<tr class="tr-prevtext4" style="display: none;">
										<td id="prevtext4" style="font-size: 50px; ">President</td>
									</tr>
								</table>
							</div>
						</div>
						
					</div>
	        	</div>
	        </section>
	        <div class="div-spacer" style="height: 246px; display: none;"></div>
	        
	        <section class="com-cat">
	        	
	        	<div id="rootwizard">

			    	<div class="tab-content">
			    		<div class="text-center">
			    			<ul class="center-pills displayhide">
							  	<li><a href="#tab1" data-toggle="tab">1st</a></li>
								<li><a href="#tab2" data-toggle="tab">2nd</a></li>
								<li><a href="#tab3" data-toggle="tab">3rd</a></li>
							</ul>
			    		</div>
			    		
			    	    <div class="tab-panel" id="tab1">
			    	    	<!-- Step 1 -->
				            <div class="wrap row">

				                <!-- <div class="col-md-6 col-sm-6 col-xs-12">
					                <div class="custom-left">

					                	<div class="form-group">
											<label class="field-title">Material Type:</label>
											<div class="materialsbg">
												<?php foreach(get_field('materials', $post->ID) as $m) { ?>
													<label>
														<input type="radio" class="mradio" name="materialtype" value="<?php echo $m['name'];?>|<?php echo $m['image'];?>|<?php echo $m['hex_color'];?>">
														<span><?php echo $m['name'];?></span>
														<img src="<?php echo $m['image'];?>" alt="<?php echo $m['name'];?>">
													</label>
												<?php } ?>
											</div>

										</div>

					                </div>
								</div> -->
								<div class="col-md-6 col-sm-12 col-xs-12">

									<div class="custom-left cpicker" style="padding-bottom: 0;">

										<div class="form-group">
											<label class="field-title">Plate Color & Material Type:</label>
											<div class="palette-color">
												<ul class="palette-menu">

													<?php
													$i = 0;
													if( have_rows('preset_colors') ) {
													    while ( have_rows('preset_colors') ) : the_row(); 
													    	$i++;  ?>

													    	<?php if(get_sub_field('background_options') == "Image"){ ?>

													    		<li><a href="javascript:void(0)" colorsid="colorsbox-id-<?php echo $i; ?>" bgopt="<?php the_sub_field('background_options'); ?>" bgimage="<?php the_sub_field('bg_img'); ?>" title="<?php the_sub_field('title'); ?>" bgcolor="<?php the_sub_field('bg_color'); ?>" defcolorname="<?php echo (get_sub_field('default_color_name')) ? get_sub_field('default_color_name') : ""; ?>" txtcolor="<?php the_sub_field('font_color'); ?>" class="colormap-opt align-middle" style="background-image:url(<?php the_sub_field('bg_img'); ?>); color: <?php the_sub_field('font_color'); ?>;"><!-- <b>LM</b> --><?php the_sub_field('title'); ?></a></li>

													    	<?php } else { ?>

													    		<li><a href="javascript:void(0)" colorsid="colorsbox-id-<?php echo $i; ?>" bgopt="<?php the_sub_field('background_options'); ?>" bgcolor="<?php the_sub_field('bg_color'); ?>" title="<?php the_sub_field('title'); ?>" defcolorname="<?php echo (get_sub_field('default_color_name')) ? get_sub_field('default_color_name') : ""; ?>" txtcolor="<?php the_sub_field('font_color'); ?>" class="colormap-opt align-middle" style="background: <?php the_sub_field('bg_color'); ?>; color: <?php the_sub_field('font_color'); ?>;"><!-- <b>LM</b> --><?php the_sub_field('title'); ?></a></li>

													    	<?php } ?>



													    <?php
													    endwhile;
													}else{ ?>
														<li><a href="javascript:void(0)" bgimage="" bgcolor="#c32723" txtcolor="#ffffff" class="colormap-opt" style="background: #c32723; color: #ffffff;"><b>LM</b>Red/White <br>L602-206</a></li>
														<li><a href="javascript:void(0)" bgimage="" bgcolor="#ffffff" txtcolor="#c32723" class="colormap-opt" style="background: #ffffff; color: #c32723;"><b>LM</b>Red/White <br>L602-206</a></li>
														<li><a href="javascript:void(0)" bgimage="" bgcolor="#ffffff" txtcolor="#005086" class="colormap-opt" style="background: #ffffff; color: #005086;"><b>LM</b>Red/White <br>L602-206</a></li>
														<li><a href="javascript:void(0)" bgimage="" bgcolor="#005086" txtcolor="#ffffff" class="colormap-opt" style="background: #005086; color: #ffffff;"><b>LM</b>Red/White <br>L602-206</a></li>
														<li><a href="javascript:void(0)" bgimage="" bgcolor="#4b5357" txtcolor="#ffffff" class="colormap-opt" style="background: #4b5357; color: #ffffff;"><b>LM</b>Red/White <br>L602-206</a></li>
													<?php } ?>
													
												</ul>
											</div>

										</div>									
									

					                </div>
				                </div>

				                <div class="col-md-6 col-sm-12 col-xs-12">
				                	<div class="custom-left" style="padding-bottom: 0;">
				                		<div class="row">

				                			<div class="col-md-12 col-sm-12 col-xs-12">
				                				<div class="form-group">
													<label class="field-title">Font Style</label>

													<select id="fontstyle-optns" name="fontstyle" id="" class="form-control">
						                            	<option value="">Select Font Style</option>
						                            	<option value="Arial">Arial</option>
														<option value="Times New Roman">Times New Roman</option>
														<option value="Amazone">Amazone</option>
														<option value="Avant Garde">Avant Garde</option>
														<option value="Clarendon">Clarendon</option>
														<option value="Commercial Script">Commercial Script</option>
														<option value="COPPERPLATE GOTHIC">COPPERPLATE GOTHIC</option>
														<option value="Din">Din</option>
														<option value="English">English</option>
														<option value="Engravers MT">Engravers MT</option>
														<option value="Eurostile">Eurostile</option>
														<option value="Frutiger">Frutiger</option>
														<option value="Murphy Script">Murphy Script</option>
														<option value="Sabon">	Sabon</option>
														<option value="Bickham Script Pro">Bickham Script Pro</option>
														<option value="Caslon">Caslon</option>
														<option value="Franklin Gothic">Franklin Gothic</option>
														<option value="Futura">Futura</option>
														<option value="Gill Sans">Gill Sans</option>
														<option value="Helvetica">Helvetica</option>
														<option value="Lucida Calligraphy">Lucida Calligraphy</option>
														<option value="Park Ave">Park Ave</option>
														<option value="Univers">Univers</option>
														<option value="Univers-italic">Univers-italic</option>
														<option value="Brush Script">Brush Script</option>
														<option value="Impact">Impact</option>
														<option value="Garamond">Garamond</option>
						                            </select>
												</div>
				                			</div>

				                			<div class="col-md-12 col-sm-12 col-xs-12">
				                				<div class="form-group">
													<label class="field-title">Font Color Option:</label>

													<?php 
													$ii = 0;
													$fcolors = get_field('preset_colors'); 
													foreach($fcolors as $presetsc) { 
														$ii++;
														if($presetsc['font_colors']){ ?>
															<div id="colorsbox-id-<?php echo $ii; ?>" class="form-group color-options" style="display: none;">
																<?php foreach($presetsc['font_colors'] as $fcolor) { ?>															

																    <label>
																		<input type="radio" name="coloropt" class="coloropt" colorname="<?php echo isset($fcolor['color_name']) ? $fcolor['color_name'] : ""; ?>" value="<?php echo $fcolor['colors']; ?>"> <span class="colorbox" style="background-color: <?php echo $fcolor['colors']; ?>;"></span>
																	</label>															

																<?php } ?>
															</div>
														<?php } ?>
													<?php } ?>

													<div id="colorsbox-id-<?php echo $ii; ?>" class="form-group color-options">
													    <label>
															<input type="radio" name="coloropt" class="coloropt" value="#000000"> <span class="colorbox" style="background-color: #000000;"></span>
														</label>
														<label>
															<input type="radio" name="coloropt" class="coloropt" value="#ffffff"> <span class="colorbox" style="background-color: #ffffff; ?>;"></span>
														</label>
													</div>

												</div>
				                			</div>

										</div>										

				                	</div>
			                	</div>

				                <div class="clear"></div>

				                <div class="col-md-6 col-sm-6 col-xs-12">
				                	<div class="custom-left" style="padding-top: 0;">

				                		<div class="form-group">
											<label class="field-title">Text 1:</label>
											<input type="text" id="text1" name="textname" class="form-control" value="John Smith">
										</div>

										<div class="optionaltext">											
											<div class="row">												
												<div class="col-md-4 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="field-title">Text 1 Size:</label>
														<select name="text1size" class="fontsize text1size form-control">											
															<?php  
															for ($i=8;$i < 121; $i++) {
															?>
																<option value="<?php echo $i; ?>px" <?php echo ($i == 70) ? "selected" : ""; ?>><?php echo $i; ?>px</option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="col-md-4 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="field-title">Text 1 Align:</label>
														<select name="text1-align" class="form-control text1-alignment">											
															<option value="Center">Center</option>
															<option value="Left">Left</option>
															<option value="Right">Right</option>
														</select>
													</div>
												</div>
												<div class="col-md-4 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="field-title">Text 1 Vert Align:</label>
														<select name="text1-vertical-align" class="form-control text1-vertical-alignment">											
															<option value="Top">Top</option>
															<option value="Middle" selected>Middle</option>
															<option value="Bottom">Bottom</option>
														</select>
													</div>
												</div>
											</div>
										</div>																			

				                	</div>
				                </div>

				                <div class="col-md-6 col-sm-6 col-xs-12">
				                	<div class="custom-right" style="padding-top: 0;">

				                		<div class="form-group">
											<label class="field-title">Text 2:</label>
											<input type="text" id="text2" name="texttitle" class="form-control" value="President">
										</div>	

				                		<div class="optionaltext">											
											<div class="row">												
												<div class="col-md-4 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="field-title">Text 2 Size:</label>
														<select name="text2size" class="fontsize text2size form-control">											
															<?php  
															for ($i=8;$i < 121; $i++) {
															?>
																<option value="<?php echo $i; ?>px" <?php echo ($i == 50) ? "selected" : ""; ?>><?php echo $i; ?>px</option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="col-md-4 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="field-title">Text 2 Align:</label>
														<select name="text2-align" class="form-control text2-alignment">											
															<option value="Center">Center</option>
															<option value="Left">Left</option>
															<option value="Right">Right</option>
														</select>
													</div>	
												</div>
												<div class="col-md-4 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="field-title">Text 2 Vert Align:</label>
														<select name="text2-vertical-align" class="form-control text2-vertical-alignment">											
															<option value="Top">Top</option>
															<option value="Middle" selected>Middle</option>
															<option value="Bottom">Bottom</option>
														</select>
													</div>
												</div>
											</div>
										</div>										

				                	</div>
				                </div>

			                	<div class="clear"></div>
				                <div class="divider-black"></div>

				                <div class="col-md-6 col-sm-6 col-xs-12">
				                	<div class="custom-left" style="padding-top: 0;">

				                		<div class="form-group">                             
											<label class="field-title">Text 3:</label>
											<input type="text" id="text3" name="textname2" class="form-control" value="Optional">
										</div>

										<div class="optionaltext optionaltext3" style="display: none;">											
											<div class="row">												
												<div class="col-md-4 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="field-title">Text 3 Size:</label>
														<select name="text3size" class="fontsize text3size form-control">											
															<?php  
															for ($i=8;$i < 121; $i++) {
															?>
																<option value="<?php echo $i; ?>px" <?php echo ($i == 70) ? "selected" : ""; ?>><?php echo $i; ?>px</option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="col-md-4 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="field-title">Text 3 Align:</label>
														<select name="text3-align" class="form-control text3-alignment">											
															<option value="Center">Center</option>
															<option value="Left">Left</option>
															<option value="Right">Right</option>
														</select>
													</div>
												</div>
												<div class="col-md-4 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="field-title">Text 3 Vert Align:</label>
														<select name="text3-vertical-align" class="form-control text3-vertical-alignment">											
															<option value="Top">Top</option>
															<option value="Middle" selected>Middle</option>
															<option value="Bottom">Bottom</option>
														</select>
													</div>
												</div>
											</div>
										</div>

				                	</div>
				                </div>

				                <div class="col-md-6 col-sm-6 col-xs-12">
				                	<div class="custom-right" style="padding-top: 0;">

				                		<div class="form-group">
											<label class="field-title">Text 4:</label>
											<input type="text" id="text4" name="texttitle2" class="form-control" value="Optional">
										</div>

										<div class="optionaltext optionaltext4" style="display: none;">											
											<div class="row">												
												<div class="col-md-4 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="field-title">Text 4 Size:</label>
														<select name="text4size" class="fontsize text4size form-control">											
															<?php  
															for ($i=8;$i < 121; $i++) {
															?>
																<option value="<?php echo $i; ?>px" <?php echo ($i == 50) ? "selected" : ""; ?>><?php echo $i; ?>px</option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="col-md-4 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="field-title">Text 4 Align:</label>
														<select name="text4-align" class="form-control text4-alignment">											
															<option value="Center">Center</option>
															<option value="Left">Left</option>
															<option value="Right">Right</option>
														</select>
													</div>
												</div>
												<div class="col-md-4 col-sm-12 col-xs-12">
													<div class="form-group">
														<label class="field-title">Text 4 Vert Align:</label>
														<select name="text4-vertical-align" class="form-control text4-vertical-alignment">											
															<option value="Top">Top</option>
															<option value="Middle" selected>Middle</option>
															<option value="Bottom">Bottom</option>
														</select>
													</div>
												</div>
											</div>
										</div>

				                	</div>
				                </div>

				                <div class="clear"></div>
				                <div class="divider-black"></div>

				            </div>				           
			    	    </div>


			    	    <div class="tab-panel" id="tab2">

			    	    	<!-- Step 2 -->
							<div class="wrap row">
				                <div class="col-md-6 col-sm-6 col-xs-12">
				                	<div class="custom-left">

				                		<div class="form-group">
											<label class="field-title">Adhesive Backing:</label>
											<select name="adhesives" class="form-control">
						                    	<?php foreach(get_field('adhesive_backing', $post->ID) as $ab) { ?>
						                            <option value="<?php echo $ab['name'];?>"><?php echo $ab['name'];?></option>
						                        <?php } ?>
											</select>
										</div>
										
										<div class="form-group">
											<label class="field-title">JRS Metal Holders:</label>
											<select name="metalholder" class="form-control">
												<?php foreach(get_field('metal_holders', $post->ID) as $mh) { ?>
						                            <option value="<?php echo $mh['name'];?>"><?php echo $mh['name'];?></option>
						                        <?php } ?>
											</select>
										</div>
										
										<div class="form-group">
											<label class="field-title">JRS Metal Holder Finish:</label>
											<select name="metalholderfinish" class="form-control">
						                    	<?php foreach(get_field('metal_holder_finish', $post->ID) as $mhf) { ?>
						                            <option value="<?php echo $mhf['name'];?>"><?php echo $mhf['name'];?></option>
						                        <?php } ?>
											</select>
										</div>


					                </div>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="custom-right">

										<div class="form-group">
											<label class="field-title">With Line Border?</label>
											<select name="borderopt" id="borderopt" class="form-control">
												<option value="Yes">Yes</option>
												<option value="No" selected>No</option>
											</select>
										</div>
										
										<div class="form-group">
											<label class="field-title">Do you allow our experts to check and modify the setup?</label>
											<select name="experts" class="form-control">
												<option value="yes">Yes</option>
												<option value="no">No</option>
											</select>
										</div>
										
										<div class="form-group">
											<label class="field-title" style="padding: 25px 0 10px;">Upload and Inquire: <small class="label">(Upload icon or image)</small></label>
											<input id="uploadopt" type="hidden" class="form-control" name="uploadopt">
											<br>
											<div class="upload-wrap">
												<?php 

										    	$args = array(
												    "unique_identifier" => "my_subscription_form_file_upload",
												    "allowed_extensions" => "jpg, png, bmp, gif",
												    "on_success_set_input_value" => "#uploadopt",
												    "on_success_alert" => "Your file was successfully uploaded."
												);
												echo ajax_file_upload( $args ); 

												?>
											</div>
											
										</div>

					                </div>
				                </div>
				                
				                <div class="clear"></div>
				                <div class="divider-black"></div>
								<?php /*
				                <ul class="wizzard-pager">
					    		  	<!-- <li class="back-btn"><a href="javascript::void();" class="about-btn" style="margin: 0px 10px 0px 0px;">Back</a></li>
									<li class="next-btn"><a href="javascript::void();" class="about-btn">Next Step</a></li> -->
									<li class="last-btn" class="hidden"><button type="submit" class="about-btn">Download PDF</button></li>
					    		</ul>
								*/ ?>
				            </div>
			    	    </div>

			    	    

			    		<div class="tab-panel" id="tab3">
			    			<!-- Step 3 -->
							<div class="wrap row">

					            <div class="col-md-12 col-sm-12 col-xs-12">
									
									<div class="custom-right">
										
										<div class="form-group">
											<label class="field-title">Not in the selection? Inquire</label>
											<input type="text" id="textbox" name="nisInquire" class="form-control">
										</div>

										<div class="row">

											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="field-title">Quantity:</label>
													<input type="text" id="qty" name="qty" placeholder="1" class="form-control" value="1" rel="<?php echo get_field('price'); ?>">
												</div>
											</div>

											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													<label class="field-title">Price:</label>

													<input type="text" id="price" name="price" placeholder="$ <?php echo get_field('price'); ?>" value="<?php echo get_field('price'); ?>" class="form-control" readonly> <br><span>+ GST 5%</span>
												</div>
											</div>

										</div>

										<div class="row">
											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="form-group">
													
												</div>
											</div>

											<div class="col-md-6 col-sm-6 col-xs-12">
												<div class="form-group total-row">
													<p>Total Cost: $<span class="tprice"><?php echo get_field('price') + (get_field('price')*0.05); ?></span></p>
													<a href="javascript:void(0);" id="addToCartButton" class="about-btn addtcrt">Proceed to Checkout</a>
												</div>
											</div>

										</div>
										
					                </div>
					            </div>
				                
				                <div class="clear"></div>
				            </div>
			    	    </div>
			    		

			    	</div>
			    </div>

	        </section>
        </form>
<div id="submit-loading" style="text-align:center;display:none; padding:50px;"><img src="https://lasermoments.com/wp-content/uploads/2017/11/ajax-loader.gif"><br><br>Processing your Order! Please wait.</div>
<div style="postion:absolute; visibility:hidden; z-index:0;">
		<?php echo do_shortcode('[wp_paypal button="buynow" name="'.apply_filters('the_title',$post->post_title).'" amount="'.get_field('price').'" quantity="1" number="'.$sku.'" cancel_return="'.get_the_permalink($post->ID).'" return="'.SITEURL.'/thank-you/"]'); ?>
        <?php ///echo do_shortcode('[show_wp_shopping_cart]'); ?>
</div>
<!-- Divider Modal -->
<div class="modal fade" id="fontdivider-modal" tabindex="-1" role="dialog" aria-labelledby="fontdivider-modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">LASER ENGRAVABLE DIVIDERS
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
        </h5>
        
      </div>
      <div class="modal-body form">
      	<div class="form-group">      		
      		<input type="text" class="form-control divider-modalprev" value="">
      		<br>
      		<p style="color:red;">Note: The current divider selected will currently not applied to the preview (engrave sign) but it will printed out on PDF.</p>
      		<p>(Just Click On Choices)</p>
      	</div>

		<img src="<?php echo THEMEURL; ?>/img/border-options.jpg" usemap="#dividers-optns-map">

		<map name="dividers-optns-map">
		    <area target="" class="divider-optns" alt="Divider 1" title="Divider 1" href="javascript:void(0);" coords="113,20,333,86" shape="rect">
		    <area target="" class="divider-optns" alt="Divider 2" title="Divider 2" href="javascript:void(0);" coords="334,20,590,86" shape="rect">
		    <area target="" class="divider-optns" alt="Divider 3" title="Divider 3" href="javascript:void(0);" coords="114,87,229,162" shape="rect">
		    <area target="" class="divider-optns" alt="Divider 4" title="Divider 4" href="javascript:void(0);" coords="230,87,375,162" shape="rect">
		    <area target="" class="divider-optns" alt="Divider 5" title="Divider 5" href="javascript:void(0);" coords="376,88,527,162" shape="rect">
		    <area target="" class="divider-optns" alt="Divider 6" title="Divider 6" href="javascript:void(0);" coords="528,87,704,162" shape="rect">
		    <area target="" class="divider-optns" alt="Divider 7" title="Divider 7" href="javascript:void(0);" coords="114,163,334,228" shape="rect">
		    <area target="" class="divider-optns" alt="Divider 8" title="Divider 8" href="javascript:void(0);" coords="335,163,554,228" shape="rect">
		    <area target="" class="divider-optns" alt="Divider 9" title="Divider 9" href="javascript:void(0);" coords="554,163,771,228" shape="rect">
		</map>

      </div>
      <div class="modal-footer">      	
      	<button type="button" class="btn btn-danger divider-remove" data-dismiss="modal">Remove Selected</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">&nbsp;&nbsp;&nbsp;&nbsp;OK&nbsp;&nbsp;&nbsp;&nbsp;</button>
      </div>
    </div>
  </div>
</div>
        
<?php get_footer(); ?>