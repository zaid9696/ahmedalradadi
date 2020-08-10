<!DOCTYPE html>
<html  dir="rtl" lang="ar" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>

<nav class="nav">
    
    <div class="nav__logo">
    <a href="<?php echo site_url('/'); ?>"><img src="<?php echo get_theme_file_uri('/img/Logo.png');  ?>" alt="شعار الموقع"></a>
    </div>
    <div class="nav__menu">
        <div class="nav__wrap">

        <div class="nav__closeicon" role="button" aria-label="close">
                    <img src="<?php echo get_theme_file_uri('/img/close.svg');  ?>" alt="ايقونة أغلاق">
            </div>
            <?php 
            
                wp_nav_menu( array(
                    'theme_location' => 'primary'
                ) );

            ?>
        
        </div>
            

            <div class="nav__menuicon" role="button" aria-label="menu">
                    <img src="<?php echo get_theme_file_uri('/img/menu.svg');  ?>" alt="ايقونة القائمة">
            </div>
            <div class="nav__search" role="button" aria-label="search">
                    <img src="<?php echo get_theme_file_uri('/img/search.svg');  ?>" alt="ايقونة البحث">
            </div>
    </div>

</nav>
    
