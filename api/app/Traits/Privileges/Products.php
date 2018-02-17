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
        $product = Product::find($this->request->input('id'));
        $product->deleted = 1;
        $product->save();
    }

    /**
     * Update product attributes.
     *
     * @return void
     */
    protected function updateProduct(){
        $product = Product::find($this->request->input('id'));
        $product->name = $this->request->input('name');
        $product->image = $this->request->input('image');
        $product->on_sale = $this->request->input('on_sale');
        $product->save();
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
}

