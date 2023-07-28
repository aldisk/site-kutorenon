<html>
    <head>
        @include('plugin/bootstrap-open')
        <title>Dashboard</title>
        <style>
                .wrapper {
        margin-top: 80px;
        margin-bottom: 80px;
        }

        .form-signin {
        max-width: 500px;
        padding: 15px 35px 45px;
        margin: 0 auto;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
        margin-bottom: 30px;
        }

        .form-signin .checkbox {
        font-weight: normal;
        }

        .form-signin .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        }

        .form-signin .form-control:focus {
        z-index: 2;
        }

        .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
        }

        .form-signin input[type="password"] {
        margin-bottom: 20px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        }
        </style>
    </head>
    <body style="background-color: lavender">

        <div class="wrapper">
        <form class="form-signin rounded" action="{{ route('DashLogin') }}" method="post">
        @csrf
            <img class="img-fluid mx-auto d-block" style="max-height: 200px;" src="{!! asset('/storage/logo-desa.png') !!}" height="150" alt="Foto Desa"> <br>
            <h4 class="form-signin-heading text-center">Desa Kutorenon</h4>
            <input type="text" class="form-control" name="username" placeholder="Username" required/>
            <input type="password" class="form-control" name="password" placeholder="Password" required/>
            <button class="btn btn-dark ms-auto d-block" type="submit">Login</button>
        </form>
        </div>

        @include('plugin/bootstrap-close')
    </body>
</html>