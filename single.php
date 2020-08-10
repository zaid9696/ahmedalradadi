<?php 

    get_header( );


    

    while(have_posts(  )){
        the_post();


?>


 <header class="header">

        <h1 class="header__title"><?php the_title(); ?></h1>

        <div class="header__cover" style="background-image: url('<?php the_post_thumbnail_url() ?>')"></div>

 </header>




<main class="main">


        <article class="main__article">

            <div class="main__article-info">
                <div class="main__article-icon">
                    <?php echo get_avatar( get_the_author_email(), '60' );?>
                    <div class="main__article-txt">
                        <span class="main__article-head">كاتب</span>
                        <span class="main__article-foot"><?php the_author_posts_link( ) ?></span>
                     </div>       
                </div>
                <div class="main__article-icon">
                    <img src="<?php echo get_theme_file_uri('img/date.svg')?>" alt="Icon" class="main__article-date">
                    <div class="main__article-txt">
                        <span class="main__article-head">تاريخ النشر</span>
                        <span class="main__article-foot"><?php the_time( 'd F Y' ) ?></span>
                        
                    </div>
                </div>
            </div>

            <div class="main__article-content">
                <?php the_content(); ?>
            </div>

            <div class="main__article-next-prev">

                <div class="main__article-next-prev-container">
                    <?php

                            if(get_previous_post()){ ?>


                      
                <img src="<?php echo get_theme_file_uri('/img/prev.svg'); ?>" alt="icon"> 
                        <div class="mrr">
                            <span >بوست السابق</span>
                            <?php previous_post_link( '<strong class="mral">%link</strong>' ); ?>
                        </div>
                        
                        <?php       };
                        ?>
                </div>

                <div class="main__article-next-prev-container">
                        <?php 

                            if(get_next_post_link()){ ?>
                        <div class="mrl">
                            <span >بوست التالي</span>
                            <?php next_post_link( '<strong class="mrar">%link</strong>' ); ?>
                        </div>
                        <img src="<?php echo get_theme_file_uri('/img/next.svg'); ?>" alt="icon">
                        
                            <?php }; ?>
                </div>
            </div>

            
        </article>
        <aside class="content__aside">
            <h2 class="content__aside-title">  <span>المقالات </span> الأكثر قراءة</h2>

            <div class="content__aside-container">
                  <?php 

                    setPostViews(get_the_ID());
                   $mostread = new WP_Query( array(
                        'meta_key' => 'post_views_count',
                        'orderby' => 'meta_value_num',
                        'posts_per_page' => 3
                    ) ); 

                    if($mostread){


                        while($mostread->have_posts()){
                            $mostread->the_post(); ?>


                    <div class="content__aside-card content__aside-card-move">

                            <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url('most-img'); ?>" alt="Image"></a>
                            <a href="<?php the_permalink() ?>"><h3 class="content__aside-card-title"><?php the_title(); ?></h3></a>

                    </div>

                 <?php }

                     wp_reset_postdata();
                        

                    }

                  ?>
            </div>
            <div class="content__aside-twitter-feed">
            <a class="twitter-timeline" data-height="500" data-theme="light" href="https://twitter.com/ahmedalradadi?ref_src=twsrc%5Etfw">Tweets by ahmedalradadi</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
    </aside>

</main>

<div class="main__article-comments">
         <?php 

      
            if(comments_open()){

                comments_template();

            } 

    
                ?>
</div>

    













<?php 

    };
    wp_reset_postdata();

    get_footer( );

?>
