<!DOCTYPE html>
<html lang="en" class="body-full-height">
    
<!-- Mirrored from aqvatarius.com/themes/atlant/html/logout.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jul 2015 09:48:06 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>        
        <!-- META SECTION -->
        <title>DPP- Login Page</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->    
    </head>
    <body>
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo1"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <form action="loginauth.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="User Name" required name="username"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                           <input type="password" class="form-control" placeholder="Password" required name="password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <span class="btn btn-block" style="color:#FFFFFF">
							<?php if (isset($_SESSION['loginerror'])):
				echo $_SESSION['loginerror'];
				unset($_SESSION['loginerror']);
			endif; ?></span>                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Log In</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        <span style="color:#000000">&copy; 2015 Doctor's Prescription Pad By</span> <a style="color:#00CCFF" href="http://spartasolutions.in" target="_blank"><b> Sparta Software Solutions</b></a></div>
                    <div class="pull-right">
                      <!--  <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>    -->                 </div>
                </div>
            </div>
        </div>
    
    <!-- COUNTERS // NOT INCLUDED IN TEMPLATE -->
        <!-- GOOGLE -->
            
        <!-- END YANDEX -->
    <!-- END COUNTERS // NOT INCLUDED IN TEMPLATE -->
    </body>

<!-- Mirrored from aqvatarius.com/themes/atlant/html/logout.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jul 2015 09:48:06 GMT -->
</html>






