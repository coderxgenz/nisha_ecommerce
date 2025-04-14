@extends('layouts/frontend/main')
@section('main-section')
<style>
    .progress-container {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        margin-bottom: 1.25rem;
    }
    .progress-container::before {
        content: "";
        position: absolute;
        top: 40%;
        left: 30px;
        width: 94%;
        height: 5px;
        background: #ccc;
        transform: translateY(-50%);
        z-index: -1;
    }
    .progress {
        position: absolute;
        top: 40%;
        left: 30px;
        width: 0%;
        height: 5px;
        background: #28a745;
        transform: translateY(-50%);
        transition: width 1s ease-in-out;
    }
    .step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: 1;
    }
    .step svg {
        font-size: 24px;
        background: #ccc;
        padding: 10px;
        clip-path: circle(50%);
        color: #fff;
        transition: background 0.3s;
    }
    .active svg {
        background: #28a745;
    }
    .step span {
        margin-top: 5px;
        font-size: 14px;
    }
</style>
<main>
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">Orders</h2>
        <div class="row">
            <div class="col-lg-3">
            @include('frontend/dashboard_sidebar')
            </div>
            <div class="col-lg-9">
                <div class="shop-checkout">
                    <div class="checkout__totals-wrapper">
                        <div class="progress-container">
                            <div class="progress"></div> 
                            <div class="step {{ in_array($order->delivery_status, ['ordered', 'shipped', 'out_for_delivery', 'delivered']) ? 'active':'' }}" data-step="1">
                                <svg width="53" height="52">
                                    <use href="#icon_shipping"></use>
                                </svg>
                                <span>Order Placed</span>
                            </div>

                            <div class="step {{ in_array($order->delivery_status, ['shipped', 'out_for_delivery', 'delivered']) ? 'active':'' }}" data-step="2">
                                <svg width="53" height="52">
                                    <use href="#icon_cart"></use>
                                </svg>
                                <span>Shipped</span>
                            </div>

                            <div class="step {{ in_array($order->delivery_status, ['out_for_delivery', 'delivered']) ? 'active':'' }}" data-step="3">
                                <svg width="53" height="52">
                                    <use href="#icon_truck"></use>
                                </svg>
                                <span>Out for Delivery</span>
                            </div>

                            <div class="step {{ in_array($order->delivery_status, ['delivered']) ? 'active':'' }}" data-step="4">
                                <svg width="53" height="52">
                                    <use href="#icon_gift"></use>
                                </svg>
                                <span>Delivered</span>
                            </div>
                        </div>
                        <div class="checkout__totals">
                            <h3>Order Summary</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="product_details"><span class="product_inquery">Name:</span> <span class="product_answers">{{ $order->getUser?->name ?? '' }}</span></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product_details"><span class="product_inquery">Order Id:</span> <span class="product_answers">#{{ $order->order_number ?? '' }}</span></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product_details"><span class="product_inquery">Number:</span> <span class="product_answers">+91 {{ $order->getUser?->phone ?? '' }}</span></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product_details"><span class="product_inquery">SubTotal Amount:</span> <span class="product_answers">Rs. {{ $order->total_amount ?? '' }}</span></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product_details"><span class="product_inquery">Email:</span> <span class="product_answers">{{ $order->getUser?->email ?? '' }}</span></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product_details"><span class="product_inquery">Payment Method:</span> <span class="product_answers">
                                        @if($order->payment_mode == 'cash_on_delivery')
                                            Cash on Delivery
                                        @elseif($order->payment_mode == 'online')
                                            Online
                                        @else
                                            N/A
                                        @endif
                                    </span></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product_details"><span class="product_inquery">Shipping Address:</span> <span class="product_answers">{{ $order->getShippingAddress?->address ?? '' }}</span></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product_details"><span class="product_inquery">Billing Address:</span> <span class="product_answers">{{ $order->getBillingAddress?->address ?? '' }}</span></div>
                                </div>
                            </div>

                        </div>


                        <div class="checkout__totals">
                            <h3>Order Details</h3>
                            <table class="checkout-cart-items">
                                <thead>
                                    <tr>
                                        <th>PRODUCT</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total Price</th>
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
                                        <td><img loading="lazy" src="{{url($product_image->image)}}" alt="Cropped Faux leather Jacket" class="dashboard_order_img"> <span>Elephant Kalamkari Kurta Pant Set</span> </td>
                                        <td>
                                            {{ $item->quantity }}
                                        </td>
                                        <td>
                                            Rs. {{ $item->price }}
                                        </td>
                                        <td>
                                            Rs.{{ $item->total_amount}}
                                        </td>
                                    </tr>
                                    @endforeach
                                     
                                </tbody>
                            </table>
                            <table class="checkout-totals">
                                <tbody>
                                    <tr>
                                        <th>SHIPPING</th>
                                        <td>Free shipping</td>
                                    </tr>
                                    <tr>
                                        <th>SUBTOTAL</th>
                                        <td>Rs. {{ $order->total_amount ?? '' }}</td>
                                    </tr>
                                    <!-- <tr>
                                        <th>GST</th>
                                        <td>₹39</td>
                                    </tr>
                                    <tr>
                                        <th>SGST</th>
                                        <td>₹0</td>
                                    </tr>
                                    <tr>
                                        <th>IGST</th>
                                        <td>₹0</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="mb-5 pb-xl-5"></div>
</main>

<?php
$order_status = "5"; 
echo '<body data-step="'.$order_status.'">';
?>

@section('javascript-section')
<script>
    let order_status = "2";

    function updateProgress(step) {
    let steps = document.querySelectorAll(".step");
    let progress = document.querySelector(".progress");

    let stepWidth = 95 / (steps.length - 1);

    if (step >= 1 && step <= 4) {
    
        progress.style.width = stepWidth * (step - 1) + "%";

        steps.forEach((el, index) => {
            if (index < step) {
                el.classList.add("active");
            } else {
                el.classList.remove("active");
            }
        });
    } else {
        
        progress.style.width = "0%"; 
        
    }
}

// **Backend se Current Step Fetch Karna**
let currentStep = document.body.getAttribute("data-step") || order_status;

// Convert to integer if possible
let stepNumber = parseInt(currentStep);
if (!isNaN(stepNumber)) {
    updateProgress(stepNumber);
} else {
    updateProgress(currentStep); // Handle non-numeric statuses
}

</script>
@endsection
@endsection