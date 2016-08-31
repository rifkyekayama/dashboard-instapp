@extends('layouts/master')

@section('title')
	{{ $title }}
@endsection

@section('content')
	<!--breadcrumbs start-->
	<div id="breadcrumbs-wrapper">
		<!-- Search for small screen -->
		<div class="header-search-wrapper grey hide-on-large-only">
			<i class="mdi-action-search active"></i>
			<input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
		</div>
		<div class="container">
			<div class="row">
				<div class="col s12 m12 l12">
					<h5 class="breadcrumbs-title">{{ $title }}</h5>
					<ol class="breadcrumbs">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#">Pages</a></li>
						<li class="active">Blank Page</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!--breadcrumbs end-->
	

	<!--start container-->
	<div class="container">
		
		<div id="striped-table">
			<h4 class="header">Striped Table</h4>
			<div class="row">
				<div class="col s12">
					<table class="striped">
						<thead>
							<tr>
								<th data-field="name">{{ trans('pageProperty.name') }}</th>
								<th data-field="email">{{ trans('pageProperty.email') }}</th>
								<th data-field="group">{{ trans('pageProperty.group') }}</th>
								<th data-field="action">{{ trans('pageProperty.action') }}</th>
							</tr>
						</thead>
						<tbody>
							@foreach($user as $value)
								<tr>
									<td>{{ $value->name }}</td>
									<td>{{ $value->email }}</td>
									<td>{{ $value->groups[0]->name }}</td>
									<td>
										<a href="" class="btn-floating waves-effect waves-light red"><i class="mdi-content-clear"></i></a>
										<a href="" class="btn-floating waves-effect waves-light red"><i class="mdi-content-clear"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		<!-- Floating Action Button -->
		<div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
			<a href="{{ route('users.create') }}" class="btn-floating btn-large">
				<i class="mdi-content-add-circle"></i>
			</a>
		</div>
		<!-- Floating Action Button -->
	</div>
	<!--end container-->
@endsection