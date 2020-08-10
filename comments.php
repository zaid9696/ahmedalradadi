<?php 


if(post_password_required()){

    return;
};

?>


<div>


    <?php  

        if(have_comments()){ ?>

        <h2 class="comment-title">
        <?php
                
            printf(
                esc_html(_nx('تعليق واحد على &ldquo;%2$s&rdquo;', '%1$s تعليقات على &ldquo;%2$s&rdquo;', get_comments_number(), 'commets title', 'sunsettheme')),
                number_format_i18n(get_comments_number()),
                 '<span>'. get_the_title() . '</span>'
            )
        ?>

        </h2>

        <ol class="comment_list">
            <?php 
                wp_list_comments( array(
                    'style'       => 'ol',
                    'short_ping'  => true,
                    'avatar_size' => 60,
                    'max_depth' => '',
                    'page' => '',
                    'per_page' => '',
                    'reverse_top_level' => null,
                    'reverse_childern' => null,
                    'echo' => true,

                ) );
             ?>
        </ol>

         <?php if(!comments_open() && get_comments_number()){ ?>

            <p class="no-comments"><?php esc_html_e( "Comments are closed", 'alradadi' ); ?></p>

        <?php }; ?>   

      <?php  };

    ?>

    <?php comment_form(); ?>

</div>

