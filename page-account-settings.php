<?php
include "backend/functions.php";


$user = $_SESSION['name'];
$secret = $_SESSION['secret'];
$id = $_SESSION['id'];
require_once 'PHPGangsta/GoogleAuthenticator.php';
$ga = new PHPGangsta_GoogleAuthenticator();

// Controleer of iemand ingelogd is
if (!isset($_SESSION["loggedin"])) {
    header("Location: index.php");
}
Changepassword();
Updateuser();
UploadPic1();
$row = Getuser();


?>
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<?php
include"partials/header.php";	
?>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 2-columns  navbar-static layout-dark layout-transparent bg-glass-1" data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">
<?php	
	include "partials/navbar.php";
?>
    <div class="wrapper">
        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="content-header">Account Settings</div>
                            <p class="content-sub-header mb-1">Pas uw gegevens aan</p>
                        </div>
                    </div>
                    <!-- Account Settings starts -->
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <!-- Nav tabs -->
                            <ul class="nav flex-column nav-pills" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">
                                        <i class="ft-settings mr-1 align-middle"></i>
                                        <span class="align-middle">General</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="change-password-tab" data-toggle="tab" href="#change-password" role="tab" aria-controls="change-password" aria-selected="false">
                                        <i class="ft-lock mr-1 align-middle"></i>
                                        <span class="align-middle">Wachtwoord veranderen</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="connections-tab" data-toggle="tab" href="#connections" role="tab" aria-controls="connections" aria-selected="false">
                                        <i class="ft-link mr-1 align-middle"></i>
                                        <span class="align-middle">Extra beveiliging</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="notifications-tab" data-toggle="tab" href="#notifications" role="tab" aria-controls="notifications" aria-selected="false">
                                        <i class="ft-bell mr-1 align-middle"></i>
                                        <span class="align-middle">Accountinstellingen</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <!-- Tab panes -->
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <!-- General Tab -->
                                            <div class="tab-pane active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                                <div class="media">
                                                    <img src="uploads/<?=$row['image_url']?>" alt="profile-img" class="rounded mr-3" height="64" width="64">
                                                    <div class="media-body">
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-start px-0 mb-sm-2">
<form action="page-account-settings.php" method="post" enctype="multipart/form-data">
<input type="file" name="my_image" type="button" class="btn btn-sm btn-primary mb-1 mb-sm-0">
    <input type="submit" class="btn btn-sm btn-primary mb-1 mb-sm-0" name="submitpic" value="Upload">
</form>
                                                        </div>
                                                        <p class="text-muted mb-0 mt-1 mt-sm-0">
                                                            <small>Allowed JPG, GIF or PNG. Max size of 800kB</small>
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr class="mt-1 mt-sm-2">
                                                <form method="post" action="page-account-settings.php">
                                                    <div class="row">
                                                        <div class="col-12 form-group">
                                                            <label for="username">Username</label>
                                                            <div class="controls">
                                                                <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?php echo $row['username']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 form-group">
                                                            <label for="name">Name</label>
                                                            <div class="controls">
                                                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="<?php echo $row['name']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 form-group">
                                                            <label for="name">E-mail</label>
                                                            <div class="controls">
                                                                <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" value="<?php echo $row['email']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 form-group">
                                                            <div class="controls">
                                                                <input type="hidden" id="email" name=email"" class="form-control" placeholder="E-mail" value="<?php echo $row['email']; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="alert bg-light-warning alert-dismissible mb-2">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                                                                </button>
                                                                <p class="mb-0">Your email is not confirmed. Please check your inbox.</p>
                                                                <a href="javascript:;" class="alert-link">Resend confirmation</a>
                                                            </div>
                                                        </div>
														<div style="color: red" class="error-message"><?php
														if ($_SERVER['REQUEST_METHOD'] === 'POST') {
															if (isset($error)) {
																echo $error;
															}
														}
														?>
													</div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" name="save" class="btn btn-primary mr-sm-2 mb-1">Save Changes</button>
															<a href="<?php if ($_SESSION['memb_of'] == 0) {
                            echo "../bedrijfs_overzicht.php?";
                        } else {
                            if (isset($_SESSION['auth']) && isset($_SESSION['memb_of'])) {
                                if ($_SESSION['auth'] == "Werknemer") {
                                   echo "klanten_overzicht.php?custof=$memb_of&membof=$memb_of";
                                } else {
                                   echo "bedrijfs_klanten_overzicht.php?custof=$memb_of&membof=$memb_of";
                                }
                            }
                        } ?>" class="btn btn-secondary mb-1">
                                                                    Cancel
                                                                </a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Change Password Tab -->
                                            <div class="tab-pane" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                                                <form method="post">
                                                    <div class="form-group">
                                                        <label for="old-password">Old Password</label>
                                                        <div class="controls">
                                                            <input type="password" name="old-password" id="old-password" class="form-control" placeholder="Old Password" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="new-password">New Password</label>
                                                        <div class="controls">
                                                            <input type="password" name="new-password" id="new-password" class="form-control" placeholder="New Password" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="retype-new-password">Retype New Password</label>
                                                        <div class="controls">
                                                            <input type="password" name="retype-new-password" id="retype-new-password" class="form-control" placeholder="New Password" required>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-sm-row flex-column justify-content-end">
                                                        <button name="save_password" type="submit" class="btn btn-primary mr-sm-2 mb-1">Save Changes</button>
                                                        <button type="reset" class="btn btn-secondary mb-1">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Connections Tab -->
                                            <div class="tab-pane" id="connections" role="tabpanel" aria-labelledby="connections-tab">
                                                <form method="post">
                                                    <div class="row">
														<div class='d-flex flex-column align-items-center text-center'>
															<?php
																if (strlen($secret) > 5) {
																	echo "<div><h2>Qr code is al ingesteld</h2></div>";
																}
																?>
																<?php
																if ($secret == "") {
																	$secret = $ga->createSecret();
																}
																//echo $secret	
																?>
																														<input hidden name='secret' value='<?php echo $secret ?>'>

																<img src='<?php
																	$qrCodeUrl = $ga->getQRCodeGoogleUrl($user, $secret);
																	echo $qrCodeUrl;
																?>'/>
														</div>
														 <div>
                                                            <h2>Google Two Factor Authentication</h2>
                                                            <p>Get Google Authenticator on your phone</p>
                                                            <ul>
                                                                <li><a class='btn btn-block btn-social' href='https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en' target='_blank'>
                                                                        <img src='img/android.png'>
                                                                    </a></li>
                                                                <li> <a class='btn btn-block btn-social' href='https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8' target='_blank'>
                                                                        <img src='img/iphone.png'>
                                                                    </a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
															<button type='submit' name='set' class='btn btn-primary mr-sm-2 mb-1'>On</button>
                                        					<button type='submit' name='del' class='btn btn-secondary mb-1'>Off</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Notifications Tab -->
                                            <div class="tab-pane" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                                                <div class="row">
                                                    <h6 class="col-12 text-bold-400 pl-0">Activity</h6>
                                                    <div class="col-12 mb-2">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input id="switch1" type="checkbox" class="custom-control-input" checked>
                                                            <label for="switch1" class="custom-control-label">Email me when someone comments on my
                                                                article</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input id="switch2" type="checkbox" class="custom-control-input" checked>
                                                            <label for="switch2" class="custom-control-label">Email me when someone answers on my form</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input id="switch3" type="checkbox" class="custom-control-input" disabled>
                                                            <label for="switch3" class="custom-control-label">Email me when someone follows me</label>
                                                        </div>
                                                    </div>
                                                    <h6 class="col-12 text-bold-400 pl-0 mt-3">Application</h6>
                                                    <div class="col-12 mb-2">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input id="switch4" type="checkbox" class="custom-control-input" checked>
                                                            <label for="switch4" class="custom-control-label">News and announcements</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input id="switch5" type="checkbox" class="custom-control-input" disabled>
                                                            <label for="switch5" class="custom-control-label">Weekly product updates</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input id="switch6" type="checkbox" class="custom-control-input" checked>
                                                            <label for="switch6" class="custom-control-label">Weekly blog digest</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="button" class="btn btn-primary mr-sm-2 mb-1">Save changes</button>
                                                        <button type="button" class="btn btn-secondary mb-1">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Account Settings ends -->
                </div>
            </div>
            <!-- END : End Main Content-->

            <!-- BEGIN : Footer-->
          
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
<?php
qron();
qroff();
include "partials/footer.php";
?>
</body>
<!-- END : Body-->
</html>