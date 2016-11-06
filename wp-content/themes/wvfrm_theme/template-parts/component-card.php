<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wvfrm
 */

?>

<div class="content-card-container">
    <div class="content-card">

        <div class="content-card__bg"
             style="background: #001ABE url('<?php $bg_url; ?>') no-repeat top/110%;
                 background-position-y: -100px;
                 background-size: 0%;">
            <a href="<?php get_permalink(); ?>"></a>
            <div class="content-card__main">
                <div class="content-card__date"><?php get_the_modified_time('F j, Y'); ?></div>
                <div class="content-card__title"><?php get_the_title(); ?></div>
                <div class="content-card-btn">
                    <div class="content-card-btn__title">Learn More</div>
                </div>
            </div>
        </div>
    </div>
</div>