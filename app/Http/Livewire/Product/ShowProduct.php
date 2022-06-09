<?php

namespace App\Http\Livewire\Product;

use App\Models\category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\Component;

class ShowProduct extends Component
{

    use WithPagination;

    public $product;
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = 10;

    public $open_edit = false;

    protected $rules = [
        'product.product_name' => 'required',
        'product.reference' => 'required',
        'product.weight' => 'required',
        'product.price' => 'required',
        'product.category' => 'required'
    ];

    protected $listeners = ['render', 'delete'];

    public function mastock($id){
        $mastock = DB::select('select stock from products where id = ' . $id);
        $valor = $mastock[0]->stock;
        $stock = $valor + 1;

        DB::table('products')->where('id', $id)->update(['stock' => $stock]);
    }

    public function render()
    {
        $Products = Product::join('categories', 'Products.category', '=', 'categories.id')
                     ->select('Products.id', 'product_name', 'reference', 'price', 'weight', 'stock', 'creation_date', 'category_name')
                     ->orderBy($this->sort,$this->direction)->paginate($this->cant);

        $categories = category::all();                     

        return view('livewire.product.show-product', compact('Products', 'categories'));
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

    public function edit(Product $product){
        $this->product = $product;
        $this->open_edit = true;
    }

    public function update(){
        $this->validate();

        $this->product->save();

        $this->reset([
            'open_edit'
        ]);

        $this->emit('alert_edit','la información del producto se actualizo satisfactoriamente');
    }

    public function delete(Product $product){
        $product->delete();
    }
}
