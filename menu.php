<div id="nav-bar">

        <span id="ham"><a href="#" onClick="$('.h').toggle()"><i class="fa fa-bars"></i></a></span>
        <ul>
                <li><a href="/SDP/home.php"><img src="view/img/icon.png" alt="BeanSprouts"><span id="logo">BeanSprouts</span></a></li>
                <li class="h"><a href="/SDP/home.php"><i class="fa fa-tasks"></i> View Events</a></li>
                
                


                <?php if(isset($_SESSION['userType'])){ ?>
                        <li class="h"><a href="/SDP/viewProfile.php"><i class="fa fa-user"></i> View Profile</a></li>

                        <?php if(isset($_SESSION['userType']) && ($_SESSION['userType'] == 2)){ ?>
                                <li class="h"><a href="/SDP/createEvent.php"><i class="fa fa-plus"></i> Add Events</a></li>

                        <?php } ?>

                        <li class="h"><a href="/SDP/model/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>

                <?php }else{?>

                        <li class="h"><a href="/SDP/login.php"><i class="fa fa-sign-in"></i> Login</a></li>
                        <li class="h"><a href="/SDP/register.php"><i class="fa fa-users"></i> Sign Up</a></li>

                <?php }?>
        </ul>                   
</div>



















