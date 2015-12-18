<?

add_action( 'wp_ajax_nopriv_send_email', 'send_email' );
add_action( 'wp_ajax_send_email', 'send_email' );

function send_email(){

    // Verify nonce
    if( !isset( $_POST['reef_nonce'] ) || !wp_verify_nonce( $_POST['reef_nonce'], 'reef_nonce' ) )
        die('Permission denied');

    $data = array();
    parse_str($_POST['data'], $data);

    $name = sanitize_text_field( $data['fname'] );
    $tel = sanitize_text_field( $data['fphone'] );
    $email = sanitize_email( $data['femail'] ) ;
    $count = sanitize_text_field( $data['fcount'] );

    $to = 'hostess@reefkiev.com';
    $subject = 'Резерв мест - ' . $count . ' шт';
    $subject = "=?utf-8?b?". base64_encode($subject) ."?=";
    $message = "\r\nЗаявка отправленна с сайта ".$_SERVER['HTTP_REFERER']."\r\nEmail: ".$email."\r\nИмя: ".$name."\r\nТелефон: ".$tel."\r\nКоличество персон: ".$count."\r\n";
    $headers = 'Content-type: text/plain; charset="utf-8"';
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Date: ". date('D, d M Y h(idea)(worry) O') ."\r\n";
    mail($to, $subject, $message, $headers);
    ?>

    <div class="reserve-msg-wrapper">
        <div class="reserve-msg-container">
            <div class="reserve-msg-content popup-content">
                <div class="msg">
                    <p>Спасибо, ваш запрос отправлен!</p>
                    <ul class="fenti">
                        <li><?php echo return_fenty(array('id' => 2)); ?></li>
                        <li><?php echo return_fenty(array('id' => 4)); ?></li>
                        <li><?php echo return_fenty(array('id' => 9)); ?></li>
                        <li><?php echo return_fenty(array('id' => 7)); ?></li>
                    </ul>
                </div>
                <figure>
                    <img src="<?php echo REEF_THEME_URL . 'assets/images/success_form_corr.jpg' ?>" alt=""/>
                </figure>
            </div>
        </div>
    </div>


    <?php
    exit();

}