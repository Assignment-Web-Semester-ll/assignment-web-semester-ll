<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>
        @yield('title')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../commonStyle/js/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="../adminPageStyle/NavigationBar.css">
    <link rel="stylesheet" href="../adminPageStyle/MasterPage.css">
</head>
<body>
    <header class="headerPage">
        <img src="../img/blog.png" class="logoStyle" id="logoleft">
    </header>
    <nav id="navigation">
        <div class="navbar">
            <a href="#">Inbox</a>
            <a href="#" >Blog</a>
            <div class="dropdown">
                <a href="#dropdown" class="dropbtn">Setting</a>
                <div class="dropdown-content">
                    <a href="#" >User Manager</a>
                    <a href="#" >Blog Category</a>
                </div>
            </div>
            <a href="#" class="logout">LogOut</a>
</body>
</html>