


<footer class="footer">

    <div class="footer__container">
    <div class="footer__logo">قليلاً من الحياة الاكاديمية، وكثيراً من التسويق ..</div>
        <?php

                wp_nav_menu( array(
                    'theme_location' => 'secondary'
                ) );
         ?>
    </div>

    <div class="footer__zaid">
        Created By <a href="https://twitter.com/zaiddev96" target="_blank">Zaid</a>
    </div>
</footer>

<div class="frontoverlay">

<div class="cancelicon"><img src="<?php echo get_theme_file_uri('/img/cancel.svg') ?>" alt="Cancel Icon"></div>

    <form class="frontoverlay__form" autocomplete="off">
            <input type="search"  placeholder="الرجاء البحث هنا" name="search" id="search" class="frontoverlay__form-search">
            <div class="loadicon"><img src="<?php echo get_theme_file_uri('/img/loadicon.svg') ?>" alt="Load Icon"></div>
            <div class="frontoverlay__content">

            </div>
            <!-- <div class="frontoverlay__container">

        <div class="frontoverlay__container-item" style="background-image: url('<?php //echo get_theme_file_uri('/img/img-3.jpg'); ?>')">
            <h3><a href="#">كيف تنتصر على عقلك في بناء عادات صحية جديدة: دراسات باوميستر.</a></h3>
            <p><a href="#">كلام وارين بافيت عن العادات أعتبره من أجمل وأدق الجمل التي وصفت العادات اليومية. فعلاً، في البداية لا تشعر بتكون هذه العادة.. وفجأة تشعر وكأنك في سجن صنعته بنفسك.. مجبر على تكرار هذه العادة سواءً كنت ترغب بذلك أو لا....</a></p>
        </div>
    
        </div> -->
    </form>

  


</div>

<?php wp_footer(); ?>

</body>
</html>