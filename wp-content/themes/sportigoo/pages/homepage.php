<?php /* Template Name: Homepage */
require_once dirname(__DIR__) . "/inc/vendors/Mobile_Detect.php";
$detect = new Mobile_Detect;
//  if ( !$detect->isTablet() && !$detect->isMobile()  ) {}

get_header();

while ( have_posts() ) {
    the_post();

    echo '<div class="content homepage">';

        // Send server media queries utility
        set_query_var('detect', $detect);

        get_template_part('pages/homepage/header');
        get_template_part('pages/homepage/search'); // Buttons
        get_template_part('pages/homepage/categories-what');
        get_template_part('pages/homepage/blue-section');
        get_template_part('pages/homepage/activities'); // Netflix style
        get_template_part('pages/homepage/chiffres'); // key number
        get_template_part('pages/homepage/categories-who');
        // get_template_part('pages/homepage/xxxx'); // googles rates
        // get_template_part('pages/homepage/xxxx'); // Blog
        // get_template_part('pages/homepage/xxxx'); // Feverup CTA

    echo '</div>';

} // End of the loop.

get_footer();
