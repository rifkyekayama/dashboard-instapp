@extends('layouts/master')

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
		
		<div id="striped-table">
			<h4 class="header">Striped Table</h4>
			<div class="row">
				<div class="col s12 m4 l3">
					<p>Add <code class=" language-markup">class="striped"</code> to the table tag for a striped table</p>
				</div>
				<div class="col s12 m8 l9">
					<table class="striped">
						<thead>
							<tr>
								<th data-field="id">Name</th>
								<th data-field="name">Item Name</th>
								<th data-field="price">Item Price</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Alvin</td>
								<td>Eclair</td>
								<td>$0.87</td>
							</tr>
							<tr>
								<td>Alan</td>
								<td>Jellybean</td>
								<td>$3.76</td>
							</tr>
							<tr>
								<td>Jonathan</td>
								<td>Lollipop</td>
								<td>$7.00</td>
							</tr>
							<tr>
								<td>Shannon</td>
								<td>KitKat</td>
								<td>$9.99</td>
							</tr>
							<tr>
								<td>Jonathan</td>
								<td>Lollipop</td>
								<td>$7.00</td>
							</tr>
							<tr>
								<td>Shannon</td>
								<td>KitKat</td>
								<td>$9.99</td>
							</tr>
							<tr>
								<td>Jonathan</td>
								<td>Lollipop</td>
								<td>$7.00</td>
							</tr>
							<tr>
								<td>Shannon</td>
								<td>KitKat</td>
								<td>$9.99</td>
							</tr>
							<tr>
								<td>Jonathan</td>
								<td>Lollipop</td>
								<td>$7.00</td>
							</tr>
							<tr>
								<td>Shannon</td>
								<td>KitKat</td>
								<td>$9.99</td>
							</tr>
							<tr>
								<td>Jonathan</td>
								<td>Lollipop</td>
								<td>$7.00</td>
							</tr>
							<tr>
								<td>Shannon</td>
								<td>KitKat</td>
								<td>$9.99</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		<!-- Floating Action Button -->
		<div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
			<a href="{{ route('groups.create') }}" class="btn-floating btn-large">
				<i class="mdi-content-add-circle"></i>
			</a>
		</div>
		<!-- Floating Action Button -->
	</div>
	<!--end container-->
@endsection