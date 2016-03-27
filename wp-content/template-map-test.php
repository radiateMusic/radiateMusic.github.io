<?php get_header(); ?>

	<main role="main" class="conceal">
		<!-- section -->
		<section>
            <div class="row">
                <div class="col-lg-12">
                    <div id="responsive-tab" class="responsive-tab m-top-25">
                        <div class="content">
                            <a href="#destination">
                                <table>
                                    <tr>
                                        <td><?= ffbh_Icon('icomoon57732-22') ?></td>
                                        <td>Destination<br />Information</td>
                                    </tr>
                                </table>
                            </a>
                        </div>
                        <div class="divider"><span></span></div>
                        <div class="content">
                            <a href="#species">
                                <table>
                                    <tr>
                                        <td><?= ffbh_Icon('ffbhsiteicons-18') ?></td>
                                        <td>Species<br />& Tactics</td>
                                    </tr>
                                </table>
                            </a>
                        </div>
                        <div class="divider"><span></span></div>
                        <div class="content">
                            <a href="#what-to-bring">
                                <table>
                                    <tr>
                                        <td><?= ffbh_Icon('ffbhsiteicons-19') ?></td>
                                        <td>What To<br />Bring</td>
                                    </tr>
                                </table>
                            </a>
                        </div>
                        <div class="divider"><span></span></div>
                        <div class="content">
                            <a href="#guides">
                                <table>
                                    <tr>
                                        <td><?= ffbh_Icon('ffbhsiteicons-20') ?></td>
                                        <td>Preferred<br />Guides</td>
                                    </tr>
                                </table>
                            </a>
                        </div>
                        <div class="divider"><span></span></div>
                        <div class="content">
                            <a href="#calendars">
                                <table>
                                    <tr>
                                        <td><?= ffbh_Icon('ffbhsiteicons-35') ?></td>
                                        <td>Fishing<br />Calendars</td>
                                    </tr>
                                </table>
                            </a>
                        </div>
                        <span class="stretch"></span>
                    </div>

                    <h1><?php the_title(); ?></h1>

                    <div class="row m-top-25">
                        <div class="col-md-8" style="margin-top: -25px;">
                            <a href="#destination" class="responsive-tab-sub m-top-25">
                                <table>
                                    <tr>
                                        <td><?= ffbh_Icon('icomoon57732-22') ?></td>
                                        <td>Destination Information</td>
                                    </tr>
                                </table>
                            </a>

                            <div id="destination" class="conceal main-text m-top-25 m-bottom-25">
                                <span style="display: block; width: 100%; height: 0;">&nbsp;</span> <!-- for spacing -->
                                <?php the_field( 'destination_information' ); ?>
                            </div>

                            <a href="#species" class="responsive-tab-sub">
                                <table>
                                    <tr>
                                        <td><?= ffbh_Icon('ffbhsiteicons-18') ?></td>
                                        <td>Species & Tactics</td>
                                    </tr>
                                </table>
                            </a>

                            <div id="species" class="conceal main-text m-top-25 m-bottom-25">
                                <?php
                                    if(is_array(get_field( 'species' )))
                                    {
                                        foreach(get_field( 'species' ) as $post)
                                        {
                                            // http://www.advancedcustomfields.com/resources/querying-relationship-fields/
                                            $meta = get_post_meta($post);
                                            $permalink = get_permalink($post);
                                            $title = get_the_title($post);

                                            ?>
	                                            <div class="row m-bottom-25">
		                                            <div class="col-md-3">
			                                            <img style="margin-right: 5px; margin-bottom: 5px;" src="<?= reset(wp_get_attachment_image_src( reset($meta["thumbnail"]), 'medium' )) ?>" />
		                                            </div>
		                                            <div class="col-md-9 m-top-15-xs-max">
			                                            <a href="<?= $permalink ?>" style="display: inline-block;">
				                                            <h3 class="text-uppercase"><?= $title ?></h3>
			                                            </a>
			                                            <div class="main-text m-top-15 m-bottom-15">
				                                            <?= wpautop(reset($meta["text"])) ?>
			                                            </div>
			                                            <a href="<?= $permalink ?>" class="alternate-link">MORE ON <?= $title ?> ></a>
		                                            </div>
	                                            </div>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <div class="row m-bottom-25">
                                                <div class="col-lg-12">&nbsp;</div>
                                            </div>
                                        <?php
                                    }
                                ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        
                            <a href="#what-to-bring" class="responsive-tab-sub">
                                <table>
                                    <tr>
                                        <td><?= ffbh_Icon('ffbhsiteicons-19') ?></td>
                                        <td>What To Bring</td>
                                    </tr>
                                </table>
                            </a>

                            <div id="what-to-bring" class="conceal main-text m-top-25 m-bottom-25">
                                <span style="display: block; width: 100%; height: 0;">&nbsp;</span> <!-- for spacing -->
                                <?php the_field( 'what_to_bring' ); ?>
                            </div>
                        
                            <a href="#guides" class="responsive-tab-sub">
                                <table>
                                    <tr>
                                        <td><?= ffbh_Icon('ffbhsiteicons-20') ?></td>
                                        <td>Preferred Guides</td>
                                    </tr>
                                </table>
                            </a>

                            <div id="guides" class="conceal main-text m-top-25 m-bottom-25">
                                <div class="m-bottom-25">
                                    <?php
                                        if(is_active_sidebar('guide-definition')){
                                            dynamic_sidebar('guide-definition');
                                        }
                                    ?>
                                </div>

                                <a class="i-link i-link-dark" href="/advertising">
                                    <?= ffbh_Icon('ffbhsiteicons-20') ?><span class="fix-middle">Get Your Business Added To The Guide List</span></a>

                                <div class="m-bottom-50"></div>

                                <?php
                                    if(is_array(get_field( 'guides' )))
                                    {
                                    
                                        foreach(get_field( 'guides' ) as $post)
                                        {
                                            // http://www.advancedcustomfields.com/resources/querying-relationship-fields/
                                            $meta = get_post_meta($post);
                                            $permalink = get_permalink($post);
                                            $title = get_the_title($post);

                                            include('_guide-item.php');
                                        }
                                    }
                                    else
                                    {
                                ?>
                                            <div class="row m-bottom-25">
                                                <div class="col-lg-12">&nbsp;</div>
                                            </div>
                                        <?php
                                    }
                                ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        
                            <a href="#lodges" class="responsive-tab-sub">
                                <table>
                                    <tr>
                                        <td><?= ffbh_Icon('ffbhsiteicons-35') ?></td>
                                        <td>Lodges</td>
                                    </tr>
                                </table>
                            </a>

                            <div id="lodges" class="conceal main-text m-top-25 m-bottom-25">
                                <div class="m-bottom-25">
                                    <?php
                                        if(is_active_sidebar('guide-definition')){
                                            dynamic_sidebar('guide-definition');
                                        }
                                    ?>
                                </div>

                                <a class="i-link i-link-dark" href="/advertising">
                                    <?= ffbh_Icon('ffbhsiteicons-20') ?><span class="fix-middle">Get Your Business Added To The Guide List</span></a>

                                <div class="m-bottom-50"></div>

                                <?php
                                    if(is_array(get_field( 'lodges' )))
                                    {
                                    
                                        foreach(get_field( 'lodges' ) as $post)
                                        {
                                            // http://www.advancedcustomfields.com/resources/querying-relationship-fields/
                                            $meta = get_post_meta($post);
                                            $permalink = get_permalink($post);
                                            $title = get_the_title($post);

                                            include('_lodge-item.php');
                                        }
                                    }
                                    else
                                    {
                                ?>
                                            <div class="row m-bottom-25">
                                                <div class="col-lg-12">&nbsp;</div>
                                            </div>
                                        <?php
                                    }
                                ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                        <div class="col-md-4 m-top-15-sm-max">
                            <?php
                            $default300 = '4';
                            $default320 = '2';
                            
                            $count300 = ffbh_GetAdByGroupSlugCount(get_field('ad_group_(300_x_250)') -> slug);
                            $count320 = ffbh_GetAdByGroupSlugCount(get_field('ad_group_(320_x_50)') -> slug);
                            
                            $first300 = $count300 > 0 ? (get_field('ad_group_(300_x_250)') -> term_id) . '&orderby=menu_order&order=asc' : $default300;
                            $second300 = $count300 > 1 ? (get_field('ad_group_(300_x_250)') -> term_id) . '&orderby=menu_order&order=asc' : $default300;
                            $first320 = $count320 > 0 ? (get_field('ad_group_(320_x_50)') -> term_id) . '&orderby=menu_order&order=desc' : $default320;
                            $second320 = $count320 > 1 ? (get_field('ad_group_(320_x_50)') -> term_id) . '&orderby=menu_order&order=desc' : $default320;
                            ?>

                            <div class="ad-mobile-wrapper">
                                <div class="ad ad-300 ad-show-sm ad-show-md ad-show-lg pull-right-md-max">
                                    <?php ffbh_ShowAd(dfads( 'groups=' . $first300 . '&limit=1' ), array("sm", "md", "lg")); ?>
                                </div>
                                <div class="ad ad-320 ad-show-xs">
                                    <?php ffbh_ShowAd(dfads( 'groups=' . $first320 . '&limit=1' ), array("XS")); ?>
                                </div>
                            </div>                     

                            <div class="clear"></div>

                            <div class="ad-mobile-wrapper m-top-15">
                                <div class="ad ad-300 ad-show-sm ad-show-md ad-show-lg pull-right-md-max">
                                    <?php ffbh_ShowAd(dfads( 'groups=' . $second300 . '&limit=1' ), array("sm", "md", "lg")); ?>
                                </div>
                                <div class="ad ad-320 ad-show-xs">
                                    <?php ffbh_ShowAd(dfads( 'groups=' . $second320 . '&limit=1' ), array("XS")); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

		</section>
		<!-- /section -->
	</main>
    <?php
    wp_enqueue_style('responsive-tab-css');
    wp_enqueue_script('responsive-tab-js');
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#responsive-tab").responsiveTab({
                subs: $(".responsive-tab-sub")
            });

            $("main").removeClass('conceal');

            return false;
        });
    </script>

<?php get_footer(); ?>
