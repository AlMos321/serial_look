<?php
return [
    'title' => 'Season',
    'single' => 'Season',
    'model' => 'App\Season',
    /**
     * The display columns
     */
    'columns' => [
        'id' => [
            'title' => '#'
        ],
        'number' => [
            'title' => 'Number'
        ],
        'serial_id' => [
            'title' => 'Serial',
            'relationship' => 'serial',
            'select' => '(:table).name',
        ],
        'count_epizdes' => [
            'title' => 'Epizodes'
        ],
        'country' => [
            'title' => 'Country'
        ],
        'description' => [
            'title' => 'Description'
        ],
        'date_start' => [
            'title' => 'Date Start'
        ],
        'date_end' => [
            'title' => 'Date End'
        ],
    ],
    /**
     * The editable fields
     */
    'edit_fields' => [
        'serial' => [
            'type' => 'relationship',
            'title' => 'Serial',
            'name_field' => 'name',
        ],
        'number' => [
            'type' => 'text',
            'title' => 'Number of the season',
        ],
        'country' => [
            'type' => 'text',
            'title' => 'Country'
        ],
        'count_epizdes' => [
            'type' => 'text',
            'title' => 'Number of episodes',
        ],
        'date_start' => [
            'type' => 'date',
            'title' => 'Start date',
        ],
        'date_end' => [
            'type' => 'date',
            'title' => 'End Date',
        ],
        'description' => [
            'type' => 'textarea',
            'title' => 'Description',
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
    ],
];