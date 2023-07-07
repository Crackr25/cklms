<style>
    .active {
        /* Define your desired style for the active button here */
        background-color: #f0f0f0;
        color: #000;
        /* Add any other desired styles */
    }
</style>


        <!-- side nav -->
        <div class="side-nav uk-animation-slide-left-medium">
            <div class="side-nav-bg"></div>
            <!-- logo -->
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
                    <a href="/adminbooks/index" class="{{ Request::url() == url('/adminbooks/index') ? 'active' : '' }}"><i class="fa fa-book"></i><span class="tooltips">Books</span></a>
                </li>
                <li>
                    <a href="/adminclassrooms" class="{{ Request::url() == url('/adminclassrooms') ? 'active' : '' }}"><i class="fa fa-door-open"></i><span class="tooltips">Classrooms</span></a>
                </li>
                <li>
                    <a href="/adminteachers" class="{{ Request::url() == url('/adminteachers') ? 'active' : '' }}"><i class="fa fa-user"></i><span class="tooltips">Teachers</span></a>
                </li>
                <li>
                    <a href="/adminstudents" class="{{ Request::url() == url('/adminstudents') ? 'active' : '' }}"><i class="fa fa-users"></i><span class="tooltips">Students</span></a>
                </li>
            </ul>
            <ul class="uk-position-bottom">
                <li>
                    <a href="/admin/passwordgenerator/index" class="{{ Request::url() == url('/admin/passwordgenerator/index') ? 'active' : '' }}"><i class="fa fa-sync"></i><span class="tooltips">Password Resetter</span></a>
                </li>
                <li>
                    <a href="/admingeneratestudaccounts" class="{{ Request::url() == url('/admingeneratestudaccounts') ? 'active' : '' }}"><i class="fa fa-database"></i><span class="tooltips">Import Data</span></a>
                </li>
            </ul>
        </div>
