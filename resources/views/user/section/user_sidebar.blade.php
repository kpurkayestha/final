
<div class="side-nav" style="margin-top:-42px; position: fixed;">
    <nav>
        <ul>

            <li class="{{ Request::is('user/profile*')? 'active': ''}}">
                <a href="{{ route('user.profile') }}">
                    <span><i class="fa fa-user"></i></span>
                    <span>Profile</span>
                </a>
            </li>
            
            <li class="{{ Request::is('user/edit*')? 'active': ''}}">
                <a href="{{ route('user.edit') }}">
                    <span><i class="fa fa-pencil-square"></i></span>
                    <span>Edit Profile</span>
                </a>
            </li>

            <li class="{{ Request::is('user/accountsetting*')? 'active': ''}}">
                <a href="{{ route('user.accountsetting') }}">
                    <span><i class="fa fa-gear"></i></span>
                    <span>Account Settings</span>
                </a>
            </li>
            
            <li class="{{ Request::is('user/request*')? 'active': ''}}">
                <a href="{{ route('user.request') }}">
                    <span><i class="fa fa-user-plus"></i></span>
                    <span>All Request </span>
                </a>
            </li>

        {{-- <li>
                <a href="{{ route('user.activities') }}">
                    <span><i class="fa fa-briefcase"></i></span>
                    <span>Activities</span>
                </a>
            </li> --}}


        {{-- <li class="{{ Request::is('user/addquestion*')? 'active': ''}}">
                <a href="{{ route('user.addquestion') }}">
                    <span><i class="fa fa-question"></i></span>
                    <span>Add Question</span>
                </a>
            </li> --}}

            <li class="{{ Request::is('user/question*')? 'active': ''}}">
                <a href="{{ route('user.questionlist') }}">
                    <span><i class="fa fa-list"></i></span>
                    <span>All Question List</span>
                </a>
            </li>

            <li class="{{ Request::is('user/comment*')? 'active': ''}}">
                <a href="{{ route('user.commentlist') }}">
                    <span><i class="fa fa-comment"></i></span>
                    <span>All Comment List</span>
                </a>
            </li>

        </ul>

    </nav>
    
</div>
