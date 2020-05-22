
<li class="{{ (Request::is('api_check*') || Request::is('users*')) ? 'menu-open' : '' }} treeview">
  <a href="#">
    <i class="fa fa-lock"></i>
    <span>API Check</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu"
    @if (Request::is('api_check*') || Request::is('users*'))
      style="display: block;"
    @endif
  >
    <li class="{{ Request::is('api_check/auth_login') ? 'active' : '' }}">
      <a href="{!! route('api_check.auth_login') !!}"><i class="fa fa-circle-o"></i><span>Auth Login</span></a>
    </li>
    <li class="{{ Request::is('api_check/auth_register') ? 'active' : '' }}">
      <a href="{!! route('api_check.auth_register') !!}"><i class="fa fa-circle-o"></i><span>Auth Register</span></a>
    </li>
    <li class="{{ Request::is('api_check/update_email') ? 'active' : '' }}">
      <a href="{!! route('api_check.update_email') !!}"><i class="fa fa-circle-o"></i><span>Update Email</span></a>
    </li>
    <li class="{{ Request::is('api_check/set_contact_info') ? 'active' : '' }}">
      <a href="{!! route('api_check.set_contact_info') !!}"><i class="fa fa-circle-o"></i><span>Set Contact Info</span></a>
    </li>
    <li class="{{ Request::is('api_check/get_quiz_list') ? 'active' : '' }}">
      <a href="{!! route('api_check.get_quiz_list') !!}"><i class="fa fa-circle-o"></i><span>Get Quiz List</span></a>
    </li>
    <li class="{{ Request::is('api_check/get_quiz_questions') ? 'active' : '' }}">
      <a href="{!! route('api_check.get_quiz_questions') !!}"><i class="fa fa-circle-o"></i><span>Get Quiz Questions</span></a>
    </li>
    <li class="{{ Request::is('api_check/get_history_list') ? 'active' : '' }}">
      <a href="{!! route('api_check.get_history_list') !!}"><i class="fa fa-circle-o"></i><span>Get History List</span></a>
    </li>
    <li class="{{ Request::is('api_check/get_history_detail') ? 'active' : '' }}">
      <a href="{!! route('api_check.get_history_detail') !!}"><i class="fa fa-circle-o"></i><span>Get History Detail</span></a>
    </li>
    <li class="{{ Request::is('api_check/set_result') ? 'active' : '' }}">
      <a href="{!! route('api_check.set_result') !!}"><i class="fa fa-circle-o"></i><span>Set Result</span></a>
    </li>
    <li class="{{ Request::is('api_check/set_question') ? 'active' : '' }}">
      <a href="{!! route('api_check.set_question') !!}"><i class="fa fa-circle-o"></i><span>Set Question</span></a>
    </li>
  </ul>
</li>