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
				<h4 class="header">Transations</h4>
				<div class="row">
					<div class="col l12">
						<table class="responsive-table" id="tableMail">
							<thead>
								<tr>
									<th>Transaction ID</th>
									<th>Customer</th>
									<th>Delivery Type</th>
									<th>Delivery Price</th>
									<th>Amount to Charge</th>
									<th>Payment Solution</th>
									<th>Special Request</th>
									<th>Transaction Details</th>
								</tr>
							</thead>
							<tbody>
								@foreach($transactions as $transaction)
									<tr>
										<td>{{ $transaction->id_transaction }}</td>
										<td>{!! $transaction->customers->link_to_customer !!}</td>
										<td>{{ $transaction->delivery_type }}</td>
										<td>{{ "Rp. ".number_format($transaction->delivery_price, "0", ",", ".") }}</td>
										<td>{{ "Rp. ".number_format($transaction->amount_to_charge, "0", ",", ".") }}</td>
										<td>{{ $transaction->payment_solution }}</td>
										<td>{{ $transaction->special_request }}</td>
										<td><button class="waves-effect waves-light btn light-blue" data-id="{{ $transaction->id_transaction }}" id="btnDetail">Details</button></td>
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

	<div id="modal1" class="modal">
		<div class="modal-content">
			
		</div>
		<div class="modal-footer">
			<button class="waves-effect waves-red btn-flat" id="closeModal">Close</button>
		</div>
	</div>
@endsection

@section('js')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnDetail').on("click", function(){
				$.ajax({
					type: "GET",
					url: "{{ url('transaction') }}"+"/"+this.getAttribute('data-id'),
					success: function(data){
						$('.modal-content').html(data);
						$('#modal1').openModal();
					}
				});
			});

			$('#closeModal').on("click", function(){
				$('#modal1').closeModal();
			});
		});
	</script>
@endsection