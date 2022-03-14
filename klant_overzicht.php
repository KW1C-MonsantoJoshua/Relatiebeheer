<!--Op deze pagina komt een overzicht met alle bedrijven die de applicatie gebruiken-->
<?php
include "backend/functions.php";
if (!isset($_SESSION["loggedin"])) {
    header("Location: index.php");
}
$row2 = Getuser();

if (!($row2['authentication_level'] === "Admin1")){
    if (!($row2['member_of'] == $_GET['membof'])) {
        $memb_of = $row2['member_of'];
        header("Location:../bedrijfs_klanten_overzicht.php?custof=$memb_of&membof=$memb_of");
    }
}


UpdateCompanyInfo();
$rowC = GetCompanyInfo();
ViewUserP();
ViewUserZ();
ViewPersonnel();
editPersonnel();
editUserZ();
editUserP();
?>
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<?php
include "partials/header.php";
?>
<!-- END : Head-->
<!-- BEGIN : Body-->
<body class="vertical-layout vertical-menu 2-columns  navbar-sticky layout-dark layout-transparent bg-glass-1"
      data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">

<!-- Navbar (Header) Starts-->
<?php
include "partials/navbar.php";
?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- / main menu-->

<nav class="navbar navbar-expand-lg navbar-light header-navbar navbar-static">
    <div class="container-fluid navbar-wrapper">
        <div class="navbar-header d-flex">
            <div class="navbar-toggle menu-toggle d-xl-none d-block float-left align-items-center justify-content-center" data-toggle="collapse"><i class="ft-menu font-medium-3"></i></div>
            <ul class="navbar-nav">
                <li class="nav-item mr-2 d-none d-lg-block"><a class="nav-link apptogglefullscreen" id="navbar-fullscreen" href="javascript:;"><i class="ft-maximize font-medium-3"></i></a></li>
                <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="javascript:"><i class="ft-search font-medium-3"></i></a>
                    <div class="search-input">
                        <div class="search-input-icon"><i class="ft-search font-medium-3"></i></div>
                        <input class="input" type="text" placeholder="Explore Apex..." tabindex="0" data-search="template-search">
                        <div class="search-input-close"><i class="ft-x font-medium-3"></i></div>
                        <ul class="search-list"></ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="navbar-container">
            <div class="collapse navbar-collapse d-block" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="i18n-dropdown dropdown nav-item mr-2"><a class="nav-link d-flex align-items-center dropdown-toggle dropdown-language" id="dropdown-flag" href="javascript:;" data-toggle="dropdown"><img class="langimg selected-flag" src="../../../app-assets/img/flags/us.png" alt="flag"><span class="selected-language d-md-flex d-none">English</span></a>
                        <div class="dropdown-menu dropdown-menu-right text-left" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="javascript:;" data-language="en"><img class="langimg mr-2" src="../../../app-assets/img/flags/us.png" alt="flag"><span class="font-small-3">English</span></a><a class="dropdown-item" href="javascript:;" data-language="es"><img class="langimg mr-2" src="../../../app-assets/img/flags/es.png" alt="flag"><span class="font-small-3">Spanish</span></a><a class="dropdown-item" href="javascript:;" data-language="pt"><img class="langimg mr-2" src="../../../app-assets/img/flags/pt.png" alt="flag"><span class="font-small-3">Portuguese</span></a><a class="dropdown-item" href="javascript:;" data-language="de"><img class="langimg mr-2" src="../../../app-assets/img/flags/de.png" alt="flag"><span class="font-small-3">German</span></a></div>
                    </li>
                    <li class="dropdown nav-item"><a class="nav-link dropdown-toggle dropdown-notification p-0 mt-2" id="dropdownBasic1" href="javascript:;" data-toggle="dropdown"><i class="ft-bell font-medium-3"></i><span class="notification badge badge-pill badge-danger">4</span></a>
                        <ul class="notification-dropdown dropdown-menu dropdown-menu-media dropdown-menu-right m-0 overflow-hidden">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header d-flex justify-content-between m-0 px-3 py-2 white bg-primary">
                                    <div class="d-flex"><i class="ft-bell font-medium-3 d-flex align-items-center mr-2"></i><span class="noti-title">7 New Notification</span></div><span class="text-bold-400 cursor-pointer">Mark all as read</span>
                                </div>
                            </li>
                            <li class="scrollable-container"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-center">
                                        <div class="media-left">
                                            <div class="mr-3"><img class="avatar" src="../../../app-assets/img/portrait/small/avatar-s-20.png" alt="avatar" height="45" width="45"></div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="m-0"><span>Kate Young</span><small class="grey lighten-1 font-italic float-right">5 mins ago</small></h6><small class="noti-text">Commented on your photo</small>
                                            <h6 class="noti-text font-small-3 m-0">Great Shot John! Really enjoying the composition on this piece.</h6>
                                        </div>
                                    </div>
                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-center">
                                        <div class="media-left">
                                            <div class="mr-3"><img class="avatar" src="../../../app-assets/img/portrait/small/avatar-s-11.png" alt="avatar" height="45" width="45"></div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="m-0"><span>Andrew Watts</span><small class="grey lighten-1 font-italic float-right">49 mins ago</small></h6><small class="noti-text">Liked your album: UI/UX Inspo</small>
                                        </div>
                                    </div>
                                </a><a class="d-flex justify-content-between read-notification" href="javascript:void(0)">
                                    <div class="media d-flex align-items-center py-0 pr-0">
                                        <div class="media-left">
                                            <div class="mr-3"><img src="../../../app-assets/img/icons/sketch-mac-icon.png" alt="avatar" height="45" width="45"></div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="m-0">Update</h6><small class="noti-text">MyBook v2.0.7</small>
                                        </div>
                                        <div class="media-right">
                                            <div class="border-left">
                                                <div class="px-4 py-2 border-bottom">
                                                    <h6 class="m-0 text-bold-600">Update</h6>
                                                </div>
                                                <div class="px-4 py-2 text-center">
                                                    <h6 class="m-0">Close</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a><a class="d-flex justify-content-between read-notification" href="javascript:void(0)">
                                    <div class="media d-flex align-items-center">
                                        <div class="media-left">
                                            <div class="avatar bg-primary bg-lighten-3 mr-3 p-1"><span class="avatar-content font-medium-2">LD</span></div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="m-0"><span>Registration done</span><small class="grey lighten-1 font-italic float-right">6 hrs ago</small></h6>
                                        </div>
                                    </div>
                                </a>
                                <div class="cursor-pointer">
                                    <div class="media d-flex align-items-center justify-content-between">
                                        <div class="media-left">
                                            <div class="media-body">
                                                <h6 class="m-0">New Offers</h6>
                                            </div>
                                        </div>
                                        <div class="media-right">
                                            <div class="custom-control custom-switch">
                                                <input class="switchery" type="checkbox" checked id="notificationSwtich" data-size="sm">
                                                <label for="notificationSwtich"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between cursor-pointer read-notification">
                                    <div class="media d-flex align-items-center">
                                        <div class="media-left">
                                            <div class="avatar bg-danger bg-lighten-4 mr-3 p-1"><span class="avatar-content font-medium-2"><i class="ft-heart text-danger"></i></span></div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="m-0"><span>Application approved</span><small class="grey lighten-1 font-italic float-right">18 hrs ago</small></h6>
                                        </div>
                                    </div>
                                </div><a class="d-flex justify-content-between read-notification" href="javascript:void(0)">
                                    <div class="media d-flex align-items-center">
                                        <div class="media-left">
                                            <div class="mr-3"><img class="avatar" src="../../../app-assets/img/portrait/small/avatar-s-6.png" alt="avatar" height="45" width="45"></div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="m-0"><span>Anna Lee</span><small class="grey lighten-1 font-italic float-right">27 hrs ago</small></h6><small class="noti-text">Commented on your photo</small>
                                            <h6 class="noti-text font-small-3 text-bold-500 m-0">Woah!Loving these colors! Keep it up</h6>
                                        </div>
                                    </div>
                                </a>
                                <div class="d-flex justify-content-between cursor-pointer read-notification">
                                    <div class="media d-flex align-items-center">
                                        <div class="media-left">
                                            <div class="avatar bg-info bg-lighten-4 mr-3 p-1">
                                                <div class="avatar-content font-medium-2"><i class="ft-align-left text-info"></i></div>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="m-0"><span>Report generated</span><small class="grey lighten-1 font-italic float-right">35 hrs ago</small></h6>
                                        </div>
                                    </div>
                                </div><a class="d-flex justify-content-between read-notification" href="javascript:void(0)">
                                    <div class="media d-flex align-items-center">
                                        <div class="media-left">
                                            <div class="mr-3"><img class="avatar" src="../../../app-assets/img/portrait/small/avatar-s-7.png" alt="avatar" height="45" width="45"></div>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="m-0"><span>Oliver Wright</span><small class="grey lighten-1 font-italic float-right">2 days ago</small></h6><small class="noti-text">Liked your album: UI/UX Inspo</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-menu-footer">
                                <div class="noti-footer text-center cursor-pointer primary border-top text-bold-400 py-1">Read All Notifications</div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item mr-1"><a class="nav-link dropdown-toggle user-dropdown d-flex align-items-end" id="dropdownBasic2" href="javascript:;" data-toggle="dropdown">
                            <div class="user d-md-flex d-none mr-2"><span class="text-right">John Doe</span><span class="text-right text-muted font-small-3">Available</span></div><img class="avatar" src="../../../app-assets/img/portrait/small/avatar-s-1.png" alt="avatar" height="35" width="35">
                        </a>
                        <div class="dropdown-menu text-left dropdown-menu-right m-0 pb-0" aria-labelledby="dropdownBasic2"><a class="dropdown-item" href="app-chat.html">
                                <div class="d-flex align-items-center"><i class="ft-message-square mr-2"></i><span>Chat</span></div>
                            </a><a class="dropdown-item" href="page-user-profile.html">
                                <div class="d-flex align-items-center"><i class="ft-edit mr-2"></i><span>Edit Profile</span></div>
                            </a><a class="dropdown-item" href="app-email.html">
                                <div class="d-flex align-items-center"><i class="ft-mail mr-2"></i><span>My Inbox</span></div>
                            </a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="auth-login.html">
                                <div class="d-flex align-items-center"><i class="ft-power mr-2"></i><span>Logout</span></div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block mr-2 mt-1"><a class="nav-link notification-sidebar-toggle" href="javascript:;"><i class="ft-align-right font-medium-3"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar (Header) Ends-->

<!-- ////////////////////////////////////////////////////////////////////////////-->

    <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <section class="kb-wrapper">
                    <!-- Knowledge base search start -->
                    <div class="kb-search">
                        <div class="row">
                            <div class="col-12">
                                <div class="card bg-transparent shadow-none kb-header py-3">
                                    <div class="card-content">
                                        <div class="card-body text-center p-md-5">
                                            <h1 class="mb-2 kb-title">How can we help you today?</h1>
                                            <p class="mb-4">Algolia helps businesses across industries quickly create relevant, scalable, and lightning fast search and discovery experiences.</p>
                                            <form>
                                                <div class="form-group position-relative w-50 mx-auto kb-search-input">
                                                    <input type="text" class="form-control form-control-lg shadow round p-3 font-medium-1" id="searchbar" placeholder="Find from talk..">
                                                    <button class="btn btn-primary round position-absolute" type="button">
                                                        <span class="d-none d-sm-block">Search</span>
                                                        <i class="ft-search d-block d-sm-none"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Knowledge base search ends -->
                    <!-- Knowledge base content start -->
                    <div class="kb-content">
                        <div class="row kb-content-info match-height mx-1 mx-md-2 mx-lg-5">
                            <div class="col-md-4 col-sm-6 kb-content-card">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body text-center p-4">
                                            <a href="page-knowledge-categories.html">
                                                <i class="ft-user"></i>
                                                <h5 class="mt-2">My Account</h5>
                                                <p class="m-0 text-muted">But students more often neglect fact it is much more</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 kb-content-card">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body text-center p-4">
                                            <a href="page-knowledge-categories.html">
                                                <i class="ft-link"></i>
                                                <h5 class="mt-2">Connect</h5>
                                                <p class="m-0 text-muted">But students more often neglect fact it is much more</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 kb-content-card">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body text-center p-4">
                                            <a href="page-knowledge-categories.html">
                                                <i class="ft-dollar-sign"></i>
                                                <h5 class="mt-2">Charges & Refunds</h5>
                                                <p class="m-0 text-muted">But students more often neglect fact it is much more</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 kb-content-card">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body text-center p-4">
                                            <a href="page-knowledge-categories.html">
                                                <i class="ft-globe"></i>
                                                <h5 class="mt-2">International</h5>
                                                <p class="m-0 text-muted">But students more often neglect fact it is much more</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 kb-content-card">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body text-center p-4">
                                            <a href="page-knowledge-categories.html">
                                                <i class="ft-smartphone"></i>
                                                <h5 class="mt-2">Payouts</h5>
                                                <p class="m-0 text-muted">But students more often neglect fact it is much more</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 kb-content-card">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body text-center p-4">
                                            <a href="page-knowledge-categories.html">
                                                <i class="ft-alert-circle"></i>
                                                <h5 class="mt-2">Disputes & Fraud</h5>
                                                <p class="m-0 text-muted">But students more often neglect fact it is much more</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 kb-no-content d-none">
                                <div class="card bg-transparent shadow-none">
                                    <div class="card-content">
                                        <div class="card-body text-center">
                                            <p class="m-0 d-flex justify-content-center align-items-center">
                                                <i class="ft-alert-circle font-medium-2 mr-1"></i>
                                                <span>No result found</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Knowledge base content ends -->
                </section>

            </div>
        </div>
        <!-- END : End Main Content-->

        <!-- BEGIN : Footer-->
        <footer class="footer undefined undefined">
            <p class="clearfix text-muted m-0"><span>Copyright &copy; 2020 &nbsp;</span><a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" id="pixinventLink" target="_blank">PIXINVENT</a><span class="d-none d-sm-inline-block">, All rights reserved.</span></p>
        </footer>
        <!-- End : Footer-->
        <!-- Scroll to top button -->
        <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>

    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- START Notification Sidebar-->
<aside class="notification-sidebar d-none d-sm-none d-md-block" id="notification-sidebar"><a class="notification-sidebar-close"><i class="ft-x font-medium-3 grey darken-1"></i></a>
    <div class="side-nav notification-sidebar-content">
        <div class="row">
            <div class="col-12 notification-nav-tabs">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="activity-tab" href="#activity-tab" aria-expanded="true">Activity</a></li>
                    <li class="nav-item"><a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="settings-tab" href="#settings-tab" aria-expanded="false">Settings</a></li>
                </ul>
            </div>
            <div class="col-12 notification-tab-content">
                <div class="tab-content">
                    <div class="row tab-pane active" id="activity-tab" role="tabpanel" aria-expanded="true" aria-labelledby="base-tab1">
                        <div class="col-12" id="activity">
                            <h5 class="my-2 text-bold-500">System Logs</h5>
                            <div class="timeline-left timeline-wrapper mb-3" id="timeline-1">
                                <ul class="timeline">
                                    <li class="timeline-line mt-4"></li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-download primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>New Update Available</span><span class="float-right grey font-italic font-small-2">1 min ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Android Pie 9.0.0_r52v availabe (658MB).</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Download Now!</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><img class="avatar" src="../../../app-assets/img/portrait/small/avatar-s-15.png" alt="avatar" width="40"></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Reminder!</span><span class="float-right grey font-italic font-small-2">52 min ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Your meeting is scheduled with Mr. Derrick Walters at 16:00.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Snooze</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><img class="avatar" src="../../../app-assets/img/portrait/small/avatar-s-16.png" alt="avatar" width="40"></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Recieved a File</span><span class="float-right grey font-italic font-small-2">4 hours ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Christina Rogers sent you a file for the next conference.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><img src="../../../app-assets/img/icons/sketch-mac-icon.png" alt="icon" width="20"><span class="text-bold-500 ml-2">Diamond.sketch</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-mic primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Voice Message</span><span class="float-right grey font-italic font-small-2">10 hours ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Natalya Parker sent you a voice message.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Listen</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-cloud-drizzle primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Weather Update</span><span class="float-right grey font-italic font-small-2">Yesterday</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Hi John! It is a rainy day with 16&deg;C.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <h5 class="my-2 text-bold-500">Applications Logs</h5>
                            <div class="timeline-left timeline-wrapper" id="timeline-2">
                                <ul class="timeline">
                                    <li class="timeline-line mt-4"></li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><img class="avatar" src="../../../app-assets/img/portrait/small/avatar-s-26.png" alt="avatar" width="40"></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Gmail</span><span class="float-right grey font-italic font-small-2">Just now</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Victoria Hampton sent you a mail and has a file attachment with it.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><img src="../../../app-assets/img/icons/pdf.png" alt="pdf icon" width="20"><span class="text-bold-500 ml-2">Register.pdf</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-droplet primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>MakeMyTrip</span><span class="float-right grey font-italic font-small-2">7 hours ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">Your next flight for San Francisco will be on 24th March.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Important</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><img class="avatar" src="../../../app-assets/img/portrait/small/avatar-s-23.png" alt="avatar" width="40"></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>CNN</span><span class="float-right grey font-italic font-small-2">16 hours ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">U.S. investigating report says email account linked to CIA Director was hacked.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Read full article</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-map primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Maps</span><span class="float-right grey font-italic font-small-2">Yesterday</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">You visited Walmart Supercenter in Chicago.</p>
                                            <div class="notification-note">
                                                <div class="p-1 pl-2"><span class="text-bold-500">Write a Review!</span></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="timeline-item">
                                        <div class="timeline-badge"><span class="bg-primary bg-lighten-4" data-toggle="tooltip" data-placement="right" title="Portfolio project work"><i class="ft-package primary"></i></span></div>
                                        <div class="activity-list-text">
                                            <h6 class="mb-1"><span>Updates Available</span><span class="float-right grey font-italic font-small-2">2 days ago</span></h6>
                                            <p class="mt-0 mb-2 font-small-3">19 app updates found.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row tab-pane" id="settings-tab" aria-labelledby="base-tab2">
                        <div class="col-12" id="settings">
                            <h5 class="mt-2 mb-3">General Settings</h5>
                            <ul class="list-unstyled mb-0 mx-2">
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Notifications</span>
                                        <div class="float-right">
                                            <div class="custom-switch">
                                                <input class="custom-control-input" id="noti-s-switch-1" type="checkbox">
                                                <label class="custom-control-label" for="noti-s-switch-1"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Use switches when looking for yes or no answers.</p>
                                </li>
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Show recent activity</span>
                                        <div class="float-right">
                                            <div class="checkbox">
                                                <input id="noti-s-checkbox-1" type="checkbox" checked>
                                                <label for="noti-s-checkbox-1"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">The "for" attribute is necessary to bind checkbox with the input.</p>
                                </li>
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Product Update</span>
                                        <div class="float-right">
                                            <div class="custom-switch">
                                                <input class="custom-control-input" id="noti-s-switch-4" type="checkbox" checked>
                                                <label class="custom-control-label" for="noti-s-switch-4"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Message and mail me on weekly product updates.</p>
                                </li>
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Email on Follow</span>
                                        <div class="float-right">
                                            <div class="custom-switch">
                                                <input class="custom-control-input" id="noti-s-switch-3" type="checkbox">
                                                <label class="custom-control-label" for="noti-s-switch-3"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Mail me when someone follows me.</p>
                                </li>
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Announcements</span>
                                        <div class="float-right">
                                            <div class="checkbox">
                                                <input id="noti-s-checkbox-2" type="checkbox" checked>
                                                <label for="noti-s-checkbox-2"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Receive all the news and announcements from my clients.</p>
                                </li>
                                <li class="mb-3">
                                    <div class="mb-1"><span class="text-bold-500">Date and Time</span>
                                        <div class="float-right">
                                            <div class="checkbox">
                                                <input id="noti-s-checkbox-3" type="checkbox">
                                                <label for="noti-s-checkbox-3"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Show date and time on top of every page.</p>
                                </li>
                                <li>
                                    <div class="mb-1"><span class="text-bold-500">Email on Comments</span>
                                        <div class="float-right">
                                            <div class="custom-switch">
                                                <input class="custom-control-input" id="noti-s-switch-2" type="checkbox" checked>
                                                <label class="custom-control-label" for="noti-s-switch-2"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="font-small-3 m-0">Mail me when someone comments on my article.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<!-- END Notification Sidebar-->
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<!-- BEGIN VENDOR JS-->
<script src="../../../app-assets/vendors/js/vendors.min.js"></script>
<script src="../../../app-assets/vendors/js/switchery.min.js"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN APEX JS-->
<script src="../../../app-assets/js/core/app-menu.js"></script>
<script src="../../../app-assets/js/core/app.js"></script>
<script src="../../../app-assets/js/notification-sidebar.js"></script>
<script src="../../../app-assets/js/customizer.js"></script>
<script src="../../../app-assets/js/scroll-top.js"></script>
<!-- END APEX JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="../../../app-assets/js/page-knowledge.js"></script>
<!-- END PAGE LEVEL JS-->
<!-- BEGIN: Custom CSS-->
<script src="../../../assets/js/scripts.js"></script>
<!-- END: Custom CSS-->
</body>
<?php
include "partials/footer.php";
?>
</body>
<!-- END : Body-->
