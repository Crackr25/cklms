<style>
    .active {
        /* Define your desired style for the active button here */
        background-color: linear-gradient(-225deg, #FF057C 0%, #8D0B93 50%, #321575 100%);
        color: #000;
        /* Add any other desired styles */
    }
    .bodys {
        background-color: linear-gradient(-225deg, #FF057C 0%, #8D0B93 50%, #321575 100%) !important;
    }
</style>



<div class="bodys">
<div class="side-nav  -animation-slide-left-medium bodys" style="  background-color: linear-gradient(-225deg, #FF057C 0%, #8D0B93 50%, #321575 100%) !important;">
    <div class="side-nav-bg bodys"></div>
    <div class="logo uk-visible@s bodys">
        <a href="/home">
            <img src="assets/cklogo.png" alt="Logo">
        </a>
    </div>
    <ul>
        <li>
            <a href="/home" class="{{ Request::url() == url('/home') ? 'active' : '' }}">
                <div class="d-flex flex-column align-items-center">
                    <i class="fa fa-home"></i>
                    <span class="badge" style="font-size:10px" >Home</span>
                </div>
            </a>
        </li>
        <li>
            <a href="#" class="header-widget-icon" uk-toggle="target: #searchbox; cls: is-active">
                <div class="d-flex flex-column align-items-center">
                    <i class="fa fa-chalkboard-teacher"></i>
                    <span class="badge" style="font-size:10px" >Join</span>
                    <span class="badge" style="font-size:10px" >Classroom</span>
                </div>
            </a>

        </li>

        <li>
            <a href="student/activities" class="header-widget-icon" uk-toggle="target: #searchbox; cls: is-active">
                <div class="d-flex flex-column align-items-center">
                    <i class="far fa-list-alt"></i>
                    <span class="badge" style="font-size:10px">Activities</span>
                </div>
            </a>

        </li>
    </ul>
    <ul class="uk-position-bottom">
        <li>
            <a href="/studentprofile">
                <i class="icon-feather-user"></i></i><span class="tooltips">Profile</span></a>

                
            <a href="#" id="logout">
                <i class="icon-feather-log-out"></i></i><span class="tooltips">Logout</span></a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

    </ul>
</div>
</div>


<!-- search overlay-->
<div id="searchbox">
    <div class="search-overlay"></div>
    <div class="search-input-wrapper">
        <div class="search-input-container">
            <div class="search-input-control">
                <span class="icon-feather-x btn-close uk-animation-scale-up" uk-toggle="target: #searchbox; cls: is-active"></span>
                <div class=" uk-animation-slide-bottom">
                    <input type="text" name="search" autofocus="" required="">
                    <p class="search-help">Type the code of the classroom you are looking for</p>
                </div>
            </div>
        </div>
    </div>
</div>

