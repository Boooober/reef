<?php
/*
 * Template Name: Home Page EN
 */

get_header(); ?>



<?php if(reef_mobile_detect()){

	get_template_part('mob_en');

} else { ?>

<?php get_template_part('parts/preloader'); ?>

<div id="main-wrapper">

<div class="container">

<header>
    <div id="topline" class="topline">
        <div class="topline-nav">
            <div class="topline-nav_container clearfix">

	            <?php get_template_part('parts/logo'); ?>

                <nav class="nav-bar">
                    <!--<div class="menu">-->
                    <!--<button class="btn"></button>-->
                    <!--</div>-->
	                <?php
		                wp_nav_menu( array(
			                'container'      => '',
			                'menu_class'     => 'menu lang-menu',
			                'menu_id'        => 'lang-menu',
			                'theme_location' => 'langs',
		                ) );
	                ?>
                    <div id="reserve" class="menu menu-btn trigger"><?php get_template_part('assets/svg/reserve.svg'); ?></div>

                    <div class="soc-bar menu">
                        <ul class="soc-icons">
                            <li><a href="https://www.facebook.com/reef.sea.food.community/"><i class="icon-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/reef_sea_food_community/"><i class="icon-instagram"></i></a></li>
                        </ul>
                    </div>
                </nav>

                <div class="menu-wrapper">
                    <nav class="menu">
                        <?php
                        wp_nav_menu( array(
                            'container'      => '',
                            'menu_class'     => 'nav-menu',
                            'menu_id'        => '',
                            'theme_location' => 'cat',
                        ) );
                        ?>
                    </nav>
                </div>
            </div>
        </div>

        <figure class="topline-figure">
            <div id="video-wrapper" class="video-wrapper">
                <!--<video id="top-video" autoplay="autoplay" loop="loop" muted="muted" src="assets/video/reef25sec.mp4"></video>-->
                <div id="goWatch" class="go-watch trigger">
                    <div class="outer-border"><div class="inner-part"></div></div>
                </div>

            </div>
        </figure>
    </div>
</header>
<section id="about-us" class="box box-1">
    <div class="box-content box-content--thin">
        <div class="row">
            <div class="col left">
                <div class="brand-text">
                    <h1>CONCEPT</h1>
                    <ul class="fenti">
                        <li>
                            <figure>
                                <?php get_template_part('assets/svg/j1.svg'); ?>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <?php get_template_part('assets/svg/j2.svg'); ?>
                            </figure>
                        </li>
                        <li>
                            <figure  class="spin-svg">
                                <?php get_template_part('assets/svg/j3.svg'); ?>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <?php get_template_part('assets/svg/j4.svg'); ?>
                            </figure>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col right">
                <div class="dotted-left-border">
                    <div class="col-content">
                        <div class="row">
                            <div class="col">
                                <p>Welcome to the REEF sea food community! It is the first restaurant of the contemporary fish art in Ukraine. These components create the tone of the establishment: an open kitchen, a RAW-bar with fresh fish and well- chosen wine list. The REEF sea.food.community concept does not stipulate for freezing fish — delivery of seafood will be in order from the south and north Atlantic coasts once a week.</p>
                            </div>
                            <div class="col">
                                <p>And the luxurious menu which is elaborated by chef Alexander Yourz in cooperation with the Michelin's corporate chef Nicola Batavia will touch the feelings even of the most fastidious gourmet. We give you a possibility to enjoy the fish plates of the highest quality and seafood from across the world. The REEF. The best fish restaurant of Ukraine. The best by impressions. The best by food.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="menu" class="box box-2 full-background">
    <div class="box-content slider-wrapper">
        <h1>Menu</h1>
        <?php putRevSlider( 'MainSlider' ); ?>
    </div>
</section>

<section id="chef" class="box box-3">
    <div class="box-content">
        <h1>Chef</h1>
        <div class="line-row full-wrapper row">
            <div class="line-col image-col">
                <img src="<?php echo REEF_THEME_URL; ?>/assets/images/chief_reef.jpg" alt=""/><!--Chief photo-->
            </div>

            <div class="line-col text-wrapper">
                <div class="line-row">
                    <div class="line-col text-col">
                        <p>The heart of our restaurant is its kitchen; it is the place where the best ingredients are turning into the dainty dishes under the chief's gold hands.</p>
                        <p>The young and talented Alexander Yourz directs the REEF sea.food.community's kitchen. He started his professional career at the age of 19 and he reckons that the main things for chief are talent, skill, experience and inspiration.
                        </p>
                    </div>
                    <div class="line-col text-col">
                        <p>The REEF sea.food.community's menu is elaborated by Alexander in cooperation with the Michelin's corporate chef Nicola Batavia. In which you will find the ideal combinations of the different fish species and seafood and you will open incomparable gastronomic combinations.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="gallery" class="box interior">
<!--    --><?php //putRevSlider( 'InteriorSlider' ); ?>

    <div id="tab-slider" class="tab-slider">

        <div class="slider-caption">
            <div class="slide-title active-slider">Interior</div>
            <div class="slide-title">Dishes</div>
        </div>

        <div class="content-container">

            <div class="slide-content active-slider">
                <?php putRevSlider( 'InteriorSlider' ); ?>
            </div>
            <div class="slide-content">
                <?php putRevSlider( 'DishesSlider' ); ?>
            </div>

        </div>
    </div>
</section>

<section id="events" class="box box-4">
    <div class="box-content">
        <h1>Events</h1>
        <div class="row">

            <?php

            $args = array(
                'cat'               => 1,
                'posts_per_page'    => 3,
            );
            $newsPopUp = array();

            $query = new WP_Query($args);
            if ( $query->have_posts() ) :
                while( $query->have_posts() ) : $query->the_post();
                    $post_id = get_the_ID();
                    $img_id = get_post_thumbnail_id( $post_id );
                    $img_attr = wp_get_attachment_image_src( $img_id, 'small-image');
                    $img_url = $img_attr[0];
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);



                    if($img = get_field('head_image')){
                        $head_img_src = $img['sizes']['panoramic-image'];
                        $head_img_alt = $img['alt'];
                    }



                    //save post data for usage in popUp
                    $popUpContent = array(
                        'the_title' => get_the_title(),
                        'the_content' => get_the_content(),
                        'post_date' => get_the_date( 'j.n.Y', $post_id ),
                        'post_link' => get_permalink(),
                        'head-image' => array(
                            'url' => $head_img_src,
                            'alt' => $head_img_alt
                        ),
                        'post_fields' => 'custom fields'
                    );
                    $newsPopUp[$post_id] = $popUpContent;

                    ?>


                        <div class="col">
                            <figure class="col-img"><img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>"/></figure>
                            <div class="col-content">
                                <h2><?php the_title(); ?></h2>
                                <?php get_my_excerpt(30, $post_id, true); ?>
                                <a href="<?php  ?>" class="more-news trigger" data-post="<?php echo $post_id ?>"><span>More</span></a>
                            </div>
                        </div>


                    <?php
                    endwhile;
                endif;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>


<section id="contacts" class="box box-6">

    <?php get_template_part('parts/gmap'); ?>

	<div class="insta-box">
		<div class="insta-title">Instagram</div>
		<?php echo do_shortcode('[instagram-feed]'); ?>
	</div>

    <div class="contacts contacts-opened">
        <div class="brand-text">
            <h1>Contacts</h1>
            <ul class="fenti">
                <li>
                    <figure class="spin-svg">
                        <?php get_template_part('assets/svg/j1.svg'); ?>
                    </figure>
                </li>
                <li>
                    <figure >
                        <?php get_template_part('assets/svg/j2.svg'); ?>
                    </figure>
                </li>
                <li>
                    <figure>
                        <?php get_template_part('assets/svg/j3.svg'); ?>
                    </figure>
                </li>
                <li>
                    <figure>
                        <?php get_template_part('assets/svg/j4.svg'); ?>
                    </figure>
                </li>
            </ul>
        </div>
        <div class="dotted-left-border">
            <div class="contacts-info">
                <p>Kyiv, Shota Rustaveli St, 16a<br />
                    Phone 044 228 18 17<br />
                    hostess@reefkiev.com
                </p>
            </div>
        </div>
        <div class="contacts-info add-info clearfix">
            <div class="reserve footer-reserve menu-btn trigger"><span>RESERVE</span></div>
            <ul class="soc-icons">
                <li><a href="https://www.facebook.com/reef.sea.food.community/"><i class="icon-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/reef_sea_food_community/"><i class="icon-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</section>
</div>



<div id="reserve-popup" class="reserve-popup popup">
    <div class="popup-wrapper">
        <div class="popup-container">
            <div class="table popup-content">
                <div class="popup-close"></div>
                <div class="cell contacts">
                    <h3>Contacts</h3>
                    <p>Kyiv, Shota Rustaveli St, 16a<br />
                        Phone 044 228 18 17<br />
                        hostess@reefkiev.com
                    </p>
                    <ul class="soc-icons">
                        <li><a href="https://www.facebook.com/reef.sea.food.community/"><i class="icon-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/reef_sea_food_community/"><i class="icon-instagram"></i></a></li>
                    </ul>
                    <ul class="fenti">
                        <li>
                            <figure>
                                <?php get_template_part('assets/svg/j1.svg'); ?>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <?php get_template_part('assets/svg/j2.svg'); ?>
                            </figure>
                        </li>
                        <li>
                            <figure>
                                <?php get_template_part('assets/svg/j3.svg'); ?>
                            </figure>
                        </li>
                        <li>
                            <figure class="spin-svg">
                                <?php get_template_part('assets/svg/j4.svg'); ?>
                            </figure>
                        </li>
                    </ul>
                </div>
                <div class="cell form">
                    <?php get_template_part('parts/reserve-form'); ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php foreach ($newsPopUp as $news_id => $news_content){ ?>

    <div data-post="<?php echo $news_id; ?>" class="news-popup popup">
        <div class="popup-wrapper">
            <div class="popup-container">
                <section class="news-content popup-content">
                    <div class="popup-close trigger"></div>
                    <h2><?php echo $news_content['the_title']; ?></h2>
                    <figure>
                        <img src="<?php echo $news_content['head-image']['url'] ?>" alt="<?php echo $news_content['head-image']['alt']; ?>"/>
                    </figure>

                    <?php echo $news_content['the_content']; ?>

                    <footer class="clearfix">
                        <div class="date"><?php echo $news_content['post_date'] ?></div>
                    </footer>
                </section>
            </div>
        </div>
    </div>

<?php } ?>


<div id="equalizer" class="equalizer trigger not-loaded">
    <div class="equalizer-cell">
        <div class="equalizer-container">
            <span></span><span></span><span></span><span></span><span></span><span></span>
        </div>
    </div>
</div>

<div id="go-up" class="go-up"></div>

</div>

<audio id="music" autoplay="autoplay">
    <source src="<?php echo REEF_THEME_URL; ?>/assets/audio/Serge_Proshe_-_One_Time_5_Reasons_Remix_radio_edit.wav" type="audio/wav">
</audio>

<?php } ?>

<?php get_footer(); ?>