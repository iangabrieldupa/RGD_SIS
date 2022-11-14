<?php

namespace App\Http\Livewire\Admin\Unit;

use App\Models\Unit;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $unit_id;

    public function deleteUnit($unit_id)
    {
        $this->unit_id = $unit_id;
    }

    public function destroyUnit()
    {
        $unit = Unit::find($this->unit_id);

        $unit->delete();
        session()->flash('message', 'Unit Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $units = Unit::orderBy('id', 'ASC')->paginate(5);
        return view('livewire.admin.unit.index', ['units' => $units]);
    }
}
