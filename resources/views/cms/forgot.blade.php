<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MediMart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/cms/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  </head>
  <style>
    .forgot {
        padding-left: 10px;
    }
  </style>
  <body>

    <div class="m-auto form">
        <h2 style="padding-bottom: 30px;
        color: #444444;" class="text-center"><b>MediMart</b></h2>
        <form action="" method="post">
            @csrf
            <div class="wrap-login">
                <p style="font-size: 0.8rem" class="text-center pt-2">Enter Email To Receive Reset Password Link</p>
                @if ($errors->any() || Session::get('success'))
                    @include('layout/info')
                @endif
                <form action="" method="post">
                    <div class="username mb-3 d-flex justify-content-center">
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input placeholder="Email" type="email" name="email" id="">
                        <i class="fa-solid fa-user" style="margin: 10px; color: RGB(0.1725, 0.1725, 0.1725).;"></i>
                    </div>
                    <div class="d-flex justify-content-around mt-3 mb-3">
                        <div class="mt-3">
                            <a class="forgot" href="{{ route('login')}}"><b>Back to login</b></a>
                        </div>
                        <button class="signin" type="submit">Reset Password</button>
                    </div>
                </form>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
