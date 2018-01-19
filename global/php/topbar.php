<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapsable">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="margin: 0px; padding: 5px">
                <img src="http://localhost/augeo/global/img/logo.png" id="brand-logo">
                <span id="brand-name">AUGEO</span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="collapsable">
            <ul class="nav navbar-nav">
                <li id="home_nav"><a href="http://localhost/augeo/home">HOME</a></li>
                <li id="browse_nav"><a href="http://localhost/augeo/browse">BROWSE</a></li>
                <li id="categ_nav"><a href="http://localhost/augeo/categories">CATEGORIES</a></li>
            </ul>



<div id="user_not_logged">
            <ul class="nav navbar-nav navbar-right logged_in">
                <li>
                  <a class="" href="http://localhost/augeo/login/">Log in
                    </a>
                </li>
            </ul>
</div>


<div id="user_logged">
         <ul class="nav navbar-nav navbar-right logged_in">
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <img src="" id="avatar" alt="Avatar" class="avatar">
                        <span class="caret" style="margin-left: 10px;"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="http://localhost/augeo/home/account">My Account</a></li>
                        <li><a href="http://localhost/augeo/home/auctions/">My Auctions</a></li>
                        <li><a href="http://localhost/augeo/global/php/session.php?logout=1">Sign out</a></li>
                    </ul>
                </li>
            </ul>
</div>
     </div>
    </div>
</nav>
 <script src="http://localhost/augeo/global/js/topbar.js"></script>