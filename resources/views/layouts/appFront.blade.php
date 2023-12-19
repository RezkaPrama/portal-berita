<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Berita Terlengkap</title>
</head>

<body>

    <!--Main Navigation-->

    <nav class="navbar navbar-expand-sm sticky-top navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbar1">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar1">

                <ul class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                    {{-- <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10"> --}}
                        @auth
                        <li class="nav-item active">
                            <a href="{{ url('/admin/news') }}" class="btn btn-outline-primary my-2 my-sm-0">Home</a>
                        </li>
                        @else
                        
                        <li class="nav-item active">
                            <a href="{{ route('login') }}" class="btn btn-outline-success my-2 my-sm-0">Log In</a>
                        </li>

                        @if (Route::has('register'))

                        <li class="nav-item active">
                            <a href="{{ route('register') }}" class="btn btn-outline-primary my-2 my-sm-0">Register</a>
                        </li>
                        
                        @endif
                        @endauth
                        {{--
                    </div> --}}
                    @endif



                </ul>
            </div>
        </div>
    </nav>


    {{-- <div class="container">
        <div class="row">
            <div class="col-12 py-4">
                <h2>Content...</h2>
                <h5>Scroll down to see the Navbar stick</h5>

                <p>Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing
                    brunch. Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag
                    wolf squid tote bag. Tote bag cronut semiotics,
                    raw denim deep v taxidermy messenger bag. Tofu YOLO Etsy, direct trade ethical Odd Future jean
                    shorts paleo. Forage Shoreditch tousled aesthetic irony, street art organic Bushwick artisan cliche
                    semiotics ugh synth chillwave meditation.
                    Shabby chic lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse
                    hella DIY 90's blog.</p>

                <hr>

                <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free
                    Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them,
                    vegan farm-to-table Williamsburg slow-carb
                    readymade disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever.
                    Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies.
                    Banh mi McSweeney's Shoreditch selfies,
                    forage fingerstache food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>

                <hr>

                <p>Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing
                    brunch. Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag
                    wolf squid tote bag. Tote bag cronut semiotics,
                    raw denim deep v taxidermy messenger bag. Tofu YOLO Etsy, direct trade ethical Odd Future jean
                    shorts paleo. Forage Shoreditch tousled aesthetic irony, street art organic Bushwick artisan cliche
                    semiotics ugh synth chillwave meditation.
                    Shabby chic lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse
                    hella DIY 90's blog.</p>

                <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free
                    Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them,
                    vegan farm-to-table Williamsburg slow-carb
                    readymade disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever.
                    Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies.
                    Banh mi McSweeney's Shoreditch selfies,
                    forage fingerstache food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>

                <hr>

            </div>
        </div>
    </div> --}}
    <div class="jumbotron">
        <h1 class="display-4">Berita Terbaru!</h1>
    </div>

    <div class="container">
        @yield('content')
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>