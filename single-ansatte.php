<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Kodeks
 */

get_header(); ?>

<div id="content" class="site-content small-12 row">

    <div id="primary" class="content-area small-12 medium-8 columns">

        <div class="small-12 medium-6 columns">
            <?php 
            if ( has_post_thumbnail() ) : the_post_thumbnail();
            endif;
            ?>
        </div>



        <main id="main" class="site-main small-12 medium-6 columns" role="main">

            <?php 

            $group_ID = 68;

            $fields = array();
            $fields = apply_filters('acf/field_group/get_fields', $fields, $group_ID);

            if( $fields )
            {
                foreach( $fields as $field )
                {
                    $value = get_field( $field['name'] );

                    if( $value ){

                        echo '<dl>';
                        echo '<dt>' . $field['label'] . '</dt>';
                        echo '<dd>' .$value . '</dd>';
                        echo '</dl>';
                    }
                }
            }

            ?>




        </main><!-- #main -->
    </div><!-- #primary -->

    <div class="comments">
        <?php 

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
        comments_template();
        endif;

        ?>

    </div>

    <?php
    include ('sidebar-ansatte.php');
    get_footer();
