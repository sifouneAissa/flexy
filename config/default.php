<?php
return [
    'permissions' => [
        'all' => [
            'view dashboard',
        ],
        'admin' => array_merge(
            crudPermissions('role'),
            crudPermissions('setting',['view']),
            crudPermissions('permission',['view']),
            crudPermissions('user'),
            crudPermissions('provider'),
            crudPermissions('level'),
            crudPermissions('bonus',['view']),
            crudPermissions('membership'),
            crudPermissions('setting general',['view','update'])
        ),
//        'publisher' => array_merge([
//        ]
//        )
    ],
    'roles' => [
        'admin' => [
            // give this roles to this emails
            'admin@demo.com'
        ],
//        'publisher' => [
//            'publisher@demo.com'
//        ]
    ],
    // Password = password
    'users' => [
        [
            'name' => 'admin admin',
            'email' => 'admin@demo.com',
//            'is_admin' => true,
            'password' => '$2y$10$Iw1Mcwy8K5GAKTNgulexQecjI7sN1FIhCVuPvFAP1vq8tTNFxDcTi'
        ],
//        [
//            'name' => 'publisher',
//            'email' => 'publisher@demo.com',
//            'is_admin' => true,
//            'password' => '$2y$10$Iw1Mcwy8K5GAKTNgulexQecjI7sN1FIhCVuPvFAP1vq8tTNFxDcTi'
//        ]
    ]
];
