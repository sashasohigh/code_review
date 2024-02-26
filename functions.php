<?php
include_once __DIR__ . "/inc/images.php";


add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'scripts_theme');
add_action('after_setup_theme', 'theme_register_nav_menu');
// add_action('init', 'register_post_types');
// add_filter('show_admin_bar', '__return_false');
// add_theme_support( 'html5', array( 'search-form' ) );
// add_theme_support( 'post-thumbnails');

function style_theme() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('style-less', get_template_directory_uri() . '/assets/css/less.less');
    wp_enqueue_style('style-fonts', get_template_directory_uri() . '/assets/css/fonts.css');
    wp_enqueue_style('style-media', get_template_directory_uri() . '/assets/css/media.css');
}

function scripts_theme() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('less-script', get_template_directory_uri() . '/assets/js/less.js');
    wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/js/script.js');
}

function theme_register_nav_menu() {
    register_nav_menu('nav-menu-1', 'Navigation col 1');
	register_nav_menu('nav-menu-2', 'Navigation col 2');
	register_nav_menu('nav-menu-3', 'Navigation col 3');
	register_nav_menu('nav-menu-4', 'Navigation col 4');
}

function getYoutubeVideoId($url) {
    $pattern = '/(?:youtube(?:-nocookie)?\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
    preg_match($pattern, $url, $matches);
    return isset($matches[1]) ? $matches[1] : false;
}

function get_user_role($user_id) {
    global $wp_roles;
    $roles = array();
    $user = new WP_User( $user_id );
    if ( !empty( $user->roles ) && is_array( $user->roles ) ) {
    foreach ( $user->roles as $role )
        $roles[] .= translate_user_role($wp_roles->roles[$role]['name']);
    }
    return implode(', ',$roles);
}

function get_current_user_role() {
    global $wp_roles;
    $current_user = wp_get_current_user();
    $roles = $current_user->roles;
    $role = array_shift($roles);
    return $wp_roles->role_names[$role];
}

function encrypt_decrypt($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'xxxxxxxxxxxxxxxxxxxxxxxx';
    $secret_iv = 'xxxxxxxxxxxxxxxxxxxxxxxxx';
    // hash
    $key = hash('sha256', $secret_key);    
    // iv - encrypt method AES-256-CBC expects 16 bytes 
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}




// -------------------------------------- API
function save_buy_home_data_callback( $request ) {
    $data = $request->get_json_params();

    $buyHomeSum = $data['buyHomeSum'];
    $buyHomeDeposit = $data['buyHomeDeposit'];
    $buyHomeStage = $data['buyHomeStage'];
    $buyHomeFirstTime = $data['buyHomeFirstTime'];
    $buyHomeUsing = $data['buyHomeUsing'];
    $buyHomeLookingFor = $data['buyHomeLookingFor'];
    $buyHomeSelfDescribing = $data['buyHomeSelfDescribing'];
    $buyHomeStatus = $data['buyHomeStatus'];
    $buyHomeIncome = $data['buyHomeIncome'];
    $buyHomeFirstName = $data['buyHomeFirstName'];
    $buyHomeLastName = $data['buyHomeLastName'];
    $buyHomePhone = $data['buyHomePhone'];
    $buyHomeEmail = $data['buyHomeEmail'];

    global $wpdb;
    $table_name = 'buy_home_data';

    $wpdb->insert(
        $table_name,
        array(
            'buyHomeSum' => $buyHomeSum,
            'buyHomeDeposit' => $buyHomeDeposit,
            'buyHomeStage' => $buyHomeStage,
            'buyHomeFirstTime' => $buyHomeFirstTime,
            'buyHomeUsing' => $buyHomeUsing,
            'buyHomeLookingFor' => json_encode($buyHomeLookingFor),
            'buyHomeSelfDescribing' => $buyHomeSelfDescribing,
            'buyHomeStatus' => $buyHomeStatus,
            'buyHomeIncome' => $buyHomeIncome,
            'buyHomeFirstName' => $buyHomeFirstName,
            'buyHomeLastName' => $buyHomeLastName,
            'buyHomePhone' => $buyHomePhone,
            'buyHomeEmail' => $buyHomeEmail,
        )
    );

    $subject = 'New data from Buy Home';

    $formatted_data = "
        Buy Home Sum: $buyHomeSum
        Buy Home Deposit: $buyHomeDeposit
        Buy Home Stage: $buyHomeStage
        Buy Home First Time: " . ($buyHomeFirstTime ? 'Yes' : 'No') . "
        Buy Home Using: $buyHomeUsing
        Buy Home Looking For: " . implode(', ', $buyHomeLookingFor) . "
        Buy Home Self Describing: $buyHomeSelfDescribing
        Buy Home Status: $buyHomeStatus
        Buy Home Income: $buyHomeIncome
        Buy Home First Name: $buyHomeFirstName
        Buy Home Last Name: $buyHomeLastName
        Buy Home Phone: $buyHomePhone
        Buy Home Email: $buyHomeEmail
    ";

    $message = "New data from Buy Home form:" . PHP_EOL . $formatted_data;

    $to = '********';

    wp_mail( $to, $subject, $message );

    return rest_ensure_response('Data saved successfully and email sent');
}


function register_buy_home_data_endpoint() {
    register_rest_route(
        'api/v1',
        '/save_buy_home_data/',
        array(
            'methods'  => 'POST',
            'callback' => 'save_buy_home_data_callback',
        )
    );
}

// -------------------------------------- Woocommerce
add_action( 'wp_ajax_order', 'constructor_ajax' );
add_action( 'wp_ajax_nopriv_order', 'constructor_ajax' );
// первый хук для авторизованных, второй для не авторизованных пользователей
 
function constructor_ajax() {
    if ( isset( $_POST['color'] ) ) {
        $product_id = intval( $_POST['product_id'] );
        $title = sanitize_text_field( get_the_title( $product_id ) );
        $color = sanitize_text_field( $_POST['color'] );
        $case = sanitize_text_field( $_POST['bezal'] );
        $bracelet = sanitize_text_field( $_POST['bracelet'] );
        $extra_bracelet = sanitize_text_field( $_POST['extra_bracelet'] );
        $needles = sanitize_text_field( $_POST['needles'] );

        // Additional validation if needed

        $cart_item_data = array(
            'custom_data' => array(
                'color' => $color,
                'case' => $case,
                'bracelet' => $bracelet,
                'extra_bracelet' => $extra_bracelet,
                'needles' => $needles,
            ),
        );

        $cart = WC()->cart;
        $cart_item_key = $cart->add_to_cart( $product_id, 1, 0, array(), $cart_item_data );

        if ( $cart_item_key ) {
            $cart_url = wc_get_cart_url();
            $response = array(
                'success' => true,
                'product_id' => $product_id,
                'title' => $title,
                'color' => $color,
                'case' => $case,
                'bracelet' => $bracelet,
                'extra_bracelet' => $extra_bracelet,
                'needles' => $needles,
                'cart_url' => $cart_url,
            );
        } else {
            $response = array(
                'success' => false,
                'message' => 'Error: Unable to add item to cart.',
            );
        }

        echo json_encode( $response );
    }

    die;
}




/**
 * Добавляем поле на страницу оформления заказа
 */
add_action( 'woocommerce_after_order_notes', 'my_custom_checkout_field' );
function my_custom_checkout_field( $checkout ) {
    global $woocommerce;
    $items = $woocommerce->cart->get_cart();

    echo '<div id="my_custom_checkout_field"><h2>' . __('Constructor details') . '</h2>';

    foreach($items as $item => $values) { 
        $prod_id = $values['product_id'];
        $title = $values['data']->get_title();
        $color = $values['data']->get_attribute('pa_color');
        $case = $values['data']->get_attribute('pa_case');
        $bracelet = $values['data']->get_attribute('pa_bracelet');
        $extra_bracelet = $values['data']->get_attribute('pa_extra-bracelet');
        $needles = $values['data']->get_attribute('pa_needles');

        $output = "Product id: $prod_id, \nName: $title, \nColor: $color, \nCase: $case, \nMain bracelet: $bracelet, \nExtra bracelet: $extra_bracelet, \nNeedles: $needles";

        woocommerce_form_field( 'construct_product_' . $prod_id, array(
            'type'          => 'textarea',
            'class'         => array('input-constructor-details form-row-wide'),
            'label'         => __('Constructor details for') . ' ' . $title,
            'placeholder'   => __('Enter constructor details'),
            'disabled'      => 'disabled',
            'default'       => $output,
            'custom_attributes' => array(
                'style' => 'pointer-events:none;height: 200px;',
            ),
        ), $checkout->get_value( 'construct_product_' . $prod_id ));
    } 

    echo '</div>';
}

/**
 * Выполнение формы заказа
 */
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');
function my_custom_checkout_field_process() {
    // Проверяем, заполнено ли поле, если же нет, добавляем ошибку.
    if ( ! $_POST['construct_product'] )
        wc_add_notice( __( 'Пожалуйста, введите требуемый текст в поле.' ), 'error' );
}

/**
 * Обновляем метаданные заказа со значением поля
 */
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );
function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['construct_product'] ) ) {
        update_post_meta( $order_id, 'custom_watches', sanitize_text_field( $_POST['construct_product'] ) );
    }
}

/**
 * Выводим значение поля на странице редактирования заказа
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );
function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<h3>'.__('Custom watches details').':</h3> <p>' . get_post_meta( $order->id, 'custom_watches', true ) . '</p>';
}

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
