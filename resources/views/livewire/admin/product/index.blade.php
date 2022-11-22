<div>
    <div>
        <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Product Delete</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyProduct">
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
                        <h4>Product
                            <a href="{{ url('admin/product/create') }}" class="btn btn-primary float-end">Add Product</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>SKU</th>
                                    <th>Product Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Product Image</th>
                                    <th>Product Description</th>
                                    <th>Product Brand</th>
                                    <th>Product Category</th>
                                    <th>Product Unit</th>
                                    <th>Vat Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->product_unit_price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->product_image }}</td>
                                        <td>{{ $product->product_description }}</td>
                                        <td>{{ $product->brands->brand_name}}</td>
                                        <td>{{ $product->categories->category_name }}</td>
                                        <td>{{ $product->units->unit_name }}</td>
                                        <td>{{ $product->vat_type }}</td>
                                        <td>
                                            <a href="{{ url('admin/product/'.$product->id.'/edit') }}" class="btn btn-success">Edit</a>
                                            <a href="#" wire:click="deleteProduct({{ $product->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $products->links() }}
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
