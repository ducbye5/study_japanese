@extends('layouts.site')
@section('controller')

<div class="col-md-12">
	<div class="col-md-12 pt-3 pb-3">Question : <i class="text-danger">1</i></div>
	<div class="col-md-12 btn btn-dark text-center"><h3>{{ $data['question'][0]->characters }}<h/3></div>
	<div class="col-md-12 pt-3">
		<div class="row">
			<div class="col-md-6 btn btn-outline-primary" id="A">{{ $data['select'][0] }}</div>
			<div class="col-md-6 btn btn-outline-primary" id="B">{{ $data['select'][1] }}</div>
			<div class="col-md-6 btn btn-outline-primary" id="C">{{ $data['select'][2] }}</div>
			<div class="col-md-6 btn btn-outline-primary" id="D">{{ $data['select'][3] }}</div>
		</div>
	</div>
	<form method="post" action="{{ route('hiragana_check_answer') }}" id="form">
		@csrf
		<div id="select_input"></div>
		<input type="hidden" name="result" value="{{ $data['answer'] }}">
	</form>
	<div class="col-md-12 pt-3">
		<div class="row">
			<div class="col-md-2">
				<label class="btn btn-primary">Result</label>
			</div>
			<div class="col-md-10">
				@if(session('success'))
				<u class="text-success">The answer is TRUE. Please click the NEXT button for the next question</u>
				@endif
				@if(session('false'))
				<u class="text-danger">The answer is WRONG. Please click on the RESTART button to start another question</u>
				@endif
			</div>
		</div>
		<div class="row pt-3">
			<div class="col-md-12 text-center">
				@if(session('success'))
				{{ $data['question'] }}
				@endif
				@if(session('false'))
				<a href="{{ route('hiragana_view') }}" class="btn btn-danger">RESTART</a>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection
