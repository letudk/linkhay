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
                        $hellos = 'Buổi sáng';
                     }elseif($hour >= 1&& $hour <=6 && $TY == 'PM'){
                        $hellos = 'Buổi chiều';
                     }else{
                        $hellos = 'Buổi tối';
                     };
                     ?>
                     <h1><i class="fa-solid fa-cloud"></i> Chào <?php echo $hellos; ?> </h1>
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
              <h3 class="mb-4">Top Website</h3>

              <a href="career-single.html" class="card p-0 mb-3 border-0 shadow--on-hover">
                <div class="card-body">
                  <span class="row justify-content-between align-items-center">
                    <span class="col-md-5 color--heading">
                      <span class="badge badge-circle background--danger text-white mr-3">GD</span> Senior Graphic Designer
                    </span>

                    <span class="col-5 col-md-3 my-3 my-sm-0 color--text">
                      <i class="fas fa-clock mr-1"></i> Full time
                    </span>

                    <span class="col-7 col-md-3 my-3 my-sm-0 color--text">
                      <i class="fas fa-map-marker-alt mr-1"></i> San Fransisco, US
                    </span>

                    <span class="d-none d-md-block col-1 text-center color--text">
                      <small><i class="fa-solid fa-caret-up"></i></small>
                    </span>
                  </span>
                </div>
              </a> <!-- Job Card -->
            </div>

            <div class="job-list__wrapper mb-6">
              <h3 class="mb-4">Website mới</h3>

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
                      <small><i class="fas fa-chevron-right"></i></small>
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