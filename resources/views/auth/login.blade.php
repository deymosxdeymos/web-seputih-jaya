<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Pelayanan</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/lampung-tengah6.png') }}" type="image/x-icon">
  </head>

<body class="bg-dark text-white">
        <form method="POST" action="{{ route('admin') }}">
            @csrf<div class="px-5 py-5 p-lg-0">
                <div class="d-flex justify-content-center">
                  <div class="col-12 col-md-9 col-lg-7 min-h-lg-screen d-flex flex-column justify-content-center py-lg-16 px-lg-20 position-relative">
                    <div class="row">
                      <div class="col-lg-10 col-md-9 col-xl-7 mx-auto">
                        <div class="text-center mb-12">
                            <img src="{{ asset("assets/images/lampung-tengah6.png") }}" width="300px" alt="">
                          <h1 class="ls-tight font-bolder h2">
                            Sign In
                          </h1>
                          <p class="mt-2">Kelurahan Seputih Jaya</p>
                        </div>
                        <form>
                          <div class="mb-5">
                            <label for="email" class="form-label" for="email">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Your email address" name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="mb-5">
                            <label for="password" class="form-label" for="password">Password</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div>
                            <button type="submit" class="btn btn-primary w-full">
                              Sign in
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </form>
        <script src="{{ asset("assets/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    </body>

    </html>
