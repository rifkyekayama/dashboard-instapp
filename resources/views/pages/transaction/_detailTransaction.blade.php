<div id="responsive-table">
	<div class="row">
		<div class="col l12">
			<table class="responsive-table" id="tableMail">
				<thead>
					<th>Product</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
				</thead>
				<tbody>
					<?php $total = 0;?>
					@foreach($transDetail as $detail)
						<tr>
							<td>{{ $detail->product }}</td>
							<td>{{ "Rp. ".number_format($detail->price, "0", ",", ".") }}</td>
							<td>{{ $detail->quantity }}</td>
							<?php $total+=($detail->price*$detail->quantity);?>
							<td>{{ "Rp. ".number_format(($detail->price*$detail->quantity), "0", ",", ".") }}</td>
						</tr>
					@endforeach
					<tr>
						<td colspan="3" align="right"><b>Total</b></td>
						<td>{{ "Rp. ".number_format($total, "0", ",", ".") }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>