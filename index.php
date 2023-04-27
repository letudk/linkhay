<?php get_header(); ?>
<div class = "container">
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
            <h1>Chào <?php echo $hellos; ?> </h1>
        </div>
</div>
<div class = "content" id = "content">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <img src = "https://ph-files.imgix.net/6af82d7a-df93-4748-9dc7-629f6e4b8c28.png" width= "80" />
            </div>
            <div class="col-8">
                <h1 class = "title-post">Title post</h1>
                <p class = "desc-post">Use ChatGPT on any website using SpotGPT extension.</p>
            </div>
            <div class="col up-vote">
                <i class="fa-solid fa-angle-up"></i>
            </div>
        </div>
    </div>      
</div>

<?php get_footer(); ?>