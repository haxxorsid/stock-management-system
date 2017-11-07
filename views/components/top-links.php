<ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
             <span><?php echo $_SESSION['username']; ?><span>
             <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="/profile"><i class="fa fa-user fa-fw"></i> My Profile</a>
            </li>
            <li class="divider"></li>
            <li><a href="/logout" ><i class="fa fa-sign-out fa-fw"></i>Logout</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->