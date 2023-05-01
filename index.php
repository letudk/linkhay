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

<section id="sectionJobList" class="section section-job-list gradient-light--lean-left">
      <div class="container">
        <div class="row row-grid justify-content-center">
          <div class="col-md-10">
            <div class="job-list__wrapper mb-6">
              <h3 class="mb-4">Dự án nổi bật</h3>
              <div class="container single-col-max-width">
			    <div class="item mb-5">
				    <div class="row g-3 g-xl-0">
					    <div class="col-2 col-xl-3">
					        <img class="img-fluid post-thumb " src="https://themes.3rdwavemedia.com/demo/bs5/devblog/assets/images/blog/blog-post-thumb-1.jpg" alt="image">
					    </div>
					    <div class="col">
						    <h3 class="title mb-1"><a class="text-link" href="blog-post.html">Top 3 JavaScript Frameworks</a></h3>
						    <div class="meta mb-1"><span class="date">Published 2 days ago</span><span class="time">5 min read</span><span class="comment"><a class="text-link" href="#">8 comments</a></span></div>
						    <div class="intro">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies...</div>
						    <a class="text-link" href="blog-post.html">Read more →</a>
					    </div><!--//col-->
				    </div><!--//row-->
			    </div><!--//item-->
			    
				
		    </div>
            </div>

            <div class="job-list__wrapper mb-6">
              <h3 class="mb-4">Dự án mới</h3>

              <a href="career-single.html" class="card p-0 mb-3 border-0  shadow--on-hover">
                <div class="card-body">
                  <span class="row justify-content-between align-items-center">
                    <span class="col-md-5 color--heading">
                      <span class="badge badge-circle background--success text-white mr-3">FE</span> Front End Developer
                    </span>

                    <span class="col-5 col-md-3 my-3 my-sm-0 color--text">
                      <i class="fas fa-clock mr-1"></i> Part time
                    </span>

                    <span class="col-7 col-md-3 my-3 my-sm-0 color--text">
                      <i class="fas fa-map-marker-alt mr-1"></i> Sydney, AU
                    </span>

                    <span class="d-none d-md-block col-1 text-center color--text">
                        <i class="fa-solid fa-caret-up"></i>
                    </span>
                  </span>
                </div>
              </a> <!-- Job Card -->

              
            </div>
          </div>

        </div>
      </div>
    </section>

<?php get_footer(); ?>