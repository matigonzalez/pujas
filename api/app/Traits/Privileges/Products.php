<?php

namespace App\Traits\Privileges;

use App\Product;

Trait Products {

    /**
     * Create a record for a new product.
     *
     * @return App\Product
     */
    protected function createProduct(){
        return Product::create([
            'name' => $this->request->input('name'),
            'image' => $this->request->input('image')
        ]);
    }

    /**
     * Logically deletes a product.
     *
     * @return void
     */
    protected function destroyProduct(){    
        Product::destroy($this->request->input('id'));
    }

    /**
     * Update product attributes.
     *
     * @return void
     */
    protected function updateProduct(){
        Product::edit($this->request->input('id'), [
            "name" => $this->request->input('name'),
            "image" => $this->request->input('image'),
            "on_sale" => $this->request->input('on_sale')
        ]);
    }

    /**
     * Save product attributes.
     *
     * @return void
     */
    protected function uploadImage(){ 
        if ($this->request->file->getClientMimeType() !== "application/octet-stream"){
            $this->request->file->move(public_path('images/products'), 
                'product_'.date('Y_m_d').'_'.time().'.'.$this->request->file->getClientOriginalExtension()
            );  
        }
    }

    /**
     * List all products.
     *
     * @return App\Product
     * 
     */
    protected function getAllProducts(){
        return Product::get();
    }


}

