@extends('layouts/backend/main')
@section('main-section')
<style>
    .badge {
    font-size: 12px;
    padding: 5px 10px;
}
</style>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Orders</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Orders</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            


            <div class="row">
                <div class="col-lg-12">
                    <div class="card"> 
                        <div class="card-header"> 
                        <h5 class="mb-0 fw-bold"><i class="fas fa-box"></i> Order List</h5> 
                            <!-- <a href="{{ route('backend.main_category.create') }}" class="btn btn-primary waves-effect waves-light"><i class="fas fa-plus"></i> Add New Orders</a> -->
                        </div>
                        @if(count($orders) > 0) 
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>INVOICE NO</th>
                                            <th>ORDER TIME</th>
                                            <th>CUSTOMER NAME</th>
                                            <th>METHOD</th>
                                            <th>AMOUNT</th>
                                            <th>STATUS</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $sn = 1;
                                        @endphp
                                    @foreach($orders as $order)
                                       
                                        <tr>
                                            <td>{{ $sn++ }}</td>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d M, Y') }}</td>
                                            <td>{{ $order->getUser?->name ?? '' }}</td>
                                            @if($order->payment_mode == 'cash_on_delivery')
                                            <td><span class="badge bg-success text-dark">Cash</span></td>
                                            @elseif($order->payment_mode == 'online')
                                            <td><span class="badge bg-warning text-dark">Online</span></td>
                                            @else
                                            <td><span class="badge bg-warning text-dark">N/A</span></td>
                                            @endif

                                            <td>Rs. {{ $order->total_amount }}</td>
                                            @if($order->delivery_status == 'ordered')
                                            <td><span class="badge bg-success text-dark"> Ordered </span></td>
                                            @elseif($order->delivery_status == 'shipped')
                                            <td><span class="badge bg-success text-dark"> Shipped </span></td>
                                            @elseif($order->delivery_status == 'out_for_delivery')
                                            <td><span class="badge bg-success text-dark"> Out For Delivery </span></td>
                                            @elseif($order->delivery_status == 'delivered')
                                            <td><span class="badge bg-success text-dark"> Delivered </span></td>
                                            @endif
                                             <td>
                                                <a href="{{ route('backend.order.edit', [$order->id]) }}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> </a>
                                                <a href="{{ route('backend.order.view_order', [$order->id]) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> </a>
                                            </td>
                                        </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                                <div class="">
                                {{ $orders->links('pagination::bootstrap-5') }}
                            </div>
                            </div>
                        </div>
                        @else
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="text-danger">No Orders Found</h4>
                                <p>Please add some orders to see them here.</p>
                            </div></div>
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