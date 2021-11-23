@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		@if(isset($serviceCategory))
		<form action="{{route('service_category.update', $serviceCategory)}}" method="post" enctype="multipart/form-data">
			{{method_field('PATCH')}}
			@else
			<form action="{{route('service_category.store')}}" method="post" enctype="multipart/form-data">
				@endif
				<div class="row">
					<div class="col-md-6">
						<div class="card card-primary">
							@csrf
							<div class="card-header">
								<div class="card-title">serviceCategory @if(isset($serviceCategory)) Update @else Addon @endif Form </div>
							</div>
							<div class="card-body">
                            {{--  title  --}}
								<div class="form-group">
									<label for="title">Service Category Name:</label>
									<input type="text" name="name" class="form-control" placeholder="Enter Destination Name" value="{{old('name', @$serviceCategory->name)}}">
									@error('name')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
                                {{--  heading  --}}
                                <div class="form-group">
									<label for="heading">Heading</label>
									<textarea class="form-control" style="height: 150px;" name="description">{{old('description', @$serviceCategory->heading)}}</textarea>
									@error('heading')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
                            {{--  image  --}}

								<div class="form-group">
									<label for="image">
										<input type="file" name="image" placeholder="Choose An image">
									</label>
								</div>

                                {{--  description  --}}
								<div class="form-group">
									<label for="title">Description</label>
									<textarea class="form-control" style="height: 100px;" name="description">{{old('description', @$serviceCategory->description)}}</textarea>
									@error('description')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
                                {{--  startfrom  --}}
                                <div class="form-group">
									<label for="start_from">start_from</label>
									<textarea class="form-control" style="height: 150px;" name="description">{{old('description', @$packageCategory->description)}}</textarea>
									@error('description')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
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
									<input type="text" name="title_tag" class="form-control" value="{{old('title_tag', @$packageCategory->title_tag)}}">
									@error('title_tag')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Meta Keywords</label>
									<textarea class="form-control" style="height: 200px;" name="meta_keywords">{{old('meta_keywords', @$packageCategory->meta_keywords)}}</textarea>
									@error('meta_keywords')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Meta Description</label>
									<textarea class="form-control" style="height: 200px;" name="meta_description">{{old('meta_description', @$packageCategory->meta_description)}}</textarea>
									@error('meta_description')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
							</div>
							<div class="card-footer">
								<div>
									<button type="submit" class="btn btn-primary btn-lg float-right">
									@if(isset($serviceCategory)) Update @else Save @endif
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