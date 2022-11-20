<div>
    <div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body dashboard-tabs p-0">
                  <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="sales-tab" data-bs-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Appointments</a>
                    </li>
                  </ul>
                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-flex d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <div class="d-flex m-2 flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Services</small>
                              <h1 class="text-center"></h1>
                              <a href="{{ url('admin/services')}}" class="btn btn-sm bg-info">view</a>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Appointments</small>
                            <h1 class="text-center"></h1>
                            <a href="{{ url('admin/appointments')}}" class="btn btn-sm bg-info">view</a>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Testimonies</small>
                            <h1 class="text-center"></h1>
                            <a href="{{ url('admin/testimonies')}}" class="btn btn-sm bg-info">view</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-flex d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Appointments Today</small>
                              <h1 class="text-center"></h1>
                              <h4 class="text-center fs-6"></h4>
                                <a href="{{ url('admin/appointments')}}" class="btn btn-sm bg-info">view</a>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Appointments This Month</small>
                            <h1 class="text-center"></h1>
                            <h4 class="text-center fs-6"></h4>
                            <a href="{{ url('admin/appointments')}}" class="btn btn-sm bg-info">view</a>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Appointments This Year</small>
                            <h1 class="text-center"></h1>
                            <h4 class="text-center fs-6"></h4>
                            <a href="{{ url('admin/appointments')}}" class="btn bg-info">view</a>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>


        <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Supplier Delete</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroySupplier">
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
                        <h4>Supplier
                            <a href="{{ url('admin/supplier/create') }}" class="btn btn-primary float-end">Add Supplier</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Supplier Name</th>
                                    <th>Supplier Address</th>
                                    <th>Supplier Contact Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $supplier->id }}</td>
                                        <td>{{ $supplier->supplier_name }}</td>
                                        <td>{{ $supplier->supplier_address }}</td>
                                        <td>{{ $supplier->supplier_contact_no }}</td>
                                        <td>
                                            <a href="{{ url('admin/supplier/'.$supplier->id.'/edit') }}" class="btn btn-success">Edit</a>
                                            <a href="#" wire:click="deleteSupplier({{ $supplier->id }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $suppliers->links() }}
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
