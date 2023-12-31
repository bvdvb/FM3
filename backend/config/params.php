<?php
return [
    'bsDependencyEnabled' => false,
    'adminEmail' => 'admin@example.com',
    'bsVersion' => '5.x',
    'hail812/yii2-adminlte3' => [
        'pluginMap' => [
            'sweetalert2' => [
                'css' => 'sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
                'js' => 'sweetalert2/sweetalert2.min.js'
            ],
            'toastr' => [
                'css' => ['toastr/toastr.min.css'],
                'js' => ['toastr/toastr.min.js']
            ],
            'fullcalendar' => [
                'css' => ['fullcalendar/main.min.css'],
                'js' => ['fullcalendar/main.min.js']
            ],
        ]
    ]
];
