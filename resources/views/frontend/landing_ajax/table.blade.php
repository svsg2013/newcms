<table>
	<thead>
		<tr>
			<th>Giấy tờ hợp lệ</th>
			@foreach($loan as $itemLoan)
				<th>{{$itemLoan->name}}</th>
			@endforeach
		</tr>
	</thead>
	<tbody>
		<tr></tr>
		@foreach($personals as $itemPersonal)
		<tr>
			<th>{{$itemPersonal->name}}</th>
			@foreach($loan as $itemLoan)
				@php $listPersonals = $itemLoan->personals->pluck('id')->toArray(); @endphp
			<td>
				@if(is_array($listPersonals) && in_array($itemPersonal->id,$listPersonals))
					<img src="{{asset('landing_templates/static/layout-1/img/logo-small.svg')}}" alt="">
				@endif
			</td>
			@endforeach
		</tr>
		@endforeach
		<tr class="button">
			<th></th>
			@foreach($loan as $itemLoan)
			<td>
				<div class="btn-wrap">
					<button class="btn btn-primary btn-sm btn-shadow choose_doc btn-choose-doc" 
					data-rate="{{$itemLoan->interest_rate}}" 
					data-amount-min="{{$itemLoan->loan_amount_min}}" 
					data-amount-max="{{$itemLoan->loan_amount_max}}" 
					data-tenure-min="{{$itemLoan->loan_tenure_min}}" 
					data-tenure-max="{{$itemLoan->loan_tenure_max}}" 
					data-val="{{$itemLoan->id}}" >Chọn</button>
				</div>
			</td>
			@endforeach
		</tr>
	</tbody>
</table>