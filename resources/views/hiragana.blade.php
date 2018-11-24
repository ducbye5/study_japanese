@extends('layouts.site')
@section('controller')
<div class="col-md-12">
	<div class="col-md-12 pt-3 pb-3">Question : <i class="text-danger">1</i></div>
	<div class="col-md-12 btn btn-dark text-center"><h3>A<h/3></div>
	<div class="col-md-12 pt-3">
		<div class="row">
			<div class="col-md-6 btn btn-outline-primary">A</div>
			<div class="col-md-6 btn btn-outline-primary">B</div>
			<div class="col-md-6 btn btn-outline-primary">C</div>
			<div class="col-md-6 btn btn-outline-primary">D</div>
		</div>
	</div>
	<div class="col-md-12 pt-3">
		<div class="row">
			<div class="col-md-2">
				<label class="btn btn-light">Result</label>
			</div>
			<div class="col-md-10">
				<u class="text-success">The answer is TRUE. Please click the NEXT button for the next question</u>
				<u class="text-danger">The answer is WRONG. Please click on the RESTART button to start another question</u>
			</div>
		</div>
		<div class="row pt-3">
			<div class="col-md-12 text-center">
				<a href="" class="btn btn-success">NEXT</a>
				<a href="" class="btn btn-danger">RESTART</a>
			</div>
		</div>
	</div>
</div>
@endsection