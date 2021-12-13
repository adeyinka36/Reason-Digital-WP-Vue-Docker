<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>
<body class="main-body">
    <header class="header">
        <div class="icon-con">
            <i class="fab fa-adn logo"></i>
            <i class="fas fa-bars menu"></i>
        </div>      
        <ul class="drop-down">
            <?= wp_nav_menu( 
                [
                    'theme_location' => 'main-menu'
                ]
                );
                ?>
        </ul>
    </header>