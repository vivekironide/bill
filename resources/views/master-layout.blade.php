<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', ' PickMe Corporate Solution')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="format-detection" content="telephone=no">
	<meta name="csrf-token" content="{{csrf_token()}}">
    @section('css')
        <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    @show
</head>

<body>
	<div class="ui top menu inverted-corporate borderless">
        <div class="right menu">
            <div class="ui dropdown item">
                Welcome Guest
                <i class="dropdown icon" style="padding-top: 3px"></i>
                <div class="menu">
                    <a class="item" href="">
                        <i class="fa fa-sign-out fa-lg"></i>
                        Logout
                    </a>
                </div>
            </div>

        </div>
    </div>

    @yield('content')

    @section('js')
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="{{asset('js/main.js') . '?' . filemtime(public_path('js/main.js'))}}"></script>
        <script>
            var Toast = Swal.mixin( {
                toast            : true,
                position         : 'top-end',
                showConfirmButton: false,
                timer            : 3000,
                timerProgressBar : true,
                onOpen           : ( toast ) => {
                    toast.addEventListener( 'mouseenter', Swal.stopTimer );
                    toast.addEventListener( 'mouseleave', Swal.resumeTimer );
                },
                padding          : '1rem'
            } );

            window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
		</script>
    @show
</body>
</html>


