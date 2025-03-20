@extends('layouts/backend/main')
@section('main-section')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Customers</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Customers</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        

                        @if(count($customers) > 0)
                         <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle text-center">
                                <thead class="table-dark" >
                                    <tr>
                                        <th>#</th>
                                        <th>CUSTOMER NAME</th>
                                        <th>EMAIL</th>
                                        <th>PHONE</th>
                                        <th>JOINING DATE</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sn = 1;
                                    @endphp
                                    @foreach ($customers as $customer)
                                    
                                    
                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        <td>{{ $customer->name ?? '' }}</td>
                                        <td>{{ $customer->email ?? '' }}</td>
                                        <td>999999999</td>
                                        <td>{{ Carbon\Carbon::parse($customer->created_at)->format('d M, Y') }}</td>
                                        <td>
                                        <a href="{{ route('backend.customer.edit', [$customer->id]) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </a>
                                        <a href="{{ route('backend.customer.view', [$customer->id]) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> </a>
                                        <button class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i>  </button>
                                        </td>
                                    </tr>
                                     @endforeach
                                </tbody>
                            </table>
                            <div class="">
                                {{ $customers->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                        </div> 
                        
                        @else
                        <center><h2>No Records Available</h2></center>
                        @endif
                    </div>
                </div>
            </div>




        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>


@section('javascript-section')

@endsection
@endsection