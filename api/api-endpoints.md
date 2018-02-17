
# API Endpoints
### GET
`Route::get('token');`
 - Return token string

`Route::get('auth/logout', 'Auth\LoginController@logout');`
 - Return null

`Route::get('auth/userinfo', 'Auth\LoginController@getUserInfo');`
 - Return username

`Route::get('bid/product/{id}', 'GuestController@getBids')->where('id', '[0-9]+');`
 - Return bids for a specific product

`Route::get('bid/user/{id}', 'GuestController@getBids')->where('id', '[0-9]+');`
 - Return bids for a specific user

`Route::get('auth/admin/get/users', 'Auth\AdminController@getAllUsers');`
 - Return all users

`Route::get('products', 'GuestController@getAllProducts');`
 - Return all products

### POST
`Route::post('auth/register', 'Auth\RegisterController@processRequest');`
 - Receives:
 > 'name' => 'string'   
 > 'password' => 'string'
 - Return validation errors

`Route::post('auth/login', 'Auth\LoginController@checkAuth');`
 - Receives:
 > 'name' => 'string' 
 > 'password' => 'string'
 - Return validation errors

`Route::post('bid/store', 'BidsController@newBid');`
 - Receives:
 > 'amount' => 'integer'    
 > 'product' => 'integer' 
 - Return validation errors

`Route::post('auth/admin', 'Auth\AdminController@admin');`
 - Receives:
 > 'action' => 'updateUserPrivileges|destroyUser|createProduct|destroyProduct|uploadImage|updateProduct', 
 - Return validation errors
##### action.*updateUserPrivileges*
 - Receives:
 > 'id' => 'integer',    
 > 'action' => 'string',    
 > 'value' => 'boolean'
##### action.*destroyUser*
 - Receives:
 > 'id' => 'integer',
 > 'action' => 'string' 
##### action.*destroyBid*
 - Receives:
 > 'id' => 'integer',
 > 'action' => 'string' 
##### action.*createProduct*
 - Receives:
 > 'name' => 'string',    
 > 'image' => 'string',
 > 'action' => 'string'
##### action.*destroyProduct*
 - Receives:
 > 'id' => 'integer',
 > 'action' => 'string'  
##### action.*uploadImage*
 - Receives:
 > 'file' => 'image',
 > 'action' => 'string'  
##### action.*updateProduct*
 - Receives:
 > 'id' => 'integer',
 > 'name' => 'string',    
 > 'image' => 'string',
 > 'on_sale' => 'integer',
 > 'action' => 'string'
