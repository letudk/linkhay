<?php
// TAO TRANG DANG NHAP
function my_login_redirect( $redirect_to, $request, $user ) {
	//is there a user to check?
	global $user;
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		//check for admins
		if ( in_array( 'administrator', $user->roles ) ) {
			// redirect them to the default place
			return admin_url();
		} else {
			return home_url('/profile/');
		}
	} else {
		return $redirect_to;
	}
}

add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );
// CHUYEN TRANG DANG NHAP MAC DINH SANG TRANG MOI
function redirect_login_page() {
    $login_page  = home_url( '/login/' );
    $page_viewed = basename($_SERVER['REQUEST_URI']);  

    if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($login_page);
        exit;
    }
}
add_action('init','redirect_login_page');
/* Kiểm tra lỗi đăng nhập */
function login_failed() {
    $login_page  = home_url( '/login/' );
    wp_redirect( $login_page . '?login=failed' );
    exit;
}
add_action( 'wp_login_failed', 'login_failed' );  

function verify_username_password( $user, $username, $password ) {
    $login_page  = home_url( '/login/' );
    if( $username == "" || $password == "" ) {
        wp_redirect( $login_page . "?login=empty" );
        exit;
    }
}
add_filter( 'authenticate', 'verify_username_password', 1, 3);
// chỉ admin voi vao wp-admin
function admin_login_redirect(){
$kiemtra = get_current_user_id();
if( is_admin() && !defined('DOING_AJAX') && (current_user_can('vip') || current_user_can('subscriber') || current_user_can('contributor'))){
wp_redirect( home_url() );
exit;
}
}
add_action('init','admin_login_redirect');
// tat an thanh bar
function cc_wpse_278096_disable_admin_bar() {
   if (current_user_can('administrator') || current_user_can('editor') || current_user_can('author')) {
     show_admin_bar(true); 
   } else {
     show_admin_bar(false);
   }
}
add_action('after_setup_theme', 'cc_wpse_278096_disable_admin_bar');



add_action ('init' , 'wpse_redirect_profile_access');
// chuyen nguoi dung ve trang ho so thong tin
function wpse_redirect_profile_access(){
        if (current_user_can('manage_options')) return '';
        if (strpos ($_SERVER ['REQUEST_URI'] , 'wp-admin/profile.php' )) {
            wp_redirect ( home_url( '/profile' )); 
            exit();
        }
}
// xoa logo wp trong admin
function example_admin_bar_remove_logo() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'wp_before_admin_bar_render', 'example_admin_bar_remove_logo', 0 );

// thay doi form lay lai mk
function fox_thaydoi_logo() {  ?>
<style type="text/css">
h1, form#language-switcher, .privacy-policy-page-link, p#backtoblog{display:none;}
input#wp-submit {
    width: 100%;
    padding: 10px;
    background: #0056c1;
    border-radius: 7px;
}
form#lostpasswordform {
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 1px 3px #ccc;
    border: none;
}
p.message, .login #login_error {
    border-radius: 10px;
}
div#login {
    max-width: 500px;
    width: 100%;
    padding: 7% 10px;
    box-sizing: border-box;
    font-size:19px;
}
p#nav, p#backtoblog {
    text-align: center;
}
</style>
    
<?php    
}
add_action('login_enqueue_scripts', 'fox_thaydoi_logo');
// Add tự động trang dang nhap va thong tin cho user
$link1 = "Login";
$link2 = "Profile";
if (get_page_by_title($link1) == NULL && get_page_by_title($link2) == NULL){
$my_post1 = array(
      'post_title'    => $link1,
      'post_status'   => 'publish',
	  'page_template' => 'login.php',
      'post_author'   => 1,
      'post_type'     => 'page',
    );
wp_insert_post( $my_post1 );
$my_post2 = array(
      'post_title'    => $link2,
      'post_status'   => 'publish',
	  'page_template' => 'profile.php',
      'post_author'   => 1,
      'post_type'     => 'page',
    );
 wp_insert_post( $my_post2 );
}

// tao thong tin nhap du lieu ve vip
if ( current_user_can( 'manage_options' ) ) {  //check admin
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );

function extra_user_profile_fields( $user ) {
wp_nonce_field( 'save_thongtin', 'thongtin_nonce' );
?>
    <div style="padding:20px;border:1px solid #ccc;background:#fff;box-shadow:0px 0px 6px #ccc">
    <div style="font-size:20px;font-weight:bold;margin-bottom:20px;margin-top:10px;color:#2271b1"><i class="fa-regular fa-user-group"></i> Dữ liệu thành viên VIP</div>
    <div>
        <div style="font-weight:bold"><i class="fa-regular fa-list"></i> Nhập dữ liệu Post ID</div>
            <p><textarea type="text" name="post" placeholder="Post ID" style="width:100%;height:150px"><?php echo esc_attr( get_the_author_meta( 'post', $user->ID ) ); ?></textarea></p>
        <div style="font-weight:bold"><i class="fa-regular fa-clock-eight"></i> Nhập ngày hết VIP</div>
            <p><input type="text" name="vipend" placeholder="02/09/2024" style="width:200px;" value="<?php echo esc_attr( get_the_author_meta( 'vipend', $user->ID ) ); ?>" /></p>
    </div>
    </div>
<?php }
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );

function save_extra_user_profile_fields( $user_id ) {
    $thongtin_nonce = $_POST['thongtin_nonce'];
    if( !isset( $thongtin_nonce ) ) {
    return;
    }
    if( !wp_verify_nonce( $thongtin_nonce, 'save_thongtin' ) ) {
    return;
    }
    
    if ( empty( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'update-user_' . $user_id ) ) {
        return;
    }
    
    if ( !current_user_can( 'edit_user', $user_id ) ) { 
        return false; 
    }
    update_user_meta( $user_id, 'post', $_POST['post'] );
    update_user_meta( $user_id, 'vipend', $_POST['vipend'] );
}
}

// bài viết trong admin hiển thị cho từng nhóm bài ai người đó thấy
function fox_posts_useronly( $wp_query ) {
    if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/edit.php' ) !== false ) {
        if ( !current_user_can( 'level_10' ) ) {
            global $current_user;
            $wp_query->set( 'author', $current_user->id );
        }
    }
}
add_filter('parse_query', 'fox_posts_useronly' );

// hinh anh media chi admin moi thay het
function fox_authored_content($query) {
$current_user = wp_get_current_user();
$is_user = $current_user->user_login;
if (!current_user_can('manage_options')){
    if($query->is_admin) {
        global $user_ID;
        $query->set('author',  $user_ID);
    }
    return $query;
}
return $query;
}
add_filter('pre_get_posts', 'fox_authored_content');



global $login_options;
if(isset($login_options['enable3'])){
// tạo nhóm VIP --------------------------------------------- VIP
$loginshow_add_new_user_vp1 = add_role('vip', __( 'Vip' ),
    array(
        'read'         => true,
        'edit_posts'   => true,
        'delete_posts' => false,
    )
);

// them metbox khoa chuong bai viet --------------------------------------------------------------------metbox trong story.
function rum_meta_story()
{
 add_meta_box( 'thong-tin1', __('Khoá nội dung theo thuộc tính', 'fox'), 'rum_thongtin_story', array('post', 'story'));
}
add_action( 'add_meta_boxes', 'rum_meta_story' );
function rum_thongtin_story( $post )
{
  $story_vip = get_post_meta( $post->ID, '_story_vip', true );
  wp_nonce_field( 'save_thongtin', 'thongtin_nonce' ); ?>
   <select name="story_vip" id="story_vip">
        <option value="">No login</option>
        <option value="Login" <?php selected($story_vip, 'Login'); ?>>Login</option>
        <option value="Vip" <?php selected($story_vip, 'Vip'); ?>>Vip</option>
    </select>
    <p style="padding:10px;border-radius:3px;background:#c7fffc"><i class="fa-regular fa-lightbulb-on"></i> <?php _e('Dùng để khoá nội dung bài viết hoặc chương truyện.', 'fox'); ?></p>
  <?php
}
function rum_thongtin_save_story( $post_id )
{
if(isset($_POST['thongtin_nonce'])){
$thongtin_nonce = $_POST['thongtin_nonce'];
}
 if( !isset( $thongtin_nonce ) ) {
  return;
 }
 if( !wp_verify_nonce( $thongtin_nonce, 'save_thongtin' ) ) {
  return;
 }	
 $story_vip = sanitize_text_field( $_POST['story_vip'] );
 update_post_meta( $post_id, '_story_vip', $story_vip );
}
add_action( 'save_post', 'rum_thongtin_save_story' );
}



//gui email chao mung cho thanh vien moi---------------------------------------
function fox_send_welcome_email_to_new_user($user_id) {
	global $login_options;
    $user = get_userdata($user_id);
    $user_email = $user->user_email;
    $user_full_name = $user->user_login;

    $to = $user_email;
    $subject = $login_options['etitle'];
    $body = '<div style="font-size:18px;background:#f1f1f1;color:#333;padding:25px;max-width:600px;margin:auto">
    <div style="background:#f1f1f1;color:#777;border-bottom: 4px solid #0768ea;padding-bottom:7px;color:#0768ea;font-size:20px"><b>'. $user_full_name .'</b></div>
    '.$login_options['enoidung'].'</div>';
    $headers = array('Content-Type: text/html; charset=UTF-8');
    if (wp_mail($to, $subject, $body, $headers)) {
      error_log(__('email đã được gửi thành công đến người dùng có email là', 'fox') . $user_email);
    }else{
      error_log(__('không gửi được email đến người dùng có email là', 'fox') . $user_email);
    }
  }
  add_action('user_register', 'fox_send_welcome_email_to_new_user');
