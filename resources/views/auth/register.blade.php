@extends('layouts.app')

@section('content')
    <script src="https://use.fontawesome.com/f59bcd8580.js"></script>
    <div class="container">
        <div class="row m-5 no-gutters shadow-lg" style="border-radius: 30px;">
            <div class="container-fluid col-8 bg-white p-5 text-center" style="display:grid;">
                <h3 class="pb-3 vert"><strong>BMD Laravel Test</strong></h3>
                <h3 class="pb-3 vert">Silahkan Register</h3>
                <div class="form-style">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group pb-3">
                            <input placeholder="Nama" id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group pb-3">
                            <input placeholder="Email" id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group pb-3">
                            <input placeholder="Password" id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group pb-3">
                            <input placeholder="Password Confirm" id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <button type="submit" class="btn btn-primary w-100 font-weight-bold mt-2">
                            {{ __('Register') }}
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <style>
        body {
            background: #ffffff;
        }

        .form-style input {
            border: 0;
            margin-bottom: 5px;
            height: 50px;
            border-radius: 0;
            border-bottom: 1px solid #6bb4e6;
        }

        .form-style input:focus {
            border-bottom: 1px solid #007bff;
            box-shadow: none;
            outline: 0;
            background-color: #ebebeb;
        }

        .sideline {
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #ccc;
        }

        button {
            height: 50px;
        }

        .sideline:before,
        .sideline:after {
            content: '';
            border-top: 1px solid #ebebeb;
            margin: 0 20px 0 0;
            flex: 1 0 20px;
        }

        .sideline:after {
            margin: 0 0 0 20px;
        }

        .vert {
            align-items: center;
            justify-content: center;
            display: flex;
        }
    </style>
@endsection
