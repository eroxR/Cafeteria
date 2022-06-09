<?php

namespace App\Http\Livewire\Product;

use App\Models\category;
use App\Models\Product;
use Livewire\Component;
use Carbon\Carbon;
use Symfony\Contracts\Service\Attribute\Required;

class CreateProduct extends Component
{
    public $open=false;
    public $product_name, $reference, $price, $weight, $category, $creation_date;

    protected $rules = [
        'product_name' => 'required',
        'reference' => 'required',
        'price' => 'required',
        'weight' => 'required',
        'category' => 'required',
    ];

    public function store(){

        $this->validate();

        $now = Carbon::now();

        $this->creation_date = $now;

        $nameProduct = $this->product_name;

        Product::create([
            'product_name' => $this->product_name,
            'reference' => $this->reference,
            'price' => $this->price,
            'weight' => $this->weight,
            'category' => $this->category,
            'stock' => 1,
            'creation_date' => $this->creation_date,
            'user' => auth()->id()
        ]);

        $this->reset([
            'open',
            'product_name',
            'reference',
            'price',
            'weight',
            'category',
        ]);

        $this->emitTo('product.show-product','render');
        $this->emit('alert', ' se ha creado el Producto "' . $nameProduct .'" con exito');
    }


    public function render()
    {
        $categories = category::all();
        
        return view('livewire.product.create-product', compact('categories'));
    }
}
