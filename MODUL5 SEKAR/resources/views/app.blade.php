<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <title>Hello, world!</title>
  </head>
  <body>
      <section style="min-height: 95vh;">
        <ul class="nav justify-content-center pt-3">
            <li class="nav-item">
                <a class="nav-link{{ request()->is('/') ? ' active' : '' }}" aria-current="page" href="{{ route('welcome') }}">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ request()->is('vaccine*') ? ' active' : '' }}" href="{{ route('vaccine.index') }}">VACCINE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ request()->is('patient*') ? ' active' : '' }}" href="{{ route('patient.index') }}">PATIENT</a>
            </li>
        </ul>
        @yield('body')
      </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesan Pesan Praktikum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Kesan : Lumayan menguras pikiran dan energi juga ya :)</p>
                <p>Pesan : Semoga Praktikum WAD kedepannya lebih baik lagi</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
      <footer>
          <div class="text-center pb-1" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Made with ♥ Sekar Tamara Indhira Paramesti - 1202194317
          </div>
      </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
