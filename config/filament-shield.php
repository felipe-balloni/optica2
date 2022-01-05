<?php
// config for BezhanSalleh/FilamentShield
return [

    'default_roles' => [
        'super_admin_role_name' => 'administrator',
        'filament_user' => [
            'role_name' => 'user',
            'enabled' => true
        ],
    ],

    'default_permission_prefixes' => [
        'view',
        'view_any',
        'create',
        'delete',
        'delete_any',
        'update',
    ],
];
