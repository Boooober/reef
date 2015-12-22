<?php get_header(); ?>

<?php $templateurl = get_bloginfo('template_url'); ?>

<header>
    <div class="topline fixed-header">
        <div class="topline-wrapper nav-down clearfix">
            <?php
            wp_nav_menu( array(
                'container'      => '',
                'menu_class'     => 'lang-menu',
                'menu_id'        => 'lang-menu',
                'theme_location' => 'langs',
            ) );
            ?>
            <div class="menu-btn reserve">
                <svg height="100%" style="enable-background:new 0 0 32 32;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/>
                </svg>
            </div>

            <?php get_template_part('parts/logo'); ?>
        </div>


        <div class="topline-video">
            <?php putRevSlider( 'MobileSlider' ); ?>
        </div>

    </div>
</header>
<section id="about-us" class="box box-1">

    <div class="box-content">
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

        <div class="entry-content">
            <p>Добро пожаловать в REEF sea.food.community — первый в Украине ресторан настоящего современного рыбного искусства. Общую атмосферу заведения создают детали — открытая кухня, RAW-бар со свежей рыбой, тщательно подобранная винная карта. Концепция REEF sea.food.community не предусматривает заморозки рыбы — поставки морепродуктов будут производиться раз в неделю с южного и северного побережья Атлантики.</p>
            <p class="show-more-target">А роскошное меню, разработанное шеф-поваром Александром Yourz совместно с мишленовским бренд-шефом Nicola Batavia, не оставит равнодушными даже самых прихотливых гурманов. Мы дарим вам возможность наслаждаться рыбными блюдами наивысшего качества и морепродуктами из разных уголков мира. REEF. Лучший рыбный ресторан Украины. Лучший по впечатлениям. Лучший по еде.</p>
            <span class="load-more" data-lang="ru">Подробнее</span>
        </div>
    </div>
</section>


<section id="menu" class="box box-2">
    <div class="box-content">
        <h1>Меню</h1>
	    <?php

	    $args = array(
		    'post_type' => 'menu'
	    );
	    $i = 0;


	    $query = new WP_Query($args);
	    if ( $query->have_posts() ) :
		    while( $query->have_posts() ) : $query->the_post();
			   ?>


			    <div class="menu-tile<?php echo ($i === 0) ? ' opened-tile' : ''; ?>">
				    <h2><?php the_title(); ?></h2>
				    <div class="menu-content"><?php the_content(); ?></div>
			    </div>


		    <?php
		    $i++;
		    endwhile;
	    endif;
	    wp_reset_postdata();
	    ?>
	    <div id="show-tiles" class="show-tiles trigger">Показать больше</div>

    </div>
</section>

<section id="chef" class="box box-3">
    <div class="box-content">
        <h1>Chef</h1>
        <div class="entry-content">
            <p>Сердце нашего ресторана – это его кухня – место, где лучшие ингредиенты золотыми руками шеф-повара превращаются в изысканные блюда.</p>
            <p>Кухней в REEF sea.food.community руководит молодой и талантливый Alexander Yourz.</p>
            <p>Меню REEF sea.food.community Alexander разрабатывал совместно с мишленовским бренд-шефом Nicola Batavia. В нем вы встретите идеальные сочетания из разных видов рыбы и морепродуктов и откроете для себя ни с чем не сравнимые гастрономические комбинации.</p>
        </div>
        <figure>
            <img src="<?php echo $templateurl ?>/assets/images/chief_reef.jpg" alt=""/><!--Chief photo-->
        </figure>
    </div>
</section>

<section class="box box-4">
    <div class="box-content">
        <h1>События</h1>
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

	                ?>

                    <div class="line clearfix">
                        <figure class="col-img"><img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>"/></figure>
                        <div class="entry-content">
                            <h2><?php the_title(); ?></h2>
                            <div class="excerpt-content show-more-hide"><?php get_my_excerpt(30, $post_id, true); ?></div>
                            <div class="full-content show-more-target"><?php the_content(); ?></div>
                            <span class="load-more" data-lang="ru">Подробнее</span>
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
<section id="contacts" class="box box-5">

    <div class="contacts-tile contacts-opened">
        <!--<div id="contacts-toggle" class="icon-cancel contacts-toggle trigger">close</div>-->
        <div class="brand-text">
            <h1>Контакты</h1>
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
        <div class="contacts-info">
            <p>Киев ул. Шота Руставели, 16А<br />
                тел. 044 228 18 17<br />
                hostess@reefkiev.com
            </p>
            <div class="clearfix">
                <div class="reserve footer-reserve trigger"><span>RESERVE</span></div>
                <ul class="soc-icons">
                    <li><a href="https://www.facebook.com/reef.sea.food.community/"><i class="icon-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/reef_sea_food_community/"><i class="icon-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <?php get_template_part('parts/gmap'); ?>

</section>

<div id="reserve-popup" class="reserve-popup popup">
	<div class="popup-wrapper">
		<div class="popup-container">
			<div class="table popup-content">
                <div class="popup-close trigger"></div>
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
            <div class="reserve-success"></div>
		</div>
	</div>
</div>

<?php get_footer(); ?>

</body>
</html>