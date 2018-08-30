<div class="side-nav" style="margin-top:-42px; position: fixed;">
		<nav>
        <ul>

            <li class="{{ Request::is('admin/dashboard*')? 'active': ''}}">
                <a href="{{ route('admin.dashboard') }}">
                    <span><i class="fa fa-dashboard"></i></span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/profile*')? 'active': ''}}">
                <a href="{{ route('admin.profile') }}">
                    <span><i class="fa fa-user"></i></span>
                    <span>Profile</span>
                </a>
            </li>
             <li class="{{ Request::is('admin/edit*')? 'active': ''}}">
                <a href="{{ route('admin.edit') }}">
                    <span><i class="fa fa-pencil-square"></i></span>
                    <span>Edit Profile</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/account*')? 'active': ''}}">
                <a href="{{ route('admin.account') }}">
                    <span><i class="fa fa-cogs"></i></span>
                    <span>Account Settings</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/category*')? 'active': ''}}">
                <a href="{{ route('category.index') }}">
                    <span><i class="fa fa-bars"></i></span>
                    <span>All Category</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/admin*')? 'active': ''}}">
                <a href="{{ route('admin.alladmin') }}">
                    <span><i class="fa fa-users"></i></span>
                    <span>All Admin</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/user*')? 'active': ''}}">
                <a href="{{ route('admin.alluser') }}">
                    <span><i class="fa fa-id-badge"></i></span>
                    <span>All User</span>
                </a>
            </li>
			<li class="{{ Request::is('admin/question*')? 'active': ''}}">
                <a href="{{ route('admin.question') }}">
                    <span><i class="fa fa-question-circle-o"></i></span>
                    <span>All Question</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/comment*')? 'active': ''}}">
                <a href="{{ route('admin.allcomment') }}">
                    <span><i class="fa fa-comments"></i></span>
                    <span>All Comment</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/message*')? 'active': ''}}">
                <a href="{{ route('message') }}">
                    <span><i class="fa fa-envelope"></i></span>
                    <span>Messages</span>
                </a>
            </li>
            
            
        </ul>
    </nav>
</div>