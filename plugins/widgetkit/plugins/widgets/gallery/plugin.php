<?php

return [
    'name' => 'widget/gallery',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => [
        'name' => 'gallery',
        'label' => 'Gallery',
        'core' => true,
        'icon' => 'plugins/widgets/gallery/widget.svg',
        'view' => 'plugins/widgets/gallery/views/widget.php',
        'item' => ['title', 'content', 'media'],
        'fields' => [
            [
                'type' => 'editor',
                'name' => 'lightbox_content',
                'label' => 'Lightbox Content',
            ],
        ],
        'settings' => [
            'grid' => 'default',
            'parallax' => false,
            'parallax_translate' => '',
            'gutter' => 'default',
            'filter' => 'none',
            'filter_tags' => [],
            'filter_align' => 'left',
            'filter_all' => true,
            'columns' => '1',
            'columns_small' => '0',
            'columns_medium' => '0',
            'columns_large' => '0',
            'columns_xlarge' => '0',
            'animation' => 'none',

            'image_width' => 'auto',
            'image_height' => 'auto',
            'media_border' => 'none',
            'overlay' => 'default',
            'panel' => 'blank',
            'overlay_center' => 'icon',
            'overlay_background' => 'hover',
            'overlay_image' => false,
            'hover_overlay' => true,
            'overlay_animation' => 'fade',
            'image_animation' => 'scale-up',

            'title' => true,
            'content' => true,
            'title_size' => 'h3',
            'title_element' => 'h3',
            'link' => false,
            'link_style' => 'button',
            'link_icon' => 'share',
            'link_text' => 'View',

            'lightbox' => 'default',
            'lightbox_caption' => 'title',
            'lightbox_nav_width' => '70',
            'lightbox_nav_height' => '70',
            'lightbox_nav_contrast' => true,
            'lightbox_title_size' => 'h3',
            'lightbox_title_element' => 'h3',
            'lightbox_content_size' => '',
            'lightbox_content_width' => '',
            'lightbox_width' => 'auto',
            'lightbox_height' => 'auto',
            'lightbox_alt' => false,

            'lightbox_link' => false,
            'lightbox_style' => 'button',
            'lightbox_icon' => 'search',
            'lightbox_text' => 'Details',

            'link_target' => false,
            'class' => '',
        ],
    ],

    'events' => [
        'init.admin' => function ($event, $app) {
            $app['angular']->addTemplate(
                'gallery.edit',
                'plugins/widgets/gallery/views/edit.php',
                true
            );
        },
    ],
];
