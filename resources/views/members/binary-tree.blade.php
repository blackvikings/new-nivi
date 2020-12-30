@extends('layouts.app')
@section('title', 'Binary Tree')
@push('css')
    <style>

        .h3, h3 {
            font-size: 1rem;
        }
        /*----------------genealogy-scroll----------*/

        .genealogy-scroll::-webkit-scrollbar {
            width: 5px;
            height: 8px;
        }
        .genealogy-scroll::-webkit-scrollbar-track {
            border-radius: 10px;
            background-color: #e4e4e4;
        }
        .genealogy-scroll::-webkit-scrollbar-thumb {
            background: #212121;
            border-radius: 10px;
            transition: 0.5s;
        }
        .genealogy-scroll::-webkit-scrollbar-thumb:hover {
            background: #d5b14c;
            transition: 0.5s;
        }

        /*----------------genealogy-tree----------*/
        .genealogy-body{
            white-space: nowrap;
            overflow-y: hidden;
            padding: 50px;
            min-height: 500px;
            padding-top: 10px;
            text-align: center;
        }
        .genealogy-tree{
            display: inline-block;
        }
        .genealogy-tree ul {
            padding-top: 20px;
            position: relative;
            padding-left: 0px;
            display: flex;
            justify-content: center;
        }
        .genealogy-tree li {
            float: left; text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 5px 0 5px;
        }
        .genealogy-tree li::before, .genealogy-tree li::after{
            content: '';
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 2px solid #ccc;
            width: 50%;
            height: 18px;
        }
        .genealogy-tree li::after{
            right: auto; left: 50%;
            border-left: 2px solid #ccc;
        }
        .genealogy-tree li:only-child::after, .genealogy-tree li:only-child::before {
            display: none;
        }
        .genealogy-tree li:only-child{
            padding-top: 0;
        }
        .genealogy-tree li:first-child::before, .genealogy-tree li:last-child::after{
            border: 0 none;
        }
        .genealogy-tree li:last-child::before{
            border-right: 2px solid #ccc;
            border-radius: 0 5px 0 0;
            -webkit-border-radius: 0 5px 0 0;
            -moz-border-radius: 0 5px 0 0;
        }
        .genealogy-tree li:first-child::after{
            border-radius: 5px 0 0 0;
            -webkit-border-radius: 5px 0 0 0;
            -moz-border-radius: 5px 0 0 0;
        }
        .genealogy-tree ul ul::before{
            content: '';
            position: absolute; top: 0; left: 50%;
            border-left: 2px solid #ccc;
            width: 0; height: 20px;
        }
        .genealogy-tree li a{
            text-decoration: none;
            color: #666;
            /*font-family: arial, verdana, tahoma;*/
            /*font-size: 11px;*/
            display: inline-block;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
        }

        .genealogy-tree li a:hover+ul li::after,
        .genealogy-tree li a:hover+ul li::before,
        .genealogy-tree li a:hover+ul::before,
        .genealogy-tree li a:hover+ul ul::before{
            border-color:  #fbba00;
        }

        /*--------------memeber-card-design----------*/
        .member-view-box{
            padding:0px 20px;
            text-align: center;
            border-radius: 4px;
            position: relative;
        }
        .member-image{
            width: 60px;
            position: relative;
        }
        .member-image img{
            width: 60px;
            height: 60px;
            border-radius: 6px;
            background-color :#000;
            z-index: 1;
        }
    </style>
@endpush
@section('content')
    <main id="main">

        <section id="contact" class="contact">
            <div class="container">
                <div class="row justify-content-center" data-aos="fade-up">
                    <div class="col-lg-12">
                        <div class="info-wrap">
                            <div class="row">
                                <div class="col-lg-12 info">

                                    <!-- <input type="text" class="form-control" name="" id="" placeholder="Father Name" data-rule="" data-msg="" /> -->
                                    <!-- -------------------------------------------------start-tree------------------------------------------- -->
                                    <!-- <a href="#" id="example" class="btn btn-danger" rel="popover" >hover for popover</a> -->

                                    <div class="body genealogy-body genealogy-scroll">
                                        <div class="genealogy-tree">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0);">
                                                        <div class="member-view-box" id="example">
                                                            <div class="member-image">
                                                                <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                                <div class="member-details">
                                                                    <h3>John Doe</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <ul class="active">
                                                        <li>
                                                            <a href="javascript:void(0);">
                                                                <div class="member-view-box">
                                                                    <div class="member-image">
                                                                        <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                                        <div class="member-details">
                                                                            <h3>Member 1</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <ul class="active">
                                                                <li>
                                                                    <a href="javascript:void(0);">
                                                                        <div class="member-view-box">
                                                                            <div class="member-image">
                                                                                <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                                                <div class="member-details">
                                                                                    <h3>Member 1-1</h3>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <!-- 44444444444444444---start----444444444 -->
                                                                    <ul class="active">
                                                                        <li>
                                                                            <a href="javascript:void(0);">
                                                                                <div class="member-view-box">
                                                                                    <div class="member-image">
                                                                                        <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                                                        <div class="member-details">
                                                                                            <h3>Member 1-1-1</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:void(0);">
                                                                                <div class="member-view-box">
                                                                                    <div class="member-image">
                                                                                        <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                                                        <div class="member-details">
                                                                                            <h3>Member 1-1-2</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                    <!-- 44444444444444------End------444444444444444 -->
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);">
                                                                        <div class="member-view-box">
                                                                            <div class="member-image">
                                                                                <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                                                <div class="member-details">
                                                                                    <h3>Member 1-2</h3>
                                                                                    <!-- Member 1-7 -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <ul class="active">
                                                                        <li>
                                                                            <a href="javascript:void(0);">
                                                                                <div class="member-view-box">
                                                                                    <div class="member-image">
                                                                                        <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                                                        <div class="member-details">
                                                                                            <h3>Member 1-2-1</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:void(0);">
                                                                                <div class="member-view-box">
                                                                                    <div class="member-image">
                                                                                        <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                                                        <div class="member-details">
                                                                                            <h3>Member 1-2-2</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">
                                                                <div class="member-view-box">
                                                                    <div class="member-image">
                                                                        <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                                        <div class="member-details">
                                                                            <h3>Member 2</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <ul class="active">
                                                                <li>
                                                                    <a href="javascript:void(0);">
                                                                        <div class="member-view-box">
                                                                            <div class="member-image">
                                                                                <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                                                <div class="member-details">
                                                                                    <h3>John Doe 2-1</h3>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <ul class="active">
                                                                        <li>
                                                                            <a href="javascript:void(0);">
                                                                                <div class="member-view-box">
                                                                                    <div class="member-image">
                                                                                        <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                                                        <div class="member-details">
                                                                                            <h3>Member 2-1-1</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:void(0);">
                                                                                <div class="member-view-box">
                                                                                    <div class="member-image">
                                                                                        <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                                                        <div class="member-details">
                                                                                            <h3>Member 2-1-2</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:void(0);">
                                                                        <div class="member-view-box">
                                                                            <div class="member-image">
                                                                                <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                                                <div class="member-details">
                                                                                    <h3>John Doe 2-2</h3>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <ul class="active">
                                                                        <li>
                                                                            <a href="javascript:void(0);">
                                                                                <div class="member-view-box">
                                                                                    <div class="member-image">
                                                                                        <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                                                        <div class="member-details">
                                                                                            <h3>Member 2-2-1</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="javascript:void(0);">
                                                                                <div class="member-view-box">
                                                                                    <div class="member-image">
                                                                                        <img src="https://image.flaticon.com/icons/svg/145/145867.svg" alt="Member">
                                                                                        <div class="member-details">
                                                                                            <h3>Member 2-2-2</h3>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- --------------------------------------------end-tree--------------------------------------------------- -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

@endsection
@push('js')
    <script type="text/javascript">
        $(function () {
            $('.genealogy-tree ul').hide();
            $('.genealogy-tree>ul').show();
            $('.genealogy-tree ul.active').show();
            $('.genealogy-tree li').on('click', function (e) {
                var children = $(this).find('> ul');
                if (children.is(":visible")) children.hide('fast').removeClass('active');
                else children.show('fast').addClass('active');
                e.stopPropagation();
            });
        });
    </script>

    <!-- popover -->
    <script type="text/javascript">
        $('#example').popover({
            html : true,
            trigger : 'manual',
            content : function() {
                return '<div class="box">User ID : 001</div> <div class="box">DOJ : 02-10-2020</div>';
            }
        });

        $(document).on('mouseover', '#example', function(){
            $('#example').popover('show');
        });

        $(document).on('mouseleave', '#example', function(){
            $('#example').popover('hide');
        });
    </script>
@endpush
