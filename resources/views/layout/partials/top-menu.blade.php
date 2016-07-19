<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
		<li>
			<a href="{{ url('/')}}/">Overview</a>
		</li>
		<li>
			<a href="{{ url('person')}}">Personas</a>
		</li>
		<li>
			<a href="{{ url('companies')}}">Departamento</a>
		</li>
		<li>
			<a href="{{ url('candidates')}}">Candidates</a>
		</li>
		@if(Auth::user()->type=='ADMIN')
		<li>
			<a href="{{ url('users')}}">Users</a>
		</li>
		@endif
		</ul>
		<ul class="nav navbar-right top-nav">
		    <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		        	<i class="glyphicon glyphicon-user"></i>
		        	{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
		        	<b class="caret"></b>
		        </a>
		        <ul class="dropdown-menu">
		            <li>
		                <a href="{{url('users')}}/{{ Auth::user()->id }}"><i class="fa fa-fw fa-gear"></i> Settings</a>
		            </li>
		            <li>
		                <a href="{{url('configuration')}}"><i class="fa fa-key fa-gear"></i> System key</a>
		            </li>
		            <li class="divider"></li>
		            <li>
		                <a href="{{url('auth/logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
		            </li>
		        </ul>
		    </li>
		</ul>
</div>