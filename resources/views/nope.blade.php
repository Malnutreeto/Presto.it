

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
    @vite('resources/css/admin.css')
</head>
<body>
<div class="container-fluid">
    <div class="row align-items-center justify-content-center flex-column container-nope">
        <img src="{{asset('site_img/solobusta.png')}}" alt="" class="logo-nope">
        <p class="p-nope text-center">Questa sezione è visualizzabile solo su desktop</p>
        <button class="back-home">
            <a href="route('home')" class="link-nope aa">Torna alla homepage</a>
        </button>
    </div>
</div>

   

    
</body>
</html>
