<x-eduka::site title="My title">
    <x-eduka::head>
        <link rel="stylesheet" type="text/css" href="/vendor/nova-advanced-ui/css/app.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
        <!-- /Favicon -->
    </x-eduka::head>
    <x-eduka::body class="font-primary antialised bg-background-900">
        <div class="px-4 sm:px-8 md:px-12 xl:container mx-auto">

            <div class="text-white mt-12">
                Hi, your pre-subscription for my course <strong class="text-secondary">{{ $subscriber->course->name }}</strong> was cancelled, sad to see you go!
                <br/><br/>
                Your email: {{ $subscriber->email }}
            </div>
        </div>
    </x-eduka::body>
</x-eduka::site>