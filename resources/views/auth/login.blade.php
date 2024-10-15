@extends('layout.auth')

@section('content')
          <!-- Register -->
          <div class="card">
            <div class="card-body">
                @include('_partials.alert')
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2" style="display: flex;flex-direction:column!important;">
                  <span class="app-brand-logo demo">
                    <img src="{{asset('sneat/assets/img/favicon/LogoFIP.png')}}" alt="">
                  </span>
                  <span class="app-brand-text demo text-body fw-bolder" style="text-transform: uppercase!important">SIJAMU FIP</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2 text-center">HALAMAN LOGIN</h4>
              <p class="mb-4 text-center">Silahkan Masukkan Kredensial Anda Untuk Login</p>

              <form id="formAuthentication" class="mb-3" action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Masukkan Email"
                    autofocus
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="Masukkan Password"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">LOGIN</button>
                </div>
              </form>

            </div>
          </div>
          <!-- /Register -->
@endsection
