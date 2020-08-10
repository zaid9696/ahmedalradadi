<?php 

    get_header( );

?>




<section class="hero">
        
       <div class="hero__info">

            <div class="hero__img">
                <div class="hero__img-overlay">
  
                    <img class="hero__image" src="<?php echo wp_get_attachment_url( get_theme_mod('basic-homepage-callout-image') ); ?>" alt="صورة أحمد الردادي">
                </div>
            </div>

       </div>

       <div class="hero__content">
            <div class="hero__intro">
                <h1 class="hero__title"> <span> <?php echo get_theme_mod('basic-homepage-small') ?></span><?php echo get_theme_mod('basic-homepage-callout-display') ?></h1>
                <p> <?php echo get_theme_mod('basic-homepage-callout-text') ?></p>
            </div>

       </div>

</section>

<main class="content">

        <article class="content__article">

            <h2 class="content__article-title">  <span>أحدث </span> المقالات</h2>

             <div class="content__cards">
             <?php 

                    $blogpost = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 4
                    ));

                    if($blogpost->have_posts()){
                        
                        while($blogpost->have_posts(  )){
                            $blogpost->the_post(); 

                            

                        ?>

            <div class="content__cards-card">
                <div class="content__cards-cover" style="background-image: url('<?php the_post_thumbnail_url('cover-img'); ?>')">
                        </div>
                        <h2 class="content__cards-title"><?php the_title(); ?></h2>
                        <div class="content__cards-detail">
                            <div><img src="<?php echo get_theme_file_uri('/img/comment.svg') ?>" alt="Comment Icon"> <h3> <?php comments_number(); ?></h3></div>
                            <div><img src="<?php echo get_theme_file_uri('/img/category.svg') ?>" alt="Category Icon"> <h3><?php the_category(  ); ?></h3></div>
                            <div><img src="<?php echo get_theme_file_uri('/img/user.svg') ?>" alt="User Icon"> <h3><?php the_author_posts_link( ); ?></h3></div>
                        </div>
                        <div class="content__cards-info">
                            <p><?php
                                    if(has_excerpt()){

                                        the_excerpt(  );
                                        
                                    } else {

                                       echo wp_trim_words( get_the_content(), 75, '...' );
                                    }
                             ?></p>

                            <a href="<?php the_permalink( ); ?>"><button class="content__cards-btn">أقرا المزيد</button></a>
                        </div>
                </div>

                        
         <?php  
                }
                  }
             
             ?>
                
             </div>   

                  <a href="<?php echo site_url('/المقالات/') ?>"><button class="content__btn">المزيد</button></a>
        </article>
        
        
    

    <aside class="content__aside">
            <h2 class="content__aside-title">  <span>المقالات </span> الأكثر قراءة</h2>

            <div class="content__aside-container ">
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


                    <div class="content__aside-card content__aside-card-mo">

                            <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url('most-img'); ?>" alt="Image"></a>
                            <a href="<?php the_permalink() ?>"><h3 class="content__aside-card-title"><?php the_title(); ?></h3></a>

                    </div>

                 <?php }

                    }

                  ?>
            </div>

            <div class="content__aside-twitter-feed">
            <a class="twitter-timeline" data-height="500" data-theme="light" href="https://twitter.com/ahmedalradadi?ref_src=twsrc%5Etfw">Tweets by ahmedalradadi</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
    </aside>

</main>










<?php 

    get_footer();

?>

