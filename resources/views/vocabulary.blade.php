@extends('layouts.site')
@section('controller')

<div class="col-md-12">
	<form method="post" action="{{ route('vocabulary_check_answer') }}" class="form">
		@csrf
		@php
			$stt = 0;
		@endphp
		<input type="hidden" name="nextPage" value="{{ $data['next_page'] }}">
		@foreach($data['question'] as $rows)
		@php
		 	$id = $rows->id;
		 	$characters = $rows->characters;
		 	$list_result = $data['select'][$stt];
		 	$anwser = $rows->mean;
		 	$A = $list_result[0];
		 	$B = $list_result[1];
		 	$C = $list_result[2];
		 	$D = $list_result[3];
		 	$stt++;
		@endphp
		<div class="col-md-12 pt-3 pb-3">Question : <i class="text-danger">{{ $id }}</i></div>
		<div class="col-md-12 btn btn-dark text-center"><h2>{{ $characters }}</h2></div>
		<input type="hidden" name="data[anwser][{{ $id }}]" value="{{ $anwser }}">
		<div class="col-md-12 pt-3">
			<div class="row">
				<div class="col-md-6">
					<input type="radio" name="data[select][{{ $id }}]" value='{{ $A }}'><b>   {{ $A }}</b>
				</div>
				<div class="col-md-6">
					<input type="radio" name="data[select][{{ $id }}]" value='{{ $B }}'><b>   {{ $B }}</b>
				</div>
				<div class="col-md-6">
					<input type="radio" name="data[select][{{ $id }}]" value='{{ $C }}'><b>   {{ $C }}</b>
				</div>
				<div class="col-md-6">
					<input type="radio" name="data[select][{{ $id }}]" value='{{ $D }}'><b>   {{ $D }}</b>
				</div>
			</div>
		</div>
		<hr>
		@endforeach
		<div class="col-md-12 text-center pt-3">
			<input type="submit" value="Submit" class="btn btn-primary">
		</div>
	</form>
</div>

@endsection
