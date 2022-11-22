<?php

namespace App\Http\Livewire\Admin\Attribute;

use App\Models\Attribute;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $attribute_id;

    public function deleteAttribute($attribute_id)
    {
        $this->attribute_id = $attribute_id;
    }

    public function destroyAttribute()
    {
        $attribute = Attribute::find($this->attribute_id);

        $attribute->delete();
        session()->flash('message', 'Attribute Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $attributes = Attribute::orderBy('id', 'ASC')->paginate(5);
        return view('livewire.admin.attribute.index', ['attributes' => $attributes]);
    }
}
