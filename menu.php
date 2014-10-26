        <a href="/SDP/home.php">View Events</a>
        <?php if(isset($_SESSION['userType']) && ($_SESSION['userType'] == 2)){ ?>
        <a href="/SDP/createEvent.php">Add Events</a>

        <?php } ?>
        <?php if(isset($_SESSION['userType'])){ ?>
        <a href="/SDP/viewProfile.php">View Profile</a>
        <a href="/SDP/model/logout.php">Logout</a>
        <?php }else{?>
        <a href="/SDP/login.php">Login</a>
        <a href="/SDP/register.php">Sign Up</a>
        <?php }?>