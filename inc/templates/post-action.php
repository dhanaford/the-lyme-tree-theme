<?php
// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die();
}?>
<div class="single-post-action">
    <!-- Tag & Share -->
    <div class="section-item section-tags clearfix">
        <div class="row">
            <div class="col-sm-7 col-md-7">
                <?php if(has_tag()){ ?>
                <div class="dgt-post-tags">
                    <span class="pull-left"><i class="ion-pricetag"></i></span>
                    <?php the_tags('', ', ', ''); ?>
                </div>
                <?php } ?>
            </div>
            <div class="col-sm-5 col-md-5">
                <div class="post-share pull-right">
                    <span class="pull-left"><?php echo esc_html__('Share it on:', 'dgt-soraka'); ?></span>
                    <div class="dgt-social icon-show name-hidden pull-left">
                        <ul>
                            <li><a class="facebook" target="_blank"
                                   href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_permalink()); ?>"><i
                                        class="ion-social-facebook"></i></a></li>
                            <li><a class="twitter" target="_blank"
                                   href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php echo esc_url(get_the_title()); ?>%20-%20<?php echo esc_url(get_permalink()); ?>"><i
                                        class="ion-social-twitter"></i></a></li>
                            <li>
                                <?php $pin_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
                                <a class="pinterest" target="_blank"
                                   href="https://pinterest.com/pin/create/button/?url=<?php echo esc_url(get_permalink()); ?>%26media=<?php echo esc_url($pin_image); ?>%26description=<?php echo esc_url(get_the_title()); ?>"><i
                                        class="ion-social-pinterest"></i></a>
                            </li>
                            <li><a class="google" target="_blank"
                                   href="https://plus.google.com/share?url=<?php echo esc_url(get_permalink()); ?>"><i
                                        class="ion-social-googleplus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Post navigation -->
    <div class="section-item section-pagination clearfix">
        <div class="post-pagination row">
            <?php
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            ?>
            <?php if (!empty($prev_post)) : ?>
                <div class="prev-post col-sm-6 col-md-6">
                    <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><i
                            class="ion-chevron-left"></i><?php echo esc_html__('Prev', 'dgt-soraka'); ?></a>
                </div>
            <?php endif; ?>
            <?php if (!empty($next_post)) : ?>
                <div class="next-post pull-right col-sm-6 col-md-6">
                    <a class="pull-right"
                       href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php echo esc_html__('Next', 'dgt-soraka'); ?>
                        <i class="ion-chevron-right"></i></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Post Author -->
    <div class="section-item section-author clearfix">
        <div class="section">
            <div class="dgt-post-author clearfix">
                <div class="author-img">
                    <?php echo wp_kses(get_avatar(get_the_author_meta('email'), '150'), array('img'=>array('class'=>array(), 'width'=>array(), 'height'=>array(), 'srcset'=>array(), 'src'=>array(), 'alt'=>array()))); ?>
                </div>
                <div class="author-content">
                    <h5 class="pull-left"><?php the_author_posts_link(); ?></h5>
                    <div class="clearfix"><!-- clearfix --></div>
                    <p><?php the_author_meta('description'); ?></p>
                    <div class="dgt-social icon-show name-hidden">
                        <ul>
                            <?php if (get_the_author_meta('facebook')) : ?>
                                <li><a target="_blank" class="author-social" href="<?php echo esc_url(get_the_author_meta('facebook')); ?>"><i class="ion-social-facebook"></i></a></li>
                            <?php endif; ?>
                            <?php if (get_the_author_meta('twitter')) : ?>
                                <li><a target="_blank" class="author-social" href="<?php echo esc_url(get_the_author_meta('twitter')); ?>"><i class="ion-social-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if (get_the_author_meta('instagram')) : ?>
                                <li><a target="_blank" class="author-social" href="<?php echo esc_url(get_the_author_meta('instagram')); ?>"><i class="ion-social-instagram"></i></a></li>
                            <?php endif; ?>
                            <?php if (get_the_author_meta('google')) : ?>
                                <li><a target="_blank" class="author-social" href="<?php echo esc_url(get_the_author_meta('google')); ?>"><i class="ion-social-googleplus"></i></a></li>
                            <?php endif; ?>
                            <?php if (get_the_author_meta('pinterest')) : ?>
                                <li><a target="_blank" class="author-social" href="<?php echo esc_url(get_the_author_meta('pinterest')); ?>"><i class="ion-social-pinterest"></i></a></li>
                            <?php endif; ?>
                            <?php if (get_the_author_meta('tumblr')) : ?>
                                <li><a target="_blank" class="author-social" href="<?php echo esc_url(get_the_author_meta('tumblr')); ?>"><i class="ion-social-tumblr"></i></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>" class="dgt-button"><?php echo esc_html__('see all post', 'dgt-soraka'); ?></a>
            </div>
        </div>
    </div>
    <!-- Related Post -->
<!--    <div class="section-item section-author clearfix">-->
<!--        <div class="section">-->
<!--            --><?php //get_template_part('inc/templates/related', 'post'); ?>
<!--        </div>-->
<!--    </div>-->
</div>