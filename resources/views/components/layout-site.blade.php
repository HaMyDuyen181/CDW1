<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title?? 'Shop Oh!Pharmacy' }}</title>
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
     />
     @vite('resources/css/app.css')
    {{ $header ?? ''}}
</head>
<body>
    <header>
        <x-header/>
    </header>
        <main>
        {{ $slot }}
        </main>
    <footer>
        <x-footer/>
    </footer>


    {{ $footer ?? ''}}

</body>
</html>