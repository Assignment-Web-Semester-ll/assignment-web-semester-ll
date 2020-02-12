<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8" />
    <title>
        <?php echo $__env->yieldContent('title'); ?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="../commonStyle/css/bootstrap.min.css">
    <script src="../commonStyle/js/jquery-3.4.1.js"></script>
    <script src="../commonStyle/js/popper.min.css"></script>
    <script src="../commonStyle/js/bootstrap.min.js"></script>
    
     
    

    <link rel="stylesheet" href="../commonStyle/fontawesome-free-5.12.1-web/css/fontawesome.min.css">

    <link rel="stylesheet" href="../adminPageStyle/NavigationBar.css">
    <link rel="stylesheet" href="../adminPageStyle/MasterPage.css">
</head>
<body>
    <div class="container-fluid">
        <header class="headerPage">
            <img src="../img/LogoMyCheif.png" class="logoStyle" id="logoleft">
        </header>
        <nav id="navigation">
            <div class="navbarNonBootstrap">
                <a href="#">Inbox</a>
                <a href="#" >Blog</a>
                <div class="dropdownNonBootstrap">
                    <a href="#dropdownNonBootstrap" class="dropbtn">Setting</a>
                    <div class="dropdownNonBootstrap-content">
                        <a href="#" >User Manager</a>
                        <a href="<?php echo e(route('blogcategory.index')); ?>" >Blog Category</a>
                    </div>
                </div>
                <a href="#" class="logout">LogOut</a>
            </div>
        </nav>
        <section>
            <article id="includedContent">
                <?php echo $__env->yieldContent('content'); ?>
            </article>
        </section>
    </div>
    <?php echo $__env->yieldContent('page-script'); ?>
</body>
</html><?php /**PATH D:\Year (Prepare for work)\Laravel\Assignment_Sokim\assignment-web-semester-ll\resources\views/layouts/adminpagelayouts/master.blade.php ENDPATH**/ ?>