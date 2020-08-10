<?php 

    get_header( );

   

?>


        <h2 class="archive__title">
            أخر المقالات    
        </h2>
        <section class="archive">
        <div class="content__cards">
             <?php 

                   

                    if(have_posts()){
                        
                        while(have_posts(  )){
                            the_post(); 

                            

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

             <div class="archive__paginate"><?php echo paginate_links(); ?></div>
        </section>


<?php 


    get_footer( );

?>
