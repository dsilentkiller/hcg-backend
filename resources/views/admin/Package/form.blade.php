@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		@if(isset($package))
		<form action="{{route('package.update', $package)}}" method="post" enctype="multipart/form-data">
			{{method_field('PATCH')}}
			@else
			<form action="{{route('package.store')}}" method="post" enctype="multipart/form-data">
				@endif
				<div class="row">
					<div class="col-md-6">
						<div class="card card-primary">
							@csrf
							<div class="card-header">
								<div class="card-title">package @if(isset($package)) Update @else Addon @endif Form </div>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label for="title">Package Name:</label>
									<input type="text" name="name" class="form-control" placeholder="Enter Destination Name" value="{{old('name', @$package->name)}}">
									@error('name')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Belongs To:</label>
									<select name="package_category" class="form-control form-control-sm">
										@if(isset($package))
										 <option value="{{$package->category->id}}">{{$package->category->name}}</option>
										 @else
										 <option value="">Please Choose a Category</option>
										@endif
										@if(isset($packageCategories) && count($packageCategories)>0)
										@foreach($packageCategories as $category)
										 <option value="{{$category->id}}">
										 	{{$category->name}}
										 </option>
										@endforeach
										@endif
									</select>
									@error('name')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label>Choose Thumbnail:</label><br>
									<label for="image">
										<input type="file" name="thumbnail" placeholder="Choose An image">
									</label>
									@error('thumbnail')
									<span>{{$message}}</span>
									@enderror
								</div>
								
								<div class="form-group">
									<label>Choose Multiple image</label>
									<div class="row">
										<div id="coba" class="row"></div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3 col-lg-3">
										<div class="form-group">
											<label>Duration In Days</label>
											<div class="input-group mb-3">
												<input type="number" class="form-control" placeholder="Enter days" value="{{old('duration_days', @$package->duration_days)}}" name="duration_days">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Days</span>
												</div>
											</div>
											@error('duration_days')
											<span class="alert alert-danger">{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="col-md-3 col-lg-3">
										<div class="form-group">
											<label>Duration In Nights</label>
											<div class="input-group mb-3">
												<input type="number" class="form-control" placeholder="Enter nights" value="{{old('duration_nights', @$package->duration_nights)}}" name="duration_nights">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">Nights</span>
												</div>
											</div>
											@error('duration_nights')
											<span class="alert alert-danger">{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="col-md-3 col-lg-3">
										<div class="form-group">
											<label>Start From:</label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">$</span>
												</div>
												<input type="number" class="form-control" placeholder="Enter Amount" value="{{old('start_from', @$package->start_from)}}" name="start_from">
											</div>
											@error('start_from')
											<span class="alert alert-danger">{{$message}}</span>
											@enderror
										</div>
									</div>
									<div class="col-md-3 col-lg-3">
										<div class="form-group">
											<label>Difficulty</label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text" id="basic-addon1">$</span>
												</div>
												<input type="text" class="form-control" placeholder="Write About Difficulty" value="{{old('difficulty', @$package->difficulty)}}" name="difficulty">
											</div>
											@error('difficulty')
											<span class="alert alert-danger">{{$message}}</span>
											@enderror
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="title">Summary</label>
									<textarea class="form-control" style="height: 100px;" name="summary">{{old('summary', @$package->summary)}}</textarea>
									@error('summary')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="card card-info">
									<div class="card-header">
										<div class="card-title">
											Description
										</div>
										<div>
											<button type="button" class="btn btn-primary float-right" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-arrow-down"></i></button>
										</div>
									</div>
									<div class="card-body @if(!isset($package)) collapse @endif" id="collapseExample">
										<div class="form-group">
											<label for="title">Top Overview</label>
											<textarea class="form-control editor" style="height: 150px;" name="trip_overview">{{old('trip_overview', @$package->trip_overview)}}</textarea>
											@error('trip_overview')
											<span class="alert alert-danger">{{$message}}</span>
											@enderror
										</div>
										<div class="form-group">
											<label for="title">Itinearary</label>
											<textarea class="form-control editor1" style="height: 150px;" name="itinearary">{{old('itinearary', @$package->itinearary)}}</textarea>
											@error('itinearary')
											<span class="alert alert-danger">{{$message}}</span>
											@enderror
										</div>
										<div class="form-group">
											<label for="title">Pricing Plan</label>
											<textarea class="form-control editor2" style="height: 150px;" name="pricing_plan">{{old('pricing_plan', @$package->pricing_plan)}}</textarea>
											@error('pricing_plan')
											<span class="alert alert-danger">{{$message}}</span>
											@enderror
										</div>
										<div class="form-group">
											<label for="title">Booking</label>
											<textarea class="form-control editor3" style="height: 150px;" name="booking">{{old('booking', @$package->booking)}}</textarea>
											@error('booking')
											<span class="alert alert-danger">{{$message}}</span>
											@enderror
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card card-info">
							<div class="card card-header">
								<div class="card-title">Your Page Info</div>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label for="title">Title Tag:</label>
									<input type="text" name="title_tag" class="form-control" value="{{old('title_tag', @$package->title_tag)}}">
									@error('title_tag')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Meta Keywords</label>
									<textarea class="form-control" style="height: 200px;" name="meta_keywords">{{old('meta_keywords', @$package->meta_keywords)}}</textarea>
									@error('meta_keywords')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Meta Description</label>
									<textarea class="form-control" style="height: 200px;" name="meta_description">{{old('meta_description', @$package->meta_description)}}</textarea>
									@error('meta_description')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
							</div>
							<div class="card-footer">
								<div>
									<button type="submit" class="btn btn-primary btn-lg float-right">
									@if(isset($package)) Update @else Save @endif
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
	@push('js')
	<script type="text/javascript" src="{{asset('image_picker/spartan-multi-image-picker.js')}}"></script>
	<script type="text/javascript">
		$(function(){
			$("#coba").spartanMultiImagePicker({
				fieldName:        'images[]',
				maxCount:         5,
				rowHeight:        '200px',
				groupClassName:   'col-md-4 col-sm-4 col-xs-6',
				maxFileSize:      '',
				placeholderImage: {
				image: "{{asset('image_picker/placeholder.png')}}",
				width : '100%'
				},
				dropFileLabel : "Drop Here",
				onAddRow:       function(index){
					console.log(index);
					console.log('add new row');
				},
				onRenderedPreview : function(index){
					console.log(index);
					console.log('preview rendered');
				},
				onRemoveRow : function(index){
					console.log(index);
				},
				onExtensionErr : function(index, file){
					console.log(index, file,  'extension err');
					alert('Please only input png or jpg type file')
				},
				onSizeErr : function(index, file){
					console.log(index, file,  'file size too big');
					alert('File size too big');
				}
			});
		});
	</script>
	@endpush