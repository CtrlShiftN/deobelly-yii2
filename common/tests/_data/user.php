<?php

return [
    [
        'username' => "Admin",
        'password_hash' => hash('md5','Iamadmin@1234'),
        'email' => 'admin.deobelly@gmail.com',
        'verified_at' => null,
        'status' => 1,
        'role' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ],
    [
        'username' => "Customer",
        'password_hash' => hash('md5','Iamrobot@1234'),
        'email' => 'customer.deobelly@gmail.com',
        'verified_at' => null,
        'status' => 1,
        'role' => 0,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ],
    [
        'username' => "Sale",
        'password_hash' => hash('md5','Iamsale@1234'),
        'email' => 'sale.deobelly@gmail.com',
        'verified_at' => null,
        'status' => 1,
        'role' => 2,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ],

];
