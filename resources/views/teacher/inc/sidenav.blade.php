<style>
    .active {
        /* Define your desired style for the active button here */
        background-color: #f0f0f0;
        color: #000;
        /* Add any other desired styles */
    }

    .subtitle {
        font-size: 12px;
        color: #999;
        margin-top: 5px; /* Adjust the margin as needed */
    }

</style>

<div class="side-nav uk-animation-slide-left-medium">
    <div class="side-nav-bg"></div>
    <div class="logo uk-visible@s">
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
            <a href="/teacherclassrooms?blade=blade" class="{{ Request::url() == url('/teacherclassrooms?blade=blade') ? 'active' : '' }}">
                <div class="d-flex flex-column align-items-center">
                <i class="fas fa-door-open"></i>
                <span class="badge" style="font-size:10px">Classrooms</span>
                </div>
            </a>
        </li>
        <li>
            <a href="/teacherquizzes?blade=blade" class="{{ Request::url() == url('/teacherquizzes?blade=blade') ? 'active' : '' }}">
                <div class="d-flex flex-column align-items-center">
                <i class="fas fa-pencil-alt"></i>
                <span class="badge" style="font-size:10px">Quiz</span>
                </div>
            </a>
        
        </li>
        {{-- <li>
            <a href="#" uk-toggle="target: #searchbox; cls: is-active">
                <div class="d-flex flex-column align-items-center">
                <i class="fa fa-search"></i>
                <span class="badge" style="font-size:10px">Search</span>
                </div>
            </a>
        </li> --}}
    </ul>
</div>
