<ul class="account-nav">
                    <li><a href="{{ route('frontend.view_dashboard') }}" class="menu-link menu-link_us-s">Dashboard</a></li>
                    <li><a href="{{ route('frontend.view_profile') }}" class="menu-link menu-link_us-s">Profile</a></li>
                    <li><a href="{{ route('frontend.view_all_order') }}" class="menu-link menu-link_us-s">Orders</a></li>
                    <li><a href="account_edit_address.html" class="menu-link menu-link_us-s">Addresses</a></li>
                    <li><a href="account_edit.html" class="menu-link menu-link_us-s">Account Details</a></li>
                    <li><a href="{{ route('frontend.view_wishlist') }}" class="menu-link menu-link_us-s">Wishlist</a></li>
                    <li>
                    <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a class="dropdown-item menu-link menu-link_us-s logout-btn"  href="{{ route('logout') }}" onclick="event.preventDefault();
              this.closest('form').submit();"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Log Out</a>
            </form>  
                    </li>
                </ul>