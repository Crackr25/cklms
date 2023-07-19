<script>window.close();</script><div class="side-nav uk-animation-slide-left-medium">
    <div class="side-nav-bg"></div>
    <div class="logo uk-visible@s">
        <a href="/home">
            <i class="uil-graduation-hat"></i>
        </a>
    </div>
    <ul>
        <li>
            <a href="/home" class="{{ Request::url() == url('/home') ? 'active' : '' }}"><i class="fa fa-home"></i><span class="tooltips">Home</span></a>
        </li>
        <li>
            <a href="/teacherclassrooms?blade=blade" class="{{ Request::url() == url('/teacherclassrooms?blade=blade') ? 'active' : '' }}"><i class="fas fa-door-open"></i><span class="tooltips">Classrooms</span></a>
        </li>
        <li>
            <a href="/teacherquizzes?blade=blade" class="{{ Request::url() == url('/teacherquizzes?blade=blade') ? 'active' : '' }}"><i class="fas fa-pencil-alt"></i><span class="tooltips">Quiz</span></a>
        </li>
        <li>
            <a href="#" uk-toggle="target: #searchbox; cls: is-active"><i class="fa fa-search"></i></a>
        </li>
    </ul>
</div>
