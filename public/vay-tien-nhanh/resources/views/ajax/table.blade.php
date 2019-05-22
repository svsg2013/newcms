<table>
	<thead>
		<tr>
			<th>Giấy tờ hợp lệ</th>
			<?php foreach($loan as $itemLoan): ?>
			<th>{{$itemLoan->name}}</th>
			<?php endforeach; ?>
		</tr>
	</thead>
	<tbody>
		<tr></tr>
		<?php foreach($personals as $itemPersonal): ?>
		<tr>
			<th>{{$itemPersonal->name}}</th>
			<?php foreach($loan as $itemLoan): $listPersonals = $itemLoan->personals->pluck('id')->toArray();?>
			<td>
				<?php if(is_array($listPersonals) and in_array($itemPersonal->id,$listPersonals)): ?>
				<img src="{{asset('static/layout-1/img/logo-small.svg')}}" alt="">
				<?php endif; ?>
			</td>
			<?php endforeach; ?>
		</tr>
		<?php endforeach; ?>
		<tr class="button">
			<th></th>
			<?php foreach($loan as $itemLoan): ?>
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
			<?php endforeach; ?>
		</tr>
	</tbody>
</table>