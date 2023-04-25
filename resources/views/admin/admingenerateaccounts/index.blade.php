@extends('admin.layouts.app')

@section('breadcrumbs')

{{-- <script src="{{asset('js/pace.js')}}"></script> --}}
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<!-- Toastr -->
<link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
<style>
    /* .pace {
  -webkit-pointer-events: none;
  pointer-events: none;

  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;

  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -ms-box-sizing: border-box;
  -o-box-sizing: border-box;
  box-sizing: border-box;

  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  border-radius: 10px;

  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;

  z-index: 2000;
  position: fixed;
  margin: auto;
  top: 12px;
  left: 0;
  right: 0;
  bottom: 0;
  width: 200px;
  height: 50px;
  overflow: hidden;
}

.pace .pace-progress {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -ms-box-sizing: border-box;
  -o-box-sizing: border-box;
  box-sizing: border-box;

  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;
  border-radius: 2px;

  -webkit-background-clip: padding-box;
  -moz-background-clip: padding;
  background-clip: padding-box;

  -webkit-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);

  display: block;
  position: absolute;
  right: 100%;
  margin-right: -7px;
  width: 93%;
  top: 7px;
  height: 14px;
  font-size: 12px;
  background: #29d;
  color: #29d;
  line-height: 60px;
  font-weight: bold;
  font-family: Helvetica, Arial, "Lucida Grande", sans-serif;

  -webkit-box-shadow: 120px 0 #fff, 240px 0 #fff;
  -ms-box-shadow: 120px 0 #fff, 240px 0 #fff;
  box-shadow: 120px 0 #fff, 240px 0 #fff;
}

.pace .pace-progress:after {
  content: attr(data-progress-text);
  display: inline-block;
  position: fixed;
  width: 45px;
  text-align: right;
  right: 0;
  padding-right: 16px;
  top: 4px;
}

.pace .pace-progress[data-progress-text="0%"]:after { right: -200px }
.pace .pace-progress[data-progress-text="1%"]:after { right: -198.14px }
.pace .pace-progress[data-progress-text="2%"]:after { right: -196.28px }
.pace .pace-progress[data-progress-text="3%"]:after { right: -194.42px }
.pace .pace-progress[data-progress-text="4%"]:after { right: -192.56px }
.pace .pace-progress[data-progress-text="5%"]:after { right: -190.7px }
.pace .pace-progress[data-progress-text="6%"]:after { right: -188.84px }
.pace .pace-progress[data-progress-text="7%"]:after { right: -186.98px }
.pace .pace-progress[data-progress-text="8%"]:after { right: -185.12px }
.pace .pace-progress[data-progress-text="9%"]:after { right: -183.26px }
.pace .pace-progress[data-progress-text="10%"]:after { right: -181.4px }
.pace .pace-progress[data-progress-text="11%"]:after { right: -179.54px }
.pace .pace-progress[data-progress-text="12%"]:after { right: -177.68px }
.pace .pace-progress[data-progress-text="13%"]:after { right: -175.82px }
.pace .pace-progress[data-progress-text="14%"]:after { right: -173.96px }
.pace .pace-progress[data-progress-text="15%"]:after { right: -172.1px }
.pace .pace-progress[data-progress-text="16%"]:after { right: -170.24px }
.pace .pace-progress[data-progress-text="17%"]:after { right: -168.38px }
.pace .pace-progress[data-progress-text="18%"]:after { right: -166.52px }
.pace .pace-progress[data-progress-text="19%"]:after { right: -164.66px }
.pace .pace-progress[data-progress-text="20%"]:after { right: -162.8px }
.pace .pace-progress[data-progress-text="21%"]:after { right: -160.94px }
.pace .pace-progress[data-progress-text="22%"]:after { right: -159.08px }
.pace .pace-progress[data-progress-text="23%"]:after { right: -157.22px }
.pace .pace-progress[data-progress-text="24%"]:after { right: -155.36px }
.pace .pace-progress[data-progress-text="25%"]:after { right: -153.5px }
.pace .pace-progress[data-progress-text="26%"]:after { right: -151.64px }
.pace .pace-progress[data-progress-text="27%"]:after { right: -149.78px }
.pace .pace-progress[data-progress-text="28%"]:after { right: -147.92px }
.pace .pace-progress[data-progress-text="29%"]:after { right: -146.06px }
.pace .pace-progress[data-progress-text="30%"]:after { right: -144.2px }
.pace .pace-progress[data-progress-text="31%"]:after { right: -142.34px }
.pace .pace-progress[data-progress-text="32%"]:after { right: -140.48px }
.pace .pace-progress[data-progress-text="33%"]:after { right: -138.62px }
.pace .pace-progress[data-progress-text="34%"]:after { right: -136.76px }
.pace .pace-progress[data-progress-text="35%"]:after { right: -134.9px }
.pace .pace-progress[data-progress-text="36%"]:after { right: -133.04px }
.pace .pace-progress[data-progress-text="37%"]:after { right: -131.18px }
.pace .pace-progress[data-progress-text="38%"]:after { right: -129.32px }
.pace .pace-progress[data-progress-text="39%"]:after { right: -127.46px }
.pace .pace-progress[data-progress-text="40%"]:after { right: -125.6px }
.pace .pace-progress[data-progress-text="41%"]:after { right: -123.74px }
.pace .pace-progress[data-progress-text="42%"]:after { right: -121.88px }
.pace .pace-progress[data-progress-text="43%"]:after { right: -120.02px }
.pace .pace-progress[data-progress-text="44%"]:after { right: -118.16px }
.pace .pace-progress[data-progress-text="45%"]:after { right: -116.3px }
.pace .pace-progress[data-progress-text="46%"]:after { right: -114.44px }
.pace .pace-progress[data-progress-text="47%"]:after { right: -112.58px }
.pace .pace-progress[data-progress-text="48%"]:after { right: -110.72px }
.pace .pace-progress[data-progress-text="49%"]:after { right: -108.86px }
.pace .pace-progress[data-progress-text="50%"]:after { right: -107px }
.pace .pace-progress[data-progress-text="51%"]:after { right: -105.14px }
.pace .pace-progress[data-progress-text="52%"]:after { right: -103.28px }
.pace .pace-progress[data-progress-text="53%"]:after { right: -101.42px }
.pace .pace-progress[data-progress-text="54%"]:after { right: -99.56px }
.pace .pace-progress[data-progress-text="55%"]:after { right: -97.7px }
.pace .pace-progress[data-progress-text="56%"]:after { right: -95.84px }
.pace .pace-progress[data-progress-text="57%"]:after { right: -93.98px }
.pace .pace-progress[data-progress-text="58%"]:after { right: -92.12px }
.pace .pace-progress[data-progress-text="59%"]:after { right: -90.26px }
.pace .pace-progress[data-progress-text="60%"]:after { right: -88.4px }
.pace .pace-progress[data-progress-text="61%"]:after { right: -86.53999999999999px }
.pace .pace-progress[data-progress-text="62%"]:after { right: -84.68px }
.pace .pace-progress[data-progress-text="63%"]:after { right: -82.82px }
.pace .pace-progress[data-progress-text="64%"]:after { right: -80.96000000000001px }
.pace .pace-progress[data-progress-text="65%"]:after { right: -79.1px }
.pace .pace-progress[data-progress-text="66%"]:after { right: -77.24px }
.pace .pace-progress[data-progress-text="67%"]:after { right: -75.38px }
.pace .pace-progress[data-progress-text="68%"]:after { right: -73.52px }
.pace .pace-progress[data-progress-text="69%"]:after { right: -71.66px }
.pace .pace-progress[data-progress-text="70%"]:after { right: -69.8px }
.pace .pace-progress[data-progress-text="71%"]:after { right: -67.94px }
.pace .pace-progress[data-progress-text="72%"]:after { right: -66.08px }
.pace .pace-progress[data-progress-text="73%"]:after { right: -64.22px }
.pace .pace-progress[data-progress-text="74%"]:after { right: -62.36px }
.pace .pace-progress[data-progress-text="75%"]:after { right: -60.5px }
.pace .pace-progress[data-progress-text="76%"]:after { right: -58.64px }
.pace .pace-progress[data-progress-text="77%"]:after { right: -56.78px }
.pace .pace-progress[data-progress-text="78%"]:after { right: -54.92px }
.pace .pace-progress[data-progress-text="79%"]:after { right: -53.06px }
.pace .pace-progress[data-progress-text="80%"]:after { right: -51.2px }
.pace .pace-progress[data-progress-text="81%"]:after { right: -49.34px }
.pace .pace-progress[data-progress-text="82%"]:after { right: -47.480000000000004px }
.pace .pace-progress[data-progress-text="83%"]:after { right: -45.62px }
.pace .pace-progress[data-progress-text="84%"]:after { right: -43.76px }
.pace .pace-progress[data-progress-text="85%"]:after { right: -41.9px }
.pace .pace-progress[data-progress-text="86%"]:after { right: -40.04px }
.pace .pace-progress[data-progress-text="87%"]:after { right: -38.18px }
.pace .pace-progress[data-progress-text="88%"]:after { right: -36.32px }
.pace .pace-progress[data-progress-text="89%"]:after { right: -34.46px }
.pace .pace-progress[data-progress-text="90%"]:after { right: -32.6px }
.pace .pace-progress[data-progress-text="91%"]:after { right: -30.740000000000002px }
.pace .pace-progress[data-progress-text="92%"]:after { right: -28.880000000000003px }
.pace .pace-progress[data-progress-text="93%"]:after { right: -27.02px }
.pace .pace-progress[data-progress-text="94%"]:after { right: -25.16px }
.pace .pace-progress[data-progress-text="95%"]:after { right: -23.3px }
.pace .pace-progress[data-progress-text="96%"]:after { right: -21.439999999999998px }
.pace .pace-progress[data-progress-text="97%"]:after { right: -19.58px }
.pace .pace-progress[data-progress-text="98%"]:after { right: -17.72px }
.pace .pace-progress[data-progress-text="99%"]:after { right: -15.86px }
.pace .pace-progress[data-progress-text="100%"]:after { right: -14px }


.pace .pace-activity {
  position: absolute;
  width: 100%;
  height: 28px;
  z-index: 2001;
  box-shadow: inset 0 0 0 2px #29d, inset 0 0 0 7px #FFF;
  border-radius: 10px;
}

.pace.pace-inactive {
  display: none;
} */

</style>
<nav id="breadcrumbs">
    <ul>
        <li><a href="/home"> <i class="uil-home-alt"></i> </a></li>
        <li><a href="/admingeneratestudaccounts"> Generate User Accounts </a></li>
    </ul>
</nav>
@endsection
@section('content')
            <div class="page-content-inner pt-lg-0  pr-2">

                <div class="uk-child-width-1-2@s uk-child-width-1-2@m uk-grid pt-3" uk-grid="">
                    
                    <div class="uk-first-column">
                        <a href="/adminstudents">
                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="uk-flex-middle uk-grid" uk-grid="">
                                        {{-- <div class="uk-width-auto uk-first-column">
                                            <h6 class="mb-2">No of Classrooms</h6>
                                            <h2> {{count($classrooms)}}</h2>
                                        </div>
                                        <div class="uk-width-expand">
                                            <i class="fa fa-door-open fa-1x"></i>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="mb-2">No of Sections</h6>
                                            </div>
                                            <div class="col-6">
                                                <h2> {{count($sections)}}</h2>
                                            </div>
                                            <div class="col-6 text-center">
                                                <i class="fa fa-user fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="card-footer d-flex justify-content-between py-2">
                                    <a href="/adminstudents" class=" "> Veiw</a>
                                </div> --}}
                            </div>
                        </a>
                    </div>
                    <div>
                        <a href="/adminstudents">
                            
                            <div class="card">
                                <div class="card-body">
                                    <div class="uk-flex-middle uk-grid" uk-grid="">
                                        {{-- <div class="uk-width-auto uk-first-column">
                                            <h6 class="mb-2">No of Classrooms</h6>
                                            <h2> {{count($classrooms)}}</h2>
                                        </div>
                                        <div class="uk-width-expand">
                                            <i class="fa fa-door-open fa-1x"></i>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="mb-2">No of Students</h6>
                                            </div>
                                            <div class="col-6">
                                                <h2> {{$students}}</h2>
                                            </div>
                                            <div class="col-6 text-center">
                                                <i class="fa fa-user fa-2x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="card-footer d-flex justify-content-between py-2">
                                    <a href="/adminstudents" class=" "> Veiw</a>
                                </div> --}}
                            </div>
                        </a>
                    </div>
                </div>
                <br/>
                @if($tablesnotfound == 0)
                <div class="row">
                    <div class="col-4">
                            <select id="teacherid">
                                @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}"> {{$teacher->lastname}},  {{$teacher->firstname}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" id="generatebutton" disabled>
                            Generate
                        </button>
                    </div>
                    <div class="col-2 p-2">
                        <label><input class="uk-checkbox pr-2 pl-2 section-checkboxes" type="checkbox"  id="checkall">&nbsp;Select All </label>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <button type="button" class="btn btn-sm btn-soft-warning">
                            es_users ({{$es_userscount}})
                        </button>
                        <button type="button" class="btn btn-sm btn-soft-warning">
                            studinfo ({{$studinfocount}})
                        </button>
                        <button type="button" class="btn btn-sm btn-soft-warning">
                            college_sections ({{$college_sectionscount}})
                        </button>
                        <button type="button" class="btn btn-sm btn-soft-warning">
                            sections ({{$sectionscount}})
                        </button>
                        <button type="button" class="btn btn-sm btn-soft-warning">
                            gradelevel ({{$gradelevelcount}})
                        </button>
                        <button type="button" class="btn btn-sm btn-soft-warning">
                            schoolinfo ({{$schoolinfocount}})
                        </button>
                        <button type="button" class="btn btn-sm btn-soft-warning">
                            sy ({{$sycount}})
                        </button>
                    </div>
                </div>
                <div class="row">
                    @foreach($sections as $section)
                        <div class="col-3">
                            @if($section->exists == 0)
                            <button class="btn btn-soft-secondary mb-2 btn-block" id="card{{$section->levelid}}{{$section->sectionid}}">
                            @else
                            <button class="btn btn-soft-success mb-2 btn-block" >
                            @endif
                                {{-- <div class="card-body"> --}}
                                    {{-- <div class="uk-flex-middle uk-grid" uk-grid=""> --}}
                                        <div class="row">
                                            <div class="col-3 p-0"><input class="uk-checkbox pr-2 pl-2 section-checkboxes" type="checkbox" >
                                            </div>
                                            <div class="col-9">
                                                {{$section->levelname}} - {{$section->sectionname}}
                                            </div>
                                            <div class="col-12">
                                                

                                                <input type="hidden" name="sectionid" value="{{$section->sectionid}}"/>
                                                <input type="hidden" name="sectionname" value="{{$section->sectionname}}"/>
                                                <input type="hidden" name="levelid" value="{{$section->levelid}}"/>
                                                <input type="hidden" name="levelname" value="{{$section->levelname}}"/>
                                                {{-- <input type="hidden" name="sectionid" value="{{$section->sectionid}}"/>
                                                <input type="hidden" name="sectionid" value="{{$section->sectionid}}"/> --}}
                                            </div>
                                            {{-- <div class="col-6">
                                            </div>
                                            <div class="col-6 text-center">
                                                <i class="fa fa-door-open fa-2x"></i>
                                            </div> --}}
                                        </div>
                                    {{-- </div> --}}
                                {{-- </div> --}}
                            </button>
                        </div>
                    @endforeach
                </div>
                @else
                    @if($studinfotable == 0)
                        <div class="uk-alert-primary" uk-alert>
                            <p><em>TABLE `studinfo` not found!</em> </p>
                            
                            <ul class="uk-list uk-list-small uk-list-bullet">
                                <li><small class="text-muted">Export `studinfo` table from your Essentiel database.</small></li>
                                <li><small class="text-muted">Import the exported table into the CKLMS database</small></li>
                            </ul>
                        </div>
                    @endif
                    @if($es_userstable == 0)
                        <div class="uk-alert-primary" uk-alert>
                            <p><em>TABLE `es_users` not found!</em> </p>
                            
                            <ul class="uk-list uk-list-small uk-list-bullet">
                                {{-- <li><small class="text-muted">Create a table named `es_users' in the CKLMS database and add these ff fields:
                                    <br/>
                                    1.id -> pk -> ai<br/>
                                    2. name -> varchar -> 255<br/>
                                    2. email -> varchar -> 255<br/>
                                    2. type -> int<br/>
                                    2. schoolabbr -> varchar -> 255<br/>
                                    2. deleted -> tinyint -> default 0<br/>
                                    2. name -> varchar -> 255<br/>
                                    2. name -> varchar -> 255<br/>
                                    2. name -> varchar -> 255<br/>
                                    2. name -> varchar -> 255<br/>
                                    </small></li> --}}
                                <li><small class="text-muted">Export `users` table from your Essentiel database.</small></li>
                                <li><small class="text-muted">Open the exported table using a text editor.</small></li>
                                <li><small class="text-muted">From the INSERT INTO statement, rename your table from `users` to `es_users`.</small></li>
                                <li><small class="text-muted">Copy the <strong>INSERT INTO</strong> statement.</small></li>
                                <li><small class="text-muted">Paste the copied statement to the SQLYOG Query Editor</small></li>
                                <li><small class="text-muted">Run the query (F9)</small></li>
                            </ul>
                        </div>
                    @endif
                    @if($sectionstable == 0)
                        <div class="uk-alert-primary" uk-alert>
                            <p><em>TABLE `sections` not found!</em> </p>
                        </div>
                    @endif
                    @if($college_sectionstable == 0)
                        <div class="uk-alert-primary" uk-alert>
                            <p><em>TABLE `college_sections` not found!</em> </p>
                            
                            <ul class="uk-list uk-list-small uk-list-bullet">
                                <li><small class="text-muted">Export `college_sections` table from your Essentiel database.</small></li>
                                <li><small class="text-muted">Import the exported table into the CKLMS database</small></li>
                            </ul>
                        </div>
                    @endif
                    @if($gradeleveltable == 0)
                        <div class="uk-alert-primary" uk-alert>
                            <p><em>TABLE `gradelevel` not found!</em> </p>
                            
                            <ul class="uk-list uk-list-small uk-list-bullet">
                                <li><small class="text-muted">Export `gradelevel` table from your Essentiel database.</small></li>
                                <li><small class="text-muted">Import the exported table into the CKLMS database</small></li>
                            </ul>
                        </div>
                    @endif
                    @if($schoolinfotable == 0)
                        <div class="uk-alert-primary" uk-alert>
                            <p><em>TABLE `schoolinfo` not found!</em> </p>
                            
                            <ul class="uk-list uk-list-small uk-list-bullet">
                                <li><small class="text-muted">Export `schoolinfo` table from your Essentiel database.</small></li>
                                <li><small class="text-muted">Import the exported table into the CKLMS database</small></li>
                            </ul>
                        </div>
                    @endif
                    @if($sytable == 0)
                        <div class="uk-alert-primary" uk-alert>
                            <p><em>TABLE `sy` not found!</em> </p>
                            
                            <ul class="uk-list uk-list-small uk-list-bullet">
                                <li><small class="text-muted">Export `sy` table from your Essentiel database.</small></li>
                                <li><small class="text-muted">Import the exported table into the CKLMS database</small></li>
                            </ul>

                        </div>
                    @endif
                

                @endif

            </div>
            <form method="GET" action="/adminexportstudaccounts" id="exportform">

            </form>
            <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
            <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
            <script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
            <!-- Toastr -->
            <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
            <script>
                @if($tablesnotfound == 0)
                    var cards = []
                    @foreach($sections as $section)
                        @if($section->exists == 0)
                            cards.push('card{{$section->levelid}}{{$section->sectionid}}')
                        @endif
                    @endforeach
                                            console.log(cards)
                    $(document).ready(function(){
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000
                        });
                        $(document).on('click','#checkall', function(){
                            if($(this).prop('checked') == true)
                            {
                                $('.section-checkboxes').prop('checked', true)
                                $('#generatebutton').removeAttr('disabled')

                            }else{
                                $('.section-checkboxes').prop('checked', false)
                                $('#generatebutton').prop('disabled',true)
                            }
                        })
                        $(document).on('click','.section-checkboxes', function(){
                            if($(this).prop('checked') == true)
                            {
                                $('#generatebutton').removeAttr('disabled')
                            }else{
                                if($('.section-checkboxes:checked').length == 0)
                                {
                                    $('#generatebutton').prop('disabled',true)
                                }
                            }
                        })
                        
                        $(document).on('click','#generatebutton', function(){
                            var teacherid = $('#teacherid').val();
                            if(cards.length > 0)
                            {
                                var sectionid   = $('#'+cards[0]).find('input[name="sectionid"]').val();
                                var sectionname = $('#'+cards[0]).find('input[name="sectionname"]').val();
                                var levelid     = $('#'+cards[0]).find('input[name="levelid"]').val();
                                var levelname   = $('#'+cards[0]).find('input[name="levelname"]').val();
                                $.ajax({
                                    url: '/admingeneratestudaccounts',
                                    type: 'GET',
                                    dataType: 'json',
                                    data: {
                                        teacherid   : teacherid,
                                        sectionid   : sectionid,
                                        sectionname : sectionname,
                                        levelid     : levelid,
                                        levelname   : levelname,
                                        generate    : '1'
                                    },
                                    success:function(data){
                                        if(data[0] == 1)
                                        {
                                            $('#'+cards[0]).removeClass('btn-soft-secondary');
                                            $('#'+cards[0]).addClass('btn-soft-success');
                                            cards = $.grep(cards, function(value) {
                                                return value != cards[0];
                                            });
                                            $('#generatebutton').click()
                                        }
                                    }
                                })
                            }else{
                                Swal.fire({
                                    type: 'success',
                                    title: 'Done generating classrooms',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Export Accounts',
                                    allowOutsideClick: false
                                }).then((confirm) => {
                                    if (confirm.value) {
                                        $('#exportform').submit()
                                    }
                                })
                                // Toast.fire({
                                //     type: 'success',
                                //     title: 'Done generating classrooms'
                                // })

                            }
                        })
                    })
                @endif
            </script>

      @endsection