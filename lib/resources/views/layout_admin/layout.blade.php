<!doctype html>
<html lang="vi,en">
<head>
    @include('layout_admin.partials.head')
    @yield('header-admin')
</head>
<body>
<section id="header">
    <div class="menu">
        <ul class="topnav">
            <li>
                <a href="#home">
                    <img src="{{URL::asset('public/images/logo.png')}}">
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-file-import"></i>
                    <p>Dashboad</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-file-export"></i>
                    <p>Component</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-boxes"></i>
                    <p>Form, table, widgets</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-file-signature"></i>
                    <p>Login, register</p>
                </a>
            </li>
            <li class="right-item">
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <p>Setting</p>
                </a>
            </li>
            <li class="right-item">
                <a href="#">
                    <i class="fas fa-comments"></i>
                    <p>Personal infomation</p>
                </a>
            </li>
            <li class="icon">
                <a href="#" onclick="toggleMenu()">&#9776;</a>
            </li>
        </ul>
    </div>
</section>
<section id="bg-body row">
    {{--<div class="left-sidebar col-sm-12 col-md-4 col-xl-3">--}}
        {{--<div id="btn-menu" class="btn btn-menu"></div>--}}
        {{--<div class="menu-left">--}}
            {{--<ul>--}}
                {{--<h3>Form, table, widget</h3>--}}
                {{--<li>--}}
                    {{--<a href="#">--}}
                        {{--<i class="fab fa-wpforms"></i>--}}
                        {{--<p>Form</p>--}}
                    {{--</a>--}}
                    {{--<ul>--}}
                        {{--<li>--}}
                            {{--<a href="#">Basic forms</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="right-body col-sm-12">
    @yield('content-admin')
    </div>
</section>
@include('layout_admin.partials.footer')
</body>
</html>