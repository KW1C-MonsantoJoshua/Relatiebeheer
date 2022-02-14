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
InsertNotes();


?>
<!DOCTYPE html>
<html class="loading" lang="en">
<style>
    .navbar-nav {
        width: 100%
    }

    @media(min-width:568px) {
        .end {
            margin-left: auto
        }
    }

    @media(max-width:768px) {
        #post {
            width: 100%
        }
    }

    #clicked {
        padding-top: 1px;
        padding-bottom: 1px;
        text-align: center;
        width: 100%;
        background-color: #ecb21f;
        border-color: #a88734 #9c7e31 #846a29;
        color: black;
        border-width: 1px;
        border-style: solid;
        border-radius: 13px
    }

    #profile {
        background-color: unset
    }

    #post {
        margin: 10px;
        padding: 6px;
        padding-top: 2px;
        padding-bottom: 2px;
        text-align: center;
        background-color: #ecb21f;
        border-color: #a88734 #9c7e31 #846a29;
        color: black;
        border-width: 1px;
        border-style: solid;
        border-radius: 13px;
        width: 50%
    }

    body {
        background-color: black
    }

    #nav-items li a,
    #profile {
        text-decoration: none;
        color: rgb(224, 219, 219);
        background-color: black
    }

    .comments {
        margin-top: 5%;
        margin-left: 20px
    }

    .darker {
        border: 1px solid #ecb21f;
        background-color: black;
        float: right;
        border-radius: 5px;
        padding-left: 40px;
        padding-right: 30px;
        padding-top: 10px
    }

    .comment {
        border: 1px solid transparent;
        float: left;
        border-radius: 5px;
        padding-left: 40px;
        padding-right: 30px;
        padding-top: 10px
    }

    .comment h4,
    .comment span,
    .darker h4,
    .darker span {
        display: inline
    }

    .comment p,
    .comment span,
    .darker p,
    .darker span {
        color: white;
    }

    h1,
    h4 {
        color: white;
        font-weight: bold
    }

    label {
        color: rgb(212, 208, 208)
    }

    #align-form {
        margin-top: 20px
    }

    .form-group p a {
        color: white
    }

    #checkbx {
        background-color: black
    }

    #darker img {
        margin-right: 15px;
        position: static
    }

    .widget .panel-body {
        padding: 0
    }

    .widget .list-group {
        margin-bottom: 0
    }

    .widget .panel-title {
        display: inline
    }

    .widget .label-info {
        float: right
    }
    html body.layout-dark.layout-transparent .list-group .list-group-item {
        border-color: black!important;
    }
    .widget li.list-group-item {
        border-radius: 0;
        border: 0;
        border-top: 1px solid #ddd
    }

    .widget li.list-group-item:hover {
        background-color: rgba(86, 61, 124, .1)
    }

    .widget .mic-info {
        color: #666;
        font-size: 15px
    }

    .widget .action {
        margin-top: 5px
    }

    .widget .comment-text {
        font-size: 12px;
        color: black;
    }

    .widget .btn-block {
        border-top-left-radius: 0;
        border-top-right-radius: 0
    }

    [hidden] {
        display: none
    }

    html {
        font-family: sans-serif;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%
    }

    body {
        margin: 0
    }

    a:focus {
        outline: thin dotted
    }

    a:active, a:hover {
        outline: 0
    }

    h1 {
        margin: .67em 0;
        font-size: 2em
    }

    img {
        border: 0
    }

    button {
        margin: 0;
        font-family: inherit;
        font-size: 100%
    }

    button {
        line-height: normal
    }

    button {
        text-transform: none
    }

    button {
        cursor: pointer;
        -webkit-appearance: button
    }

    button[disabled] {
        cursor: default
    }

    button::-moz-focus-inner {
        padding: 0;
        border: 0
    }

    @media print {
        * {
            color: #000 !important;
            text-shadow: none !important;
            background: 0 0 !important;
            box-shadow: none !important
        }

        a, a:visited {
            text-decoration: underline
        }

        a[href]:after {
            content: " (" attr(href) ")"
        }

        a[href^="#"]:after, a[href^="javascript:"]:after {
            content: ""
        }

        img {
            page-break-inside: avoid
        }

        img {
            max-width: 100% !important
        }

        @page {
            margin: 2cm .5cm
        }

        h2, h3 {
            orphans: 3;
            widows: 3
        }

        h2, h3 {
            page-break-after: avoid
        }

        .label {
            border: 1px solid #000
        }
    }

    *, :after, :before {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box
    }

    html {
        font-size: 62.5%;
        -webkit-tap-highlight-color: transparent
    }

    body {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 14px;
        line-height: 1.428571429;
        color: #333;
        background-color: #fff
    }

    button {
        font-family: inherit;
        font-size: inherit;
        line-height: inherit
    }

    button {
        background-image: none
    }

    a {
        color: #428bca;
        text-decoration: none
    }

    a:focus, a:hover {
        color: #2a6496;
        text-decoration: underline
    }

    a:focus {
        outline: thin dotted #333;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px
    }

    img {
        vertical-align: middle
    }

    .img-responsive {
        display: block;
        max-width: 100%;
    }

    .img-circle {
        border-radius: 50%
    }

    .text-primary {
        color: #428bca
    }

    .text-danger {
        color: #b94a48
    }

    .text-success {
        color: #468847
    }

    .text-info {
        color: #3a87ad
    }

    .text-left {
        text-align: left
    }

    .text-right {
        text-align: right
    }

    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 500;
        line-height: 1.1
    }

    h1, h2, h3 {
        margin-top: 20px;
        margin-bottom: 10px
    }

    h4, h5, h6 {
        margin-top: 10px;
        margin-bottom: 10px
    }

    .h1, h1 {
        font-size: 36px
    }

    .h2, h2 {
        font-size: 30px
    }

    .h3, h3 {
        font-size: 24px
    }

    .h4, h4 {
        font-size: 18px
    }

    .h5, h5 {
        font-size: 14px
    }

    .h6, h6 {
        font-size: 12px
    }

    ul {
        margin-top: 0;
        margin-bottom: 10px
    }

    ul ul {
        margin-bottom: 0
    }

    .list-inline {
        padding-left: 0;
        list-style: none
    }

    .list-inline > li {
        display: inline-block;
        padding-right: 5px;
        padding-left: 5px
    }

    .container1 {
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto
    }

    .container1:after, .container1:before {
        display: table;
        content: " "
    }

    .container1:after {
        clear: both
    }

    .container1:after, .container1:before {
        display: table;
        content: " "
    }

    .container1:after {
        clear: both
    }

    .row1 {
        margin-right: -15px;
        margin-left: -15px
    }

    .row1:after, .row1:before {
        display: table;
        content: " "
    }

    .row1:after {
        clear: both
    }

    .row1:after, .row1:before {
        display: table;
        content: " "
    }

    .row1:after {
        clear: both
    }

    .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px
    }

    .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
        float: left
    }

    .col-xs-1 {
        width: 8.333333333333332%
    }

    .col-xs-2 {
        width: 16.666666666666664%
    }

    .col-xs-3 {
        width: 25%
    }

    .col-xs-4 {
        width: 33.33333333333333%
    }

    .col-xs-5 {
        width: 41.66666666666667%
    }

    .col-xs-6 {
        width: 50%
    }

    .col-xs-7 {
        width: 58.333333333333336%
    }

    .col-xs-8 {
        width: 66.66666666666666%
    }

    .col-xs-9 {
        width: 75%
    }

    .col-xs-10 {
        width: 83.33333333333334%
    }

    .col-xs-11 {
        width: 91.66666666666666%
    }

    .col-xs-12 {
        width: 100%
    }

    @media (min-width: 768px) {
        .container1 {
            max-width: 750px
        }

        .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
            float: left
        }

        .col-sm-1 {
            width: 8.333333333333332%
        }

        .col-sm-2 {
            width: 16.666666666666664%
        }

        .col-sm-3 {
            width: 25%
        }

        .col-sm-4 {
            width: 33.33333333333333%
        }

        .col-sm-5 {
            width: 41.66666666666667%
        }

        .col-sm-6 {
            width: 50%
        }

        .col-sm-7 {
            width: 58.333333333333336%
        }

        .col-sm-8 {
            width: 66.66666666666666%
        }

        .col-sm-9 {
            width: 75%
        }

        .col-sm-10 {
            width: 83.33333333333334%
        }

        .col-sm-11 {
            width: 91.66666666666666%
        }

        .col-sm-12 {
            width: 100%
        }
    }

    @media (min-width: 992px) {
        .container1 {
            max-width: 970px
        }

        .col-md-1, .col-md-10, .col-md-11, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9 {
            float: left
        }

        .col-md-1 {
            width: 8.333333333333332%
        }

        .col-md-2 {
            width: 16.666666666666664%
        }

        .col-md-3 {
            width: 25%
        }

        .col-md-4 {
            width: 33.33333333333333%
        }

        .col-md-5 {
            width: 41.66666666666667%
        }

        .col-md-6 {
            width: 50%
        }

        .col-md-7 {
            width: 58.333333333333336%
        }

        .col-md-8 {
            width: 66.66666666666666%
        }

        .col-md-9 {
            width: 75%
        }

        .col-md-10 {
            width: 83.33333333333334%
        }

        .col-md-11 {
            width: 91.66666666666666%
        }

        .col-md-12 {
            width: 100%
        }
    }

    @media (min-width: 1200px) {
        .container1 {
            max-width: 1170px
        }
    }

    label {
        display: inline-block;
        margin-bottom: 5px;
        font-weight: 700
    }

    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.428571429;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        border: 1px solid transparent;
        border-radius: 4px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none
    }

    .btn:focus {
        outline: thin dotted #333;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px
    }

    .btn:focus, .btn:hover {
        color: #333;
        text-decoration: none
    }

    .btn:active {
        background-image: none;
        outline: 0;
        -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
        box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125)
    }

    .btn[disabled] {
        pointer-events: none;
        cursor: not-allowed;
        opacity: .65;
        -webkit-box-shadow: none;
        box-shadow: none
    }

    .btn-default {
        color: #333;
        background-color: #fff;
        border-color: #ccc
    }

    .btn-default:active, .btn-default:focus, .btn-default:hover {
        color: #333;
        background-color: #ebebeb;
        border-color: #adadad
    }

    .btn-default:active {
        background-image: none
    }

    .btn-default[disabled], .btn-default[disabled]:active, .btn-default[disabled]:focus, .btn-default[disabled]:hover {
        background-color: #fff;
        border-color: #ccc
    }

    .btn-primary {
        color: #fff;
        background-color: #428bca;
        border-color: #357ebd
    }

    .btn-primary:active, .btn-primary:focus, .btn-primary:hover {
        color: #fff;
        background-color: #3276b1;
        border-color: #285e8e
    }

    .btn-primary:active {
        background-image: none
    }

    .btn-primary[disabled], .btn-primary[disabled]:active, .btn-primary[disabled]:focus, .btn-primary[disabled]:hover {
        background-color: #428bca;
        border-color: #357ebd
    }

    .btn-danger {
        color: #fff;
        background-color: #d9534f;
        border-color: #d43f3a
    }

    .btn-danger:active, .btn-danger:focus, .btn-danger:hover {
        color: #fff;
        background-color: #d2322d;
        border-color: #ac2925
    }

    .btn-danger:active {
        background-image: none
    }

    .btn-danger[disabled], .btn-danger[disabled]:active, .btn-danger[disabled]:focus, .btn-danger[disabled]:hover {
        background-color: #d9534f;
        border-color: #d43f3a
    }

    .btn-success {
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c
    }

    .btn-success:active, .btn-success:focus, .btn-success:hover {
        color: #fff;
        background-color: #47a447;
        border-color: #398439
    }

    .btn-success:active {
        background-image: none
    }

    .btn-success[disabled], .btn-success[disabled]:active, .btn-success[disabled]:focus, .btn-success[disabled]:hover {
        background-color: #5cb85c;
        border-color: #4cae4c
    }

    .btn-info {
        color: #fff;
        background-color: #5bc0de;
        border-color: #46b8da
    }

    .btn-info:active, .btn-info:focus, .btn-info:hover {
        color: #fff;
        background-color: #39b3d7;
        border-color: #269abc
    }

    .btn-info:active {
        background-image: none
    }

    .btn-info[disabled], .btn-info[disabled]:active, .btn-info[disabled]:focus, .btn-info[disabled]:hover {
        background-color: #5bc0de;
        border-color: #46b8da
    }

    .btn-link {
        font-weight: 400;
        color: #428bca;
        cursor: pointer;
        border-radius: 0
    }

    .btn-link, .btn-link:active, .btn-link[disabled] {
        background-color: transparent;
        -webkit-box-shadow: none;
        box-shadow: none
    }

    .btn-link, .btn-link:active, .btn-link:focus, .btn-link:hover {
        border-color: transparent
    }

    .btn-link:focus, .btn-link:hover {
        color: #2a6496;
        text-decoration: underline;
        background-color: transparent
    }

    .btn-link[disabled]:focus, .btn-link[disabled]:hover {
        color: #999;
        text-decoration: none
    }

    .btn-sm, .btn-xs {
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px
    }

    .btn-xs {
        padding: 1px 5px
    }

    .btn-block {
        display: block;
        width: 100%;
        padding-right: 0;
        padding-left: 0
    }

    .btn-block + .btn-block {
        margin-top: 5px
    }

    @font-face {
        font-family: 'Glyphicons Halflings';
        src: url(https://netdna.bootstrapcdn.com/bootstrap/3.0.0/fonts/glyphicons-halflings-regular.eot);
        src: url(https://netdna.bootstrapcdn.com/bootstrap/3.0.0/fonts/glyphicons-halflings-regular.eot?#iefix) format('embedded-opentype'), url(https://netdna.bootstrapcdn.com/bootstrap/3.0.0/fonts/glyphicons-halflings-regular.woff) format('woff'), url(https://netdna.bootstrapcdn.com/bootstrap/3.0.0/fonts/glyphicons-halflings-regular.ttf) format('truetype'), url(https://netdna.bootstrapcdn.com/bootstrap/3.0.0/fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular) format('svg')
    }

    .glyphicon {
        position: relative;
        top: 1px;
        display: inline-block;
        font-family: 'Glyphicons Halflings';
        -webkit-font-smoothing: antialiased;
        font-style: normal;
        font-weight: 400;
        line-height: 1
    }

    .glyphicon-pencil:before {
        content: "\270f"
    }

    .glyphicon-ok:before {
        content: "\e013"
    }

    .glyphicon-trash:before {
        content: "\e020"
    }

    .glyphicon-refresh:before {
        content: "\e031"
    }

    .glyphicon-list-alt:before {
        content: "\e032"
    }

    .glyphicon-tag:before {
        content: "\e041"
    }

    .glyphicon-font:before {
        content: "\e047"
    }

    .glyphicon-list:before {
        content: "\e056"
    }

    .glyphicon-picture:before {
        content: "\e060"
    }

    .glyphicon-edit:before {
        content: "\e065"
    }

    .glyphicon-ok-circle:before {
        content: "\e089"
    }

    .glyphicon-comment:before {
        content: "\e111"
    }

    .glyphicon-link:before {
        content: "\e144"
    }

    .btn-group {
        position: relative;
        display: inline-block;
        vertical-align: middle
    }

    .btn-group > .btn {
        position: relative;
        float: left
    }

    .btn-group > .btn:active, .btn-group > .btn:focus, .btn-group > .btn:hover {
        z-index: 2
    }

    .btn-group > .btn:focus {
        outline: 0
    }

    .btn-group .btn + .btn, .btn-group .btn + .btn-group, .btn-group .btn-group + .btn, .btn-group .btn-group + .btn-group {
        margin-left: -1px
    }

    .btn-group > .btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
        border-radius: 0
    }

    .btn-group > .btn:first-child {
        margin-left: 0
    }

    .btn-group > .btn:first-child:not(:last-child):not(.dropdown-toggle) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0
    }

    .btn-group > .btn:last-child:not(:first-child) {
        border-bottom-left-radius: 0;
        border-top-left-radius: 0
    }

    .btn-group > .btn-group {
        float: left
    }

    .btn-group > .btn-group:not(:first-child):not(:last-child) > .btn {
        border-radius: 0
    }

    .btn-group > .btn-group:first-child > .btn:last-child, .btn-group > .btn-group:first-child > .dropdown-toggle {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0
    }

    .btn-group > .btn-group:last-child > .btn:first-child {
        border-bottom-left-radius: 0;
        border-top-left-radius: 0
    }

    .btn-group-xs > .btn {
        padding: 5px 10px;
        padding: 1px 5px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px
    }

    .btn-group-sm > .btn {
        padding: 5px 10px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 3px
    }

    .label {
        display: inline;
        padding: .2em .6em .3em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25em
    }

    .label[href]:focus, .label[href]:hover {
        color: #fff;
        text-decoration: none;
        cursor: pointer
    }

    .label:empty {
        display: none
    }

    .label-default {
        background-color: #999
    }

    .label-default[href]:focus, .label-default[href]:hover {
        background-color: grey
    }

    .label-primary {
        background-color: #428bca
    }

    .label-primary[href]:focus, .label-primary[href]:hover {
        background-color: #3071a9
    }

    .label-success {
        background-color: #5cb85c
    }

    .label-success[href]:focus, .label-success[href]:hover {
        background-color: #449d44
    }

    .label-info {
        background-color: #5bc0de
    }

    .label-info[href]:focus, .label-info[href]:hover {
        background-color: #31b0d5
    }

    .label-danger {
        background-color: #d9534f
    }

    .label-danger[href]:focus, .label-danger[href]:hover {
        background-color: #c9302c
    }

    @-webkit-keyframes progress-bar-stripes {
        from {
            background-position: 40px 0
        }
        to {
            background-position: 0 0
        }
    }

    @-moz-keyframes progress-bar-stripes {
        from {
            background-position: 40px 0
        }
        to {
            background-position: 0 0
        }
    }

    @-o-keyframes progress-bar-stripes {
        from {
            background-position: 0 0
        }
        to {
            background-position: 40px 0
        }
    }

    @keyframes progress-bar-stripes {
        from {
            background-position: 40px 0
        }
        to {
            background-position: 0 0
        }
    }

    .list-group {
        padding-left: 0;
        margin-bottom: 20px
    }

    .list-group-item {
        position: relative;
        display: block;
        padding: 10px 15px;
        margin-bottom: -1px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom: 1px solid black;
    }

    .list-group-item:first-child {
        border-top-right-radius: 4px;
        border-top-left-radius: 4px
        border-bottom: 1px solid black;
    }

    .list-group-item:last-child {
        margin-bottom: 0;
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px
        border-bottom: 1px solid black;
    }

    a.list-group-item {
        color: #555
    }

    a.list-group-item .list-group-item-heading {
        color: #333
    }

    a.list-group-item:focus, a.list-group-item:hover {
        text-decoration: none;
        background-color: #f5f5f5
    }

    .list-group-item-heading {
        margin-top: 0;
        margin-bottom: 5px
    }

    .list-group-item-text {
        margin-bottom: 0;
        line-height: 1.3
    }

    .panel {
        margin-bottom: 20px;
        background-color: #fff;
        border: 1px solid transparent;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05)
    }

    .panel-body {
        padding: 15px
    }

    .panel-body:after, .panel-body:before {
        display: table;
        content: " "
    }

    .panel-body:after {
        clear: both
    }

    .panel-body:after, .panel-body:before {
        display: table;
        content: " "
    }

    .panel-body:after {
        clear: both
    }

    .panel > .list-group {
        margin-bottom: 0
    }

    .panel > .list-group .list-group-item {
        border-width: 1px 0
    }

    .panel > .list-group .list-group-item:first-child {
        border-top-right-radius: 0;
        border-top-left-radius: 0
    }

    .panel > .list-group .list-group-item:last-child {
        border-bottom: 0
    }

    .panel-heading + .list-group .list-group-item:first-child {
        border-top-width: 0
    }

    .panel-heading {
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px
    }

    .panel-title {
        margin-top: 0;
        margin-bottom: 0;
        font-size: 16px
    }

    .panel-title > a {
        color: inherit
    }

    .panel-group .panel {
        margin-bottom: 0;
        overflow: hidden;
        border-radius: 4px
    }

    .panel-group .panel + .panel {
        margin-top: 5px
    }

    .panel-group .panel-heading {
        border-bottom: 0
    }

    .panel-default {
        border-color: #ddd
    }

    .panel-default > .panel-heading {
        color: #333;
        background-color: #f5f5f5;
        border-color: #ddd
    }

    .panel-primary {
        border-color: #428bca
    }

    .panel-primary > .panel-heading {
        color: #fff;
        background-color: #428bca;
        border-color: #428bca
    }

    .panel-success {
        border-color: #d6e9c6
    }

    .panel-success > .panel-heading {
        color: #468847;
        background-color: #dff0d8;
        border-color: #d6e9c6
    }

    .panel-danger {
        border-color: #eed3d7
    }

    .panel-danger > .panel-heading {
        color: #b94a48;
        background-color: #f2dede;
        border-color: #eed3d7
    }

    .panel-info {
        border-color: #bce8f1
    }

    .panel-info > .panel-heading {
        color: #3a87ad;
        background-color: #d9edf7;
        border-color: #bce8f1
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
                                    <h1>Info <?php GetCompanyName(); ?></h1>
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
                                                                   value="<?= $rowC['postalcode'] ?>"
                                                                   onkeyup="check_pc(&quot;postcode&quot;,this.value)">
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="controls col-md-6">
                                                                <label for="huisnummer"
                                                                       class="sr-only">Huisnummer</label>
                                                                <input type="text" id="huisnr"
                                                                       class="form-control"
                                                                       placeholder="Huisnummer"
                                                                       name="huisnummer"
                                                                       value="<?= $rowC['housenumber'] ?>"
                                                                       onkeyup="check_pc(&quot;huisnr&quot;,this.value)">

                                                            </div>
                                                            <div class="controls col-md-6">
                                                                <label for="toevoeging"
                                                                       class="sr-only">Toevoeging</label>
                                                                <input type="text" id="toevoeging"
                                                                       class="form-control"
                                                                       placeholder="Toevoeging"
                                                                       name="toevoeging"
                                                                       value="<?= $rowC['housenumberAddition'] ?>"
                                                                       onkeyup="check_pc(&quot;toevoeging&quot;,this.value)">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="adres"
                                                                   class="sr-only">Adres</label>
                                                            <input type="text" id="straat"
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
                                                <input type="submit"
                                                       class="btn btn-primary"
                                                       name="Instellingen"
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
                                    <a type="button"
                                       class="nav-link d-flex align-items-end"
                                       data-toggle="modal" data-target="#largechicken">
                                        <i class="ft-plus mr-1"></i>
                                        <span class="d-none d-sm-block">Toevoegen</span>
                                    </a>
                                    <div class="tab-pane active" id="general2" role="tabpanel"
                                         aria-labelledby="general-tab">
                                        <hr class="mt-1 mt-sm-2">
                                        <div class="container1">
                                            <div class="row1">
                                                <div class="card">
                                                    <div class="card-content">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="comment mt-4 text-justify float-left"> <img src="data:image/jpeg;base64,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" alt="" class="rounded-circle" width="40" height="40">
                                                                    <h4>Jhon Doe</h4> <span>- 20 October, 2018</span> <br>
                                                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                                                                    <div class="action">
                                                                        <button type="button"
                                                                                class="btn btn-success btn-xs"
                                                                                title="Approved">
                                                                            <span class="glyphicon glyphicon-ok"></span>
                                                                        </button>
                                                                        <a data-toggle="modal" data-target="#largechicken1<?= $RowNote["id"] ?>"><button type="button"
                                                                                                                                                         class="btn btn-primary btn-xs"
                                                                                                                                                         title="Edit">
                                                                                <span class="glyphicon glyphicon-pencil"></span>
                                                                            </button></a>
                                                                        <button type="button"
                                                                                class="btn btn-danger btn-xs"
                                                                                title="Delete">
                                                                            <span class="glyphicon glyphicon-trash"></span>
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="BRB" style="line-height:20%;"> </br> </div>
                                                <div class="card">
                                                    <div class="card-content">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="comment mt-4 text-justify float-left"> <img src="data:image/jpeg;base64,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" alt="" class="rounded-circle" width="40" height="40">
                                                                    <h4>Jhon Doe</h4> <span>- 20 October, 2018</span> <br>
                                                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                                                                    <div class="action">
                                                                        <button type="button"
                                                                                class="btn btn-success btn-xs"
                                                                                title="Approved">
                                                                            <span class="glyphicon glyphicon-ok"></span>
                                                                        </button>
                                                                        <a data-toggle="modal" data-target="#largechicken1<?= $RowNote["id"] ?>"><button type="button"
                                                                                                                                                         class="btn btn-primary btn-xs"
                                                                                                                                                         title="Edit">
                                                                                <span class="glyphicon glyphicon-pencil"></span>
                                                                            </button></a>
                                                                        <button type="button"
                                                                                class="btn btn-danger btn-xs"
                                                                                title="Delete">
                                                                            <span class="glyphicon glyphicon-trash"></span>
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="BRB" style="line-height:20%;"> </br> </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    </br>
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
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-content">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                        <div class="comment mt-4 text-justify float-left"> <img src="data:image/jpeg;base64,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" alt="" class="rounded-circle" width="40" height="40">
                                                                            <h4>Jhon Doe</h4> <span>- 20 October, 2018</span> <br>
                                                                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                                                                            <div class="action">
                                                                                <button type="button"
                                                                                        class="btn btn-success btn-xs"
                                                                                        title="Approved">
                                                                                    <span class="glyphicon glyphicon-ok"></span>
                                                                                </button>
                                                                                <a data-toggle="modal" data-target="#largechicken1<?= $RowNote["id"] ?>"><button type="button"
                                                                                                                                                                 class="btn btn-primary btn-xs"
                                                                                                                                                                 title="Edit">
                                                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                                                    </button></a>
                                                                                <button type="button"
                                                                                        class="btn btn-danger btn-xs"
                                                                                        title="Delete">
                                                                                    <span class="glyphicon glyphicon-trash"></span>
                                                                                </button>
                                                                            </div>
                                                                        </div>

                                                                </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                <div class="BRB" style="line-height:20%;"> </br> </div>
                                                <div class="card">
                                                    <div class="card-content">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="comment mt-4 text-justify float-left"> <img src="https://wow.olympus.eu/webfile/img/1632/oly_testwow_stage.jpg?x=1024" alt="" class="rounded-circle" width="40" height="40">
                                                                    <h4>Jhon Doe</h4> <span>- 20 October, 2018</span> <br>
                                                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                                                                    <div class="action">
                                                                        <button type="button"
                                                                                class="btn btn-success btn-xs"
                                                                                title="Approved">
                                                                            <span class="glyphicon glyphicon-ok"></span>
                                                                        </button>
                                                                        <a data-toggle="modal" data-target="#largechicken1<?= $RowNote["id"] ?>"><button type="button"
                                                                                                                                                         class="btn btn-primary btn-xs"
                                                                                                                                                         title="Edit">
                                                                                <span class="glyphicon glyphicon-pencil"></span>
                                                                            </button></a>
                                                                        <button type="button"
                                                                                class="btn btn-danger btn-xs"
                                                                                title="Delete">
                                                                            <span class="glyphicon glyphicon-trash"></span>
                                                                        </button>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

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
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Swipe hier aan en uit wat je wilt</h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <h6 class="col-12 text-bold-400 pl-0">onderwerp1 abbo</h6>
                                                                    <div class="col-12 mb-2">
                                                                        <div class="custom-control custom-switch custom-control-inline">
                                                                            <input id="switch1" type="checkbox" class="custom-control-input" checked>
                                                                            <label for="switch1" class="custom-control-label">Postcode checker</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mb-2">
                                                                        <div class="custom-control custom-switch custom-control-inline">
                                                                            <input id="switch2" type="checkbox" class="custom-control-input" checked>
                                                                            <label for="switch2" class="custom-control-label">automatisch credit getter</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mb-2">
                                                                        <div class="custom-control custom-switch custom-control-inline">
                                                                            <input id="switch3" type="checkbox" class="custom-control-input" disabled>
                                                                            <label for="switch3" class="custom-control-label">automatisch email sturen wanneer dat kan</label>
                                                                        </div>
                                                                    </div>
                                                                    <h6 class="col-12 text-bold-400 pl-0 mt-3">applicatie abbo2</h6>
                                                                    <div class="col-12 mb-2">
                                                                        <div class="custom-control custom-switch custom-control-inline">
                                                                            <input id="switch4" type="checkbox" class="custom-control-input" checked>
                                                                            <label for="switch4" class="custom-control-label">applicatie abonnement</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mb-2">
                                                                        <div class="custom-control custom-switch custom-control-inline">
                                                                            <input id="switch5" type="checkbox" class="custom-control-input" disabled>
                                                                            <label for="switch5" class="custom-control-label">super de luxe applicatie abonnement</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 mb-2">
                                                                        <div class="custom-control custom-switch custom-control-inline">
                                                                            <input id="switch6" type="checkbox" class="custom-control-input" checked>
                                                                            <label for="switch6" class="custom-control-label">QCCS internet abonnement</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                                        <button type="button" class="btn btn-primary mr-sm-2 mb-1">Opslaan</button>
                                                                        <button type="button" class="btn btn-secondary mb-1">annuleren</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
        </div>
    </div>
</div>



<div class="modal fade text-left" id="largechicken" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel35">Nieuwe Notitie</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                </button>
            </div>
            <form method="post">
                <div class="modal-body">
                    <fieldset class="form-group floating-label-form-group">
                        <label for="email">Onderwerp</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Onderwerp">
                    </fieldset>
                    <!--                    <fieldset class="form-group floating-label-form-group">-->
                    <!--                            <label for="basic-form-6">Keuze</label>-->
                    <!--                            <select id="basic-form-6" name="interested" class="form-control">-->
                    <!--                                <option value="none" selected disabled>Keuze</option>-->
                    <!--                                <option value="design">Intern</option>-->
                    <!--                                <option value="development">Extern</option>-->
                    <!--                            </select>-->
                    <!--                    </fieldset>-->
                    <fieldset class="form-group floating-label-form-group">
                        <label for="title1">Beschrijving</label>
                        <textarea class="form-control" id="title1" name="text" rows="9" placeholder="Beschrijving"></textarea>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn bg-light-secondary" data-dismiss="modal" value="Sluiten">
                    <input type="submit" class="btn btn-primary" name="RegistreetNote" value="Opslaan">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    /*
        zet script nog in apart bestand wnnr af voor de aapie
    */
    var e = "FbW29C_969cyVfAKrj";
    var postcode = "";
    var huisnr = "";
    var toevoeging = "";

    function check_pc(wat, waarde) {
        if (wat === "postcode") {
            var pc = waarde.trim();
            if (pc.length < 6) {
                maak_leeg();
                return;
            }					// moet minimaal 6 characters hebben
            var num_deel = pc.substr(0, 4);
            if (parseFloat(num_deel) < 1000) {
                maak_leeg();
                return;
            }	// moet minaal 1000 zijn
            var alpha_deel = pc.substr(-2);
            if (alpha_deel.charCodeAt(0) < 65 || alpha_deel.charCodeAt(0) > 122 || alpha_deel.charCodeAt(1) < 65 || alpha_deel.charCodeAt(1) > 122) {
                maak_leeg();
                return;
            } 	// DE LAATSTE 2 POSITIES MOETEN LETTERS ZIJN
            alpha_deel = alpha_deel.toUpperCase();

            // de checker niffo

            postcode = num_deel + alpha_deel;
            document.getElementById("postcode").value = postcode;
        }

        if (wat === "huisnr") {
            huisnr = parseFloat(waarde);
            if (!huisnr) {
                maak_leeg();
                return;
            }
            document.getElementById("huisnr").value = huisnr;
        }

        if (wat === "toevoeging") {
            toevoeging = waarde.trim();
        }

        if (huisnr === 0) {
            return;
        }

        var getadrlnk = 'https://bwnr.nl/postcode.php?pc=' + postcode + '&hn=' + huisnr + '&tv=' + toevoeging + '&tg=data&ak=' + 'FbW29C_969cyVfAKrj';	// e moet uw apikey bevattten.

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                rString = this.responseText;
                if (rString === "Geen resultaat.") {
                    maak_leeg();
                    return;
                }
                if (rString === "Input onvolledig.") {
                    maak_leeg();
                    return;
                }
                if (rString === "Onbekende API Key.") {
                    maak_leeg();
                    return;
                }
                if (rString === "Over quota") {
                    maak_leeg();
                    return;
                }
                if (rString === "Onjuiste API Key.") {
                    maak_leeg();
                    alert('Alleen functioneel indien geopend vanuit de API pagina. Ga terug naar de API pagina en probeer opnieuw.');
                    return;
                }
                // 0 = straat - 1 = plaats
                aResponse = rString.split(";");
                document.getElementById("straat").value = aResponse[0];
                document.getElementById("plaats").value = aResponse[1];
            }
        };

        xmlhttp.open("GET", getadrlnk, true);
        xmlhttp.send();
    }

    function maak_leeg() {
        document.getElementById("").value = "";
        document.getElementById("plaats").value = "";
    }
</script>
</body>

<?php
qron();
qroff();
include "partials/footer.php";
?>
<!-- END : Body-->
</html>