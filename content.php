<article class="new-card">
    <div class = "project-item">
        <div class = "image-project">
            <img class = "img-project" src="<?php echo get_the_post_thumbnail_url (get_the_ID()); ?>"></img>
        </div>
        <div class = "content-project">
            <h1><?php echo get_the_title(); ?></h1>
            <p><?php echo wp_trim_words( get_the_excerpt() , 10 ) ?></p>
        </div>
        <div class = "upvote">
            <i class="fas fa-caret-up"></i>
        </div>
    </div> 
</article>