<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/layout.css')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
       function onSubmit(token) {
         document.getElementById("demo-form").submit();
       }
     </script>
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/css/card.css', 'resources/js/app.js'])
    @livewireScripts
</head>
<body>
    <x-navbar/>
    
    {{ $slot }}
    @livewireScripts
</body>
</html>