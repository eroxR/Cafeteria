<?php

namespace App\Http\Livewire\Category;

use App\Models\category;
use Livewire\WithPagination;
use Livewire\Component;

class Showcategory extends Component
{

    use WithPagination;

    public $category;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 10;

    public $open_edit = false;

    protected $rules = [
        'category.category_name' => 'required',
    ];

    protected $listeners = ['render', 'delete'];

    public function render()
    {
        $categories = category::select('id', 'category_name')
        ->orderBy($this->sort,$this->direction)->paginate($this->cant);
        
        return view('livewire.category.showcategory', compact('categories'));
    }

    public function order($sort){

        if ($this->sort == $sort) {

                if ($this->direction == 'desc') {
                    $this->direction = 'asc';
                } else {
                    $this->direction = 'desc';
                }
        } else {
            $this->sort = $sort;
            $this->direction = 'desc';
        }
        
    }


    public function edit(category $category){
        $this->category = $category;
        $this->open_edit = true;
    }

    public function update(){
        $this->validate();

        $this->category->save();

        $this->reset([
            'open_edit'
        ]);

        $this->emit('alert_edit','la información de la categoria se actualizo satisfactoriamente');
    }

    public function delete( category $category){
        $category->delete();
    }

}
