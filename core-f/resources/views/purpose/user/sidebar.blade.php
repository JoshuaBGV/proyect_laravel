<!-- Sidenav -->
<div class="sidenav" id="sidenav-main">
    <!-- Sidenav header -->
    <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/img/logoblanco.png') }}" class="navbar-brand-img" style="height: 2.5rem; width: 180px;" alt="logo">
        </a>
        <div class="ml-auto">
            <!-- Sidenav toggler -->
            <div class="sidenav-toggler sidenav-toggler-dark d-md-none" data-action="sidenav-unpin"
                data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                    <i class="bg-white sidenav-toggler-line"></i>
                    <i class="bg-white sidenav-toggler-line"></i>
                    <i class="bg-white sidenav-toggler-line"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- User mini profile -->
    <div class="text-center sidenav-user d-flex flex-column align-items-center justify-content-between">
        <!-- Avatar -->
        <div>
            <a href="#" class="avatar rounded-circle avatar-xl">
                <i class="fas fa-user-circle fa-4x"></i>
            </a>
            <div class="mt-4">
                <h5 class="mb-0 text-white"> {{ Auth::user()->name }}</h5>
                <a href="#" class="shadow btn btn-sm btn-white btn-icon rounded-pill hover-translate-y-n3">
                    <span class="btn-inner--icon"><i class="far fa-coins"></i></span>
                    <span
                        class="btn-inner--text">{{ $settings->currency }}{{ number_format(Auth::user()->account_bal, 2, '.', ',') }}</span>
                </a>
            </div>
        </div>
        <!-- User info -->
        <!-- Actions -->
        <div class="mt-4 w-100 actions d-flex justify-content-between">
            {{-- <a href="{{ route('profile') }}" class="pl-0 text-white action-item action-item-lg">
                <i class="far fa-user"></i>
            </a> --}}
            {{-- <a href="#modal-chat" class="text-white action-item action-item-lg" data-toggle="modal">
                <i class="far fa-comment-alt"></i>
            </a>
            <a href="shop/invoices.html" class="pr-0 text-white action-item action-item-lg">
                <i class="far fa-receipt"></i>
            </a> --}}
        </div>
    </div>
    <!-- Application nav -->
    <div class="clearfix nav-application">
        <a href="{{ route('dashboard') }}"
            class="text-sm btn btn-square {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <span class="btn-inner--icon d-block"><i class="far fa-home fa-2x"></i></span>
            <span class="pt-2 btn-inner--icon d-block">Inicio</span>
        </a>
        <a href="{{ route('deposits') }}"
            class="text-sm btn btn-square {{ request()->routeIs('deposits') ? 'active' : '' }} {{ request()->routeIs('payment') ? 'active' : '' }} {{ request()->routeIs('pay.crypto') ? 'active' : '' }}">
            <span class="btn-inner--icon d-block"><i class="far fa-download fa-2x"></i></span>
            <span class="pt-2 btn-inner--icon d-block">Depósito</span>
        </a>
        @if ($mod['investment'] || $mod['cryptoswap'])
            <a href="{{ route('withdrawalsdeposits') }}"
                class="text-sm btn btn-square {{ request()->routeIs('withdrawalsdeposits') ? 'active' : '' }} {{ request()->routeIs('withdrawfunds') ? 'active' : '' }}">
                <span class="btn-inner--icon d-block"><i class="fas fa-arrow-alt-circle-up fa-2x"></i></span>
                <span class="pt-2 btn-inner--icon d-block">Retirar</span>
            </a>
        @endif
    </div>
</div>
