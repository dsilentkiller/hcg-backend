@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">


		<hr>
		@if(isset($setting))
		{{--  setting route to create file  --}}
		<form action="{{route('setting.create', $setting)}}" method="post" enctype="multipart/form-data">
			{{method_field('PATCH')}}
			@else
			{{--  seeting route to store  --}}
			<form action="{{route('setting.store')}}" method="post" enctype="multipart/form-data">
				@endif
				<div class="row">
					<div class="col-md-6">
						<div class="card card-warning">
							@csrf
							<div class="card-header">
							{{--  setting file is check   --}}
								<div class="card-title">Setting @if(isset($setting)) Update @else Addon @endif Form </div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<label for="title">Logo</label>
											<input type="file" name="logo" class="form-control">
											@error('logo')
											<span class="alert alert-danger">{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="col-md-6 col-lg-6">
										<div class="form-group">
											<label for="title">Icon </label>
											<input type="file" name="icon" class="form-control">
											@error('icon')
											<span class="alert alert-danger">{{$message}}</span>
											@enderror
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="title">Title:</label>
									<input type="text" name="name" class="form-control" placeholder="Enter Site Title" value="{{old('name', @$setting->name)}}">
									@error('name')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Email:</label>
									<input type="email" name="email" class="form-control" placeholder="Enter Site email" value="{{old('email', @$setting->email)}}">
									@error('email')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
                                <!-- locstion-->
								{{-- <div class="form-group">
									<label for="title">Address:</label>
									<input type="text" name="location" class="form-control" placeholder="Enter Site location" value="{{old('location', @$setting->location)}}">
									@error('location')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div> --}}



								<div class="form-group">
									<label for="title">Contact No:</label>
									<input type="number" name="contact_no" class="form-control" value="{{old('contact_no', @$setting->contact_no)}}">
									@error('contact_no')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>

								<div class="form-group">
									<label for="title">Location</label>
									<input type="text" name="location" class="form-control" value="{{old('location', @$setting->location)}}">
									@error('location')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card card-info">
							<div class="card card-header">
								<div class="card-title">Your Web Info</div>
							</div>
							<div class="card-body">
								{{-- <div class="form-group">
									<label for="title">Summary</label>
									<textarea class="form-control" style="height: 100px;" name="summary">{{old('summary', @$setting->summary)}}</textarea>
									@error('summary')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div> --}}
								{{-- <div class="form-group">
									<label for="title">Description</label>
									<textarea class="form-control editor" style="height: 150px;" name="description">{{old('description', @$setting->description)}}</textarea>
									@error('description')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div> --}}
								<div class="form-group">
									<label for="title">Title Tag:</label>
									<input type="text" name="title_tag" class="form-control" value="{{old('title_tag', @$setting->title_tag)}}">
									@error('title_tag')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Meta Keywords</label>
									<textarea class="form-control" style="height: 200px;" name="meta_keywords">{{old('meta_keywords', @$setting->meta_keywords)}}</textarea>
									@error('meta_keywords')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Meta Description</label>
									<textarea class="form-control" style="height: 200px;" name="meta_description">{{old('meta_description', @$setting->meta_description)}}</textarea>
									@error('meta_description')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
							</div>
							<div class="card-footer">
								<div>
									<button type="submit" class="btn btn-success btn-lg float-right">
									@if(isset($setting)) Update @else Save @endif
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>

			</form>
		</div>
	</section>
	@endsection
