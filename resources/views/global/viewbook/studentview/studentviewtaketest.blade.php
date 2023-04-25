<!DOCTYPE html>
<!-- saved from url=(0069)# -->
<html lang="en" class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Basic Page Needs
    ================================================== -->
    <title>CK-LMS</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS 
    ================================================== -->
    <link rel="stylesheet" href="{{asset('templatefiles/style.css')}}">
    <link rel="stylesheet" href="{{asset('templatefiles/night-mode.css')}}">
    <link rel="stylesheet" href="{{asset('templatefiles/framework.css')}}">
    <link rel="stylesheet" href="{{asset('templatefiles/bootstrap.css')}}"> 

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href="{{asset('templatefiles/icons.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">



    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

    <!-- Syntax Highlighter -->
    <link rel="stylesheet" type="text/css" href="{{asset('templatefiles/shCore.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('templatefiles/shCoreMidnight.css')}}" media="all">

    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    
    <script>
        (function (window, document, undefined) {
            'use strict';
            if (!('localStorage' in window)) return;
            var nightMode = localStorage.getItem('gmtNightMode');
            if (nightMode) {
                document.documentElement.className += ' night-mode';
            }
        })(window, document);


        (function (window, document, undefined) {

            'use strict';

            // Feature test
            if (!('localStorage' in window)) return;

            // Get our newly insert toggle
            var nightMode = document.querySelector('#night-mode');
            if (!nightMode) return;

            // When clicked, toggle night mode on or off
            nightMode.addEventListener('click', function (event) {
                event.preventDefault();
                document.documentElement.classList.toggle('night-mode');
                if (document.documentElement.classList.contains('night-mode')) {
                    localStorage.setItem('gmtNightMode', true);
                    return;
                }
                localStorage.removeItem('gmtNightMode');
            }, false);

        })(window, document);
    </script>



    <!-- javaScripts
    ================================================== -->
    <script src="{{asset('templatefiles/framework.js')}}"></script>
    <script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('templatefiles/simplebar.js')}}"></script>
    <script src="{{asset('templatefiles/main.js')}}"></script>
    <script src="{{asset('templatefiles/bootstrap-select.min.js')}}"></script>


<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>

    <!-- Essential JavaScript Libraries
	==============================================-->
    <script type="text/javascript" src="{{asset('templatefiles/shCore.js')}}"></script>
    <script type="text/javascript" src="{{asset('templatefiles/shBrushJScript.js')}}"></script>
    <script type="text/javascript" src="{{asset('templatefiles/shBrushXml.js')}}"></script>
    <style>
        .gutter,
        .toolbar {
            display: none
        }

        .syntaxhighlighter {
            padding: 15px 20px;
        }

        .syntaxhighlighter {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            padding: 0 !important;
            padding-top: 18px !important;
        }
        .btn-vidlist-3{            
            display:none; 
        }
        @media screen and (max-width: 500px) {
            .btn-vidlist-3 { 
                display:block; 
            }
        }
        
        div::-webkit-scrollbar-track, html::-webkit-scrollbar-track
        {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        div::-webkit-scrollbar-track, html::-webkit-scrollbar
        {
            width: 6px;
            background-color: #F5F5F5;
        }

        div::-webkit-scrollbar-track, html::-webkit-scrollbar-thumb
        {
            background-color: gray;
        }
        .hourselect, .minuteselect, .ampmselect{
            margin: 0px;
            display: inline;
        }
        .uk-slideshow-items{
            min-height: 450px !important;
        }
    </style>
</head>

<body style="">

    @php

    date_default_timezone_set('Asia/Manila');
    @endphp
    <div id="wrapper">

        <!-- Header Container
        ================================================== -->
        <div class="uk-sticky-placeholder" style="height: 70px; margin: 0px;" hidden=""></div>

        <!-- overlay seach on mobile-->
        <div class="nav-overlay uk-navbar-left uk-position-relative uk-flex-1 bg-grey uk-light p-2" hidden="" style="z-index: 10000;">
            <div class="uk-navbar-item uk-width-expand" style="min-height: 60px;">
                <form class="uk-search uk-search-navbar uk-width-1-1">
                    <input class="uk-search-input" type="search" placeholder="Search..." autofocus="">
                </form>
            </div>
            <a class="uk-navbar-toggle uk-icon uk-close" uk-close="" uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="h#"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" data-svg="close-icon"><line fill="none" stroke="#000" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#000" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></a>
        </div>

        <!-- side nav-->
    
        <!-- content -->
        <div class="page-content">


            <div class="page-content-inner">

                <div class="container-small">


                    <div class="bg-info uk-light uk-padding pb-0 rounded shadow">
                        <h2><strong>{{$quizinfo->title}}</strong>
                        
                        @if($quizinfo->sched == 1)
                            @if($quizinfo->noofattempts == null)
                            @else
                                <button type="button" class="btn btn-secondary btn-icon-label active mb-2 float-right">
                                    Attempts: {{$quizinfo->noofattempts}}
                                </button>
                            @endif
                        @endif
                        </h2>
                        <small>Chapter Test</small>

                        @if($quizinfo->sched == 1)
                        <br/>
                        From: {{$quizinfo->schedinfo->datefrom}} {{$quizinfo->schedinfo->timefrom}} &nbsp; &nbsp; &nbsp; To: {{$quizinfo->schedinfo->dateto}} {{$quizinfo->schedinfo->timeto}}
                        
                        @endif
                    </div>
                    <br/>
                    <div class="uk-child-width-3-3@m uk-grid-small uk-grid-match" uk-grid>
                        <div>
                            <div class="uk-card uk-card-default uk-card-body">
                                @if($quizinfo->schedinfo->status == 1)
                                
                                    <div class="uk-alert-primary p-0 rounded" uk-alert>
                                        <div class="row text-center">
                                            <div class="col-3">
                                                <small>Days</small>
                                                <label id="day{{$quizinfo->id}}deadline"></label>
                                            </div>
                                            <div class="col-3">
                                                <small>Hours</small>
                                                <label id="hour{{$quizinfo->id}}deadline"></label>
                                            </div>
                                            <div class="col-3">
                                                <small>Minutes</small>
                                                <label id="minute{{$quizinfo->id}}deadline"></label>
                                            </div>
                                            <div class="col-3">
                                                <small>Seconds</small>
                                                <label id="second{{$quizinfo->id}}deadline"></label>
                                            </div>
                                        </div>
                                    </div>
            
                                    <script>
                                        $(document).ready(function(){
                                            var deadline = new Date("{{$quizinfo->schedinfo->dateto.' '.date('H:i:s', strtotime($quizinfo->schedinfo->timeto))}}").getTime(); 
                                            var x = setInterval(function() { 
                                            var now = new Date().getTime(); 
                                            var t = deadline - now; 
                                            var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
                                            var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
                                            var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
                                            var seconds = Math.floor((t % (1000 * 60)) / 1000); 
                                            document.getElementById("day{{$quizinfo->id}}deadline").innerHTML =days ; 
                                            document.getElementById("hour{{$quizinfo->id}}deadline").innerHTML =hours; 
                                            document.getElementById("minute{{$quizinfo->id}}deadline").innerHTML = minutes;  
                                            document.getElementById("second{{$quizinfo->id}}deadline").innerHTML =seconds;  
                                            }, 1000);
            
                                        })
                                    </script>
                                    <ul class="uk-list-divider uk-list-large uk-accordion" uk-accordion>
                                        <li>
                                            <a class="uk-accordion-title" href="#">
                                                Instructions (<i>Click here to view instructions</i>)
                                            </a>
                                            <div class="uk-accordion-content">
                                                <textarea class="quizdescription">{{$quizinfo->description}}</textarea>
                                            </div>
                                        </li>
                                    </ul>
                                    
                                    @if(count($quizinfo->questions)>0)
                                        @php
                                            $itempageno = 1;
                                        @endphp
                                        @foreach($quizinfo->questions as $questioninfo)
                                            <button type="button" id="status{{$itempageno}}"  class="btn btn-sm btn-secondary active btn-statuspage">
                                                <span class="btn-inner--icon">
                                                Q{{$itempageno}}
                                                </span>
                                            </button>
                                            @php
                                                $itempageno += 1;
                                            @endphp
                                        @endforeach
                                        @php
                                            $itemno = 1;
                                        @endphp
                                        <form id="chaptertestform{{$quizinfo->id}}" action="/chaptertestsubmitanswers" method="get" class="mb-5 pb-3">
                                            <input type="hidden" name="studentuserid" value="{{Crypt::encrypt(auth()->user()->id)}}"/>
                                            <input type="hidden" name="chapterquizid" value="{{$quizinfo->id}}"/>
                                            <input type="hidden" name="recordid" value="{{$quizinfo->records[0]->id}}"/>
                                            <div uk-slideshow="animation: push">
                                                <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
                                                    <ul class="uk-slideshow-items">
                                                        @foreach($quizinfo->questions as $questioninfo)
                                                            <li>
                                                                <div class="uk-card-hover uk-card-body h-100 uk-text-secondary bg-secondary" style="overflow-y: auto;">
                                                                    {{$itemno}}. {{$questioninfo->question}} 
                                                                        @if($questioninfo->type == '1')
                                                                            <ul class="uk-list pl-4">
                                                                                @foreach($questioninfo->answers as $answer)
                                                                                    <li>
                                                                                        <div class="form-group clearfix">
                                                                                            @if($questioninfo->noofanswers == 1)
                                                                                                <div class="icheck-primary d-inline">
                                                                                                    <input type="radio"     name="chapterid{{$quizinfo->id}}_questionid{{$questioninfo->id}}_multiple[]"id="answer{{$answer->id}}" class="answervalue"value="{{$answer->id}}" item="{{$itemno}}">
                                                                                                    <label for="answer{{$answer->id}}">
                                                                                                        {{$answer->description}}
                                                                                                    </label>
                                                                                                </div>
                                                                                            @else
                                                                                                <div class="icheck-primary d-inline">
                                                                                                    <input type="checkbox" id="answer{{$answer->id}}" name="chapterid{{$quizinfo->id}}_questionid{{$questioninfo->id}}_multiple[]" value="{{$answer->id}}" class="answervalue" item="{{$itemno}}">
                                                                                                    <label for="answer{{$answer->id}}">
                                                                                                        {{$answer->description}}
                                                                                                    </label>
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @elseif($questioninfo->type == '2')
                                                                            (<em>Identification</em>)
                                                                            <input type="text" name="chapterid{{$quizinfo->id}}_questionid{{$questioninfo->id}}_ident[]" class="answervalue" style="border: 1px solid black;" item="{{$itemno}}"/>
                                                                        @elseif($questioninfo->type == '3')
                                                                            (<em>Short Essay</em>)
                                                                            <textarea name="chapterid{{$quizinfo->id}}_questionid{{$questioninfo->id}}_essay[]" class="answervalue" style="border: 1px solid black;" item="{{$itemno}}"></textarea>
                                                                        @endif
                                                                </div>
                                                            </li>
                                                            @php
                                                                $itemno += 1;
                                                            @endphp
                                                        @endforeach
                                                    </ul>
                                                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                                                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
                                                </div>
                                                <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
                                            </div>
                                            <button type="button" class="btn btn-success float-right submitanswers">Submit Answers</button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                </div>


                {{-- <!-- footer
               ================================================== -->
                <div class="footer">
                    <div class="uk-grid-collapse uk-grid" uk-grid="">
                        <div class="uk-width-expand@s uk-first-column">
                            <p>© 2019 <strong>Courseplus</strong>. All Rights Reserved. </p>
                        </div>
                        <div class="uk-width-auto@s">
                            <nav class="footer-nav-icon">
                                <ul>
                                    <li><a href="h#"><i class="icon-brand-facebook"></i></a></li>
                                    <li><a href="h#"><i class="icon-brand-dribbble"></i></a></li>
                                    <li><a href="h#"><i class="icon-brand-youtube"></i></a></li>
                                    <li><a href="h#"><i class="icon-brand-twitter"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div> --}}


            </div>

        </div>

    </div>
    <script>
        $(document).ready(function(){
            $('.otherinfo').summernote({
                airMode: true
            });
            $('.lessondescription').summernote({
                airMode: true
            });
            $('.quizdescription').summernote({
                airMode: true
            });
            $('article').hide();
            $('.containerlessonsview').hide();
            $(document).on('click','.vidlist-3 li', function(){
                $('.containerlessonsview').hide();
                $('#chapter-video-slider-'+$(this).attr('chapterid')).show()
                $('article').hide();
                $('#articlechapter'+$(this).attr('chapterid')).show();
            })
            $('.note-editable').attr('contenteditable',false)
        })
        function disableF5(e) {
        if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82)
        {
        e.preventDefault()
        
        Swal.fire({
        title:  'Warning',
        text: 'Note: Once you reload the page, your answers will not be saved.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Submit',
        }).then((confirm) => {
        if (confirm.value) {
        window.location.reload();
        }
        })
        
        }//e.preventDefault();
        };
        
        $(document).on('click','input[type="radio"]', function(){
        
        var itemno = $(this).attr('item')
        if($('input[type="radio"][item="'+itemno+'"]:checked').length == 0)
        {
        $('#status'+itemno).removeClass('btn-danger')
        $('#status'+itemno).removeClass('btn-success')
        $('#status'+itemno).addClass('btn-secondary')
        
        }else{
        $('#status'+itemno).removeClass('btn-secondary')
        $('#status'+itemno).removeClass('btn-danger')
        $('#status'+itemno).addClass('btn-success')
        $(document).on("keydown", disableF5);
        }
        })
        $(document).on('click','input[type="checkbox"]', function(){
        var itemno = $(this).attr('item')
        if($('input[type="checkbox"][item="'+itemno+'"]:checked').length == 0)
        {
        $('#status'+itemno).removeClass('btn-danger')
        $('#status'+itemno).removeClass('btn-success')
        $('#status'+itemno).addClass('btn-secondary')
        
        }else{
        $('#status'+itemno).removeClass('btn-secondary')
        $('#status'+itemno).removeClass('btn-danger')
        $('#status'+itemno).addClass('btn-success')
        $(document).on("keydown", disableF5);
        }
        // $(this).closest('form').find('input.answervalue[type="checkbox"]:checked')
        })
        $(document).on('input','input[type="text"]', function(){
        var itemno = $(this).attr('item')
        if($(this).val().replace(/^\s+|\s+$/g, "").length == 0)
        {
        $('#status'+itemno).removeClass('btn-danger')
        $('#status'+itemno).removeClass('btn-success')
        $('#status'+itemno).addClass('btn-secondary')
        
        }else{
        $('#status'+itemno).removeClass('btn-secondary')
        $('#status'+itemno).removeClass('btn-danger')
        $('#status'+itemno).addClass('btn-success')
        $(document).on("keydown", disableF5);
        }
        })
        $(document).on('input','textarea', function(){
        var itemno = $(this).attr('item')
        if($(this).val().replace(/^\s+|\s+$/g, "").length == 0)
        {
        $('#status'+itemno).removeClass('btn-danger')
        $('#status'+itemno).removeClass('btn-success')
        $('#status'+itemno).addClass('btn-secondary')
        
        }else{
        $('#status'+itemno).removeClass('btn-secondary')
        $('#status'+itemno).removeClass('btn-danger')
        $('#status'+itemno).addClass('btn-success')
        $(document).on("keydown", disableF5);
        }
        })
        $(document).on('click','.submitanswers', function(){
        // var answers = [];
        // var checkboxesans = $(this).closest('form').find('input.answervalue[type="checkbox"]:checked');
        // $.each(checkboxesans, function(){
        //     console.log($(this).val())
        // })
        var thisform = $(this).closest('form');
        Swal.fire({
        title:  'Warning',
        text: 'Note: Once you submit your test, you won\'t be able to revert it.',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Reload',
        }).then((confirm) => {
        if (confirm.value) {
        thisform.submit();
        }
        })
        })
        </script>


<div id="backtotop" class=""><a href="h#"></a></div></body></html>