<?php
return [
    'title' => 'Serial',
    'single' => 'Serial',
    'model' => 'App\Serial',
    /**
     * The display columns
     */
    'columns' => [
        'id' => [
            'title' => '#'
        ],
        'user_id' => [
            'title' => 'User_id'
        ],
        'name' => [
            'title' => 'Name'
        ],
        'country' => [
            'title' => 'Country'
        ],
        'production' => [
            'title' => 'Production'
        ],
        'producer' => [
            'title' => 'Producer'
        ],
        'actors' => [
            'title' => 'Actors'
        ],
        'description' => [
            'title' => 'Description'
        ],
        'images' => [
            'title' => 'Images',
            'type' => 'image',
            'output' => '<img src="/uploads/serial/icon/(:value)" height="100" />',
        ],
        'released' => [
            'title' => 'Released'
        ],
        'slug' => [
            'title' => 'slug'
        ],
        'is_active' => [
            'title' => 'slug'
        ],

    ],
    /**
     * The editable fields
     */
    'edit_fields' => [
        'user' => [
            'type' => 'relationship',
            'title' => 'User',
            'name_field' => 'name',
        ],
        'name' => [
            'type' => 'text',
            'title' => 'Name'
        ],
        'country' => [
            'type' => 'text',
            'title' => 'Country'
        ],
        'production' => [
            'type' => 'text',
            'title' => 'Production company',
        ],
        'producer' => [
            'type' => 'text',
            'title' => 'Producer',
        ],
        'actors' => [
            'type' => 'text',
            'title' => 'Actors',
        ],
        'description' => [
            'type' => 'text',
            'title' => 'Description',
        ],
        'images' => array(
            'title' => 'Image (1200 x 1314)',
            'type' => 'image',
            'naming' => 'random',
            'location' => public_path() . '/uploads/serial/originals/',
            'size_limit' => 2,
            'sizes' => array(
                array(1200, 1314, 'crop', public_path() . '/uploads/serial/resize/', 100),
                array(150, 145, 'landscape', public_path() . '/uploads/serial/icon/', 100),
            )
        ),
        'released' => [
            'type' => 'date',
            'title' => 'Released',
        ],
        'is_active' => [
            'type' => 'bool',
            'title' => 'Is Active'
        ],
    ],
    /**
     * The filter fields
     *
     * @type array
     */
    'filters' => [
        'id',
        'name' => [
            'title' => 'Name',
        ],
        'country' => [
            'title' => 'Country',
        ],
    ],
];