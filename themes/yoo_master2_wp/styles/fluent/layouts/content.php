<?php
/**
* @package   Warp Theme Framework
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

global $wp_query;

$queried_object = $wp_query->get_queried_object();

// output content from header/footer mode
if ($this->has('content')) {
    return $this->output('content');
}

$content = '';

if (is_home()) {
    $content = 'index';
} elseif (is_page() && is_page_template('page-notitle.php')) {
$content = 'page-notitle';
} elseif (is_page() && is_page_template('page-career.php')) {
$content = 'page-career';
} elseif (is_page() && is_page_template('page-sitemap.php')) {
$content = 'page-sitemap';
} elseif (is_page()) {
$content = 'page';
} elseif (is_attachment()) {
    $content = 'attachment';
} elseif (is_single() && in_category(44)) {
    $content = 'single-testimonials';
} elseif (is_single()) {

    $content = 'single';

    if (is_object($queried_object) && $this["path"]->path("layouts:{$queried_object->post_type}.php")) {
        $content = $queried_object->post_type;
    }

} elseif (is_search()) {
    $content = 'search';
} elseif (is_archive() && is_author()) {
    $content = 'author';
} elseif (is_archive() && in_category(44)) {
    $content = 'archive-testimonials';
} elseif (is_archive()) {

    $content = 'archive';

    if (is_object($queried_object) && $this["path"]->path("layouts:{$queried_object->taxonomy}.php")) {
        $content = $queried_object->taxonomy;
    }

} elseif (is_404()) {
    $content = '404';
}

echo $this->render(apply_filters('warp_content', $content));
