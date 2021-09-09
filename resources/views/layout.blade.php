<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <!-- BootStrap導入 -->
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='csrf-token' content='{{ csrf_token() }}'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>body {padding-top: 80px;}</style>  <!-- 設置位置の調節  -->
    <title>Proteinabi</title>
    <script src='{{ asset("js/app.js") }}' defer></script>
  </head>
  <body>
    <!-- ナビバー -->
    <nav class='navbar navbar-expand-md navbar-dark bg-dark fixed-top d-flex justify-content-between'>
      <div>
        <a class='navbar-brand' href='{{ route("product.list") }}'>
          <span class='h4'>proteínabi</span>
        </a>
      </div>
      <div class="top-right links d-flex">
          @guest
              <div class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </div>
              @if (Route::has('register'))
                  <div class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </div>
              @endif
          @else
              <div class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </div>
          @endguest
      </div>
    </nav>

    <div>
      @yield('content')
    </div>

    <footer class="bg-dark text-light">
        <div class="d-flex justify-content-center">
            <a href="#" class="text-light mr-3">会社概要（運営会社）</a>
            <a href="#" class="text-light mr-3">ブログ</a>
            <a href="#" class="text-light mr-3">お問い合わせ</a>
            <a href="#" class="text-light mr-3">プライバシーポリシー</a>
            <a href="#" class="text-light mr-3">利用規約</a>
        </div>
        <div class="text-light text-center">
            <small class="text-secondary">@ こぴいらいと</small>
        </div>
    </footer>

  </body>
</html>