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


                                        <h1>Bedrijf Info</h1>
                                        <div class="tab-pane active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                            <hr class="mt-1 mt-sm-2">
                                            <form class=" form " id="formSettings" method="post">
                                                <div class="form-body"><h6 class="mt-3"><i
                                                            class="ft-eye mr-2"></i>Over <?= $rowC["name"]; ?>
                                                    </h6>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="bedrijfsnaam"
                                                                       class="sr-only">Bedrijfsnaam</label>
                                                                <input type="text" id="bedrijfsnaam"
                                                                       class="form-control"
                                                                       placeholder="Bedrijfsnaam"
                                                                       name="name"
                                                                       value="<?= $rowC["name"]; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="huisnummer"
                                                                       class="sr-only">Huisnummer</label>
                                                                <input type="text" id="huisnummer"
                                                                       class="form-control"
                                                                       placeholder="Huisnummer"
                                                                       name="huisnummer"
                                                                       value="<?=$rowC['housenumber']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="toevoeging"
                                                                       class="sr-only">Toevoeging</label>
                                                                <input type="text" id="toevoeging"
                                                                       class="form-control"
                                                                       placeholder="Toevoeging"
                                                                       name="toevoeging"
                                                                       value="<?=$rowC['housenumberAddition']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="adres"
                                                                       class="sr-only">Adres</label>
                                                                <input type="text" id="adres"
                                                                       class="form-control"
                                                                       placeholder="Adres"
                                                                       name="street"
                                                                       value="<?=$rowC['street']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="postcode"
                                                                       class="sr-only">Postcode</label>
                                                                <input type="text" id="postcode"
                                                                       class="form-control"
                                                                       placeholder="Postcode"
                                                                       name="postcode"
                                                                       value="<?=$rowC['postalcode']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="plaats" class="sr-only">Plaats</label>
                                                                <input class="form-control"
                                                                       type="text"
                                                                       placeholder="Plaats"
                                                                       id="plaats" name="plaats">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="mobiel"
                                                                       class="sr-only">Mobiel</label>
                                                                <input type="text" id="mobiel"
                                                                       class="form-control"
                                                                       placeholder="Mobiel"
                                                                       name="mobiel"
                                                                       value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="telefoon"
                                                                       class="sr-only">Telefoon</label>
                                                                <input type="text" id="telefoon"
                                                                       class="form-control"
                                                                       placeholder="Telefoon"
                                                                       name="telefoon"
                                                                       value="<?=$rowC['phoneNumber']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="website"
                                                                       class="sr-only">Website</label>
                                                                <input type="text" id="website"
                                                                       class="form-control"
                                                                       placeholder="Website"
                                                                       name="website"
                                                                       value="<?=$rowC['website']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email"
                                                                       class="sr-only">Email</label>
                                                                <input type="text" id="email"
                                                                       class="form-control"
                                                                       placeholder="Email"
                                                                       name="email"
                                                                       value="<?=$rowC['email']?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="btw"
                                                                       class="sr-only">BTW
                                                                    Nummer</label>
                                                                <input type="text" id="btw"
                                                                       class="form-control"
                                                                       placeholder="BTW Nummer"
                                                                       name="btw">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="kvk" class="sr-only">KVK
                                                                    Nummer</label>
                                                                <input class="form-control"
                                                                       type="text"
                                                                       placeholder="KVK Nummer"
                                                                       id="kvk">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="bic"
                                                                       class="sr-only">BIC</label>
                                                                <input class="form-control"
                                                                       type="text"
                                                                       placeholder="BIC"
                                                                       id="bic">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="iban"
                                                                       class="sr-only">IBAN
                                                                    Nummer</label>
                                                                <input class="form-control"
                                                                       type="text"
                                                                       placeholder="IBAN Nummer"
                                                                       id="iban">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="float-right">
                                                        <button type="button" name="bijwerken"
                                                                class="btn btn-primary confirm-text ">Opslaan <i
                                                                class="ft-check"></i>
                                                        </button>
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