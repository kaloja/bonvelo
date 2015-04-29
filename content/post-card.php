<?php $list_args = array(
    'post_type' => array('annons'),
    'posts_per_page' => -1
); ?>

<?php $query = new WP_Query($list_args); ?>
  
<ul class="post-list_list ui-list">

<?php if ( $query->have_posts() ) : ?>
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

                    <div class="post-card_img" style="background: url('<?php echo $background[0]; ?>'); background-size: cover; background-position: top center; background-color: #fff;"></div>

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

    <?php endwhile; ?>
<?php endif; ?>

</ul>