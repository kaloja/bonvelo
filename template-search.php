<?php ob_start(); /* Template Name: Sök */ ?>

<?php get_header(); ?>
 
	<div class="post-list">
		<div class="wrapper">

			<form method="post" action="/annonser/"> 

				<?php $tax_args = array('hide_empty' => true); ?>
		        <?php $tax_sizeargs = array('orderby' => 'id', 'hide_empty' => true); ?>
		        <?php $categories = get_terms('category', $tax_args); ?>
		        <?php $brands = get_terms('brand', $tax_args); ?>
		        <?php $sizes = get_terms('size', $tax_sizeargs); ?>
		        <?php $regions = get_terms('region', $tax_args); ?>

				<ul class="post_list ui-list">
			        <li class="post_item">
			            <div class="dropdown js-category-btn">
			            	<span>Välj kategori</span>
			            	<input type="hidden" name="category" value="">
			            </div>
			        </li>

		          	<li class="post_item">
		            	<div class="dropdown js-brand-btn">
		              		<span>Välj märke</span>
		              		<input type="hidden" name="brand" value="">
		            	</div>
		          	</li>

		          	<li class="post_item">
		            	<div class="dropdown js-size-btn">
		              		<span>Välj storlek</span>
		              		<input type="hidden" name="size" value="">
		            	</div>
		          	</li>

		          	<li class="post_item">
		            	<div class="dropdown js-region-btn">
		              		<span>Välj område</span>
		              		<input type="hidden" name="region" value="">
		            	</div>
		          	</li>

		          	<!-- <li class="post_item">
		            	<div class="search_input">
		              		<input type="text" name="year" value="" placeholder="Årsmodell">
		            	</div>
		          	</li> -->
		        </ul>



		        <?php if (!empty($categories) && !is_wp_error($categories)): ?>

		        <ul class="dropdown_list ui-list js-category-list">
		            <?php foreach ($categories as $category): ?>
		              	<li class="dropdown_item js-category-item" data-category="<?php echo $category->slug ?>">
		                	<span class="dropdown_link">
		                  		<?php echo $category->name ?>
		                	</span>
		              	</li>
		            <?php endforeach ?>
		        </ul>

		        <?php endif; ?>



		        <?php if (!empty($brands) && !is_wp_error($brands)): ?>

		        <ul class="dropdown_list ui-list js-brand-list">
		            <?php foreach ($brands as $brand): ?>
		              	<li class="dropdown_item js-brand-item" data-brand="<?php echo $brand->slug ?>">
		                	<span class="dropdown_link">
		                  		<?php echo $brand->name ?>
		                	</span>
		              </li>
		            <?php endforeach ?>
		        </ul>

		        <?php endif; ?>



		        <?php if (!empty($sizes) && !is_wp_error($sizes)): ?>

		        <ul class="dropdown_list ui-list js-size-list">
		            <?php foreach ($sizes as $size): ?>
		              	<li class="dropdown_item js-size-item" data-size="<?php echo $size->slug ?>">
		                	<span class="dropdown_link">
		                  		<?php echo $size->name ?>
		                	</span>
		              	</li>
		            <?php endforeach ?>
		        </ul>

		        <?php endif; ?>



		        <?php if (!empty($regions) && !is_wp_error($regions)): ?>

		        <ul class="dropdown_list ui-list js-region-list">
		            <?php foreach ($regions as $region): ?>
		              	<li class="dropdown_item js-region-item" data-region="<?php echo $region->slug ?>">
		                	<span class="dropdown_link">
		                  		<?php echo $region->name ?>
		                	</span>
		              </li>
		            <?php endforeach ?>
		        </ul>

		    	<?php endif; ?>

				

				<!-- <?php $terms = get_terms('region'); ?>
				
				<?php if (!empty($terms) && !is_wp_error($terms)): ?>
				
					<select name="region">
						<option value="">Välj område</option>
						<?php foreach ($terms as $term): ?>
							<option value="<?php echo $term->slug ?>"><?php echo $term->name ?></option>
						<?php endforeach; ?>
					</select>

				<?php endif; ?>



				<?php $terms = get_terms('category'); ?>
				
				<?php if (!empty($terms) && !is_wp_error($terms)): ?>
				
					<select name="category">
						<option value="">Välj kategori</option>
						<?php foreach ($terms as $term): ?>
							<option value="<?php echo $term->slug ?>"><?php echo $term->name ?></option>
						<?php endforeach; ?>
					</select>

				<?php endif; ?>



				<?php $terms = get_terms('size'); ?>
				
				<?php if (!empty($terms) && !is_wp_error($terms)): ?>
				
					<select name="size">
						<option value="">Välj storlek</option>
						<?php foreach ($terms as $term): ?>
							<option value="<?php echo $term->slug ?>"><?php echo $term->name ?></option>
						<?php endforeach; ?>
					</select>

				<?php endif; ?>



				<?php $terms = get_terms('brand'); ?>
				
				<?php if (!empty($terms) && !is_wp_error($terms)): ?>
				
					<select name="brand">
						<option value="">Välj märke</option>
						<?php foreach ($terms as $term): ?>
							<option value="<?php echo $term->slug ?>"><?php echo $term->name ?></option>
						<?php endforeach; ?>
					</select>

				<?php endif; ?> -->

				<input type="hidden" id="result-from" name="price-min" value="10000">
				<input type="hidden" id="result-to" name="price-max" value="40000">

				<div class="search_slider-wrap">
					<div class="search_price-wrap search_price-wrap--left">
						<div class="search_price-from">10000 <span class="currancy-size">kr</span></div>
					</div>

					<div class="search_slider">
						<div class="search_slider-text">Sök med prisintervall</div>
						<input type="text" id="range" name="" value="">
					</div>

					<div class="search_price-wrap search_price-wrap--right">
						<div class="search_price-to">400000 <span class="currancy-size">kr</span></div>
					</div>
				</div>
				
				<div class="search_submit">
					<input type="submit" class="search_btn" value="Sök cyklar"><!-- <br /><br />
					Sortera efter: <br />
					<input type="checkbox" name="asc-order" value="ASC"> Lägsta pris
					<input type="checkbox" name="desc-order" value="DESC"> Högsta pris -->
				</div>

			</form>
			
			<script>

                $(document).ready(function () {
                    var $range = $("#range"),
                        $resultFrom = $("#result-from");
                        $resultTo = $("#result-to");
                        $testFrom = $(".search_price-from");
                        $testTo = $(".search_price-to");

                    var track = function () {
                        var $this = $(this),
                            from = $this.data("from"),
                            to = $this.data("to");

                        $resultFrom.val(from);
                        $resultTo.val(to);

                        $testFrom.html(from+' <span class="currancy-size">kr</span>');
                        $testTo.html(to+' <span class="currancy-size">kr</span>');
                    };

                    $range.ionRangeSlider({
                        type: "double",
                        min: 100,
                        max: 150000,
                        from: 10000,
                        to: 40000,
                        step: 100
                    });

                    $range.on("change", track);
                });
                                
			</script>

			<?php

				$price_min = $_POST['price-min'];
				$price_max = $_POST['price-max'];
				// $year = $_POST['year'];

				$tax_list = array();
				$tax_data = array();

				foreach ($_POST as $key => $value) {
					if ($key != 'price-min' && $key != 'price-max' && $value != '' && $key != 'asc-order' && $key != 'desc-order') { // && $key != 'year'

						$tax_data['taxonomy'] = htmlspecialchars($key);
						$tax_data['terms'] = htmlspecialchars($value);
						$tax_data['field'] = 'slug';
						
						$tax_list[] = $tax_data;
						
						// echo '<pre>';
						// 	var_dump($_POST);
						// echo '</pre>';
					}

				}
				
				$tax_array = array_merge(array('relation' => 'AND'), $tax_list);
				
				// echo '<pre>';
				// 	print_r($tax_array);
				// echo '</pre>';

				
				if (isset($_POST['price-min']) && ($_POST['price-min'])) {

					$meta_array = array(
						// 'relation' => 'AND',
						array(
							'key' => 'sales-price',
							'value' => array($price_min, $price_max),
							'compare' => 'BETWEEN',
							'type' => 'NUMERIC'
						)
						//,
						// array(
						// 	'key' => 'year',
						// 	'value' => $year,
						// 	'type' => 'NUMERIC'
						// )
					);

				}

				// echo '<pre>';
				// 	print_r($meta_array);
				// echo '</pre>';
				$order = 'DESC';

				if (isset($_POST['asc-order'])) {
					$order = $_POST['asc-order'];
				} else if (isset($_POST['desc-order'])) {
					$order = $_POST['desc-order'];
				}

				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

				$args = array(
	              	'post_type' =>'annons',
	              	'posts_per_page' => -1,
	              	'paged' => $paged,
	              	'orderby' => 'date', //'meta_value_num',
	              	'order' => $order,
					'meta_key'  => 'sales-price',
	              	'tax_query' => $tax_array,
	              	'meta_query' => $meta_array
	            );

            	$wp_query = new WP_Query($args);

				if ($wp_query->found_posts == 1) {
					$post_amount = 'annons';
				} else {
					$post_amount = 'annonser';
				} 

				if (empty($_POST)) {
					$search_status = 'På Bonvelo finns det totalt';
				} else {
					$search_status = 'Sökningen visar';
				}

			?>

			<?php echo ($wp_query->found_posts > 0) ? '<div class="demo-bar">'.$search_status.' '.$wp_query->found_posts.' '. $post_amount .'</div>' : '<div class="demo-bar">Inga annonser hittades</div>';?>

			<ul class="post-list_list ui-list">

				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();?>
	
				<?php $pid = get_the_ID(); ?>

			        <li class="post-list_item">
			            <div class="post-card">

				            <?php $image_args = array(
				                'post_type' => 'attachment',
				                'post_mime_type' => 'image',
				                'post_parent' => $pid
				            ); ?>

				            <?php $images = get_posts($image_args); ?>

				            <?php foreach ($images as $image): ?> 
				                <?php if (!empty($image)): ?>

				                    <?php $background = wp_get_attachment_image_src($image->ID, 'full'); ?>

				                    <a href="<?php the_permalink(); ?>">
				                    	<div class="post-card_img" style="background: url('<?php echo $background[0]; ?>'); background-size: cover; background-position: top center; background-color: #fff;"></div>
				                    </a>

				                <?php endif; ?>
				            <?php endforeach; ?>

				            <?php $sales_price = get_post_meta(get_the_ID(), 'sales-price', true); ?>

				            <?php if (!empty($sales_price)): ?>

				                <div class="post-card_price">
				                    <p class="price-wrap"><span class="number"><?php echo $sales_price; ?></span> <span class="currancy">kr</span></p>
				                </div>

				            <?php endif; ?>

				            <?php $size = wp_get_object_terms($pid, 'size'); ?>

				            <div class="post-card_size">
				                <p class="size-wrap"><?php echo $size[0]->name; ?></p>
				            </div>

				            <div class="post-card_body">
				                <h2 class="post-card_title">
				                    <a href="<?php the_permalink(); ?>">
				                        <?php the_title(); ?>
				                    </a>
				                </h2>

				                <div class="post-card_content">
				                    <?php the_content(); ?>
				                </div>
				            </div>
				            <div class="post-card_footer">
				                <?php $fname = get_post_meta(get_the_ID(), 'fname', true); ?>
				                <?php $lname = get_post_meta(get_the_ID(), 'lname', true); ?>

				                <div class="post-card_user">
				                    <a href="/<?php the_author_meta('user_nicename'); ?>"><?php echo $fname.' '.$lname; ?></a> 
				                </div>

				                <div class="post-card_time">
				                    <p><?php the_time('Y.m.d - G:i'); ?></p>
				                </div>
				            </div>
			              
			            </div>
			        </li>

		    	<?php endwhile; wp_reset_postdata();?>

		 	</ul>

		</div>
	</div>
	
<?php get_footer(); ?>