<?php
return [
    'title' => 'Epizod',
    'single' => 'Epizod',
    'model' => 'App\Epizod',
    /**
     * The display columns
     */
    'columns' => [
        'id' => [
            'title' => '#'
        ],
        'name' => [
            'title' => 'Epizode Name'
        ],
        'number' => [
            'type' => 'text',
            'title' => 'Epizod Number'
        ],
        'description' => [
            'title' => 'Description'
        ],
        'date_start' => [
            'title' => 'Date Start'
        ],
        'images' => [
            'title' => 'Images',
            'type' => 'image',
            'output' => '<img src="/uploads/epizodes/icon/(:value)" height="100" />',
        ],
        'directed' => [
            'title' => 'Directer'
        ],
        'producer' => [
            'title' => 'Producer'
        ],
        'running_time' => [
            'title' => 'Running Time'
        ],
        'season_id' => [
            'title' => 'Season',
            'relationship' => 'season',
            'select' => '(:table).number',
        ],
        'serial_id' => [
            'title' => 'Season',
            'relationship' => 'serial',
            'select' => '(:table).name',
        ],
    ],
    /**
     * The editable fields
     */
    'edit_fields' => [
        'season' => [
            'type' => 'relationship',
            'title' => 'Season',
            'name_field' => 'number',
        ],
        'name' => [
            'type' => 'text',
            'title' => 'Epizod Name'
        ],
        'number' => [
            'type' => 'text',
            'title' => 'Epizod Number'
        ],
        'date_start' => [
            'type' => 'date',
            'title' => 'Date Start'
        ],
        'images' => array(
            'title' => 'Image (1200 x 1314)',
            'type' => 'image',
            'naming' => 'random',
            'location' => public_path() . '/uploads/epizodes/originals/',
            'size_limit' => 2,
            'sizes' => array(
                array(1200, 1314, 'crop', public_path() . '/uploads/epizodes/resize/', 100),
                array(150, 145, 'landscape', public_path() . '/uploads/epizodes/icon/', 100),
            )
        ),
        'directed' => [
            'type' => 'text',
            'title' => 'Directer'
        ],
        'producer' => [
            'type' => 'text',
            'title' => 'Producer'
        ],
        'running_time' => [
            'type' => 'time',
            'title' => 'Running Time'
        ],
        'description' => [
            'type' => 'textarea',
            'title' => 'Description'
        ],
    ],
    /**
     * The filter fields
     *
     * @type array
     */
    'filters' => [
        'id',
        'date_start' => [
            'title' => 'Start data',
        ],
        'name' => [
            'title' => 'Epizod Name',
        ],
        'number' => [
            'title' => 'Epizod Number',
        ],
        'season_id' => [
            'title' => 'Season id',
        ],
    ],

];