
# API Endpoints

## USERS
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

## ADMIN
### GET

`Route::get('auth/admin/products/get', 'Auth\AdminController@getAllProducts');`
 - Return all, even deleted or hidden products

`Route::get('auth/admin/users/get', 'Auth\AdminController@getAllUsers');`
 - Return all users

### POST

`Route::post('auth/admin/users/authorization', 'Auth\AdminController@updateUserPrivileges');`
 - Receives:
 > 'id' => 'integer',    
 > 'action' => 'string',    
 > 'value' => 'boolean'

`Route::post('auth/admin/users/delete', 'Auth\AdminController@destroyUser');`
 - Receives:
 > 'id' => 'integer'

`Route::post('auth/admin/bid/delete', 'Auth\AdminController@destroyBid');`
 - Receives:
 > 'id' => 'integer'

`Route::post('auth/admin/products/add', 'Auth\AdminController@createProduct');`
 - Receives:
 > 'name' => 'string',    
 > 'image' => 'string'

`Route::post('auth/admin/products/delete', 'Auth\AdminController@destroyProduct');`
 - Receives:
 > 'id' => 'integer'

`Route::post('auth/admin/media/upload', 'Auth\AdminController@uploadImage');`
 - Receives:
 > 'file' => 'image'

`Route::post('auth/admin/products/edit', 'Auth\AdminController@updateProduct');`
 - Receives:
 > 'id' => 'integer',
 > 'name' => 'string',    
 > 'image' => 'string',
 > 'on_sale' => 'integer'
