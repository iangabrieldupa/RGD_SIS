<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $product_id;

    public function deleteProduct($product_id)
    {
        $this->product_id = $product_id;
    }

    public function destroyProduct()
    {
        $product = Product::find($this->product_id);

        $product->delete();
        session()->flash('message', 'Product Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $products = Product::orderBy('id', 'ASC')->paginate(5);
        $brands = DB::table('product_brands')->get();
        $categories = DB::table('product_categories')->get();
        $units = DB::table('units')->get();
        return view('livewire.admin.product.index', compact('brands', 'categories', 'units'), ['products' => $products]);
    }
}
