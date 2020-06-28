<div class="col-lg-3">

<div class="nav flex-column nav-pills" aria-orientation="vertical">
<a class="nav-link{{ request()->is('my-account') ? " active": " " }}" href="{{ route('myAccount.index') }}">My Account</a>
    <a class="nav-link{{ request()->is('my-orders') || request()->is('my-orders/*') ? " active": " " }}" href="{{ route('orders.index') }}">My Orders</a>
    <a class="nav-link{{ request()->is('my-address') ? " active": " " }}" href="{{ route('address.index') }}">My Address</a>
</div>

</div>
