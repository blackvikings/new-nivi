@extends('layouts.app')
@section('title', 'Our Products')
@push('css')

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
            /*padding: 20px;*/
            /*font-family: Arial;*/
        }

        /* Center website */
        .main {
            max-width: 1000px;
            margin: auto;
        }

        h1 {
            font-size: 50px;
            word-break: break-all;
        }

        .row {
            margin: 10px -16px;
        }

        /* Add padding BETWEEN each column */
        .row,
        .row > .column {
            padding: 8px;
        }

        /* Create three equal columns that floats next to each other */
        .column {
            float: left;
            width: 33.33%;
            display: none; /* Hide all elements by default */
        }

        /* Clear floats after rows */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Content */
        .content {
            background-color: white;
            padding: 10px;
        }

        /* The "show" class is added to the filtered elements */
        .show {
            display: block;
        }

        /* Style the buttons */
        .btnn {
            border: none;
            outline: none;
            padding: 12px 16px;
            background-color: white;
            cursor: pointer;
        }

        .btnn:hover {
            background-color: #ddd;
        }

        /*.btnn.active {
          background-color: #666;
          color: white;
        }*/

        .innerCard {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            padding-top: 10px;
        }
    </style
@endpush
@section('content')
    <!-- MAIN (Center website) -->
    <div class="main" data-aos="fade-up">

    <!-- <hr>  -->

    <!-- <h2>PORTFOLIO</h2> -->
    <br>

    <div id="myBtnContainer" class="aos-init aos-animate" data-aos="fade-up">
        <button class="btnn active" onclick="filterSelection('all')"> Show all</button>
        <button class="btnn" onclick="filterSelection('personalCare')"> Personal Care</button>
        <button class="btnn" onclick="filterSelection('healthCare')"> Health Care</button>
        <button class="btnn" onclick="filterSelection('beautyCare')"> Beauty Care</button>
        <button class="btnn" onclick="filterSelection('argoCare')"> Argo Care</button>
        <button class="btnn" onclick="filterSelection('homeCare')"> Home Care</button>
        <button class="btnn" onclick="filterSelection('animalCare')"> Animal Care</button>
    </div>

    <!-- Portfolio Gallery Grid -->
    <div class="row">
        @foreach($products as $product)
            <div class="column {!! $product->category !!} aos-init aos-animate" data-aos="fade-up">
                <div class="content" style="cursor: pointer;">
                    <img src="./assets/ourImages/c-d-x-PDX_a_82obo-unsplash.jpg" alt="Mountains" style="width:100%">
                    <div class="innerCard"><h5>{{ $product->name }}</h5><h6>&#8377;45<h6></div>
                    <!--  <p>Lorem ipsum dolor..</p> -->
                </div>
            </div>
        @endforeach
{{--        <div class="column healthCare">--}}
{{--            <div class="content" style="cursor: pointer;">--}}
{{--                <img src="/w3images/lights.jpg" alt="Lights" style="width:100%">--}}
{{--                <div class="innerCard"><h5>health Name</h5><h6>&#8377;45<h6></div>--}}
{{--                <!-- <p>Lorem ipsum dolor..</p> -->--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="column beautyCare">--}}
{{--            <div class="content" style="cursor: pointer;">--}}
{{--                <img src="/w3images/nature.jpg" alt="Nature" style="width:100%">--}}
{{--                <div class="innerCard"><h5>beauty Name</h5><h6>&#8377;45<h6></div>--}}
{{--                <!-- <p>Lorem ipsum dolor..</p> -->--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="column argoCare">--}}
{{--            <div class="content" style="cursor: pointer;">--}}
{{--                <img src="/w3images/cars1.jpg" alt="Car" style="width:100%">--}}
{{--                <div class="innerCard"><h5>argo Name</h5><h6>&#8377;45<h6></div>--}}
{{--                <!-- <p>Lorem ipsum dolor..</p> -->--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="column homeCare">--}}
{{--            <div class="content" style="cursor: pointer;">--}}
{{--                <img src="/w3images/cars1.jpg" alt="Car" style="width:100%">--}}
{{--                <div class="innerCard"><h5>home Name</h5><h6>&#8377;45<h6></div>--}}
{{--                <!-- <p>Lorem ipsum dolor..</p> -->--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="column animalCare">--}}
{{--            <div class="content" style="cursor: pointer;">--}}
{{--                <img src="/w3images/cars2.jpg" alt="Car" style="width:100%">--}}
{{--                <div class="innerCard"><h5>animal Name</h5><h6>&#8377;45<h6></div>--}}
{{--                <!-- <p>Lorem ipsum dolor..</p> -->--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- END GRID -->
    </div>

    <!-- END MAIN -->
</div>
@endsection
@push('js')
    <script>
        filterSelection("all")
        function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("column");
            if (c == "all") c = "";
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
        }

        function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
            }
        }

        function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }


        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function(){
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>
@endpush

