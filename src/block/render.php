<?php
$attributes = $attributes;
$align_class = isset($attributes['align']) ? 'align' . $attributes['align'] : '';
$is_show_icon = $attributes['isShowIcon'];
$svg = isset($attributes['svg']) && $is_show_icon ? $attributes['svg'] : "&#92;";


if (!function_exists('get_breadcrumb_pages')) {
    function get_breadcrumb_pages()
    {
        $pages = [];
        $currentid = get_the_id();
        $has_custom_breadcrumbs = get_post_meta($currentid, 'use_custom_breadcrumbs', true);
        $custom_breadcrumbs = get_post_meta($currentid, 'custom_breadcrumbs', true);
        if (!$has_custom_breadcrumbs) {
            $pages[] = [
                'title' => 'Home',
                'url' => home_url("/"),
                'id' => 0,
                'tag' => 'a'
            ];
            $breadcrumbs = [];
            while ($currentid) {
                $page = get_post($currentid);
                $breadcrumbs[] = [
                    'title' => $page->post_title,
                    'url' => get_permalink($page->ID),
                    'id' => $page->ID,
                    'tag' => $currentid == get_the_id() ? 'span' : 'a'
                ];
                $currentid = $page->post_parent;
            }

            $pages =  array_merge($pages, array_reverse($breadcrumbs));
            return $pages;
        }

        if ($custom_breadcrumbs) {
            $pages[] = [
                'title' => 'Home',
                'url' => home_url("/"),
                'id' => 0,
                'tag' => 'a'
            ];
            foreach ($custom_breadcrumbs as $custom_breadcrumb) {
                $data = get_post($custom_breadcrumb['value']);
                $pages[] = [
                    'title' => $data->post_title,
                    'url' => get_permalink($data->ID),
                    'id' => $data->ID,
                    'tag' => $data->ID == get_the_id() ? 'span' : 'a'
                ];
            }

            return $pages;
        }

        return $pages;
    }
}

$pages = get_breadcrumb_pages();
?>

<div class="custom-breadcrumbs wp-block-custom-breadcrumb-breadcrumbs <?php echo esc_attr($align_class); ?>">
    <ul class="custom-breadcrumbs-list">
        <?php if (!empty($pages)) : foreach ($pages as $page) : ?>
                <li class="custom-breadcrumbs-item">
                    <?php
                    printf(
                        '<%1$s href="%2$s">%3$s</%1$s>',
                        $page['tag'],
                        esc_url($page['url']),
                        esc_html($page['title'])
                    );

                    if ($page['id'] != get_the_id()) {
                        printf(
                            '<%1$s class="custom-breadcrumbs-separator">%2$s</%1$s>',
                            'span',
                            $svg
                        );
                    }
                    ?>
                </li>
        <?php endforeach; endif; ?>
    </ul>
</div>