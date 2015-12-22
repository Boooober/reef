<?php
/*
 * Template Name: Home Page FR
 */

$templateurl = get_bloginfo('template_url');
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
                        <div id="reserve" class="menu menu-btn trigger"><span>RESERVE</span></div>

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
                                <figure class="spin-svg">
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
                                    <p>Bienvenue chez le REEF sea.food.community – 1er restaurant en Ukraine du véritable art moderne du poisson. L'atmosphère générale du restaurant offrent des particularités - cuisine ouverte, RAW-bar avec du poisson frais, soigneusement sélectionnés liste de vin. Concept de REEF sea.food.community ne prévoit pas de congélation de poisson- les livraisons de produits de mer seront produites une fois par semaine de la côte sud et nord de l'Atlantique.</p>
                                </div>
                                <div class="col">
                                    <p>Un somptueux menu conçu par le chef Alexandre Yourz avec le chef de la marque Michelin Nicola Batavia, impressionnera même les gourmets les plus exigeants. Nous vous donnons la chance de déguster des plats de fruits de mer de la plus haute qualité et les produits de mer du monde entier. REEF. Le meilleur restaurant de poisson en Ukraine. Le meilleur selon les impressions. Le meilleur pour la nourriture. Le meilleur selon les critiques gastronomiques.</p>
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
            <h1>Меню</h1>
            <?php putRevSlider( 'MainSlider' ); ?>
        </div>
    </section>

    <section id="chef" class="box box-3">
        <div class="box-content">
            <h1>Chef</h1>
            <div class="line-row full-wrapper row">
                <div class="line-col image-col">
                    <img src="<?php echo $templateurl ?>/assets/images/chief_reef.jpg" alt=""/><!--Chief photo-->
                </div>

                <div class="line-col text-wrapper">
                    <div class="line-row">
                        <div class="line-col text-col">
                            <p>Le cœur du restaurant – c’est sa cuisine - un endroit où grâce aux talents du chef cuisinier les meilleurs ingredients se transforment en de plats délicieux.</p>
                            <p>La cuisine dans le sea.food.community REEF est dirigée par un jeune et talentueux Alexandre Yourz. Il a commencé sa carrière professionnelle à 19 ans, et croit que la chose la plus importante pour le chef, c’est le talent, les compétences, l'expérience et l'inspiration.</p>
                        </div>
                        <div class="line-col text-col">
                            <p>Menu REEF sea.food.community Alexandre développait en collaboration avec le chef de la marque Michelin Nicola Batavia. Vous y trouverez la combinaison parfaite de différents types de poissons et de fruits de mer et découvrerez des combinaisons gastronomiques incomparables.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery" class="box interior">
<!--        --><?php //putRevSlider( 'InteriorSlider' ); ?>

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
            <h1>Nouvelles</h1>
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
                        <figure>
                            <?php get_template_part('assets/svg/j1.svg'); ?>
                        </figure>
                    </li>
                    <li>
                        <figure  class="spin-svg">
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
                    <p>Kiev. 16A, rue de Chota Roustavèli<br />
                        tél. 044 228 18 17<br />
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
                        <p>Kiev. 16A, rue de Chota Roustavèli<br />
                            tél. 044 228 18 17<br />
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
                                </figure class="spin-svg">
                            </li>
                            <li>
                                <figure class="spin-svg">
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
<!--                            <div class="add-info">-->
<!--                                <ul>-->
<!--                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=--><?php //echo $news_content['post_link']; ?><!--" target="_blank">Share on Facebook</a></li>-->
<!--                                    <li><a href="http://vk.com/share.php?url=--><?php //echo $news_content['post_link']; ?><!--" target="_blank">Поделиться ВКонтакте</a></li>-->
<!--                                </ul>-->
<!--                            </div>-->
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
        <source src="<?php echo $templateurl ?>/assets/audio/Serge_Proshe_-_One_Time_5_Reasons_Remix_radio_edit.wav" type="audio/wav">
    </audio>
<?php } ?>

<?php get_footer(); ?>