<?php

get_header();

while(have_posts()){
    the_post(); ?>
    
    <div class="main-single">
        <div class="right">
            <h1><?= the_title(); ?></h2>
            <p><?= the_content();?></p>
        </div>
        <div class="left">
            <img src="<?= the_post_thumbnail_url(); ?>"/>
        </div>
    </div>
<?php } get_footer(); ?>