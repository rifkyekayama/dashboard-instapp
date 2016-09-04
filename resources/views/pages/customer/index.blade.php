@extends('layouts.master')

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
					<h5 class="breadcrumbs-title">Blank Page</h5>
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
		<div class="section">
			<p class="caption">A Simple Blank Page to use it for your custome design and elements.</p>
			<div class="divider"></div>
			<!--Responsive Table-->
			<div class="divider"></div>
			<div id="responsive-table">
				<h4 class="header">Customers</h4>
				<div class="row">
					<div class="col l12">
						<table class="responsive-table" id="tableMail">
							<thead>
								<tr>
									<th>Customer ID</th>
									<th>Login</th>
									<th>Name</th>
									<th>Address</th>
									<th>Zip</th>
									<th>City</th>
									<th>Country</th>
									<th>Phone</th>
									<th>email</th>
									<th>Birthdate</th>
									<th>Gender</th>
									<th>Contact Email</th>
									<th>Link to Customer</th>
								</tr>
							</thead>
							<tbody>
								@foreach($customers as $customer)
									<tr>
										<td>{{ $customer->customer_id }}</td>
										<td>{{ $customer->login }}</td>
										<td>{{ $customer->name }}</td>
										<td>{{ $customer->address }}</td>
										<td>{{ $customer->zip }}</td>
										<td>{{ $customer->city }}</td>
										<td>{{ $customer->country }}</td>
										<td>{{ $customer->phone }}</td>
										<td>{{ $customer->email }}</td>
										<td>{{ date("d M Y", strtotime($customer->birthdate)) }}</td>
										<td>{{ $customer->gender }}</td>
										<td>{{ $customer->contact_email }}</td>
										<td>{!! $customer->link_to_customer !!}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- Floating Action Button -->
		<div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
			<a class="btn-floating btn-large">
				<i class="mdi-action-stars"></i>
			</a>
			<ul>
				<li><a href="css-helpers.html" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
				<li><a href="app-widget.html" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
				<li><a href="app-calendar.html" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
				<li><a href="app-email.html" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
			</ul>
		</div>
		<!-- Floating Action Button -->
	</div>
	<!--end container-->
@endsection