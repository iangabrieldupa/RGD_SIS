<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $order_id;

    public function deleteOrder($order_id)
    {
        $this->order_id = $order_id;
    }

    public function destroyOrder()
    {
        $order = Order::find($this->order_id);

        $order->delete();
        session()->flash('message', 'Order Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $orders = Order::orderBy('id', 'ASC')->paginate(5);
        return view('livewire.admin.order.index', ['orders' => $orders]);
    }
}
