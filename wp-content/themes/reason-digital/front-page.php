<?php
get_header();
?>
<div class="description-search">
    <div class="description">
        <h2>Portfolio</h2>
        <p>This is a description of my word</p>
        <p>For more, checkouot out my website</p>
    </div>
    <div class="search">
        <ul>
            <li>All</li>
            <li>Charities</li>
            <li>Assistance</li>
            <li>Donate</li>
        </ul>
    </div>
</div>
<main>
    <?php
        while(have_posts()) {
            the_post(); ?>
            
                <div class="post-con">
                    <img src="<?= the_post_thumbnail_url(); ?>"/>
                    <p class="title"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></p>
                </div>
    <?php }  get_footer();  ?>
</main>
