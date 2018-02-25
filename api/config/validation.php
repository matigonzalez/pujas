<?php

return [
    "RegisterController" => [
        "registerForm" => [
            'name' => 'required|string|max:255|unique:users',    
            'password' => 'required|string|min:4',
        ]
    ],
    "LoginController" => [
        "loginForm" => [
            'name' => 'required|string|max:255',    
            'password' => 'required|string',
        ]
    ],
    "AdminController" => [
        "updateUserPrivileges" => [
            'id' => 'required|integer|exists:users,id',      
            'value' => 'required|boolean',
            'action' => 'required|string'
        ],
        "destroyUser" => [
            'id' => 'required|integer|exists:users,id',
            'action' => 'required|string' 
        ],
        "destroyBid" => [
            'id' => 'required|integer|exists:bids,id',
            'action' => 'required|string' 
        ],
        "createProduct" => [
            'name' => 'required|string|max:255',    
            'image' => 'required|string|url|max:255',
            'action' => 'required|string'
        ],
        "destroyProduct" => [
            'id' => 'required|integer|exists:products,id',
            'action' => 'required|string'  
        ],
        "uploadImage" => [
            'file' => 'required|image|dimensions:max_width=2000,max_height=1000',
            'action' => 'required|string' 
        ],
        "updateProduct" => [
            'id' => 'required|integer|exists:products,id',
            'name' => 'required|string|max:255',    
            'image' => 'required|string|url|max:255',
            'on_sale' => 'required|integer|max:3',
            'action' => 'required|string'  
        ]
    ],
    "BidsController" => [
        "newBidForm" => [
            'amount' => 'required|integer',    
            'product' => 'required|integer|exists:products,id' 
        ]
    ]
];
