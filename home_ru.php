<?php
/*
 * Template Name: Home Page RU
 */

$templateurl = get_bloginfo('template_url');
get_header(); ?>



<?php if(reef_mobile_detect()){

    get_template_part('mob_ru');

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
	                <?php
		                wp_nav_menu( array(
			                'container'      => '',
			                'menu_class'     => 'menu lang-menu',
			                'menu_id'        => 'lang-menu',
			                'theme_location' => 'langs',
		                ) );
	                ?>
                    <div class="reserve menu menu-btn trigger"><span>RESERVE</span></div>

                    <div class="soc-bar menu">
                        <ul class="soc-icons">
                            <li><a href="https://www.facebook.com/reef.sea.food.community/"><i class="icon-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/reef_sea_food_community/"><i class="icon-instagram"></i></a></li>
                        </ul>
                    </div>
                </nav>

                <div class="menu-wrapper">
                    <nav class="menu ">
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
                    <h1>О ресторане</h1>
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
            </div>
            <div class="col right">
                <div class="dotted-left-border">
                    <div class="col-content">
                        <div class="row">
                            <div class="col">
                                <p>Добро пожаловать в REEF sea.food.community — первый в Украине ресторан настоящего современного рыбного искусства. Общую атмосферу заведения создают детали — открытая кухня, RAW-бар со свежей рыбой, тщательно подобранная винная карта. Концепция REEF sea.food.community не предусматривает заморозки рыбы — поставки морепродуктов будут производиться раз в неделю с южного и северного побережья Атлантики.</p>
                            </div>
                            <div class="col">
                                <p>А роскошное меню, разработанное шеф-поваром Александром Yourz совместно с мишленовским бренд-шефом Nicola Batavia, не оставит равнодушными даже самых прихотливых гурманов. Мы дарим вам возможность наслаждаться рыбными блюдами наивысшего качества и морепродуктами из разных уголков мира. REEF. Лучший рыбный ресторан Украины. Лучший по впечатлениям. Лучший по еде.</p>
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
                        <p>Сердце нашего ресторана – это его кухня – место, где лучшие ингредиенты золотыми руками шеф-повара превращаются в изысканные блюда.</p>
                        <p>Кухней в REEF sea.food.community руководит молодой и талантливый Alexander Yourz. Cвою профессиональную карьеру начал в 19 лет и считает, что главное для шеф-повара – талант, мастерство, опыт и вдохновение.</p>
                    </div>
                    <div class="line-col text-col">
                        <p>Меню REEF sea.food.community Alexander разрабатывал совместно с мишленовским бренд-шефом Nicola Batavia. В нем вы встретите идеальные сочетания из разных видов рыбы и морепродуктов и откроете для себя ни с чем не сравнимые гастрономические комбинации.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="gallery" class="box interior">
    <div id="tab-slider" class="tab-slider">

        <div class="slider-caption">
            <div class="slide-title active-slider">Интерьер</div>
            <div class="slide-title">Блюда</div>
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
        <h1>События</h1>
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
                                <a href="<?php  ?>" class="more-news trigger" data-post="<?php echo $post_id ?>"><span>Подробнее</span></a>
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
            <h1>Контакты</h1>
            <ul class="fenti">
                <li>
                    <figure>
                        <?php get_template_part('assets/svg/j1.svg'); ?>
                    </figure>
                </li>
                <li>
                    <figure class="spin-svg">
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
                <p>Киев ул. Шота Руставели, 16А<br />
                    тел. 044 228 18 17<br />
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
                    <h3>Контакты</h3>
                    <p>Киев ул. Шота Руставели, 16А<br />
                        тел. 044 228 18 17<br />
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

<!--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam</p>-->
                    <footer class="clearfix">
<!--                        <div class="add-info">-->
<!--                            <ul>-->
<!--                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=--><?php //echo $news_content['post_link']; ?><!--" target="_blank">Share on Facebook</a></li>-->
<!--                                <li><a href="http://vk.com/share.php?url=--><?php //echo $news_content['post_link']; ?><!--" target="_blank">Поделиться ВКонтакте</a></li>-->
<!--                                <li></li>-->
<!--                            </ul>-->
<!--                        </div>-->
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