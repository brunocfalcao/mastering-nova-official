@php
use Eduka\Payments\Paylink;
use Eduka\Payments\Payment;
use Illuminate\Foundation\Inspiring;
use Brunocfalcao\Chrono\Chrono;

$quote = Inspiring::quote();

@endphp
<x-eduka::site title="{{ course()->title }}">
    <x-eduka::head>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/vendor/mastering-nova/css/app.tailwind.css">
        <link rel="stylesheet" href="/vendor/mastering-nova/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="/vendor/mastering-nova/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/vendor/mastering-nova/css/owl.theme.default.min.css">
        <link rel="icon" type="image/png" sizes="16x16" href="/vendor/mastering-nova/images/favicon.png">
    </x-eduka::head>

    <x-eduka::body class="antialiased bg-body text-body font-body">
        <div>
            <section class="skewed-bottom-right">
                <!-- Navigation bar -->
                <nav class="fixed w-full px-6 py-6 flex justify-between items-center bg-blue-800 shadow-inner z-50">
                    <a class="text-white text-3xl font-bold leading-none" href="#">
                    <img class="h-12" src="/vendor/mastering-nova/images/logo.png" alt="" width="auto">
                    </a>
                    <div class="lg:hidden">
                        <button class="navbar-burger flex items-center text-white p-3">
                            <svg class="block h-4 w-4 fill-current" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Mobile menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                            </svg>
                        </button>
                    </div>
                    <ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
                        <li><a class="js-trigger text-sm text-white font-bold hover:text-blue-200" href="#home" data-mt-duration="1500">Home</a></li>
                        <li class="text-gray-500">
                            <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </li>
                        <li><a class="js-trigger text-sm text-white font-bold hover:text-blue-200" href="#testimonials" data-mt-duration="1500">Testimonials</a></li>
                        <li class="text-gray-500">
                            <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </li>
                        <li><a class="js-trigger text-sm text-white font-bold hover:text-blue-200" href="#features" data-mt-duration="1500">Features</a></li>
                        <li class="text-gray-500">
                            <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </li>
                        <li><a class="js-trigger text-sm text-white font-bold hover:text-blue-200" href="#tutorials-list" data-mt-duration="1500">Tutorials List</a></li>
                        <li class="text-gray-500">
                            <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </li>
                        <li><a class="js-trigger text-sm text-white font-bold hover:text-blue-200" href="#faq" data-mt-duration="1500">FAQ</a></li>
                        <li class="text-gray-500">
                            <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                            </svg>
                        </li>
                        <li><a class="button button-primary-blue" href="{{ route('checkout.paylink') }}">Buy now - {{ Payment::data('checkout.currency') }}</a></li>

    </x-eduka::body>
</x-eduka::site>
@php
    info('[chrono.website.end] ' . Chrono::stop());
@endphp