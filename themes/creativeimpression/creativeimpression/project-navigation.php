<?php global $current_term; ?>
<ul>
	<li class="<?php echo ($current_term == 'before-after-web-design') ? 'active' : ''; ?>"><a href="<?php echo SITEURL.'/before-after-web-design'; ?>">Before & After Web Design</a></li>
<?php 
	$tax = 'project-type'; // Your Taxonomy, change it if you not using wordpress native category
	$terms = get_terms( $tax ,array( // get all taxonomy terms
		'orderby'    => 'name',
		'order'      => 'ASC',
		'hide_empty' => false,
	));
	
	$cntrl = 0;
	//Loop throug each taxonomy terms, 
	foreach ( $terms as $term ) { $cntrl++;	
		echo '<li class="'. (($current_term == $term->slug) ? 'active' : '') .'"><a href="'.SITEURL.'/'.$term->slug.'">'.$term->name.'</a></li>';
	}                 
 ?>
 </ul>
<div class="clearfix"></div>