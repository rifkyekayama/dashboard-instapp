<aside id="left-sidebar-nav">
	<ul id="slide-out" class="side-nav fixed leftside-navigation">
		<li class="user-details cyan darken-2">
			<div class="row">
				<div class="col col s4 m4 l4">
						<img src="{{ asset('images/avatar.jpg', config('app.asset')) }}" alt="" class="circle responsive-img valign profile-image">
				</div>
				<div class="col col s8 m8 l8">
					<ul id="profile-dropdown" class="dropdown-content">
						<li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
						</li>
						<li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
						</li>
						<li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
						</li>
						<li class="divider"></li>
						<li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
						</li>
						<li><a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
						</li>
					</ul>
					<a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">John Doe<i class="mdi-navigation-arrow-drop-down right"></i></a>
					<p class="user-roal">Administrator</p>
				</div>
			</div>
		</li>
		<li class="bold"><a href="{{ route('index') }}" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> {{ trans('menu.dashboard') }}</a>
		</li>
		<li class="bold"><a href="{{ route('form_editor.index') }}" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Form Editor</a>
		<li class="bold"><a href="{{ route('mail.index') }}" class="waves-effect waves-cyan"><i class="mdi-communication-email"></i> Mailbox <span class="new badge">4</span></a>
		</li>
		<li class="bold"><a href="{{ route('customer.index') }}" class="waves-effect waves-cyan"><i class="mdi-communication-email"></i> Customer Management</a>
		</li>
		<li class="bold"><a href="{{ route('transaction.index') }}" class="waves-effect waves-cyan"><i class="mdi-communication-email"></i> Transaction Management</a>
		</li>
		<li class="bold"><a href="{{ route('product.index') }}" class="waves-effect waves-cyan"><i class="mdi-communication-email"></i> Product  Management</a>
		</li>
		<li class="no-padding">
			<ul class="collapsible collapsible-accordion">
				<li class="bold"><a class="collapsible-header  waves-effect waves-cyan {{ Request::is(App::getLocale().'/userControl/*') ? 'active' : '' }}"><i class="mdi-action-account-circle"></i> {{ trans('menu.userControl') }}</a>
					<div class="collapsible-body">
						<ul>
							<li class="{{ Request::is(App::getLocale().'/userControl/groups') || Request::is(App::getLocale().'/userControl/groups/*') ? 'active' : '' }}"><a href="{{-- route('groups') --}}">{{ trans('menu.group') }}</a>
							</li>                                   
							<li class="{{ Request::is(App::getLocale().'/userControl/users') || Request::is(App::getLocale().'/userControl/users/*') ? 'active' : '' }}"><a href="{{-- route('users') --}}">{{ trans('menu.user') }}</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
		</li>
	</ul>
	<a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
</aside>