<?php
/**
 * @param array $args - override the module with custom content (ie: page builder or some other special content)
 * @param bool $use_page_content - pull in defaults from the page ACF fields
 * @param string $get_field_type - either get_field or get_sub_field depending on if this is coming from page builder or not
 * @param string $field_location - either an ID of the page or 'option' if it is an archive page
 * @param bool $prefix - prepended to the get_field for things like archive site options
 * @return bool
 * Usage on page template / $page_id = get_the_ID(); / e11_module_name(array(), true, 'get_field', $page_id);
 */
function e11_news($args = array(), $use_page_content = false, $get_field_type = 'get_field', $field_location = '', $prefix = false)
{

    if (empty($args) && !$use_page_content):
        return false;
    endif;

    if ($use_page_content):
        $defaults = array(
            'title'         => $get_field_type($prefix . 'news_title', $field_location),
            'news'          => $get_field_type($prefix . 'news_news', $field_location),
            'link'          => $get_field_type($prefix . 'news_link', $field_location),
            'module_id'     => $get_field_type( $prefix . 'news_module_id', $field_location),
            'number_of_post_to_display'     => $get_field_type( $prefix . 'news_number_of_post_to_display', $field_location),
        );
    else:
        $defaults = array(
            'title'        => false,
            'link'       => false,
            'news'         => array(),
            'module_id'    => false,
            'number_of_post_to_display'    => false,
        );
    endif;

    $data = array_merge($defaults, $args);

    //if (!empty($data['news'])):
        include 'tpl/news.tpl.php';
    //endif;

    return true;
}
