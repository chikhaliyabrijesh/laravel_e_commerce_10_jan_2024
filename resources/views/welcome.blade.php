<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div
                    class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white float-end p-3 fw-bold">
                    @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-dark hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-dark hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-dark font-200 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </div>
        </div>


        <div class="row justify-content-md-center">
            <div class="col col-lg-2">
                <div class="card">
                    <div class="card-body">
                        <img src="https://ouchcart.com/cdn/shop/products/Dodgson_Vegan_Leather_Sofa_1.webp?v=1676717118&width=700"
                            style="width:100%; height:200px;">
                    </div>
                    <div class="card-footer">
                        <center>3 Plaza</center>
                    </div>
                </div>
            </div>
            <div class="col col-lg-2">
                <div class="card">
                    <div class="card-body">
                        <img style="width:100%; height:200px;"
                            src="https://m.media-amazon.com/images/W/MEDIAX_792452-T2/images/I/81c+ydvO2RL._AC_UF894,1000_QL80_.jpg">
                    </div>
                    <div class="card-footer">
                        <center> 2 Plaza</center>
                    </div>
                </div>
            </div>
            <div class="col col-lg-2">
                <div class="card">
                    <div class="card-body">
                        <img src="https://drgcustomfurniture.com/wp-content/uploads/2016/06/51745-1024x740.jpg"
                            style="width:100%; height:200px;">
                    </div>
                    <div class="card-footer">
                        <center> Exterior</center>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>Filters</h5>
                </div>
                <div class="card-body">
                    <p class="p-0">&#8377;100 to &#8377;500 </p>
                    <p class="p-0">&#8377;500 to &#8377;1000 </p>
                    <p class="p-0">&#8377;1000 to &#8377;1500 </p>
                    <p class="p-0">&#8377;1500 to &#8377;2000 </p>
                    <p class="p-0">&#8377;2000 to &#8377;2500 </p>
                    <p class="p-0">&#8377;2500 to &#8377;3000 </p>
                    <p class="p-0">&#8377;3000 to &#8377;3500 </p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-9">
            <div class="row ">
                <div class="d-flex">
                    <a href="{{ route('show.products', ['sort' => 'low_to_high']) }}"><button type="button"
                            class="btn btn-primary mb-3">Sort ASC</button></a>&nbsp;

                    <a href="{{ route('show.products') }}"><button type="button" class="btn btn-danger mb-3">Reset
                            Sorting</button></a>
                </div>
                @foreach($products as $key => $product)
                <div class="col-6 col-md-4 d-flex flex-wrap align-items-center">
                    <div class="card" style="border-radius: 8px; width:300px;">
                        <div class="card-body">
                            <img class="card-img-top" alt="card image cap"
                                src="{{asset('storage/product_images/'.$product->image)}}" height="278px;">
                        </div>
                        <div class="card-footer">
                            {{$product->product_name}}<br>
                            &#8377;{{$product->price}} <del>&#8377; 10000 </del>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>







    </div>
</body>

</html>