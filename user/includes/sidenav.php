<?php 
$row = GetUserWithEmail($_SESSION['user'],$conn);
?>
<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
        <div class="logo d-flex justify-content-between">
            <a href="index.html"><h3>Welcome,<br><?php echo $row['name'];?></h3></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li>
                <a class="active" href="index.php">
                    <div class="icon_menu">
                        <img src="img/menu-icon/home-solid.svg" alt="">
                    </div>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a class="active" href="about.php">
                    <div class="icon_menu">
                        <img src="img/menu-icon/info-circle-solid.svg" alt="">
                    </div>
                    <span>About Us</span>
                </a>
            </li>
            <li>
                <a class="active" href="history.php">
                    <div class="icon_menu">
                        <img src="img/menu-icon/receipt-solid.svg" alt="">
                    </div>
                    <span>Play History</span>
                </a>
            </li>
            <li>
                <a class="active" href="transaction.php">
                    <div class="icon_menu">
                        <img src="img/menu-icon/history-solid.svg" alt="">
                    </div>
                    <span>Transaction Histroy</span>
                </a>
            </li>
            <li>
                <a class="active" href="deposit.php">
                    <div class="icon_menu">
                        <img src="img/menu-icon/wallet-solid.svg" alt="">
                    </div>
                    <span>Add Funds</span>
                </a>
            </li>
            <li>
                <a class="active" href="withdraw.php">
                    <div class="icon_menu">
                        <img src="img/menu-icon/cc-visa-brands.svg" alt="">
                    </div>
                    <span>Withdraw Funds</span>
                </a>
            </li>
            <li>
                <a class="active" href="how_to_play.php">
                    <div class="icon_menu">
                        <img src="img/menu-icon/info-circle-solid.svg" alt="">
                    </div>
                    <span>How To Play</span>
                </a>
            </li>
            <li>
                <a class="active" href="rates.php">
                    <div class="icon_menu">
                        <img src="img/menu-icon/percent-solid.svg" alt="">
                    </div>
                    <span>Game Rates</span>
                </a>
            </li>
            <li>
                <a class="active" href="logout.php">
                    <div class="icon_menu">
                        <img src="img/menu-icon/sign-out-alt-solid.svg" alt="">
                    </div>
                    <span>Log Out</span>
                </a>
            </li>
        </ul>
    </nav>

    <section class="main_content dashboard_part large_header_bg">
    