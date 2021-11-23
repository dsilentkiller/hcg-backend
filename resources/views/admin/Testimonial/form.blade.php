@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		@if(isset($testimonial))
		<form action="{{route('testimonial.update', $testimonial)}}" method="post" enctype="multipart/form-data">
			{{method_field('PATCH')}}
			@else
			<form action="{{route('testimonial.store')}}" method="post" enctype="multipart/form-data">
				@endif
				<div class="row">
					<div class="col-md-12">
						<div class="container">
							<div class="card card-primary">
								@csrf
								<div class="card-header">
									<div class="card-title">Testimonial @if(isset($testimonial)) Update @else Addon @endif Form </div>
								</div>
								<div class="card-body">
									<div class="form-group float-right">
										<label>Status:</label>
										 <input type="checkbox" name="status" value="1" data-bootstrap-switch @if(isset($testimonial)) @if($testimonial->status) checked @endif @else checked @endif>
									</div>
									<div class="form-group">
										<label for="title">Name:</label>
										<input type="text" name="name" class="form-control" placeholder="Enter Destination Name" value="{{old('name', @$testimonial->name)}}">
										@error('name')
										<span class="alert alert-danger">{{$message}}</span>
										@enderror
									</div>
									<div class="form-group">
										<label>Choose Profile:</label><br>
										<label for="image">
											<input type="file" name="image" placeholder="Choose An image">
										</label>
										@error('image')
										<span>{{$message}}</span>
										@enderror
									</div>
									<div class="form-group">
										<label for="title">Speech:</label>
										<textarea class="form-control" style="height: 100px;" name="speech">{{old('speech', @$testimonial->speech)}}</textarea>
										@error('speech')
										<span class="alert alert-danger">{{$message}}</span>
										@enderror
									</div>
									<div class="form-group">
										<label for="title">Summary</label>
										<textarea class="form-control" style="height: 100px;" name="summary">{{old('summary', @$testimonial->summary)}}</textarea>
										@error('summary')
										<span class="alert alert-danger">{{$message}}</span>
										@enderror
									</div>
								</div>
								<div class="card-footer">
									<div>
										<button type="submit" class="btn btn-primary float-right">
											@if(isset($testimonail))
											Update
											@else
											Save
											@endif
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
	@endsection

	@push('js')
	<script src="{{asset('dashboard/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
	<script type="text/javascript">
		$("input[data-bootstrap-switch]").each(function(){
           $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
	</script>
	@endpush