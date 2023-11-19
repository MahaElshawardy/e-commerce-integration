<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <script>
        setTimeout(function() {

        }, 100);
    </script>
    <script>
        var theme = false;

        function bootswatch(name) {
            if (!document.createElement || !document.getElementsByTagName)
                return false;
            if (!name) {
                document.getElementsByTagName("head")[0].removeChild(theme);
                return theme = false;
                console.log('no theme');
            }
            if (name == 'bootstrap3') {
                var url = 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css';
            } else {
                var url = 'https://bootswatch.com/3/' + name.toLowerCase() + '/bootstrap.css';
            }
            if (!theme) {
                theme = document.createElement("link");
                theme.setAttribute("rel", "stylesheet");
                theme.setAttribute("type", "text/css");
                theme.setAttribute("media", 'screen');
                theme.setAttribute("href", url)
                if (typeof theme != "undefined")
                    document.getElementsByTagName("head")[0].appendChild(theme);

            } else {
                theme.setAttribute("href", url);
            }
        }
    </script>
    <script>
        bootswatch('bootstrap3');
    </script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
    <link rel="stylesheet" href="{{ url('dashboard.css') }}">
    @yield('css')
</head>

<body>
    <!-- partial:index.partial.html -->
    <div id="wrapper" >
        <nav class="navbar navbar-default navbar-custom navbar-baground">
            <div class="container-fuild collapse" id="panel">

                <button type="button" class="close" aria-label="Close" data-toggle="collapse"
                    data-target="#panel">close <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="container">
                <ul class="nav navbar-nav nav-social navbar-right hidden-xs">
                    <li><a onclick="document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-2x"></i>
                            <span class="sr-only">logout</span>

                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">

                        <img style="height: 123px;    border: 1px solid #e7e7e7;" src="{{ url('images/logo.png') }}"
                            alt="Brand">

                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div style="background-color: #e7e7e7;" class="collapse navbar-collapse navbar-vertical"
                    id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#">
                                <i class="fa fa-home fa-2x"></i>
                                <span>Home</span>
                                <span class="sr-only">(current)</span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-product-hunt fa-2x"></i>
                                <span>Products</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('products.create') }}">Add Product</a></li>
                                <li><a href="{{ route('products.product') }}">Show Products</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user fa-2x"></i>
                                <span>Users</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Add Users</a></li>
                                <li><a href="#">Show Users</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-money fa-2x"></i>
                                <span>Orders</span></a>
                            <ul class="dropdown-menu">
                                {{-- <li><a href="#">Action</a></li> --}}
                                <li><a href="#">Show Order</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            @if (Auth::check())
                @if (Auth::user()->type != 1)
                    @yield('content')
                @else
                    <p>You not allow </p>
                @endif
            @endif
        </div>
        <div class="modal-backdrop fade hidden"></div>
    </div>
        {{-- <script>
            $(document).ready(function() {

                var select = $('select[multiple]');
                var options = select.find('option');

                var div = $('<div />').addClass('selectMultiple');
                var active = $('<div />');
                var list = $('<ul />');
                var placeholder = select.data('placeholder');

                var span = $('<span />').text(placeholder).appendTo(active);

                options.each(function() {
                    var text = $(this).text();
                    if ($(this).is(':selected')) {
                        active.append($('<a />').html('<em>' + text + '</em><i></i>'));
                        span.addClass('hide');
                    } else {
                        list.append($('<li />').html(text));
                    }
                });

                active.append($('<div />').addClass('arrow'));
                div.append(active).append(list);

                select.wrap(div);

                $(document).on('click', '.selectMultiple ul li', function(e) {
                    var select = $(this).parent().parent();
                    var li = $(this);
                    if (!select.hasClass('clicked')) {
                        select.addClass('clicked');
                        li.prev().addClass('beforeRemove');
                        li.next().addClass('afterRemove');
                        li.addClass('remove');
                        var a = $('<a />').addClass('notShown').html('<em>' + li.text() + '</em><i></i>').hide()
                            .appendTo(select.children('div'));
                        a.slideDown(400, function() {
                            setTimeout(function() {
                                a.addClass('shown');
                                select.children('div').children('span').addClass('hide');
                                select.find('option:contains(' + li.text() + ')').prop(
                                    'selected', true);
                            }, 500);
                        });
                        setTimeout(function() {
                            if (li.prev().is(':last-child')) {
                                li.prev().removeClass('beforeRemove');
                            }
                            if (li.next().is(':first-child')) {
                                li.next().removeClass('afterRemove');
                            }
                            setTimeout(function() {
                                li.prev().removeClass('beforeRemove');
                                li.next().removeClass('afterRemove');
                            }, 200);

                            li.slideUp(400, function() {
                                li.remove();
                                select.removeClass('clicked');
                            });
                        }, 600);
                    }
                });

                $(document).on('click', '.selectMultiple > div a', function(e) {
                    var select = $(this).parent().parent();
                    var self = $(this);
                    self.removeClass().addClass('remove');
                    select.addClass('open');
                    setTimeout(function() {
                        self.addClass('disappear');
                        setTimeout(function() {
                            self.animate({
                                width: 0,
                                height: 0,
                                padding: 0,
                                margin: 0
                            }, 300, function() {
                                var li = $('<li />').text(self.children('em').text())
                                    .addClass('notShown').appendTo(select.find('ul'));
                                li.slideDown(400, function() {
                                    li.addClass('show');
                                    setTimeout(function() {
                                        select.find('option:contains(' +
                                            self.children('em')
                                            .text() + ')').prop(
                                            'selected', false);
                                        if (!select.find(
                                                'option:selected')
                                            .length) {
                                            select.children('div')
                                                .children('span')
                                                .removeClass('hide');
                                        }
                                        li.removeClass();
                                    }, 400);
                                });
                                self.remove();
                            })
                        }, 300);
                    }, 400);
                });

                $(document).on('click', '.selectMultiple > div .arrow, .selectMultiple > div span', function(e) {
                    $(this).parent().parent().toggleClass('open');
                });

            });
        </script> --}}
    <!-- partial -->
    <!-- dribbble -->
    <a class="dribbble" href="https://dribbble.com/shots/5112850-Multiple-select-animation-field" target="_blank"><img
            src="https://cdn.dribbble.com/assets/dribbble-ball-1col-dnld-e29e0436f93d2f9c430fde5f3da66f94493fdca66351408ab0f96e2ec518ab17.png"
            alt=""></a>


    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src="{{ url('javaScript.js') }}"></script>

</body>

</html>
