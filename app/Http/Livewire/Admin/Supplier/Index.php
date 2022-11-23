<?php

namespace App\Http\Livewire\Admin\Supplier;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $supplier_id;

    public function deleteSupplier($supplier_id)
    {
        $this->supplier_id = $supplier_id;
    }

    public function destroySupplier()
    {
        $supplier = Supplier::find($this->supplier_id);

        $supplier->delete();
        session()->flash('message', 'Supplier Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {
        $suppliers = Supplier::orderBy('id', 'ASC')->paginate(5);
        return view('livewire.admin.supplier.index', ['suppliers' => $suppliers]);
    }
}
