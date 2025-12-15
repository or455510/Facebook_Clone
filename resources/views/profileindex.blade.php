<!DOCTYPE html>
<html lang="en">

<head>

    <title>Facebook</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="all.min.css">

    <link rel="stylesheet" href="styleprofile.css">

</head>
<style>
    * {
        margin: 0px;
        padding: 0px;
    }

    body {
        width: 100%;
        height: 100%;
        font-family: arial;
        position: relative;
    }

    .popop-background {
        position: absolute;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        background-color: #fff8;
        z-index: 10;
        display: none;
    }


    .Select-audience {
        position: absolute;
        left: 20%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 420px;
        background-color: #fff;
        box-sizing: border-box;
        border-radius: 5px;
        box-shadow: 0px 0px 8px #3339;
        z-index: 11;
        display: none;
    }

    .header-popap {
        position: relative;
        width: 100%;
        background-color: #fff;
        box-sizing: border-box;
        border-radius: 5px 5px 0px 0px;
        border-bottom: 1px solid #3333;
        padding: 15px 10px;
    }

    .h-pop {
        text-align: center;
        font-size: 18px !important;
        color: #333 !important;
    }

    .header-popap span {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #E4E6E9;
        cursor: pointer;
        color: #333;
        font-size: 16px;
        text-align: center;
        line-height: 30px;
    }

    .content-popaap {
        width: 98%;
        margin: auto;
        height: 210px;
        overflow-y: scroll;
        background-color: #fff5;
    }

    .content-popaap ul {
        padding: 0px;
        margin-bottom: 0px;
    }

    .content-popaap ul li {
        list-style: none;
        padding: 10px;
        background-color: #fff;
        display: grid;
        grid-template-columns: 1fr 7fr;
        cursor: pointer;
        transition: 0.3s;
    }

    .content-popaap ul li:hover {
        background-color: #EAF3FF;
    }

    .icon-div {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #E4E6E9;
        overflow: hidden;
    }

    .icon-div i {
        padding: 16px 16px;
        font-size: 20px;
        color: #333;
    }

    .frind-icon {
        padding: 16px 15px !important;
        font-size: 18px !important;
    }

    .text-aria {
        padding-left: 10px;
        position: relative;
    }

    .text-aria h2 {
        font-size: 17px;
        color: #333;
        margin-top: 7px;
    }

    .text-aria p {
        font-size: 13px !important;
        color: #707070 !important;
    }

    .text-aria i {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        font-size: 20px;
        color: #707070;
    }

    .onlu-me {
        margin-top: 16px !important;
    }







    .cover-image-section {
        width: 100%;
        height: 250px;
        background-image: linear-gradient(#6FA702, #fff);

    }

    .cover-hader-site {
        position: relative;
        width: 70%;
        height: 100%;
        margin: auto;
    }

    .cover-hader-site img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        cursor: pointer;
        border-radius: 0px 0px 10px 10px;
    }

    .cover-image-div {
        position: absolute;
        left: 0px;
        bottom: 0px;
        width: 100%;
        height: 50px;
    }

    .cover-image-edite-btn {
        text-align: right;
    }

    .cover-image-edite-btn button {
        padding: 7px 10px;
        border-radius: 5px;
        margin-top: 10px;
        margin-right: 20px;
        font-size: 13px;
        background-color: #fff;
        cursor: pointer;
        border: none;
        outline: none;
        color: #333;
    }

    .cover-image-edite-btn button:hover {
        background-color: #F2F2F2;
    }

    .cover-image-edite-btn button i {
        margin-right: 5px;
    }


    .profile-section {
        width: 100%;
    }

    .profile-section-in {
        width: 70%;
        height: 120px;
        border-bottom: 1px solid #3335;
        margin: auto;

        display: grid;
        grid-template-columns: 2fr 4fr 4fr;
    }

    .profile-image-div {
        position: relative;
        width: 125px;
        height: 125px;
        border: 3px solid #fff;
        margin-left: 20px;
        transform: translateY(-30px);
        background-color: #333;
        border-radius: 50%;
    }

    .profile-image-div img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        cursor: pointer;
        transition: 0.3s;
    }

    .profile-image-div img:hover {
        filter: brightness(0.9);
    }

    .profile-image-div span {
        position: absolute;
        right: 5px;
        bottom: 5px;
        cursor: pointer;
        padding: 5px 5px;
        border-radius: 50%;
        background-color: #d5d5d5;
        font-size: 18px;
        color: #333;
    }

    .profile-name-info h1 {
        margin-top: 20px;
        margin-left: 10px;
        font-size: 25px;
        color: #000;
    }

    .profile-name-info p {
        font-size: 14px;
        color: #333;
        margin-left: 10px;
    }

    .profile-name-info p span {
        cursor: pointer;
    }

    .friends-img-div {
        margin-left: 10px;
        margin-top: 5px;
        width: 200px;

        display: grid;
        grid-template-columns: repeat(8, 1fr);
    }

    .firend-img {
        width: 25px;
        height: 25px;
        border: 1px solid #fff;
        border-radius: 50%;
        background-color: #333;
        margin-left: -3px;
        cursor: pointer;
    }

    .firend-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        cursor: pointer;
    }

    .last-fi-div {
        position: relative;
        overflow: hidden;
        transform: translateX(-21px);
    }

    .b {
        transform: translateX(-3px);
    }

    .c {
        transform: translateX(-6px);
    }

    .d {
        transform: translateX(-9px);
    }

    .e {
        transform: translateX(-12px);
    }

    .f {
        transform: translateX(-15px);
    }

    .g {
        transform: translateX(-18px);
    }

    .last-fi-div span {
        position: absolute;
        top: -3px;
        left: -3px;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-color: #3338;
        color: #fff8;
        padding: 8px 8px;
        font-size: 15px;
        cursor: pointer;
    }

    .btn-site-pro {
        width: 100%;
    }

    .profile-button-site span {
        padding: 7px 10px;
        border-radius: 5px;
        margin-top: 10px;
        margin-right: 5px;
        font-size: 13px;
        background-color: #1877F2;
        cursor: pointer;
        border: none;
        outline: none;
        color: #fff;
    }

    .profile-button-site span i {
        margin-right: 5px;
    }

    .profile-button-site span:hover {
        background-color: #1771E6;
    }

    .edit-profile-btn {
        background-color: #E4E6E9 !important;
        color: #333 !important;
    }

    .edit-profile-btn:hover {
        background-color: #D8DADF !important;
    }

    .btn-site-pro {
        margin-top: 75px;
        text-align: right;
    }

    .full-navbar {
        width: 100%;
        border-bottom: 1px solid #3335;
    }

    .navbar-site {
        width: 70%;
        margin: auto;
        display: grid;
        grid-template-columns: 4fr 1fr;
    }

    .navbar-site ul {
        padding: 0px;
        margin-bottom: 0px;
        margin-left: 5px;
    }

    .navbar-site ul a {
        text-decoration: none;
    }

    .navbar-site ul a li,
    .navbar-site ul li {
        display: inline-block;
        padding: 15px 12px;
        font-size: 14px;
        font-weight: bold;
        color: #707070;
        cursor: pointer;
        margin-left: -5px;
        transform: 0.3s;
    }

    .navbar-site ul a li:hover,
    .navbar-site ul li:hover {
        background-color: #E4E6E9;
    }

    .activ-navbar {
        position: relative;
        background-color: #fff !important;
        color: #1877F2 !important;
    }

    .activ-navbar i {
        color: #1877F2 !important;
    }

    .activ-navbar:after {
        position: absolute;
        content: '';
        bottom: 0px;
        left: 0px;
        width: 100%;
        height: 3px;
        background-color: #1877F2;
    }

    .nav-btn {
        text-align: right;
    }

    .nav-btn i {
        font-size: 16px;
        padding: 7px 12px;
        background-color: #E4E6E9;
        border-radius: 5px;
        color: #707070;
        margin-top: 8px;
        cursor: pointer;
    }

    .nav-btn i:hover {
        background-color: #D8DADF;
        color: #333;
    }

    .post-section {
        width: 100%;
        background-color: #F0F2F5;
        padding: 20px 0px;
    }

    .post-section-in {
        width: 70%;
        margin: auto;
        display: grid;
        grid-template-columns: 2fr 3fr;
        grid-column-gap: 15px;
    }

    .info-section {
        /*background-color: red;*/
    }

    .box-design {
        border-radius: 5px;
        box-shadow: 0px 1px 2px #3335;
        background-color: #fff;
        padding: 10px;
        margin-bottom: 15px;
    }

    .profile-lock-div {
        border-radius: 5px;
        box-shadow: 0px 1px 2px #3335;
        background-color: #fff;
        display: grid;
        grid-template-columns: 1fr 5fr;
        padding: 10px;
        margin-bottom: 15px;
    }

    .icon-pld i {
        padding: 10px 10px;
        background-color: #1771E6;
        border-radius: 50%;
        color: #fff;
        font-size: 25px;
    }

    .pld-text h3 {
        font-size: 15px;
        color: #333;
        margin-top: 7px;
        margin-left: 10px;
    }

    .pld-text a {
        text-decoration: none;
        font-size: 13px;
        margin-left: 10px;
        margin-top: 2px;
        font-weight: bold;
        color: #1771E6;
    }

    .pld-text a:hover {
        text-decoration: underline;
    }

    .about-info {
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0px 1px 2px #3335;
        background-color: #fff;
        margin-bottom: 15px;
    }

    .about-info h4 {
        font-size: 18px;
        color: #000;
        font-weight: bold;
    }

    .about-info p {
        font-size: 15px;
        padding: 10px 0px;
        color: #333;
        text-align: center;
    }

    .btn {
        width: 100%;
        padding: 5px 0px;
        font-size: 14px;
        border: none;
        outline: none;
        background-color: #E4E6EB;
        font-weight: bold;
        color: #000;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #D8DADF;
    }

    .about-info ul {
        margin-bottom: 0px;
        padding: 5px 0px;
    }

    .about-info ul li {
        list-style: none;
        font-size: 13px;
        color: #333;
        padding: 7px 0px;
    }

    .about-info ul li i {
        margin-right: 5px;
        color: #3339;
    }

    .about-info ul li a {
        text-decoration: none;
        color: #1771E6;
    }

    .about-info ul li a:hover {
        text-decoration: underline;
    }

    .friends-site {
        position: relative;
    }

    .Hobbies-show {
        padding: 20px 0px;
    }

    .Hobbies-show span {
        padding: 8px 10px;
        border: 1px solid #E4E6EB;
        background-color: #fff;
        color: #333;
        font-size: 13px;
        margin: 4px 1px 4px 1px;
        font-weight: bold;
        border-radius: 20px;
        display: inline-block;
    }

    .Hobbies-show span i {
        margin-right: 5px;
    }

    .Featured-site {
        padding: 15px 0px;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-column-gap: 5px;
    }

    .Featured-img-div img {
        width: 100%;
        height: 80px;
        object-fit: cover;
        border-radius: 5px;
        cursor: pointer;
    }

    .image-hader {
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .image-hader div a {
        text-decoration: none;
        color: #1877F2;
        font-size: 14px;
    }

    .image-hader div a:hover {
        text-decoration: underline;
    }

    .images-site span {
        font-size: 16px;
        color: #333;
        font-weight: bold;
    }

    .images-site {
        position: relative;
    }

    .see-all-images {
        font-size: 14px !important;
        position: absolute;
        right: 10px;
        top: 10px;
    }

    .see-all-images a {
        text-decoration: none;
        color: #1771E6 !important;
    }

    .see-all-images a:hover {
        text-decoration: underline;
    }

    .at9-images {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-column-gap: 3px;
        padding: 10px 0px 0px 0px;
    }

    .images-div img {
        width: 100%;
        height: 80px;
        cursor: pointer;
        object-fit: cover;
        border-radius: 5px;
    }

    .friends-site span p {
        font-size: 14px;
        color: #3339;
        margin-top: 5px;
    }

    .images-div p {
        font-size: 11px;
        padding: 3px 5px;
        text-align: left;
        padding-bottom: 10px;
    }

    .images-div p a {
        text-decoration: none;
        color: #333;
    }

    .images-div p a:hover {
        text-decoration: underline;
    }

    .post-upload-T {
        display: block;
        grid-template-columns: 1fr 7fr;
        border-bottom: 1px solid #3333;
        padding-bottom: 10px;
    }

    .profil-ing-div {
        width: 36px;
        height: 36px;
        border-radius: 50%;
    }

    .profil-ing-div img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        cursor: pointer;
    }

    .text-post {
        position: relative;
        width: 100%;
        padding: 7px 10px;
        box-sizing: border-box;
        border-radius: 25px;
        background-color: #E4E6EB;
        cursor: pointer;
    }

    .text-post:hover {
        background-color: #D8DADF;
    }

    .text-post span {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 15px;
        color: #333;
    }

    .photo-upload {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-gap: 5px;
        padding: 10px 0px 0px 0px;
    }

    .post-upl {
        width: 100%;
        padding: 5px 5px;
        box-sizing: border-box;
        background-color: #fff;
        border-radius: 20px;
        cursor: pointer;
    }

    .post-upl:hover {
        background-color: #E4E6EB;
    }

    .post-upl p {
        padding: 5px 0px;
        text-align: center;
        font-size: 14px;
        color: #333;
    }

    .post-upl p i {
        margin-right: 5px;
    }

    .post-upl p .fa-video {
        color: #E42645;
    }

    .post-upl p .fa-images {
        color: #41B35D;
    }

    .post-upl p .fa-flag {
        color: #3AA8CB;
    }

    .filter-site {
        position: relative;
        padding-bottom: 10px;
        border-bottom: 1px solid #3333;
    }

    .filter-site span {
        position: absolute;
        top: 10px;
        left: 0px;
        font-size: 16px;
        font-weight: bold;
    }

    .fil-ter {
        text-align: right;
    }

    .fil-ter button {
        padding: 8px 10px;
        border-radius: 5px;
        border: none;
        outline: none;
        background-color: #E4E6E9;
        cursor: pointer;
    }

    .fil-ter button:hover {
        background-color: #D8DADF;
    }

    .fil-ter button i {
        margin-right: 5px;
    }

    .post-filter {
        padding-bottom: 0px;
    }

    .list-type {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-column-gap: 5px;
    }

    .fil-list {
        text-align: center;
    }

    .fil-list {
        font-size: 15px;
        color: #333;
        padding: 10px 0px;
        cursor: pointer;
    }

    .fil-list i {
        margin-right: 5px;
        color: #3339;
    }


    .post-infarmation {
        display: grid;
        grid-template-columns: 1fr 7fr;
        padding: 10px;
    }

    .post-infarmation div h2 {
        font-size: 14px;
        margin-left: 5px;
        margin-top: 7px;
    }

    .post-infarmation div h2 a {
        text-decoration: none;
        color: #333;
    }

    .post-infarmation div h2 a:hover {
        text-decoration: underline;
    }

    .post-infarmation div p {
        font-size: 11px;
        color: #3339;
        margin-top: 3px;
        margin-left: 5px;
    }

    .post-infarmation div p a {
        text-decoration: none;
        color: #3339;
    }

    .post-infarmation div p a:hover {
        text-decoration: underline;
    }

    .post-infarmation div p span {
        margin-left: 5px;
    }

    .post-infarmation div p span i {
        cursor: pointer;
    }

    .post-infarmation div p span i:hover {
        color: #333;
    }

    .post-three-dot {
        position: relative;
    }

    .post-three-dot .thre-dto-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 10px;
        width: 25px;
        height: 25px;
        border-radius: 10px;
        background-color: #fff;
        font-size: 14px;
        color: #333;
        padding: 5px 5px;
        box-sizing: border-box;
        overflow: hidden;
        cursor: pointer;
    }

    .post-three-dot .thre-dto-btn:hover {
        background-color: #E4E6E9;
    }

    .post-div {
        padding: 0px;
    }

    .post-div img {
        width: 100%;
        cursor: pointer;
        object-fit: cover;
    }

    .post-info {}

    .post-info-input {
        padding: 10px;
    }

    .lilowow-cs {
        display: grid;
        grid-template-columns: 3fr 2fr;
    }

    .lilowow-cs p {
        font-size: 14px;
        color: #3339;
        text-align: right;
    }

    .lilowow-cs p a {
        text-decoration: none;
        color: #3339;
    }

    .lilowow-cs p a:hover {
        text-decoration: underline;
    }

    .llw-count {
        display: grid;
        grid-template-columns: 15px 15px 15px 1fr;
    }

    .icon-show {
        position: relative;
        width: 17px;
        height: 17px;
        box-sizing: border-box;
        overflow: hidden;
        border-radius: 50%;
        border: 1px solid #fff;
        cursor: pointer;
    }

    .l-count {
        text-align: left !important;
        margin-left: 7px;
    }

    .top {
        transform: translateX(28px);
    }

    .mid {
        transform: translateX(0px);
    }

    .low {
        transform: translateX(-28px);
    }

    .love-icon-bg {
        background-image: linear-gradient(to bottom, #FD5976, #E81E44);
    }

    .like-icon-bg {
        background-image: linear-gradient(to bottom, #11A6FC, #036FE4);
    }

    .icon-show i {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font-size: 8px;
        color: #fff;
    }

    .icon-show img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        cursor: pointer;
    }

    .actavite {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-column-gap: 5px;
        padding: 5px 0px;
        margin: 0px 10px;
        border-top: 1px solid #3333;
        cursor: pointer;
    }

    .lcs-btn:hover {
        background-color: #E4E6E9;
    }

    .lcs-btn {
        border-radius: 5px;
    }

    .lcs-btn p {
        padding: 10px 0px;
        font-size: 14px;
        text-align: center;
        color: #707070;

    }

    .lcs-btn p i {
        margin-left: 5px;
    }

    .comment-site {
        position: relative;
    }

    .comment-site {
        display: grid;
        grid-template-columns: 1fr 7fr;
        border-top: 1px solid #3333;
        padding: 8px;
        margin: 0px 10px;
    }

    .comment-input input {
        width: 100%;
        border: none;
        outline: none;
        box-sizing: border-box;
        background-color: #E4E6E9;
        border-radius: 20px;
        font-size: 15px;
        padding: 9px 10px;
        padding-right: 120px;
        text-indent: 5px;
    }

    .comment-icon-div {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-column-gap: 3px;
        width: 110px;
        padding: 8px 0px;
    }

    .comment-icon-div>div {
        width: 22px;
        background-color: #fff;
        border-radius: 50%;
        box-sizing: border-box;
        overflow: hidden;
        height: 22px;
        cursor: pointer;
    }

    .comment-icon-div>div>i {
        font-size: 15px;
        color: #707070;
        padding: 4px 3px;
    }

    .post-text-show {
        padding: 10px 15px;
        font-size: 16px;
        color: #333;
        border-top: 1px solid #3333;
        border-bottom: 1px solid #3333;
    }

    .post-background {
        position: relative;
        background-color: #333;
        color: #fff;
        width: 100%;
        height: 300px;
        box-sizing: border-box;
        overflow: hidden;
    }

    .post-background div {
        position: absolute;
        top: 50%;
        width: 100%;
        box-sizing: border-box;
        transform: translateY(-50%);
        padding: 30px 30px;
    }

    .post-background p {
        font-size: 22px;
        text-align: center;
    }

    .post-profile-img {
        width: 45px;
        height: 45px;
    }

    .post-background-img {
        background-color: #fff;
        color: #fff;
        width: 100%;
        height: 350px;
        box-sizing: border-box;
        overflow: hidden;

        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-column-gap: 3px;
    }

    .post-background-img div {
        box-sizing: border-box;
        overflow: hidden;
    }

    .post-background-img div img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        cursor: pointer;
    }

    .post-background-img div .one-or-two {
        width: 100% !important;
        height: 50% !important;
        background-color: #3335;
        box-sizing: border-box !important;
    }

    .one-or-two:first-child {
        border-bottom: 3px solid #fff;
    }

    .one-or-two img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        cursor: pointer;
    }

    .ofverflow-images {
        position: relative;
    }

    .ofverflow-images img {
        filter: brightness(0.6);
    }

    .ove-img-div {
        position: absolute;
        top: 0px;
        left: 0px;
        background-color: #3335;
        width: 100%;
        height: 100%;
        overflow: hidden;
        box-sizing: border-box;
        cursor: pointer;
    }

    .ove-img-div p {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font-size: 35px;
        color: #fff;
        font-weight: 400;
    }

    .post-hader-text {
        font-size: 14px;
        color: #333;
        padding: 0px 10px 10px 10px;
        display: none;
    }






    @media screen and (max-width: 1199px) {}

    @media screen and (max-width: 991px) {

        .cover-hader-site,
        .profile-section-in,
        .navbar-site,
        .post-section-in {
            width: 80%;
        }

        .profile-image-div {
            width: 120px;
            height: 120px;
            transform: translateY(-20px);
        }

        .profile-name-info h1 {
            font-size: 23px;
        }
    }

    @media screen and (max-width: 767px) {

        .cover-hader-site,
        .profile-section-in,
        .navbar-site {
            width: 90%;
        }

        .post-section-in {
            width: 100%;
        }

        .profile-image-div {
            width: 150px;
            height: 150px;
            transform: translateY(-80px);
            border: 5px solid #fff;
            margin: auto;
        }

        .profile-image-div span {
            right: 5px;
            bottom: 5px;
            padding: 10px 10px;
        }

        .profile-section-in {
            grid-template-columns: 1fr;
            height: 250px;
        }

        .profile-name-info {
            margin-top: -75px;
            text-align: center;
        }

        .profile-name-info h1 {
            font-size: 30px;
            margin-left: 0px;
            margin-top: 0px;
        }

        .profile-name-info p {
            font-size: 16px;
            padding: 5px;
            margin-left: 0px;
        }

        .friends-img-div {
            margin: auto;
            width: 230px;
        }

        .firend-img {
            width: 30px;
            height: 30px;
            cursor: pointer;
        }

        .edit-profile-btn {
            margin-left: 10px;
        }

        .btn-site-pro {
            margin-top: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        .navbar-site {
            grid-template-columns: 7fr 1fr;
        }

        .profile-button-site span {
            padding: 10px 20px;
            margin-right: 10px;
            font-size: 16px;
        }

        .photo-upload {
            grid-gap: 0px;
        }

        .post-upl {
            padding: 5px 2px;
        }

        .about-info ul li {
            font-size: 12px;
        }
    }

    @media screen and (max-width: 575px) {
        .cover-hader-site {
            width: 100%;
        }

        .profile-section-in,
        .navbar-site,
        .post-section-in {
            width: 98%;
        }

        .cover-hader-site img {
            border-radius: 0px 0px;
            cursor: pointer;
        }



        .post-section-in {
            grid-template-columns: 1fr;
            grid-column-gap: 0px;
        }

        .info-section {
            display: none;
        }

        #likes-nav,
        #video-nav,
        #photo-nav {
            display: none;
        }

        .cover-image-div {
            top: 0px;
        }

        .cover-image-edite-btn button {
            margin-top: 18px;
        }

        .profile-button-site span {
            padding: 10px 13px;
            margin-right: 5px;

        }

        .post-images {
            height: 500px;
            object-fit: cover;
        }
    }


    .activ-li-div {
        background-color: #EAF3FF !important;
    }

    .activ-li-icon {
        color: #1877F2 !important;
    }

    .like-controle {
        color: #1771E6 !important;
    }

    .dis_block {
        display: block !important;
    }









    #thim-button {
        position: absolute;
        right: -26px;
        top: -10px;
        padding: 20px 8px;
        padding-left: 5px;
        border-radius: 0px 10px 10px 0px;
        cursor: pointer;
        font-size: 16px;
        color: #fff;
        background-color: #1877F2;
    }

    .thim-div {
        position: absolute;
        left: 0px;
        top: 50px;
        width: 170px;
        margin-left: -170px;
        transition: 0.5s;
        padding: 10px;
        background-color: #1877F2;
        z-index: 20;
        box-sizing: border-box;
        display: none;
    }

    .click-btn-td {
        margin-left: 0px;
    }

    .hadr-thim-bar {
        position: relative;
    }

    .hadr-thim-bar p {
        font-size: 15px;
        color: #fff;
    }

    .bg-color {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-column-gap: 3px;
    }

    .bg-color div {
        height: 23px;
        background-color: #333;
        border-radius: 50%;
        margin-top: 10px;
        cursor: pointer;
    }

    .bg-color-1 {
        background-color: #ff0000 !important;
    }

    .bg-color-2 {
        background-color: #00ff00 !important;
    }

    .bg-color-3 {
        background-color: #0000ff !important;
    }

    .bg-color-4 {
        background-color: pink !important;
    }

    .bg-color-5 {
        background-color: #fff !important;
    }

    .bg-color-6 {
        background-color: #333 !important;
    }

    .text-color-1 {
        color: #ff0000 !important;
    }

    .text-color-2 {
        color: #00ff00 !important;
    }

    .text-color-3 {
        color: #0000ff !important;
    }

    .text-color-4 {
        color: pink !important;
    }

    .text-color-5 {
        color: #fff !important;
    }

    .text-color-6 {
        color: #333 !important;
    }

    .cover-background-1 {
        background-image: linear-gradient(#6FA702, #ff0000);
    }

    .cover-background-2 {
        background-image: linear-gradient(#6FA702, #00ff00);
    }

    .cover-background-3 {
        background-image: linear-gradient(#6FA702, #0000ff);
    }

    .cover-background-4 {
        background-image: linear-gradient(#6FA702, pink);
    }

    .cover-background-5 {
        background-image: linear-gradient(#6FA702, #fff);
    }

    .cover-background-6 {
        background-image: linear-gradient(#6FA702, #000);
    }




    .input-box {
        width: 100%;
        padding: 10px 10px;
        background-color: #E4E6EB;
        border: 1px solid #1877F2;
        border-radius: 5px;
        box-sizing: border-box;
        outline: none;
        color: #333;
        text-align: center;
        font-size: 15px;
    }

    .length-count-txt {
        font-size: 11px !important;
        color: #333 !important;
        text-align: right !important;
        padding: 3px !important;
    }

    .putlic-c-o-btn {
        width: 100%;
        padding: 5px;
        box-sizing: border-box;
        display: grid;
        grid-template-columns: 1fr 2fr;
    }

    .button-site-js {
        padding: 0px;
        text-align: right;
    }

    .button-site-js button {
        margin: 0px 4px;
        padding: 5px;
        cursor: pointer;
        outline: none;
        border: none;
        background-color: #E4E6EB;
        border-radius: 3px;
        color: #000;
    }

    .button-site-js button:hover {
        background-color: #D8DADF;
    }

    .button-site-js button:last-child {
        background-color: #1877F2;
        color: #fff;
    }

    .button-site-js button:last-child:hover {
        background-color: #1771E6;
    }



    .putlic-c-o-btn div p {
        padding: 0px;
    }

    .bio-btn-click {
        display: none;
    }

    .at9-images {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(90px, 1fr));
        gap: 10px;
        margin-top: 15px;
    }

    .images-div {
        text-align: center;
    }

    .images-div img {
        width: 80px;
        height: 80px;
        border-radius: 10px;
        object-fit: cover;
        border: 2px solid #ddd;
        transition: 0.3s;
    }

    .images-div img:hover {
        transform: scale(1.05);
        border-color: #1877f2;
    }

    .images-div p {
        margin-top: 5px;
        font-size: 13px;
        color: #333;
        font-weight: 500;
    }

    .add-post-links {
        display: flex;
        margin-top: 10px;
    }

    .add-post-links a {
        text-decoration: none;
        display: flex;
        align-items: center;
        color: #626262;
        margin-right: 30px;
        font-size: 13pxl;
    }

    .add-post-links a img {
        width: 20px;
        margin-right: 10px;
    }
    /* ======== BOX DESIGN / POST CARD STYLE ======== */
.box-design.post-div {
    background: #fff;
    border-radius: 12px;
    padding: 15px;
    margin-bottom: 25px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.08);
    border: 1px solid #e5e7eb;
}

/* ======== HEADER / POST TOP ======== */
.post-infarmation {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.post-profile-img img {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    object-fit: cover;
    border: 1px solid #ddd;
}

.post-three-dot {
    margin-right: 10px;
}

.post-three-dot p {
    margin: 0;
    font-weight: 600;
    font-size: 16px;
}

.post-three-dot span {
    display: block;
    font-size: 13px;
    color: #777;
}

/* ======== POST CONTENT ======== */
.post-text {
    font-size: 15px;
    margin: 10px 0;
    color: #333;
    line-height: 1.5;
}

.post-img {
    width: 100%;
    max-height: 500px;
    object-fit: cover;
    border-radius: 10px;
    margin: 10px 0;
}

/* ======== ACTIONS (LIKE / COMMENT / SHARE) ======== */
.actavite {
    display: flex;
    justify-content: space-between;
    margin: 12px 0;
    padding: 10px 0;
    border-top: 1px solid #ececec;
    border-bottom: 1px solid #ececec;
}

.actavite div {
    display: flex;
    align-items: center;
    gap: 6px;
    cursor: pointer;
    font-weight: 600;
    color: #555;
    padding: 8px 15px;
    border-radius: 8px;
}

.actavite div:hover {
    background: #f2f2f2;
}

.actavite img {
    width: 20px;
}

/* ======== COMMENT INPUT ======== */
.comment-site {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 12px;
}

.comment-site .profil-ing-div img {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    object-fit: cover;
    border: 1px solid #ddd;
}

.comment-input {
    flex: 1;
    background: #f0f2f5;
    padding: 10px 12px;
    border-radius: 25px;
    display: flex;
    align-items: center;
}

.comment-input input {
    flex: 1;
    border: none;
    background: transparent;
    outline: none;
    font-size: 14px;
}

.comment-icon-div {
    display: flex;
    align-items: center;
    gap: 10px;
}

.comment-icon-div img {
    width: 22px;
}

.comment-icon-div i {
    font-size: 18px;
    color: #555;
}

</style>

<body>
    <div class="popop-background"></div>
    <div class="thim-div">
        <div class="hadr-thim-bar">
            <span id="thim-button" class="fas fa-caret-right"></span>

            <p>Backgroun</p>
            <div class="bg-color">
                <div id="bg-c-1" class="bg-color-1"></div>
                <div id="bg-c-2" class="bg-color-2"></div>
                <div id="bg-c-3" class="bg-color-3"></div>
                <div id="bg-c-4" class="bg-color-4"></div>
                <div id="bg-c-5" class="bg-color-5"></div>
                <div id="bg-c-6" class="bg-color-6"></div>
            </div>
            <br>
            <p>Text Color</p>
            <div class="bg-color">
                <div id="txt-c-1" class="bg-color-1"></div>
                <div id="txt-c-2" class="bg-color-2"></div>
                <div id="txt-c-3" class="bg-color-3"></div>
                <div id="txt-c-4" class="bg-color-4"></div>
                <div id="txt-c-5" class="bg-color-5"></div>
                <div id="txt-c-6" class="bg-color-6"></div>
            </div>

        </div>
    </div>



    <section class="cover-image-section">
        <header class="cover-hader-site">
            @if ($user->cover_photo)
                <img src="{{ asset('storage/' . $user->cover_photo) }}" alt="Cover Photo">
            @else
                <img src="{{ asset('images/default-cover.jpg') }}" alt="Default Cover">
            @endif

            {{-- <div class="cover-image-div">
                <div class="cover-image-edite-btn">
                    <button>
                        <i class="fas fa-camera"></i>
                    </button>
                    {{-- <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <textarea name="content" placeholder="What's on your mind?"></textarea>
                        <input type="file" name="image">
                        <button type="submit">Post</button>
                    </form> -

                </div>
            </div> --}}

        </header>
    </section>

    <section class="profile-section">
        <div class="profile-section-in">

            <div class="profile-image-site">
                <div class="profile-image-div">
                    <a href="#" id="profile-link">
                        <img id="Profile_images"
                            src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/user.png') }}"
                            alt="profile-pic">
                    </a>
                    <span class="fas fa-camera"></span>
                </div>
            </div>
            <div class="profile-name-info">
                <h1>
                    <span class="pro-txt" id="profile_name">{{ $user->name }}</span>
                    <span id="nik-name"></span>
                </h1>
                <p>
                    <span class="fir-count-txt">

                        <div class="followers-info" style="display: flex;">

                            <strong>المتابِعون:</strong> {{ $followers->count() }} <br>
                            <strong>يتابع:</strong> {{ $followings->count() }}
                        </div>

                    </span>
                </p>
                @if (Auth::id() !== $user->id)
                    @if (Auth::user()->followings->contains($user->id))
                        <form action="{{ route('profile.unfollow', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">إلغاء المتابعة</button>
                        </form>
                    @else
                        <form action="{{ route('profile.follow', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">متابعة</button>
                        </form>
                    @endif
                @endif
                <div class="friends-img-div">
                    @php
                        $followersToShow = $user->followers->take(7); // أول 7 فقط
                        $hasMoreFollowers = $user->followers->count() > 7;
                    @endphp

                    @foreach ($followersToShow as $index => $follower)
                        <div class="firend-img {{ chr(97 + $index) }}"> {{-- a,b,c... --}}
                            <a href="{{ route('profileindex', $follower->id) }}">
                                <img id="frind-image-{{ $index + 1 }}"
                                    src="{{ $follower->avatar ? asset('storage/' . $follower->avatar) : asset('images/default-avatar.png') }}"
                                    alt="{{ $follower->name }}" title="{{ $follower->name }}">
                            </a>
                        </div>
                    @endforeach

                    @if ($hasMoreFollowers)
                        <div class="firend-img last-fi-div h">
                            <a href="{{ route('profile.followers', $user->id) }}">
                                <img src="{{ asset('images/friends/00.jpg') }}" alt="More">
                                <span class="fas fa-ellipsis-h"></span>
                            </a>
                        </div>
                    @endif
                </div>



            </div>

            <div class="btn-site-pro profile-button-site">
                @if (Auth::id() === $user->id)
                    <a href="{{ route('profile.edit', $user->id) }}">
                        <span class="edit-profile-btn btn">Edit Profile</span>
                    </a>
                    <a href="{{ route('stories.create') }}">
                        <span class="edit-profile-btn btn">add story</span>
                    </a>
                @endif
            </div>


        </div>
    </section>


    <section class="full-navbar">
        <nav class="navbar-site">

            <ul compact="txt-color-c">

                <a href="{{ route('profile.followers', $user->id) }}">
                    <li class=" txt-cc">Friends</li>
                </a>
                <a  href="{{ route('profile.seephoto', $user->id) }}" id="photo-nav">
                    <li class=" txt-cc">Photo</li>
                </a>

            </ul>

            <div class="nav-btn">
                 <div class="add-post-links">

                            <a href="/addphoto"><img src="./images/images/photo.png" alt="video-img">Photo/Video</a>

                        </div>
            </div>

        </nav>


    </section>


    <section class="post-section">
        <div class="post-section-in">

            <section class="info-section">
{{--
                <div class="profile-lock-div">
                    <div class="icon-pld">
                        <i class="fab fa-keycdn"></i>
                    </div>
                    <div class="pld-text">
                        <h3>You locked your profile</h3>
                        <a href="#">Learn More</a>
                    </div>
                </div> --}}
                {{--
                <div class="about-info">
                    <h4>Intro</h4>

                    <p id="bio-text">MD Mehedi Hasan</p>
                    <div class="bio-btn-click">
                        <input class="input-box" type="text" value="MD Mehedi Hasan">
                        <p class="length-count-txt">
                            <span id="length-count">101</span> characters remaining
                        </p>
                        <div class="putlic-c-o-btn">
                            <div>
                                <p><span class="fas fa-globe-europe"></span> Public</p>
                            </div>
                            <div class="button-site-js">
                                <button id="cencel-btn">Cencel</button>
                                <button id="save-btn">Save</button>
                            </div>
                        </div>
                    </div>
                    <button id="bio-edit-btn" class="edit-bio btn">Edit Bio</button>

                    <ul>
                        <li><i class="fas fa-briefcase"></i> Works at
                            <a href="#">Sad Mia</a>
                        </li>

                        <li><i class="fas fa-graduation-cap"></i> Went to
                            <a href="#">kamarkhali high school</a>
                        </li>

                        <li><i class="fas fa-home"></i> Lives in
                            <a href="#">Dhaka, Bangladesh</a>
                        </li>

                        <li><i class="fas fa-map-marker-alt"></i> From
                            <a href="#">Faridpur, Dhaka, Bangladesh</a>
                        </li>
                        <li><i class="fas fa-heart"></i> Single</li>
                        <li><i class="fas fa-globe"></i> <a href="#">
                                sadmia.com
                            </a></li>
                    </ul>

                    <button class="edit-bio btn">Edit Details</button>

                    <div class="Hobbies-show">
                        <span><i class="fas fa-laptop-code"></i> Learning to Code</span>

                        <span><i class="fas fa-laptop-code"></i>Code</span>

                        <span><i class="fas fa-book"></i>Learning</span>

                        <span><i class="fas fa-camera-retro"></i>Photography</span>
                    </div>

                    <button class="edit-bio btn">Edit Hobbies</button>

                    <div class="Featured-site">

                        <div class="Featured-img-div">
                            <img id="post-image-12" src="images/friends/0.jpg">
                        </div>

                        <div class="Featured-img-div">
                            <img id="post-image-11" src="images/friends/0.jpg">
                        </div>

                        <div class="Featured-img-div">
                            <img id="post-image-9" src="images/friends/0.jpg">
                        </div>

                        <div class="Featured-img-div">
                            <img id="post-image-8" src="images/friends/0.jpg">
                        </div>

                    </div>

                    <button class="edit-bio btn">Edit Featured</button>
                </div> --}}

                <div class="box-design images-site">

                    <span>Photos</span>

                    <div class="see-all-images">
                        <a href="{{ route('profile.seephoto', $user->id) }}">See All Photos </a> |
                    </div>
                    <div class="at9-images">
                        @foreach ($posts as $post)
                            @if ($post->image)
                                <div class="images-div">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="">
                                </div>
                            @endif
                        @endforeach

                    </div>

                </div>

                <div class="box-design friends-site">
                    <div class="followers-info mt-4">
                        <strong>المتابِعون:</strong> {{ $followers->count() }} <br>
                        <strong>المتابَعون:</strong> {{ $followings->count() }}
                    </div>

                    <div class="see-all-images">
                        <a href="{{ route('profile.followers', $user->id) }}">عرض كل المتابعين</a> |
                    </div>

                    <div class="at9-images">
                        @forelse ($followers as $follower)
                            <div class="images-div">
                                <a href="{{ route('profileindex', $follower->id) }}">
                                    <img src="{{ $follower->avatar ? asset('storage/' . $follower->avatar) : asset('/public/storage/avatars/user.jpg') }}"
                                        alt="{{ $follower->name }}">
                                </a>
                                <p><a href="{{ route('profileindex', $follower->id) }}">{{ $follower->name }}</a></p>
                            </div>
                        @empty
                            <p class="text-center text-muted">لا يوجد متابعون بعد</p>
                        @endforelse
                    </div>
                </div>
                <div class="box-design friends-site mt-4">
                    <span>يتابع</span>
                    <div class="see-all-images">
                        <a href="{{ route('profile.followings', $user->id) }}">عرض من يتابعهم</a>
                    </div>

                    <div class="at9-images">
                        @forelse ($followings as $following)
                            <div class="images-div">
                                <a href="{{ route('profileindex.show', $following->id) }}">
                                    <img src="{{ $following->avatar ? asset('storage/' . $following->avatar) : asset('/public/storage/avatars/user.jpg') }}"
                                        alt="{{ $following->name }}">
                                </a>
                                <p><a
                                        href="{{ route('profileindex.show', $following->id) }}">{{ $following->name }}</a>
                                </p>
                            </div>
                        @empty
                            <p class="text-center text-muted">لا يتابع أحد بعد</p>
                        @endforelse
                    </div>
                </div>


            </section>


            <section class="post-info">

                <div class="box-design">

                    <div class="post-upload-T">
                        <div class="profil-ing-div">
                            <a href="#" id="profile-link">
                                <img id="Profile_images"
                                    src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/user.png') }}"
                                    alt="profile-pic">
                            </a>
                        </div>
                        @if (Auth::id() === $user->id)
                            <form action="{{ route('profileindex.storePost') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="text-post">
                                    <textarea class="content" name="content" style="width: 100%;" class="form-control"
                                        placeholder="           اكتب ما تفكر فيه..."></textarea>
                                    <style>
                                        .content {
                                            display: flex;
                                            justify-content: center;
                                            align-items: center;

                                            width: 100%;
                                            height: 100%;
                                            border-radius: 25px;

                                        }
                                    </style>
                                </div>
                                <input type="file" name="image" class="form-control mt-2">
                                <button class="btn btn-primary mt-2">نشر</button>
                            </form>
                        @endif
                        {{-- <div class="add-post-links">
                            <a href="#"><img src="./images/images/live-video.png" alt="video-img">Live
                                Video</a>
                            <a href="/addphoto"><img src="./images/images/photo.png" alt="video-img">Photo/Video</a>
                            <a href="#"><img src="./images/images/feeling.png" alt="video-img">Feeling/
                                Activity</a>
                        </div> --}}
                    </div>

                </div>

                <div class="box-design post-filter">

                    <div class="filter-site">
                        <span>Posts</span>
                        <div class="fil-ter">
                            <button><i class="fas fa-sliders-h"></i> Filters</button>

                            <button><i class="fas fa-cog"></i> Manager Posts</button>
                        </div>
                    </div>

                    <div class="list-type">
                        <div class="fil-list activ-navbar">
                            <i class="fas fa-bars"></i> List View
                        </div>
                        <div class="fil-list">
                            <i class="fas fa-th-large"></i> Grid View
                        </div>
                    </div>

                </div>


                <!-- ************ Post ************ -->
                @if (isset($posts))

                    @foreach ($posts as $post)
<div class="box-design post-div">
    <div class="post-infarmation">
        <div>
            <div class="profil-ing-div post-profile-img">
                <a href="#" id="profile-link">
                    <img src="{{ asset('storage/' . $post->user->avatar) }}" alt="user">
                </a>
            </div>
        </div>

        <div class="post-three-dot">
            <p>{{ $post->user->name }}</p>
            <span>{{ $post->created_at->diffForHumans() }}</span>
        </div>
    </div>

    <p class="post-text">{{ $post->content }}</p>

    @if ($post->image)
        <img class="post-img" src="{{ asset('storage/' . $post->image) }}" alt="Post image">
    @endif

    <div class="actavite">
        <div><img src="{{ asset('images/like-blue.png') }}"> Like</div>
        <div><img src="{{ asset('images/comment.png') }}"> Comment</div>
        <div><img src="{{ asset('images/share.png') }}"> Share</div>
    </div>

    <div class="comment-site">
        <div class="profil-ing-div">
            <a href="#" id="profile-link">
                <img src="{{ asset('storage/' . $post->user->avatar) }}" alt="user">
            </a>
        </div>
        <div class="comment-input">
            <input type="text" placeholder="Write a comment…">
            <div class="comment-icon-div">
                <div><i class="far fa-grin-alt"></i></div>
                <div><i class="fas fa-camera"></i></div>
                <div><img src="images/icon/gif.jpg"></div>
                <div><img src="images/icon/sticer.jpg"></div>
            </div>
        </div>
    </div>
</div>

                    @endforeach

                @endif
                <!-- ************ End Post ************ -->


            </section>

        </div>

    </section>




    <script type="text/javascript" src="js/castom.js"></script>

    <style>

    </style>

</body>

</html>
