<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
            crossorigin="anonymous"></script>


    <style>
        body {
            background-color: #ffffff;
        }

        .sidebar {
            margin: 0;
            padding-top: 20px;
            width: 280px;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        .sidebar a {
            display: block;
            padding: 16px;
            text-decoration: none;
            font-size: .875rem;
            font-weight: 500;
            line-height: 1.25rem;
            hyphens: auto;
            word-break: break-word;
            word-wrap: break-word;
            color: #3c4043;
        }

        .sidebar a.active {
            color: #1967d2;
            text-decoration: none;
            border-radius: 0 50px 50px 0;
            background-color: #e8f0fe;
        }

        .sidebar a:hover:not(.active) {
            background-color: rgba(0, 0, 0, 0.039);
            border-radius: 0 50px 50px 0;
            transition: background 15ms;
        }

        div.content {
            margin-left: 320px;
            padding: 1px 16px;
            height: 1000px;
        }

        @media screen and (max-width: 700px) {
            div.sidebar {
                overflow: auto;
                white-space: nowrap;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                display: inline-block;
                text-align: center;
                padding: 14px;
                text-decoration: none;
                color: gray;
            }

            .sidebar a.active {
                color: #1967d2;
                border-bottom: solid 1px #1967d2;
                border-radius: 2px;
                background-color: #ffffff;
            }

            .sidebar a:hover:not(.active) {
                color: #1967d2;
                background-color: #ffffff;
            }

            div.content {
                margin-left: 0;
            }
        }

        .g4E9Cb .ZAGvjd {
            padding-left: 0;
            padding-right: 0;
        }

        .oKubKe, .VOEIyf .ZAGvjd {
            box-sizing: border-box;
            padding: 0 16px;
        }

        .VOEIyf .ZAGvjd {
            border-color: transparent;
            border-style: solid;
            border-width: 0 1px;
            outline: none;
        }

        .d1dlne, .Ax4B8, .yNVtPc {
            height: 100%;
        }

        .Ax4B8, .yNVtPc {
            background-color: transparent;
            color: inherit;
            font: inherit;
            line-height: inherit;
        }

        .Ax4B8 {
            position: relative;
        }

        .material-icons {
            vertical-align: middle;
        }

        .d1dlne, .Ax4B8 {
            display: flex;
            flex: 1;
        }

        input, select, textarea {
            letter-spacing: .01428571em;
            font-family: Roboto, Arial, sans-serif;
            font-size: .875rem;
            font-weight: 400;
            line-height: 1.25rem;
            color: #3c4043;
        }

        input, select, textarea {
            color: rgba(0, 0, 0, 0.87);
            font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif;
        }

        .progress {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #F2F2F2;
        }

        .bar {
            background-color: #819FF7;
            width: 0%;
            height: 5px;
            border-radius: 3px;
        }

        /*.progress1 {*/
        /*    position: fixed;*/
        /*    left: 0px;*/
        /*    top: 0px;*/
        /*    width: 100%;*/
        /*    height: 100%;*/
        /*    z-index: 9999;*/
        /*    background-color: #F2F2F2;*/
        /*}*/

        .bar1 {
            background-color: #819FF7;
            width: 0%;
            height: 5px;
            border-radius: 3px;
        }

        .percent {
            position: absolute;
            display: inline-block;
            top: 3px;
            left: 48%;
        }

        .search-box {
            height: 60px;
            max-width: 700px;
        }

        .search-box input {
            height: 80%;
            width: 100%;
            outline: none;
            border: 1px solid transparent;
            border-radius: 8px;
            background: #f1f3f4;
            font-size: 15px;
            padding: 0 60px 0 50px;
        }

        .search-box .search-btn {
            height: 50px;
            width: 50px;
            position: absolute;
            color: darkgrey;
            top: 22%;
            right: 5px;
            transform: translate(-2300%);
        }

        .search-box .cancel-btn {
            height: 50px;
            width: 50px;
            position: absolute;
            color: darkgrey;
            top: 22%;
            right: 5px;
            transform: translate(-1000%);
            cursor: pointer;
        }

        input:focus {
            background: rgba(255, 255, 255, 1);
            border: 1px solid transparent;
            -webkit-box-shadow: 0 1px 1px 0 rgb(65 69 73 / 30%), 0 1px 3px 1px rgb(65 69 73 / 15%);
            box-shadow: 0 1px 1px 0 rgb(65 69 73 / 30%), 0 1px 3px 1px rgb(65 69 73 / 15%);
        }

        input:focus .cancel-btn {
            display: none;
        }

        #searchResult {
            list-style: none;
            padding: 0px;
            width: 250px;
            position: absolute;
            margin: 0;
        }

        .ui-menu {
            box-shadow: 0 1px 1px rgb(0 0 0 / 24%);
        }

        .xNklye {
            padding-top: 24px;

        }

        header {
            display: block;
        }

        .B1tEqd {
            -webkit-box-align: center;
            box-align: center;
            align-items: center;
            display: flex;
            -webkit-box-pack: center;
            box-pack: center;
            -webkit-box-pack: center;
            justify-content: center;
        }

        .cstRMd {
            position: relative;
        }

        .rN3O0d {
            box-flex: 0;
            flex-grow: 0;
            flex-shrink: 0;
            border-radius: 50%;
            border: 1px solid #dadce0;
            box-sizing: border-box;
            overflow: hidden;
            position: relative;
            width: auto;
        }

        .hryX1e {
            box-sizing: border-box;
            display: block;
            width: 100%;
        }

        .g21QNe, .hryX1e {
            background: none;
            border: none;
            color: inherit;
            font: inherit;
            margin: 0;
            padding: 0;
            text-align: left;
        }

        .HJOYVi13 {
            width: 96px;
            height: 96px;
        }

        .Vz93id {
            border-radius: 50%;
        }

        .HJOYV {
            -webkit-box-align: center;
            box-align: center;
            align-items: center;
            display: flex;
            -webkit-box-pack: center;
            box-pack: center;
            -webkit-box-pack: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
            padding: 0;
        }

        .SC4xFe {
            transition: opacity .2s ease-in-out;
            background-color: rgba(32, 33, 36, 0.6);
            bottom: 0;
            height: 33%;
            left: 0;
            opacity: 0;
            position: absolute;
            right: 0;
        }

        .EyVCdb {
            background-image: url(//www.gstatic.com/images/icons/material/system/2x/photo_camera_white_24dp.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: 24px 24px;
            height: 100%;
            opacity: .8;
        }

        .x7WrMb {
            font-family: 'Google Sans', Roboto, Arial, sans-serif;
            font-size: 1.75rem;
            font-weight: 400;
            letter-spacing: 0;
            line-height: 2.25rem;
            hyphens: auto;
            word-break: break-word;
            word-wrap: break-word;
            color: #202124;
            text-align: center;
        }

        h1 {
            display: block;
            font-size: 2em;
            margin-block-start: 0.67em;
            margin-block-end: 0.67em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }

        @media (min-width: 1024px) {
            .s7iwrf.Kdcijb .ETkYLd {
                max-width: 1120px;
            }
        }

        @media (min-width: 1024px) {
            .ETkYLd {
                padding-left: 48px;
                padding-right: 48px;
            }
        }

        @media (min-width: 720px) {
            .ETkYLd {
                padding-left: 24px;
                padding-right: 24px;
            }
        }

        @media (min-width: 600px) {
            .ETkYLd {
                padding-left: 16px;
                padding-right: 16px;
            }

            .ETkYLd {
                margin-left: auto;
                margin-right: auto;
                max-width: 840px;
                padding-left: 8px;
                padding-right: 8px;
            }
        }

        .cmSWBc {
            letter-spacing: .00625em;
            font-family: Roboto, Arial, sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5rem;
            hyphens: auto;
            word-break: break-word;
            word-wrap: break-word;
            color: #5f6368;
            margin-top: 16px;
            text-align: center;
        }

        @media (min-width: 743px) and (max-width: 1023px), (min-width: 1071px) {
            .gMPiLc.Kdcijb:not(.POdh1) .wJpH8c {
                width: 100%;
            }
        }

        .wJpH8c {
            display: flex;
            -webkit-box-orient: vertical;
            box-orient: vertical;
            flex-direction: column;
            width: 100%;
        }

        .mSUZQd {
            display: flex;
        }

        .jbRlDc {
            display: flex;
            -webkit-box-orient: vertical;
            box-orient: vertical;
            flex-direction: column;
            box-flex: 1;
            flex-grow: 1;
            flex-shrink: 1;
            flex-basis: 0;
        }

        @media (min-width: 720px) and (max-width: 1023px), (min-width: 1048px) {
            .UUlDsf.Kdcijb:not(.POdh1) .fnfC4c {
                font-family: 'Google Sans', Roboto, Arial, sans-serif;
                font-size: 1.375rem;
                font-weight: 400;
                letter-spacing: 0;
                line-height: 1.75rem;
                hyphens: auto;
                word-break: break-word;
                word-wrap: break-word;
                color: #202124;
            }
        }

        .fnfC4c {
            box-flex: 0;
            flex-grow: 0;
            flex-shrink: 0;
            font-family: 'Google Sans', Roboto, Arial, sans-serif;
            font-size: 1.125rem;
            font-weight: 400;
            letter-spacing: 0;
            line-height: 1.5rem;
            hyphens: auto;
            word-break: break-word;
            word-wrap: break-word;
            color: #202124;
            margin: 0;
            padding: 0;
        }

        h2 {
            display: block;
            font-size: 1.5em;
            margin-block-start: 0.83em;
            margin-block-end: 0.83em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
        }

        .ISnqu {
            box-flex: 1;
            flex-grow: 1;
            flex-shrink: 1;
            letter-spacing: .01428571em;
            font-family: Roboto, Arial, sans-serif;
            font-size: .875rem;
            font-weight: 400;
            line-height: 1.25rem;
            hyphens: auto;
            word-break: break-word;
            word-wrap: break-word;
            color: #5f6368;
            margin: 0;
            padding: 8px 0 0 0;
        }

        .CljqTd {
            -webkit-box-align: center;
            box-align: center;
            align-items: center;
            display: flex;
            -webkit-box-pack: center;
            box-pack: center;
            -webkit-box-pack: center;
            justify-content: center;
            box-flex: 0;
            flex-grow: 0;
            flex-shrink: 0;
            margin-left: 16px;
        }

        @media (min-width: 720px) and (max-width: 1023px), (min-width: 1048px) {
            .UUlDsf.Kdcijb:not(.POdh1) .ugt2L:first-child:not(.t97Ap) .N5YmOc, .UUlDsf.Kdcijb:not(.POdh1) .ugt2L:first-child .cv2gi {
                padding-top: 24px;
            }
        }

        @media (min-width: 720px) and (max-width: 1023px), (min-width: 1048px) {
            .UUlDsf.Kdcijb:not(.POdh1) .kJXJmd {
                padding-left: 24px;
                padding-right: 24px;
            }
        }

        .ugt2L:first-child:not(.t97Ap) .N5YmOc, .ugt2L:first-child .cv2gi {
            padding-top: 16px;
        }

        .ugt2L.t97Ap .N5YmOc, .ugt2L.iDdZmf .N5YmOc {
            padding-top: 15px;
            padding-bottom: 16px;
        }

        .N5YmOc.bvW4md {
            height: auto;
        }

        .kJXJmd {
            padding-left: 16px;
            padding-right: 16px;
        }

        .N5YmOc {
            height: 100%;
            padding-bottom: 8px;
            padding-top: 8px;
        }

        .I6g62c {
            outline-offset: -4px;
        }

        .VZLjze {
            color: #1a73e8;
            text-decoration: none;
        }

        .Wvetm {
            display: block;
        }

        a {
            color: #1a73e8;
        }

        a {
            color: #2962ff;
        }

        a {
            text-decoration: none;
            color: #2962ff;
        }

        .mSUZQd {
            display: flex;
        }

        .ugt2L {
            min-height: 1px;
        }

        .ahh38c {
            display: flex;
            -webkit-box-orient: vertical;
            box-orient: vertical;
            flex-direction: column;
            width: 100%;
        }

        @media (min-width: 720px) and (max-width: 1023px), (min-width: 1048px) {
            .UUlDsf.Kdcijb:not(.POdh1) .XLK0Od {
                margin-left: 12px;
                margin-right: 12px;
                margin-top: 24px;
            }
        }

        @media (min-width: 600px) {
            .UUlDsf.Kdcijb:not(.POdh1) .XLK0Od {
                margin-top: 16px;
            }
        }

        .XLK0Od {
            display: flex;
            box-flex: 1;
            flex-grow: 1;
            flex-shrink: 1;
            background-color: #fff;
            border-radius: 8px;
            border: 1px solid #dadce0;
            box-sizing: border-box;
            overflow: hidden;
            margin-top: 8px;
        }

        @media (min-width: 743px) and (max-width: 1023px), (min-width: 1071px) {
            .gMPiLc.Kdcijb:not(.POdh1) .wJpH8c.l5Ibu {
                width: 50%;
            }
        }

        @media (min-width: 743px) and (max-width: 1023px), (min-width: 1071px) {
            .gMPiLc.Kdcijb:not(.POdh1) .wJpH8c {
                width: 100%;
            }
        }

        .wJpH8c {
            display: flex;
            -webkit-box-orient: vertical;
            box-orient: vertical;
            flex-direction: column;
            width: 100%;
        }

        @media (min-width: 600px) {
            .UUlDsf.Kdcijb:not(.POdh1) .dQBdyc {
                padding-top: 8px;
            }
        }

        .dQBdyc {
            padding-bottom: 20px;
            padding-top: 16px;
        }

        @media (min-width: 743px) and (max-width: 1023px), (min-width: 1071px) {
            .gMPiLc.Kdcijb:not(.POdh1) .wJpH8c.l5Ibu {
                width: 50%;
            }
        }

        @media (min-width: 743px) and (max-width: 1023px), (min-width: 1071px) {
            .gMPiLc.Kdcijb:not(.POdh1) .wJpH8c {
                width: 100%;
            }
        }

        @media (min-width: 720px) and (max-width: 1023px), (min-width: 1048px) {
            .UUlDsf.Kdcijb:not(.POdh1) .ugt2L.ul8zCc .cv2gi, .UUlDsf.Kdcijb:not(.POdh1) .ugt2L:first-child .cv2gi:first-child, .UUlDsf.Kdcijb:not(.POdh1) .ugt2L:last-child .cv2gi:last-child, .UUlDsf.Kdcijb:not(.POdh1) .ugt2L.aK2X8b:hover .cv2gi, .UUlDsf.Kdcijb:not(.POdh1) .ugt2L.aK2X8b:hover + .ugt2L .cv2gi {
                padding-left: 0;
            }
        }

        @media (min-width: 720px) and (max-width: 1023px), (min-width: 1048px) {
            .UUlDsf.Kdcijb:not(.POdh1) .cv2gi {
                padding-left: 24px;
            }
        }

        .ugt2L.ul8zCc .cv2gi, .ugt2L:first-child .cv2gi:first-child, .ugt2L:last-child .cv2gi:last-child, .ugt2L.aK2X8b:hover .cv2gi, .ugt2L.aK2X8b:hover + .ugt2L .cv2gi {
            padding-left: 0;
        }

        .cv2gi {
            transition: padding-left 15ms ease-in-out;
            padding-left: 16px;
        }

        .Q5jTGb {
            border-top: 1px solid #dadce0;
        }

        .VfPpkd-ksKsZd-XxIAqe {
            --mdc-ripple-fg-size: 0;
            --mdc-ripple-left: 0;
            --mdc-ripple-top: 0;
            --mdc-ripple-fg-scale: 1;
            --mdc-ripple-fg-translate-end: 0;
            --mdc-ripple-fg-translate-start: 0;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            will-change: transform, opacity;
            position: relative;
            outline: none;
            overflow: hidden;
        }

        @media (min-width: 720px) and (max-width: 1023px), (min-width: 1048px) {
            .UUlDsf.Kdcijb:not(.POdh1) .ugt2L.t97Ap.ul8zCc .N5YmOc {
                padding-bottom: 18px;
                padding-top: 17px;
            }
        }

        @media (min-width: 720px) and (max-width: 1023px), (min-width: 1048px) {
            .UUlDsf.Kdcijb:not(.POdh1) .ugt2L:last-child.t97Ap .N5YmOc {
                padding-bottom: 16px;
            }
        }

        @media (min-width: 720px) and (max-width: 1023px), (min-width: 1048px) {
            .UUlDsf.Kdcijb:not(.POdh1) .ugt2L:last-child .N5YmOc, .UUlDsf.Kdcijb:not(.POdh1) .ugt2L:last-child .cv2gi:last-child {
                padding-bottom: 24px;
            }
        }

        @media (min-width: 720px) and (max-width: 1023px), (min-width: 1048px) {
            .UUlDsf.Kdcijb:not(.POdh1) .kJXJmd {
                padding-left: 24px;
                padding-right: 24px;
            }
        }

        .ugt2L.t97Ap.ul8zCc .N5YmOc {
            padding-bottom: 18px;
            padding-top: 17px;
        }

        .ugt2L:last-child.t97Ap .N5YmOc {
            padding-bottom: 16px;
        }

        .ugt2L:last-child .N5YmOc, .ugt2L:last-child .cv2gi:last-child {
            padding-bottom: 16px;
        }

        .ugt2L.t97Ap .N5YmOc, .ugt2L.iDdZmf .N5YmOc {
            padding-top: 15px;
            padding-bottom: 16px;
        }

        .kJXJmd {
            padding-left: 16px;
            padding-right: 16px;
        }

        .N5YmOc {
            height: 100%;
            padding-bottom: 8px;
            padding-top: 8px;
        }

        .I6g62c {
            outline-offset: -4px;
        }

        .VZLjze {
            color: #1a73e8;
            text-decoration: none;
        }

        .Wvetm {
            display: block;
        }

        a {
            color: #1a73e8;
        }

        a {
            color: #2962ff;
        }

        a {
            text-decoration: none;
            color: #2962ff;
        }

        .YPzqGd {
            height: 100%;
            width: auto;
        }

        img {
            border: none;
        }

        .HJOYVi15 {
            width: 96px;
            height: 96px;
        }

        .HJOYV {
            -webkit-box-align: center;
            box-align: center;
            align-items: center;
            display: flex;
            -webkit-box-pack: center;
            box-pack: center;
            -webkit-box-pack: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
            padding: 0;
        }

        figure {
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 40px;
            margin-inline-end: 40px;
        }

        @media (min-width: 743px) and (max-width: 1023px), (min-width: 1071px) {
            .UUlDsf.Kdcijb:not(.POdh1) .l5Ibu .fxHFgc {
                display: block;
            }
        }

        @media (min-width: 600px) {
            .UUlDsf.Kdcijb:not(.POdh1) .fxHFgc {
                display: none;
            }
        }

        @media (min-width: 743px) and (max-width: 1023px), (min-width: 1071px) {
            .UUlDsf.Kdcijb:not(.POdh1) .l5Ibu .ueiHJd {
                display: none;
            }
        }

        @media (min-width: 600px) {
            .UUlDsf.Kdcijb:not(.POdh1) .ueiHJd {
                display: flex;
            }
        }

        .ueiHJd {
            display: none;
        }

    </style>

</head>
<body onload="loadDefault()">
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#" style="vertical-align: middle">WarehouseMS Logo</a>
    <div class="container">
        <div class="nav-fill w-100" id="navbarNav">
            <div class="search-box" id="searchBox">

                <input id="tags" type="text" placeholder="Search in accounts" style="vertical-align: middle">
                {{--               <div class="ui-widget">--}}
                {{--                   <input id="tags">--}}
                {{--               </div>--}}
                <ul id="searchResult"></ul>
                <div class="search-btn">
                    <span class="material-icons" style="cursor: pointer;">search</span>
                </div>
                <div class="cancel-btn" id="cancelBtn" style="display: none">
                    <span class="material-icons">close</span>
                </div>
            </div>

        </div>
        <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg" alt="..." class="rounded-circle"
             style="height: 45px; width: 45px;">
    </div>
</nav>

<div class='progress' id="progress_div">
    <div class='bar' id='bar1'></div>
    <div class='percent' id='percent1'></div>
</div>

<div class='progress1' id="progress_div1">
    <div class="bar1" id="progressbar"></div>
</div>


<div class="sidebar">
    <a class="active" style="cursor: pointer" id="home"> <span class="material-icons" style="vertical-align: middle">account_circle</span>
        <span style="vertical-align: middle; padding-left: 5px">Home</span></a>
    <a style="cursor: pointer" id="personal-info"> <span class="material-icons">badge</span> <span
            style="vertical-align: middle; padding-left: 5px">Personal info</span></a>
    <a style="cursor: pointer" id="payment-plan"> <span class="material-icons">payment</span> <span
            style="vertical-align: middle; padding-left: 5px">Payment & Subscriptions</span> </a>
</div>

<input type="hidden" id="progress_width" value="0">


<div class="ETkYLd" id="body-div">

</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script>
    $('.sidebar a').click(function () {
        $('.sidebar a').removeClass('active')
        $(this).closest('.sidebar a').addClass('active')
    })

    mdc.ripple.MDCRipple.attachTo(document.querySelector('.foo-button'));
</script>

<script type="text/javascript">

    document.onreadystatechange = function (e) {
        if (document.readyState === "interactive") {
            var all = document.getElementsByTagName("*");
            for (var i = 0, max = all.length; i < max; i++) {
                set_ele(all[i]);
            }
        }
    }


    function check_element(ele) {
        var all = document.getElementsByTagName("*");
        var totalele = all.length;
        var per_inc = 100 / all.length;

        if ($(ele).on()) {
            var prog_width = per_inc + Number(document.getElementById("progress_width").value);
            document.getElementById("progress_width").value = prog_width;
            $("#bar1").animate({width: prog_width + "%"}, 10, function () {
                if (document.getElementById("bar1").style.width == "100%") {
                    $(".progress").fadeOut("slow");
                }
            });
        } else {
            set_ele(ele);
        }
    }

    function set_ele(set_element) {
        check_element(set_element);
    }

    var inputBox = document.getElementById('tags');

    inputBox.onkeyup = function () {
        if (inputBox.value !== "") {
            $('.cancel-btn').show()
            $('.cancel-btn').click(function (e) {
                e.preventDefault()
                inputBox.value = "";
                inputBox.focus()
                $('#searchResult').empty()
                $('#cancelBtn').css('display', 'none')
            })
        }
    }

    $(function () {
        var availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];
        $("#tags").autocomplete({
            source: availableTags
        });
    });


    $(document).ready(function () {
        var url = 'settings/home';
        $('#home').click(function () {
            $('#body-div').load(url)
            $('#progressbar').animate({
                width: 100 + "%"
            }, 10, function () {
                if (document.getElementById("progressbar").style.width == "100%") {
                    $(".progress1").fadeOut("slow");
                }
            })

        })

        $('#personal-info').click(function () {
            url = 'settings/personal-info'
            $('#body-div').load(url)
            $('#progressbar').animate({
                width: 100 + "%"
            }, 10, function () {
                if (document.getElementById("progressbar").style.width == "100%") {
                    $(".progress1").fadeOut("slow");
                }
            })

        })

    })

</script>

<script>

    function loadDefault() {
        var url = 'settings/home'
        $('#body-div').load(url)
    }

</script>


</body>
</html>
