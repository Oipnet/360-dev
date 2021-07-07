<!DOCTYPE html>
<html>
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <link rel="stylesheet" href="/css/flash.css">
    <link rel="stylesheet" href="/css/mdeditor.css">
    <script type="text/javascript" src="/js/flash.min.js"></script>

    <style type="text/css">
        header,
        main,
        footer {
            padding-left: 240px;
        }

        body {
            backgroud: white;
        }

        @media only screen and (max-width: 992px) {
            header,
            main,
            footer {
                padding-left: 0;
            }
        }

        #credits li,
        #credits li a {
            color: white;
        }

        #credits li a {
            font-weight: bold;
        }

        .footer-copyright .container,
        .footer-copyright .container a {
            color: #BCC2E2;
        }

        .fab-tip {
            position: fixed;
            right: 85px;
            padding: 0px 0.5rem;
            text-align: right;
            background-color: #323232;
            border-radius: 2px;
            color: #FFF;
            width: auto;
        }
    </style>
</head>

<body>

<ul id="slide-out" class="side-nav fixed z-depth-2">
    <li class="center no-padding">
        <div class="indigo darken-2 white-text" style="height: 180px;">
            <div class="row">
                <img style="margin-top: 5%;" width="100" height="100" src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463990208/photo_dkkrxc.png" class="circle responsive-img" />
                <p style="margin-top: -13%;">
                    360° Dev
                </p>
            </div>
        </div>
    </li>

    <li id="dash_dashboard"><a class="waves-effect" href="{{ route('admin.index') }}"><b>Dashboard</b></a></li>
    <li id="dash_dashboard"><a class="waves-effect" href="{{ route('home.index') }}" target="_blank"><b>Aller sur le site</b></a></li>

    <ul class="collapsible" data-collapsible="accordion">
        <li id="dash_users">
            <div id="dash_users_header" class="collapsible-header waves-effect"><b>Blog</b></div>
            <div id="dash_users_body" class="collapsible-body">
                <ul>
                    <li id="users_seller">
                        <a class="waves-effect" style="text-decoration: none;" href="{{ route('posts.index') }}">Articles</a>
                    </li>

                    <li id="users_customer">
                        <a class="waves-effect" style="text-decoration: none;" href="{{ route('categories.index') }}">Catégories</a>
                    </li>
                </ul>
            </div>
        </li>

        <li id="dash_products">
            <div id="dash_products_header" class="collapsible-header waves-effect"><b>Utilisateurs</b></div>
            <div id="dash_products_body" class="collapsible-body">
                <ul>
                    <li id="products_product">
                        <a class="waves-effect" style="text-decoration: none;" href="{{ route('users.index') }}">Membres</a>
                    </li>
                    <li id="products_product">
                        <a class="waves-effect" style="text-decoration: none;" href="{{ route('roles.index') }}">Roles</a>
                    </li>
                </ul>
            </div>
        </li>

        <li id="dash_categories">
            <div id="dash_categories_header" class="collapsible-header waves-effect"><b>Categories</b></div>
            <div id="dash_categories_body" class="collapsible-body">
                <ul>
                    <li id="categories_category">
                        <a class="waves-effect" style="text-decoration: none;" href="#!">Category</a>
                    </li>

                    <li id="categories_sub_category">
                        <a class="waves-effect" style="text-decoration: none;" href="#!">Sub Category</a>
                    </li>
                </ul>
            </div>
        </li>

        <li id="dash_brands">
            <div id="dash_brands_header" class="collapsible-header waves-effect"><b>Brands</b></div>
            <div id="dash_brands_body" class="collapsible-body">
                <ul>
                    <li id="brands_brand">
                        <a class="waves-effect" style="text-decoration: none;" href="#!">Brand</a>
                    </li>

                    <li id="brands_sub_brand">
                        <a class="waves-effect" style="text-decoration: none;" href="#!">Sub Brand</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</ul>

<header>
    <ul class="dropdown-content" id="user_dropdown">
        @auth
        <li><a class="indigo-text" href="#!">Profile</a></li>
        <li><form action="{{ route('logout') }}" class="form-inline" method="post">
                {{ csrf_field() }}
                <button type="submit" class="">Se déconnecter</button>
         </form></li>
        @endauth
    </ul>

    <nav class="indigo" role="navigation">
        <div class="nav-wrapper">
            <a data-activates="slide-out" class="button-collapse show-on-large" href="#!"><img style="margin-top: 17px; margin-left: 5px;" src="https://res.cloudinary.com/dacg0wegv/image/upload/t_media_lib_thumb/v1463989873/smaller-main-logo_3_bm40iv.gif" /></a>

            <ul class="right hide-on-med-and-down">
                <li>
                    <a class='right dropdown-button' href='' data-activates='user_dropdown'><i class=' material-icons'>account_circle</i></a>
                </li>
            </ul>

            <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
        </div>
    </nav>

    <nav>
        <div class="nav-wrapper indigo darken-2">
            <a style="margin-left: 20px;" class="breadcrumb" href="#!">Admin</a>
            <a class="breadcrumb" href="#!">Index</a>

            <div style="margin-right: 20px;" id="timestamp" class="right"></div>
        </div>
    </nav>
</header>

<main id="app">

    @if (session()->has('success'))
        <script type="text/javascript">window.FlashMessage.success('{{ session()->get('success') }}')</script>
    @endif
    @yield('content')
</main>

<footer class="indigo page-footer">
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h5 class="white-text">Icon Credits</h5>
                <ul id='credits'>
                    <li>
                        Gif Logo made using <a href="http://formtypemaker.appspot.com/" title="Form Type Maker">Form Type Maker</a> from <a href="https://github.com/romannurik/FORMTypeMaker" title="romannurik">romannurik</a>
                    </li>
                    <li>
                        Icons made by <a href="http://www.freepik.com" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0"
                                                                                                                                                                                                  target="_blank">CC 3.0 BY</a>
                    </li>
                    <li>
                        Icons made by <a href="http://www.flaticon.com/authors/picol" title="Picol">Picol</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0"
                                                                                                                                                                                                             target="_blank">CC 3.0 BY</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <span>Made By <a style='font-weight: bold;' href="">Tirth Patel</a></span>
        </div>
    </div>
</footer>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

<script type="text/javascript" src="/js/app.js"></script>
<script type="text/javascript" src={{ asset("/js/mdeditor.min.js") }}></script>
<script type="text/javascript">
  var md = new MdEditor('#mdeditor', {
    uploader: false, //'http://local.dev/Lab/MdEditor/app/upload.php?id=',
    preview: true,
    images: [
      {id: '1.jpg', url: 'http://lorempicsum.com/futurama/200/200/1'},
    ]
  });
</script>
</body>
</html>