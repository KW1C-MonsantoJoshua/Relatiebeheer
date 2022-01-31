<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->
<style>
    body { padding-top:30px; }
    .widget .panel-body { padding:0px; }
    .widget .list-group { margin-bottom: 0; }
    .widget .panel-title { display:inline }
    .widget .label-info { float: right; }
    .widget li.list-group-item {border-radius: 0;border: 0;border-top: 1px solid #ddd;}
    .widget li.list-group-item:hover { background-color: rgba(86,61,124,.1); }
    .widget .mic-info { color: #666666;font-size: 11px; }
    .widget .action { margin-top:5px; }
    .widget .comment-text { font-size: 12px; }
    .widget .btn-block { border-top-left-radius:0px;border-top-right-radius:0px; }
</style>



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
UpdateCompanyInfo();
$rowC = GetCompanyInfo();


?>
<!DOCTYPE html>
<html class="loading" lang="en">
<style>
    .sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
    }
</style>
<!-- BEGIN : Head-->

<?php
include "partials/header.php";
?>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 2-columns  navbar-static layout-dark layout-transparent bg-glass-1"
      data-bg-img="bg-glass-1" data-menu="vertical-menu" data-col="2-columns">
<?php
include "partials/navbar.php";
?>

<div class="wrapper"
">
<div class="main-panel">
    <!-- BEGIN : Main Content-->
    <div class="main-content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <!--                <div class="row">-->
            <!--                    <div class="col-12 ">-->
            <!--                        <div class="content-header">Menu</div>-->
            <!--                        <p class="content-sub-header mb-1">vrije keuze</p>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!-- Account Settings starts -->
            <div class="row justify-content-center">
                <!--                    <div class="sticky col-md-3 mt-3">-->
                <!--                        <ul class=" nav flex-column nav-pills" id="myTab" role="tablist">-->
                <!--                            <li class="nav-item">-->
                <!--                                <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">-->
                <!--                                    <i class="ft-settings mr-1 align-middle"></i>-->
                <!--                                    <span class="align-middle">Bedrijf Info</span>-->
                <!--                                </a>-->
                <!--                            </li>-->
                <!--                            <li class="nav-item">-->
                <!--                                <a class="nav-link" id="change-password-tab" data-toggle="tab" href="#change-password" role="tab" aria-controls="change-password" aria-selected="false">-->
                <!--                                    <i class="ft-lock mr-1 align-middle"></i>-->
                <!--                                    <span class="align-middle">Notities</span>-->
                <!--                                </a>-->
                <!--                            </li>-->
                <!--                            <li class="nav-item">-->
                <!--                                <a class="nav-link" id="notifications-tab" data-toggle="tab" href="#notifications" role="tab" aria-controls="notifications" aria-selected="false">-->
                <!--                                    <i class="ft-bell mr-1 align-middle"></i>-->
                <!--                                    <span class="align-middle">Abonnementen</span>-->
                <!--                                </a>-->
                <!--                            </li>-->
                <!--                        </ul>-->
                <!--                    </div>-->
                <div class="col-md-9">
                    <!-- Tab panes -->
                    </br>
                    <!-- Tab panes -->
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- General Tab -->
                                    <h1>Notities niffo</h1>
                                    <div class="tab-pane active" id="general2" role="tabpanel"
                                         aria-labelledby="general-tab">
                                        <hr class="mt-1 mt-sm-2">
                                        <form method="post">
                                            <div class="row">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="panel panel-default widget">
                                                            <div class="panel-heading">
                                                                <span class="glyphicon glyphicon-comment"></span>
                                                                <h3 class="panel-title">
                                                                    Recent Comments</h3>
                                                                <span class="label label-info">
                    78</span>
                                                            </div>
                                                            <div class="panel-body">
                                                                <ul class="list-group">
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col-xs-2 col-md-1">
                                                                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                                                                            <div class="col-xs-10 col-md-11">
                                                                                <div>
                                                                                    <a href="http://www.jquery2dotnet.com/2013/10/google-style-login-page-desing-usign.html">
                                                                                        Google Style Login Page Design Using Bootstrap</a>
                                                                                    <div class="mic-info">
                                                                                        By: <a href="#">Bhaumik Patel</a> on 2 Aug 2013
                                                                                    </div>
                                                                                </div>
                                                                                <div class="comment-text">
                                                                                    Awesome design
                                                                                </div>
                                                                                <div class="action">
                                                                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                                                    </button>
                                                                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                                                                        <span class="glyphicon glyphicon-ok"></span>
                                                                                    </button>
                                                                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                                                                        <span class="glyphicon glyphicon-trash"></span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col-xs-2 col-md-1">
                                                                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                                                                            <div class="col-xs-10 col-md-11">
                                                                                <div>
                                                                                    <a href="http://bootsnipp.com/BhaumikPatel/snippets/Obgj">Admin Panel Quick Shortcuts</a>
                                                                                    <div class="mic-info">
                                                                                        By: <a href="#">Bhaumik Patel</a> on 11 Nov 2013
                                                                                    </div>
                                                                                </div>
                                                                                <div class="comment-text">
                                                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                                                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim
                                                                                </div>
                                                                                <div class="action">
                                                                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                                                    </button>
                                                                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                                                                        <span class="glyphicon glyphicon-ok"></span>
                                                                                    </button>
                                                                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                                                                        <span class="glyphicon glyphicon-trash"></span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <div class="row">
                                                                            <div class="col-xs-2 col-md-1">
                                                                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                                                                            <div class="col-xs-10 col-md-11">
                                                                                <div>
                                                                                    <a href="http://bootsnipp.com/BhaumikPatel/snippets/4ldn">Cool Sign Up</a>
                                                                                    <div class="mic-info">
                                                                                        By: <a href="#">Bhaumik Patel</a> on 11 Nov 2013
                                                                                    </div>
                                                                                </div>
                                                                                <div class="comment-text">
                                                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                                                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim
                                                                                </div>
                                                                                <div class="action">
                                                                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                                                    </button>
                                                                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                                                                        <span class="glyphicon glyphicon-ok"></span>
                                                                                    </button>
                                                                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                                                                        <span class="glyphicon glyphicon-trash"></span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </br>
                                            </br>
                                            <div class="modal-footer">
                                                <button type="reset"
                                                        data-dismiss="modal"
                                                        class="btn btn-secondary">Cancell
                                                </button>
                                                <input type="submit"
                                                       class="btn btn-primary mb-2 mb-sm-0 mr-sm-2"
                                                       name="registreerParticulier"
                                                       value="Relatie Toevoegen">

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    </br>

                    <!-- Tab panes -->
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- General Tab -->
                                    <h1>Abonnementen</h1>
                                    <div class="tab-pane active" id="general" role="tabpanel"
                                         aria-labelledby="general-tab">
                                        <hr class="mt-1 mt-sm-2">
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h4>Klantgegevenss</h4>
                                                        <div class="controls">
                                                            <label for="bedrijfsnaam"
                                                                   class="sr-only">Bedrijfsnaamm</label>
                                                            <input type="text" id="bedrijfsnaam"
                                                                   class="form-control"
                                                                   placeholder="Bedrijfsnaam"
                                                                   name="name"
                                                                   value="">
                                                        </div>
                                                        </br>
                                                        <div class="controls">
                                                            <label for="bedrijfsnaam"
                                                                   class="sr-only">Bedrijfsnaamm</label>
                                                            <input type="text" id="bedrijfsnaam"
                                                                   class="form-control"
                                                                   placeholder="Bedrijfsnaam"
                                                                   name="name"
                                                                   value="">
                                                        </div>
                                                        </br>
                                                        <div class="controls">
                                                            <label for="users-edit-username">Tussenvoegsel</label>
                                                            <input type="text" id="users-edit-username"
                                                                   class="form-control round"
                                                                   pattern="[a-zA-Z]{1,10}"
                                                                   title="Alleen letters"
                                                                   placeholder="Tussenvoegsel"
                                                                   aria-invalid="false" name="tussenvoegsel_z">
                                                        </div>
                                                        </br>
                                                        <div class="controls">
                                                            <label for="achternaam">Achternaamm</label>
                                                            <input type="text" id="achternaam"
                                                                   class="form-control round"
                                                                   pattern="[a-zA-Z]{1,10}"
                                                                   title="Alleen letters"
                                                                   placeholder="Achternaam" required
                                                                   aria-invalid="false" name="achternaam_z">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h4>Adresgegevens</h4>
                                                        <div class="controls">
                                                            <label for="bedrijfsnaam"
                                                                   class="sr-only">Bedrijfsnaamm</label>
                                                            <input type="text" id="bedrijfsnaam"
                                                                   class="form-control"
                                                                   placeholder="Bedrijfsnaam"
                                                                   name="name"
                                                                   value="">
                                                        </div>
                                                        </br>
                                                        <div class="form-group row">
                                                            <div class="controls col-md-6">
                                                                <label for="huisnummer">Huisnummer</label>
                                                                <input type="text" id="huisnr_z"
                                                                       class="form-control round"
                                                                       pattern="[0-9]{1,4}"
                                                                       title="Alleen cijfers"
                                                                       placeholder="Huisnummer" required
                                                                       aria-invalid="false" name="huisnummer_z"
                                                                       onkeyup="check_pc(&quot;huisnr&quot;,this.value)">

                                                            </div>
                                                            <div class="controls col-md-6">
                                                                <label for="users-edit-username">toevoeging</label>
                                                                <input type="text" id="toevoeging_z"
                                                                       class="form-control round"
                                                                       pattern="[a-zA-Z]{1,4}"
                                                                       placeholder="toevoeging"
                                                                       aria-invalid="false"
                                                                       name="huisnummertoevoeging_z"
                                                                       onkeyup="check_pc(&quot;toevoeging&quot;,this.value)">
                                                            </div>
                                                        </div>
                                                        <div class="controls ">
                                                            <label for="straatnaam">Straatnaam</label>
                                                            <input type="text" id="straat_z"
                                                                   class="form-control round"
                                                                   placeholder="Straatnaam" required
                                                                   aria-invalid="false" name="straatnaam_z">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </br>
                                            </br>
                                            <div class="modal-footer">
                                                <button type="reset"
                                                        data-dismiss="modal"
                                                        class="btn btn-secondary">Cancel
                                                </button>
                                                <input type="submit"
                                                       class="btn btn-primary mb-2 mb-sm-0 mr-sm-2"
                                                       name="registreerParticulier"
                                                       value="Relatie Toevoegen">

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Notification Sidebar-->
            <div class="sidenav-overlay"></div>
            <div class="drag-target"></div>


</body>

<?php
qron();
qroff();
include "partials/footer.php";
?>
<!-- END : Body-->
</html>