<nav id="nav-bar">

        <span id="ham"><a href="#" onClick="$('.h').toggle()"><i class="fa fa-bars"></i></a></span>
        <ul>
                <li><a href="/SDP/home.php"><img src="view/img/icon.png" alt="BeanSprouts"><span id="logo">BeanSprouts</span></a></li>
                <li class="h"><a href="/SDP/home.php"><i class="fa fa-tasks"></i> View Events</a></li>
                
                


                <?php if(isset($_SESSION['userType'])){ ?>
                        <li class="h"><?php echo("<a href=\"/SDP/viewProfile.php?userid=".$_SESSION['userID'])."\">" ; ?><i class="fa fa-user"></i> View Profile</a></li>
                        <?php if(isset($_SESSION['userType']) && ($_SESSION['userType'] > 1)){ ?>
                                <?php echo "<li class=\"h\"><a href=\"/SDP/myEvents.php?userid=" .$_SESSION['userID'] . "\"><i class=\"fa fa-tasks\"></i> My Events</a></li>"?>
                                <li class="h"><a href="/SDP/createEvent.php"><i class="fa fa-plus"></i> Add Event</a></li>
                                <li class="h"><a href="/SDP/createManager.php"><i class="fa fa-plus"></i> Add Manager</a></li>
                                <li class="h"><a href="/SDP/volunteerList.php"><i class="fa fa-users"></i> View Volunteers</a></li>
                                <li class="h"><a href="/SDP/managerList.php"><i class="fa fa-users"></i> View Event Managers and Admins</a></li>

                        <?php } ?>

                        <li class="h"><a href="/SDP/model/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>

                <?php }else{?>

                        <li class="h"><a href="/SDP/login.php"><i class="fa fa-sign-in"></i> Login</a></li>
                        <li class="h"><a href="/SDP/register.php"><i class="fa fa-users"></i> Sign Up</a></li>

                <?php }?>
        </ul>                   
</nav>



















