<?php

return [
    "RegisterController" => [
        "registerForm" => [
            'name' => 'required|string|max:255',    
            'password' => 'required|string|min:4',
        ]
    ],
    "LoginController" => [
        "loginForm" => [
            'name' => 'required|string|max:255',    
            'password' => 'required|string|min:4',
        ]
    ],
    "AdminController" => [
        "updateUserPrivileges" => [
            'id' => 'required|integer',    
            'action' => 'required|string',    
            'value' => 'required|boolean',
        ],
        "destroyUser" => [
            'id' => 'required|integer'
        ],
        "createProduct" => [
            'name' => 'required|string|max:255',    
            'image' => 'required|string|url|max:255'
        ],
        "destroyProduct" => [
            'id' => 'required|integer'
        ],
        "uploadImage" => [
            'file' => 'required|file|image|dimensions:max_width=2000,max_height=1000'
        ],
        "updateProduct" => [
            'id' => 'required|integer',
            'name' => 'required|string|max:255',    
            'image' => 'required|string|url|max:255',
            'on_sale' => 'required|integer|max:2'
        ]
    ]
];
