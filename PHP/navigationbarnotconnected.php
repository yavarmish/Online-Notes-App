<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container">
        <a class="navbar-brand logo" href="#">OneBud</a>
        <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
        <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link <?php if($pagename=='index') {echo 'active';}?>" href="/onlinenotes">Home</a></li>
                    <li class="nav-item"><a class="nav-link <?php if($pagename=='features') {echo 'active';}?>" href="features">Features</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="pricing.php">Pricing</a></li> -->
                    <!-- <li class="nav-item"><a class="nav-link" href="about-us.php">About Us</a></li> -->
                    <li class="nav-item"><a class="nav-link <?php if($pagename=='contact-us') {echo 'active';}?>" href="contact-us">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#LoginModal" 
                    data-whatever="Login" href="#">Login</a></li>
                </ul>                
            </div>
        </div>
    </nav>

    
   