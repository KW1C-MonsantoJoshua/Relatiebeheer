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
                                                <div class="panel panel-default widget">
                                                    <div  class="panel-heading">
                                                        <span class="glyphicon glyphicon-comment"></span>
                                                        <h3 class="panel-title" style="color: #333 !important;">
                                                            Meest recente notitiess</h3>
                                                        <span class="label label-info">
                    2</span>
                                                    </div>
                                                    <div class="panel-body">
                                                        <ul class="list-group">
                                                            <li class="list-group-item">
                                                                <div class="row1">
                                                                </br>
                                                                    <div class="col-xs-2 col-md-1">
                                                                        <img src="https://debagagedrager.nl/wp-content/uploads/2019/06/blank-profile-picture-973460_640-e1561803510819.png"
                                                                             class="img-circle img-responsive"
                                                                             alt=""/></div>
                                                                    <div class="col-xs-10 col-md-11">
                                                                        <div>
                                                                            <a style="color: #7a09e5; font-size: 20px;"
                                                                               href="teuskip.nl/Miranda4.html">
                                                                                Met klant besproken BTW prijs</a>
                                                                            <div class="mic-info">
                                                                                By: <a style="color: #7a09e5; font-size: 15px;"
                                                                                       href="#">Teus Brom</a> on 31
                                                                                Jan 2022
                                                                            </div>
                                                                        </div>
                                                                        <div style="color: black; font-size: 16px;" class="comment-text">
                                                                            met de klant veel gepraamet de klant
                                                                            veel gepraatmet de klant veel gepraatmet
                                                                            de
                                                                            klant veel gepraatmet de klant veel
                                                                            gepraatmet de klant veel gepraatmet de
                                                                            klant
                                                                            veel gepraatmet de klant veel gepraatmet
                                                                            de klant veel gepraatmet de klant veel
                                                                            gepraatt met de klant veel gepraatmet de
                                                                            klant veel gepraatmet de klant veel
                                                                            gepraatmet de klant veel gepraatmet de
                                                                            klant veel gepraatmet de klant veel
                                                                            gepraat
                                                                        </div>
                                                                        <div class="action">
                                                                            <button type="button"
                                                                                    class="btn btn-success btn-xs"
                                                                                    title="Approved">
                                                                                <span class="glyphicon glyphicon-ok"></span>
                                                                            </button>
                                                                            <button type="button"
                                                                                    class="btn btn-primary btn-xs"
                                                                                    title="Edit">
                                                                                <span class="glyphicon glyphicon-pencil"></span>
                                                                            </button>
                                                                            <button type="button"
                                                                                    class="btn btn-danger btn-xs"
                                                                                    title="Delete">
                                                                                <span class="glyphicon glyphicon-trash"></span>
                                                                            </button>
                                                                        </div>
                                                                        </br>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <!--                <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
        </div>
    </div>
</div>



<div class="modal fade text-left" id="largechicken" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel34">Bedrijf toevoegen</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ft-x font-medium-2 text-bold-700"></i></span>
                </button>
            </div>

            <form method="post">
                <div class="modal-body">
                    <section class="users-edit">
                        <div class="row">
                            <div class="">
                                <div class="form-group">
                                    <h4>Bedrijfsgegevens</h4>
                                    <div class="controls">
                                        <div class="controls ">
                                            <label for="bedrijfsnaam">Bedrijfsnaam</label>
                                            <input type="text" id="bedrijfsnaam"
                                                   class="form-control round" placeholder="Bedrijfsnaam"
                                                   aria-invalid="false" name="bedrijfsnaam" value="">
                                        </div>
                                        <label for="users-edit-username">Website</label>
                                        <input type="text" id="users-edit-username"
                                               class="form-control round"
                                               placeholder="Website" required
                                               aria-invalid="false" name="website">
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-3 mt-sm-2">
                                <input type="submit"
                                       class="btn btn-primary mb-2 mb-sm-0 mr-sm-2"
                                       name="registreerBedrijf"
                                       value="Bedrijf toevoegen">

                                <button type="reset"
                                        data-dismiss="modal"
                                        class="btn btn-secondary">Cancel
                                </button>
                            </div>
                        </div>
                    </section>
                </div>
            </form>
        </div>
    </div>
</div>


</body>

<?php
qron();
qroff();
include "partials/footer.php";
?>
<!-- END : Body-->
</html>