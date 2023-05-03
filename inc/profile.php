<?php
/**
 * Template Name: Profile
 */
global $current_user, $wp_roles;
wp_get_current_user();
$error = array();
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        if ( $_POST['pass1'] == $_POST['pass2'] )
            wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
        else
            $error[] = __('Mật khẩu mà bạn nhập không khớp!', 'linkhay');
    }
    if ( isset( $_POST['user_url'] ) ){
                wp_update_user( array( 'ID' => $current_user->ID, 'user_url' => esc_url( $_POST['user_url'] ) ) );
            }
    if ( !empty( $_POST['first-name'] ) )
        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
    if ( !empty( $_POST['last-name'] ) )
        update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
    if ( isset( $_POST['description'] ) )
        update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );
	if ( isset( $_POST['tiktok'] ) ) {
            update_user_meta( $current_user->ID, 'tiktok', esc_attr( $_POST['tiktok'] ) ); }
    if ( isset( $_POST['facebook'] ) ) {
            update_user_meta( $current_user->ID, 'facebook', esc_attr( $_POST['facebook'] ) ); }
    if ( isset( $_POST['twitter'] ) ) {
            update_user_meta( $current_user->ID, 'twitter', esc_attr( $_POST['twitter'] ) ); }
	if ( isset( $_POST['zalo'] ) ) {
            update_user_meta( $current_user->ID, 'zalo', esc_attr( $_POST['zalo'] ) ); }
	if ( count($error) == 0 ) {
        do_action('edit_user_profile_update', $current_user->ID);
        wp_redirect( get_permalink() );
        exit;
    }
}
get_header(); ?>
<main>
<div class="box-card">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php if ( !is_user_logged_in() ) : ?>
<div style="padding:20px;text-align: center;"><?php _e('Xin lỗi! Trang này chỉ hoạt động sau khi bạn đã đăng nhập :)', 'linkhay'); ?></div>
<?php else : ?>             
<div class="box-noidung">
<?php if ( count($error) > 0 ){ echo '<div class="thongtin-loi">  '.implode($error).'</div>';} ?>
                <form class="thongtin-form" autocomplete="off" method="post" id="adduser" action="<?php the_permalink(); ?>">
                    <div class="thongtin-img">
                    <?php echo get_avatar( $current_user->ID, 150 ); ?>
                    <div class="thongtin-user"><b><?php echo the_author_meta( 'nickname', $current_user->ID ); ?></b></div>
                    <div class="user-tb"><?php global $wp_query; $registered = date_i18n( "d/m/Y", strtotime( get_the_author_meta( 'user_registered', $wp_query->queried_object_id ) ) ); echo __('Tham gia', 'linkhay') .' '. $registered; ?></div>
                    <div class="user-tb"><?php echo __('Số ID:', 'linkhay') .' '. get_current_user_id(); ?></div>
                    <a href="<?php echo esc_url(wp_logout_url()); ?>"><?php _e('ĐĂNG XUẤT TÀI KHOẢN', 'linkhay'); ?></a> 
                    <div>
                        <?php if(current_user_can('subscriber')) { ?>
                        <span class="user-tb"><?php _e('Bạn đang sử dụng tài khoản thường', 'linkhay'); ?></span>
                        <?php 
                        // thoi gian vip 1
                    	$current_user = wp_get_current_user(); $vipuserid = $current_user->ID;
                        $ngaysosanh = get_the_author_meta( 'vipend', $vipuserid ); 
                        $ngaysosanh = str_replace('/', '-', $ngaysosanh);
                        $ngayhomnay = date("d-m-Y"); 
                        if(!empty(strtotime($ngaysosanh)) && strtotime($ngayhomnay) < strtotime($ngaysosanh)){
                        $songay = strtotime($ngaysosanh) - strtotime($ngayhomnay);
                        $tinhngay = round($songay / (60 * 60 * 24));
                        echo '<span class="user-vip"><i class="fa-regular fa-clock"></i> '. __('Số ngày còn lại để đọc:', 'linkhay') .'</span>'. $tinhngay;
                        }
                        else if (!empty(strtotime($ngaysosanh)) && strtotime($ngayhomnay) == strtotime($ngaysosanh)){
                        echo '<span class="user-vip"><i class="fa-regular fa-clock"></i> '. __('Hôm nay là hết hạn', 'linkhay') .'</span>';
                        } 
                        }
                        
                        if (current_user_can('vip')) { ?>
                        <span class="user-tb"><?php _e('Bạn đang sử dụng tài khoản VIP', 'linkhay'); ?></span>
                        <?php } 
                        if (current_user_can('author')) { ?>
                        <span class="user-tb"><?php _e('Bạn đang sử dụng tài khoản tác giả', 'linkhay'); ?></span>
                        <?php } 
                        if (current_user_can('administrator')) { ?>
                        <span class="user-tb"><?php _e('Bạn đang sử dụng tài khoản Admin', 'linkhay'); ?></span>
                        <?php } 
                        ?>
                    </div>
                    </div>
                    <div class="thongtin-noidung">
                        <div class="thongtin-tieude" style="margin-top:0px"><?php _e('Thông tin cơ bản', 'linkhay'); ?></div>
    					<div class="thongtin-box">
                        <div><input class="text-input" name="last-name" type="text" id="tt-input1" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" placeholder="<?php _e('Họ của bạn', 'linkhay'); ?>" width="100%" /></div>
                        <div><input class="text-input" name="first-name" type="text" id="tt-input2" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" placeholder="<?php _e('Tên của bạn', 'linkhay'); ?>" /></div>
                        </div>
    
    					<div class="thongtin-box">
                        <div><input type="number" class="form-control" id="tt-input3" name="zalo" placeholder="ID Zalo" value="<?php the_author_meta( 'zalo', $current_user->ID ); ?>"></div>
                        <div><input type="text" class="form-control" id="tt-input4" name="tiktok" placeholder="ID Tiktok" value="<?php the_author_meta( 'tiktok', $current_user->ID ); ?>"></div>
                        </div>
    					<div class="thongtin-note">
    					❖ https://tiktok.com/@<span style="color:#0768ea">Id</span>  <?php _e('là Id tiktok của bạn.', 'linkhay'); ?>
    					</div>
                        <div class="thongtin-box">
                        <div><input readonly onfocus="this.removeAttribute('readonly');" type="text" class="form-control" id="tt-input5" name="facebook" placeholder="ID Facebook" value="<?php the_author_meta( 'facebook', $current_user->ID ); ?>"></div>
                        <div><input readonly onfocus="this.removeAttribute('readonly');" type="text" class="form-control" id="tt-input6" name="twitter" placeholder="ID Twitter" value="<?php the_author_meta( 'twitter', $current_user->ID ); ?>"></div>
                        </div>
    					<div class="thongtin-note">
    					❖ https://facebook.com/<span style="color:#0768ea">Id</span>  <?php _e('là Id Facebook của bạn.', 'linkhay'); ?><br/>
    					❖ https://twitter.com/<span style="color:#0768ea">Id</span>  <?php _e('là Id Twitter của bạn.', 'linkhay'); ?>
    					</div>
                        <div class="thongtin-tieude"><?php _e('Chia sẻ thêm về bạn', 'linkhay'); ?></div>
                        <div><textarea placeholder="<?php _e('Bạn muốn giới thiệu bản thân?', 'linkhay'); ?>" maxlength="200" name="description" id="tt-input7" rows="3" cols="50"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea></div>
                        <div class="thongtin-tieude"><?php _e('Bạn có muốn thay đổi mật khẩu mới?', 'linkhay'); ?></div>
    					<div class="thongtin-box">
                        <div><input class="text-input" name="pass1" type="password" id="tt-input8" placeholder="<?php _e('Mật khẩu', 'linkhay'); ?>" /></div>
                        <div><input class="text-input" name="pass2" type="password" id="tt-input9" placeholder="<?php _e('Nhập lại mật khẩu', 'linkhay'); ?>" /></div>
    					</div>

                        <input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Cập nhật thông tin', 'linkhay'); ?>" />
                        <?php wp_nonce_field( 'update-user' ) ?>
                        <input name="action" type="hidden" id="action" value="update-user" />
                    </div>
                </form>
<?php endif; ?>
<?php endwhile;  else: ?>
<p class="no-data"><?php _e('Xin lỗi, trang này không tồn tại.', 'linkhay'); ?></p>
<?php endif; ?>
</div>
</main>
<?php get_footer();
