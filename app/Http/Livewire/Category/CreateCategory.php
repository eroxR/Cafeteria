<?php

namespace App\Http\Livewire\Category;

use App\Models\category;
use Livewire\Component;

class CreateCategory extends Component
{

    public $open=false;
    public $category_name;

    protected $rules = [
        'category_name' => 'required'
    ];

    public function store(){

        $this->validate();

        $nameCategory = $this->category_name;

        category::create([
            'category_name' => $this->category_name,
        ]);

        $this->reset([
            'open',
            'category_name',
        ]);

        $this->emitTo('category.showcategory','render');
        $this->emit('alert', ' se ha creado la categoria "' . $nameCategory .'" con exito');
    }

    public function render()
    {
        return view('livewire.category.create-category');
    }
}
