<div>
    <div>
        <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Order Delete</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyOrder">
                    <div class="modal-body">
                        <h6>Are you sure you want to delete this data?</h6>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes. Delete</button>
                      </div>
                </form>
              </div>
            </div>
          </div>


        <div class="row">
            <div class="col-md-12">

                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Order
                            <a href="{{ url('admin/order/create') }}" class="btn btn-primary float-end">Add Order</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Bill No.</th>
                                    <th>Product ID</th>
                                    <th>Gross Amount</th>
                                    <th>Service Charge</th>
                                    <th>VAT Charge</th>
                                    <th>Net Amount</th>
                                    <th>Discount</th>
                                    <th>Post Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->bill_no }}</td>
                                        <td>{{ $order->product_id }}</td>
                                        <td>{{ $order->gross_amount }}</td>
                                        <td>{{ $order->service_charge }}</td>
                                        <td>{{ $order->vat_charge}}</td>
                                        <td>{{ $order->net_amount }}</td>
                                        <td>{{ $order->discount }}</td>
                                        <td>{{ $order->post_status }}</td>
                                        <td>
                                            <a href="{{ url('admin/order/'.$order->id.'/edit') }}" class="btn btn-success">Edit</a>
                                            <a href="#" wire:click="deleteOrder({{ $order->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')

    <script>
        window.addEventListener('close-modal', event=> {

            $('#deleteModal').modal('hide');
        });
    </script>

    @endpush
</div>
