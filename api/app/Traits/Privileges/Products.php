<?php

namespace App\Traits\Privileges;

use App\Product;

Trait Products {

    protected function createProduct(){
        return Product::create([
            'name' => $this->request->input('name'),
            'image' => $this->request->input('image')
        ]);
    }

    protected function destroyProduct(){
        $product = Product::find($this->request->input('id'));
        $product->deleted = 1;
        $product->save();
    }

    protected function updateProduct(){
        $product = Product::find($this->request->input('id'));
        $product->name = $this->request->input('name');
        $product->image = $this->request->input('image');
        $product->on_sale = $this->request->input('on_sale');
        $product->save();
    }

    protected function uploadImage(){   
        $this->request->file->move(public_path('products'), 
            'product_'.date('Y_m_d').'_'.time().'.'.$this->request->file->getClientOriginalExtension()
        );  
    }
}

