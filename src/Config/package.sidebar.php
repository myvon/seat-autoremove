<?php

return [
    'autoremove' => [
        'name'          => 'autoremove',
        'label'         => 'autoremove::menu.autoremove',
        'plural'        => true,
        'icon'          => 'fa-file',
        'route_segment' => 'rules',
        'permission'    => 'global.superuser',
        'entries'       => [
            [
                'name'  => 'autoremove',
                'label' => 'autoremove::menu.configure',
                'icon'  => 'fa-file',
                'route' => 'autoremove.show',
                'permission'    => 'global.superuser',
            ],
        ],
    ],
];