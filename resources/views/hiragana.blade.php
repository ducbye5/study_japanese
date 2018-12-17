@extends('layouts.site')
@section('controller')

<div class="col-md-12">
	<div class="col-md-12 pt-3 pb-3">Question : <i class="text-danger">{{ $data['question'][0]->id }}</i></div>
	<div class="col-md-12 btn btn-dark text-center"><h2>{{ $data['question'][0]->characters }}</h2></div>
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
		<input type="hidden" name="nextPage" value="{{ $data['next_page'] }}">
	</form>
</div>

@endsection
