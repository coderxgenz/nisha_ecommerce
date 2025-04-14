@extends('layouts/backend/main')
@section('main-section')
<style>
    .invoice-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            border-top: 5px solid #000;
            margin: 60px 0;
        }
        .invoice-header {
            border-bottom: 2px solid #000;
            padding-bottom: 20px;
        }
        .invoice-title {
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .table th {
            background-color: #000;
            color: #fff;
        }
        .btn-gold {
            background-color: #000;
            color: #fff;
            border: none;
        }
        
        .customer_details p{
            margin-bottom: 3px;
        }
</style>


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h2 class="mb-sm-0 font-size-24">Invoice Details</h2>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="orders.html">Orders</a></li>
                                <li class="breadcrumb-item active">Invoice</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="invoice-card">
                    
                    <!-- Header -->
                    <div class="d-flex justify-content-between invoice-header">
                        <div>
                            <h1 class="invoice-title">Invoice</h1>
                            <p class="text-muted">Status: 
                            @if($order->payment_status == 'paid')
                            <span class="badge bg-warning text-dark">Paid</span>
                            @elseif($order->payment_status == 'unpaid')
                            <span class="badge bg-warning text-dark">Unpaid</span>
                            @else
                            <span class="badge bg-warning text-dark">N/A</span> 
                            @endif 
                            </p>
                        </div>
                        <div>
                            <img src="{{url('assets/frontend/images/logo.jpg')}}" alt="Logo" width="100">
                        </div>
                    </div>
                    
                    <!-- Customer Details -->
                    <div class="customer_details mt-4">
                        <h5 class="fw-bold">Customer Details</h5>
                        <p><strong>Name:</strong> {{ $order->getUser?->name ?? '' }}</p>
                        <p><strong>Email:</strong> {{ $order->getUser?->email ?? '' }}</p>
                        <p><strong>Phone:</strong> +91 {{ $order->getUser?->phone ?? '' }}</p>
                    </div>

                    <!-- Billing & Shipping -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5 class="fw-bold">Billing Address</h5>
                            <p>{{ $order->getShippingAddress?->address ?? '' }}</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <h5 class="fw-bold">Shipping Address</h5>
                            <p>{{ $order->getShippingAddress?->address ?? '' }}</p>
                        </div>
                    </div>
                    
                    <!-- Invoice Table -->
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered text-center">
                            <thead >
                                <tr>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($order->getOrderProducts as $item)
                                    @php 
                                    $product_image = App\Models\Backend\ProductImage::where('product_id', $item->product_id)
                                    ->where('product_variant_id', $item->product_variant_id)
                                    ->first();
                                    @endphp
                                <tr>
                                    <td>{{ $item?->getProduct->name ?? '' }}</td>
                                    <td>{{ $item->quantity ?? 0 }}</td>
                                    <td>Rs. {{ $item->price ?? '' }}</td>
                                    <td>Rs. {{ $item->total_amount ?? '' }}</td>
                                </tr>
                                @endforeach
                                 
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Payment & Total -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5 class="fw-bold">Payment Method</h5>
                            @if($order->payment_mode == 'cash_on_delivery')
                            <p>Cash on Delivery</p>
                            @elseif($order->payment_mode == 'online')
                            <p>Online Payment</p>
                            @else
                            <p>N/A</p>
                            @endif 
                        </div>
                        <div class="col-md-6 text-md-end">
                            <h5 class="fw-bold">Summary</h5>
                            <p><strong>Subtotal:</strong> Rs. {{ $order->total_amount ?? '' }}</p>
                            <p><strong>Shipping Cost:</strong> Free</p>
                            <!-- <p><strong>Discount:</strong> ₹0.00</p> -->
                            <p class="fs-5 fw-bold text-success">Total: ₹{{ $order->total_amount ?? '' }}</p>
                        </div>
                    </div>
                    
                    <!-- Buttons -->
                    <div class="text-end mt-4">
                        <button class="btn btn-primary"><i class="fas fa-print"></i> Print</button>
                        <button class="btn btn-secondary"><i class="fas fa-download"></i> Download</button>
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


@section('javascript-section')
@endsection
@endsection