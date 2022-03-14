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

<div class="main-panel">
    <!-- BEGIN : Main Content-->
    <div class="main-content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?php GetCompanyName();?></h4>

                            <ul class="breadcrumb bg-transparent">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="bedrijfs_overzicht.php">CRM Relaties</a></li>
                                <!--                                <li class="breadcrumb-item">--><?php
                                //                                    $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
                                //                                    foreach($crumbs as $crumb){
                                //                                        echo ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');
                                //                                    }
                                //                                    ?><!--</li>-->
                            </ul>
                        </div>

                        <div class="card-content">
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END : End Main Content-->

    <!-- Scroll to top button -->
    <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<?php
include "partials/footer.php";
?>
</body>
<!-- END : Body-->
