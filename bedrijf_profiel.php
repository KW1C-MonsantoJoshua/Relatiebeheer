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
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- General Tab -->
                                    <h1>Bedrijf Info</h1>
                                    <div class="tab-pane active" id="general1" role="tabpanel"
                                         aria-labelledby="general-tab">
                                        <hr class="mt-1 mt-sm-2">
                                        <form method="post" id="Instellingen">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h4>Gegevens 1</h4>
                                                        <div class="form-group">
                                                            <label for="bedrijfsnaam"
                                                                   class="sr-only">Bedrijfsnaamm</label>
                                                            <input type="text" id="bedrijfsnaam"
                                                                   class="form-control"
                                                                   placeholder="Bedrijfsnaam"
                                                                   name="name"
                                                                   value="<?= $rowC["name"]; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="telefoon"
                                                                   class="sr-only">Telefoon</label>
                                                            <input type="text" id="telefoon"
                                                                   class="form-control"
                                                                   placeholder="Telefoon"
                                                                   name="telefoon"
                                                                   value="<?= $rowC['phoneNumber'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email"
                                                                   class="sr-only">Email</label>
                                                            <input type="text" id="email"
                                                                   class="form-control"
                                                                   placeholder="Email"
                                                                   name="email"
                                                                   value="<?= $rowC['email'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="postcode"
                                                                   class="sr-only">Postcode</label>
                                                            <input type="text" id="postcode"
                                                                   class="form-control"
                                                                   placeholder="Postcode"
                                                                   name="postcode"
                                                                   value="<?= $rowC['postalcode'] ?>">
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="controls col-md-6">
                                                                <label for="huisnummer"
                                                                       class="sr-only">Huisnummer</label>
                                                                <input type="text" id="huisnummer"
                                                                       class="form-control"
                                                                       placeholder="Huisnummer"
                                                                       name="huisnummer"
                                                                       value="<?= $rowC['housenumber'] ?>">
                                                            </div>
                                                            <div class="controls col-md-6">
                                                                <label for="toevoeging"
                                                                       class="sr-only">Toevoeging</label>
                                                                <input type="text" id="toevoeging"
                                                                       class="form-control"
                                                                       placeholder="Toevoeging"
                                                                       name="toevoeging"
                                                                       value="<?= $rowC['housenumberAddition'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="adres"
                                                                   class="sr-only">Adres</label>
                                                            <input type="text" id="adres"
                                                                   class="form-control"
                                                                   placeholder="Adres"
                                                                   name="street"
                                                                   value="<?= $rowC['street'] ?>">
                                                        </div>
                                                        </br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h4>Gegevens 2</h4>
                                                        <div class="form-group">
                                                            <label for="btw"
                                                                   class="sr-only">BTW
                                                                Nummer</label>
                                                            <input type="text" id="btw"
                                                                   class="form-control"
                                                                   placeholder="BTW Nummer"
                                                                   name="btw"
                                                                   value="<?= $rowC['btw_nummer'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="bic"
                                                                   class="sr-only">BIC</label>
                                                            <input class="form-control"
                                                                   type="text"
                                                                   name="bic"
                                                                   placeholder="BIC"
                                                                   id="bic">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kvk"
                                                                   class="sr-only">KVK
                                                                Nummer</label>
                                                            <input class="form-control"
                                                                   type="text"
                                                                   placeholder="KVK Nummer"
                                                                   id="kvk"
                                                                   name="kvk"
                                                                   value="<?= $rowC['kvk_nummer'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="iban"
                                                                   class="sr-only">IBAN
                                                                Nummer</label>
                                                            <input class="form-control"
                                                                   type="text"
                                                                   placeholder="IBAN Nummer"
                                                                   id="iban"
                                                                   name="iban"
                                                                   value="<?= $rowC['iban_nummer'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="reset"
                                                        data-dismiss="modal"
                                                        class="btn btn-secondary">Annuleren
                                                </button>
                                                <input type="button"
                                                       class="btn btn-primary confirm-text"
                                                       name="SaveCompanySettings"
                                                       value="Opslaan">
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
                                    <h1>Notities niffo</h1>
                                    <div class="tab-pane active" id="general2" role="tabpanel"
                                         aria-labelledby="general-tab">
                                        <hr class="mt-1 mt-sm-2">
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h4>Klantgegevenss</h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h4>Adresgegevens</h4>
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