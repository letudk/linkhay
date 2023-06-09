<?php get_header(); ?>
<section id="selectionHeader" class="section selection-header gradient-light--lean-left">
   <div class = "container">
      <div class = "row row-grid justify-content-center">
      <div class="col-md-10">
         <div class = 'hello-use' style = "margin:20px 0px;">
               <?php
                    date_default_timezone_set("Asia/Ho_Chi_Minh");
                     $hour = date("h");
                     $TY = date("A");
                     if($hour > 6 && $hour < 12 && $TY == 'AM'){
                        $hellos = 'buổi sáng';
                     }elseif($hour >= 1&& $hour <=6 && $TY == 'PM'){
                        $hellos = 'buổi chiều';
                     }else{
                        $hellos = 'buổi tối';
                     };
                ?>
                <div class = 'row row-grid justify-content-center'>
                    <div class = 'col-md'>
                        <h1>Chào <?php echo $hellos; ?>, Lê Tú</h1>
                        <p>Chúc bạn hôm nay luôn thuận lợi.</p>
                    </div>
                </div>
            </div>
         </div>
      </div>
   </div>
</section>

<section id="bloglist" class="section blog-list  gradient-light--lean-left">
      <div class="container">
        <div class="row row-grid justify-content-center">
          <div class="col-md-10">

            <div class="project-list mb-6">
              <h3 class="mb-4">Dự án nổi bật</h3>
              <div class="container single-col-max-width">
                  <?php  
                  // chương truyen o card
                      global $project_options;
                      $project = new WP_Query();
                      $args = array(
                          'post_type'   => 'project',
                          'post_status' => 'publish',
                            'posts_per_page'=> 2,
                        );
                        $project = new WP_Query( $args );
                      if( $project->have_posts() ) :  
                      while( $project->have_posts() ) : $project->the_post();
                      
                  get_template_part( 'content', get_post_type() );

                    
                 endwhile;  endif; wp_reset_postdata(); 
                       ?>
			        </div>
            </div> 
            <!-- col-md-10 -->

            <div class="project-list mb-6">
              <h3 class="mb-4">Dự án mới</h3>

              <div class="container single-col-max-width">
                  <div class = "project-item">
                      <div class = "image-project">
                          <img class = "img-project" src = "https://ph-files.imgix.net/95497a20-f3cd-4687-8e3c-87c748bfd0a1.png"></img>
                      </div>
                      <div class = "content-project">
                          <h1>monday.com</h1>
                          <p>Build your ideal workflow with 200+ customizable templates</p>
                      </div>
                      <div class = "upvote">
                      <i class="fas fa-caret-up"></i>
                      </div>
                  </div> 
                  <!-- end item  -->
                  <div class = "project-item">
                      <div class = "image-project">
                          <img class = "img-project" src = "https://ph-files.imgix.net/95497a20-f3cd-4687-8e3c-87c748bfd0a1.png"></img>
                      </div>
                      <div class = "content-project">
                          <h1>monday.com</h1>
                          <p>Build your ideal workflow with 200+ customizable templates</p>
                      </div>
                      <div class = "upvote">
                      <i class="fas fa-caret-up"></i>
                      </div>
                  </div>
			        </div>

              
            </div>
          </div>

        </div>
      </div>
    </section>

<?php get_footer(); ?>