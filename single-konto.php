<?php ob_start(); ?>

<?php get_header(); ?>

<?php

/* PHP
============================================================================ */

$id = get_the_ID();
$page_data = get_page($id);


?>

<?php if (is_user_logged_in()): ?>

	<?php $current_user = wp_get_current_user(); ?>
	<?php $fname = $current_user->first_name; ?>
    <?php $lname = $current_user->last_name; ?>
    <?php $name = $current_user->display_name; ?>
    <?php $email = $current_user->user_email; ?>
    <?php $username = $current_user->user_nicename; ?>
    <!-- <?php $user_id = get_current_user_id(); ?> -->

	<?php while (have_posts()) : (the_post()); ?>

		<?php if ($current_user->user_nicename === $page_data->post_name): ?>

			<div class="wrapper">
				
				<h2>Kontoöversikt</h2>
				<h3>Profil</h3>
				<p><?php echo $name ?></p>
				<h5>Användarnamn</h5>
				<p><?php echo $username ?></p>
				<h5>E-postadress</h5>
				<p><?php echo $email ?></p>

				<div class="post_email-bg">
                    <form class="post_email--message" action="" method="post">
                        <input type="text" name="post_email" value="<?php echo $email; ?>"/>
                        <input type="password" name="post_email--pwd" value="" placeholder="Bekräfta lösenord"/>
                        <input type="hidden" name="user_id" value="<?php echo $current_user->ID; ?>"/>
                        <button name="post_update--email">Uppdatera e-post</button>
                        <button class="post_cancel--email" name="post_cancel--email">Avbryt</button>
                    </form>
                </div>

                <div class="post_start--email" name="post_start--email">Ändra e-post</div>
                <div class="test">
                	
                	<?php 

                	if (isset($_SESSION['email-exists'])) {
                		echo $_SESSION['email-exists'];
                	}	

                	if (isset($_SESSION['failed-pwd'])) {
                		echo $_SESSION['failed-pwd'];
                	}

                	if (isset($_SESSION['success'])) {
                		echo $_SESSION['success'];
                	} 

                	unset($_SESSION['email-exists']);
                	unset($_SESSION['failed-pwd']);
                	unset($_SESSION['success']);
                	
                	?>

                </div>
			</div>

			<div class="wrapper">

				<?php $author = $current_user->ID; ?>

				<?php $publish_args = array(
				    'post_type' => array('annons'),
				    'posts_per_page' => -1,
				    'author' => $author,
				    'post_status' => 'publish'
				); ?>

				<h2>Aktiva annonser</h2>

				<?php $query = new WP_Query($publish_args); ?>
						  
				<ul class="post-list_list ui-list">

				<?php if ($query->have_posts()) : ?>

				    <?php while ($query->have_posts()) : $query->the_post(); ?>
				    
				    <?php $pid = get_the_ID(); ?>

				        <li class="post-list_item">
				            
				            <div class="post-card">

					             <?php $image_args = array(
					                'post_type' => 'attachment',
					                'post_mime_type' => 'image',
					                'post_parent' => $pid,
					                'posts_per_page' => '1',
					                'order' => 'DESC'
					            ); ?>

					            <?php $images = get_posts($image_args); ?>

					            <?php foreach ($images as $image): ?> 
					                <?php if (!empty($image)): ?>

					                    <?php $background = wp_get_attachment_image_src($image->ID, 'large'); ?>

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

					            <?php if (!empty($size)): ?>

						            <div class="post-card_size">
						                <p class="size-wrap"><?php echo $size[0]->name; ?></p>
						            </div>

					            <?php endif; ?>

					            <div class="post-card_body">
					                <h2 class="post-card_title">
					                    <a href="<?php the_permalink(); ?>">
					                        <?php the_title(); ?>
					                    </a>
					                </h2>

					                <div class="post-card_content">
					                    <?php echo get_excerpt(); ?>
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

				    <?php endwhile; ?>

				    <?php wp_reset_postdata(); ?>

				<?php endif; ?>

				</ul>



				<!-- Arkiverade annonser -->

				<?php $draft_args = array(
				    'post_type' => array('annons'),
				    'posts_per_page' => -1,
				    'author' => $author,
				    'post_status' => 'draft'
				); ?>
				
				<h2>Arkiverade annonser</h2>

				<?php $query = new WP_Query($draft_args); ?>
						  
				<ul class="post-list_list ui-list">

				<?php if ($query->have_posts()) : ?>

				    <?php while ($query->have_posts()) : $query->the_post(); ?>
				    
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
				                    <?php echo get_excerpt(); ?>
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

				    <?php endwhile; ?>

				    <?php wp_reset_postdata(); ?>

				<?php endif; ?>

				</ul>

			</div>
	
		<?php else: ?>

			<div class="wrapper">

				<?php $user_page = $page_data->post_name; ?>

				<?php $user = get_user_by('slug', $user_page);

					$user_id = $user->ID;
					$user_name = $user->display_name;
					$user_email = $user->user_email;
					$user_nicename = $user->user_nicename;

				?>

				<h2>Profil</h2>
				<h5>Namn</h5>
				<p><?php echo $user_name; ?></p>
				<h5>Användarnamn</h5>
				<p><?php echo $user_nicename; ?></p>
				<h5>E-postadress</h5>
				<p><?php echo $user_email; ?></p>

				<?php $author = $user_id; ?>

				<?php $list_args = array(
				    'post_type' => array('annons'),
				    'posts_per_page' => -1,
				    'author' => $author,
				    'post_status' => 'publish'
				); ?>

			</div>

			<div class="wrapper">

				<?php $query = new WP_Query($list_args); ?>
				
				<?php if ($query->have_posts()): ?>
					<h2>Aktiva annonser</h2>
				<?php endif; ?>

				<ul class="post-list_list ui-list">

				<?php if ($query->have_posts()) : ?>

				    <?php while ($query->have_posts()) : $query->the_post(); ?>
				    
				    	<?php $pid = get_the_ID(); ?>

				        <li class="post-list_item">
				            <div class="post-card">

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
				                    <?php echo get_excerpt(); ?>
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

				    <?php endwhile; ?>

				    <?php wp_reset_postdata(); ?>

				<?php endif; ?>

				</ul>

			</div>

		<?php endif; ?>
	
	<?php endwhile; ?>

<?php else: ?>

	<?php while (have_posts()) : (the_post()); ?>

			<div class="wrapper">

				<?php $user_page = $page_data->post_name; ?>

				<?php $user = get_user_by('slug', $user_page);

					$user_id = $user->ID;
					$user_name = $user->display_name;
					$user_email = $user->user_email;
					$user_nicename = $user->user_nicename;

				?>

				<h2>Profil</h2>
				<h5>Namn</h5>
				<p><?php echo $user_name; ?></p>
				<h5>Användarnamn</h5>
				<p><?php echo $user_nicename; ?></p>
				<h5>E-postadress</h5>
				<p><?php echo $user_email; ?></p>

				<?php $author = $user_id; ?>

				<?php $list_args = array(
				    'post_type' => array('annons'),
				    'posts_per_page' => -1,
				    'author' => $author,
				    'post_status' => 'publish'
				); ?>

			</div>

			<div class="wrapper">

				<?php $query = new WP_Query($list_args); ?>
				
				<?php if ($query->have_posts()): ?>
					<h2>Publicerade annonser</h2>
				<?php endif; ?>

				<ul class="post-list_list ui-list">

				<?php if ($query->have_posts()) : ?>

				    <?php while ($query->have_posts()) : $query->the_post(); ?>
				    
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
				                    <?php echo get_excerpt(); ?>
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

				    <?php endwhile; ?>

				    <?php wp_reset_postdata(); ?>

				<?php endif; ?>

				</ul>

			</div>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>