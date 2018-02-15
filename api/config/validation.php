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
        "updatePrivileges" => [
            'id' => 'required|integer',    
            'action' => 'required|string',    
            'value' => 'required|boolean',
        ]
    ]
];
