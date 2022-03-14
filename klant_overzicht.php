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
                                        <div style="padding: 0 !important;" class="card-body text-center p-md-5">
                                            <h1 class="mb-2 kb-title">How can we help you today?</h1>
                                            <p class="mb-4">Algolia helps businesses across industries quickly create relevant, scalable, and lightning fast search and discovery experiences.</p>
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
        <!-- End : Footer-->
        <!-- Scroll to top button -->
        <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>

    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
</body>
<?php
include "partials/footer.php";
?>
</body>
<!-- END : Body-->
