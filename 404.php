<?php 

    get_header( );

   

?>


<section class="not-found">

    <div class="not-found__content">
        <h2>اللعنه يبدو الصفحة غير موجودة</h2>
        <p><a href="<?php echo site_url('/') ?>">الرجوع الى الصفحة الرئيسية</a></p>
    </div> 
<!-- autoplay loop muted -->
    <video autoplay loop muted src="<?php echo get_theme_file_uri('/img/sorry.mp4') ?>"></video>

</section>







<?php 

    get_footer();

   

?>