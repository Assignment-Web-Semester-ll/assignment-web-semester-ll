<!DOCTYPE html>
<html lang="en">
<head>
    {{-- https://www.youtube.com/watch?v=fIq4qyEEsnc --}}
    <meta charset="utf-8" />
    <title>
        @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="../commonStyle/css/bootstrap.css"> 
    <script src="../commonStyle/js/jquery-3.4.1.js"></script>
    <script src="../commonStyle/js/popper.min.js"></script>
    <script src="../commonStyle/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../commonStyle/fontawesome-free-5.12.1-web/css/fontawesome.min.css">
    {{-- 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    --}} 
         
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
    {{-- <link href="../public/richtexteditor/summernote-bs4.min.css" rel="stylesheet">
    <script src="../public/richtexteditor/summernote-bs4.min.js"></script> --}}

    <link rel="stylesheet" href="../adminPageStyle/NavigationBar.css">
    <link rel="stylesheet" href="../adminPageStyle/MasterPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('css')
    
</head>
<body>
    <div class="container-fluid">
        <header class="headerPage">
            <img src="../img/LogoMyCheif.png" class="logoStyle" id="logoleft">
        </header>
        <nav id="navigation">
            <div class="navbarNonBootstrap">
                <a href="/home">Home</a>
                <a href="/blog" >Blog</a>
                <div class="dropdownNonBootstrap">
                    <a href="#dropdownNonBootstrap" class="dropbtn">Setting</a>
                    <div class="dropdownNonBootstrap-content">
                        <a href="{{route('reporteruser.index')}}" >User Manager</a>
                        <a href="{{route('blogcategory.index')}}" >Blog Category</a>
                    </div>
                </div>
                <a href="#" >Approval</a>
                <a href="/comment" >Comment</a>
                <i class="fa fa-bell" style="font-size:24px" id="notification"></i>
                <a href="{{route('logout')}}" class="logout">LogOut</a>
            </div>
        </nav>
        <section>
            <article id="includedContent">
                @yield('content')
            </article>
        </section>
    </div>

    @yield('javascript')

</body>
</html>