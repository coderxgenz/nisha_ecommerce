@extends('layouts/frontend/main')
@section('main-section')

<main>
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
        <h2 class="page-title">Orders</h2>
        <div class="row">
            <div class="col-lg-3">
                <ul class="account-nav">
                    <li><a href="account_dashboard.html" class="menu-link menu-link_us-s">Dashboard</a></li>
                    <li><a href="account_orders.html" class="menu-link menu-link_us-s menu-link_active">Orders</a></li>
                    <li><a href="account_edit_address.html" class="menu-link menu-link_us-s">Addresses</a></li>
                    <li><a href="account_edit.html" class="menu-link menu-link_us-s">Account Details</a></li>
                    <li><a href="account_wishlist.html" class="menu-link menu-link_us-s">Wishlist</a></li>
                    <li><a href="login_register.html" class="menu-link menu-link_us-s">Logout</a></li>
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="shop-checkout">
                    <div class="checkout__totals-wrapper">
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
                                    <tr>
                                        <td> <img loading="lazy" src="{{url('assets/frontend/images/products/product_8-1.jpg')}}" alt="Cropped Faux leather Jacket" class="dashboard_order_img"> <span>Elephant Kalamkari Kurta Pant Set</span> </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            ₹32.50
                                        </td>
                                        <td>
                                            ₹32.50
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <img loading="lazy" src="{{url('assets/frontend/images/products/product_8-1.jpg')}}" alt="Cropped Faux leather Jacket" class="dashboard_order_img"> <span>Elephant Kalamkari Kurta Pant Set</span> </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            ₹58.90
                                        </td>
                                        <td>
                                            ₹58.90
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="checkout-totals">
                                <tbody>
                                    <tr>
                                        <th>SUBTOTAL</th>
                                        <td>₹62.40</td>
                                    </tr>
                                    <tr>
                                        <th>SHIPPING</th>
                                        <td>Free shipping</td>
                                    </tr>
                                    <tr>
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
                                    </tr>
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


@section('javascript-section')
@endsection
@endsection