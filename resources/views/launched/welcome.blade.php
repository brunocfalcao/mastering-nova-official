@php

use Illuminate\Foundation\Inspiring;

$quote = Inspiring::quote();

@endphp
<x-eduka::site title="My title">
    <x-eduka::head>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/vendor/mastering-nova/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="/vendor/mastering-nova/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/vendor/mastering-nova/css/owl.theme.default.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="/vendor/mastering-nova/images/favicon.png">
    </x-eduka::head>

    <x-eduka::body class="antialiased bg-body text-body font-body">
        <a href="#">@paylink('url', ['ip' => '123.33.12.23'], ['key' => 'okay'])</a>
    </x-eduka::body>
</x-eduka::site>