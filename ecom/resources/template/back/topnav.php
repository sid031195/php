<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">SB Admin</a>
                <a class="navbar-brand" href="../index.php">Home</a>
            </div>
            <ul class="nav navbar-right top-nav">
              <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                       
                        <li class="divider"></li>-->
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> <?php echo $_SESSION['username']; ?></a>
                        </li>
                    </ul>
                </li>
            </ul>