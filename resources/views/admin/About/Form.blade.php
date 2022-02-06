@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		@if(isset($about))
		<form action="{{route('about.update', $about)}}" method="post" enctype="multipart/form-data">
			{{method_field('PATCH')}}
		@else
			<form action="{{route('about.store')}}" method="post" enctype="multipart/form-data">
				@endif
				<div class="row">
					<div class="col-md-6">
						<div class="card card-warning">
							@csrf
							<div class="card-header">
								<div class="card-title">about @if(isset($about)) Update @else Addon @endif Form </div>
							</div>
                            {{-- title --}}
							<div class="card-body">
								<div class="form-group">
									<label for="title">About Title:</label>
									<input type="text" name="title" class="form-control" placeholder="Enter about Name" value="{{old('title', @$about->title)}}">
									@error('title')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
                                {{-- image --}}
								<div class="form-group">
									<label for="image">
										<input type="file" name="image" placeholder="Choose An image">
									</label>
								</div>
                                {{-- icon --}}
                                {{-- <div class ="form-group">
                                    <label for ="icon">
                                        <input type = "file" name ="icon" placeholder="Choose An Icon">
                                    </label>
                                </div> --}}
                                {{-- name --}}
                                {{-- <div class="form-group">
									<label for="name">Name:</label>
									<input type="text" name="title" class="form-control" placeholder="Enter about Name" value="{{old('title', @$about->title)}}">
									@error('name')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div> --}}
                        {{-- summary --}}
								<div class="form-group">
									<label for="title">Summary</label>
									<textarea class="form-control" style="height: 200px;" name="summary">{{old('summary', @$about->summary)}}</textarea>
									@error('summary')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
                                {{-- project done--}}
								<div class="form-group">
									<label for="number">Project Done</label>
									<input type="number" name="project_done" class="form-control" placeholder="Enter project" value="{{old('project_done', @$about->project_done)}}">
									@error('project_done')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>

                                {{-- Happy clients --}}
                                <div class="form-group">
									<label for="number">Happy Clients</label>
									<input type="number" name="happy_clientss" class="form-control" placeholder="Enter happy clients" value="{{old('happy_clients', @$about->happy_clients)}}">
									@error('happy_clients')
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
									<input type="text" name="title_tag" class="form-control" value="{{old('title_tag', @$about->title_tag)}}">
									@error('title_tag')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Meta Keywords</label>
									<textarea class="form-control" style="height: 200px;" name="meta_keywords">{{old('meta_keywords', @$about->meta_keywords)}}</textarea>
									@error('meta_keywords')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Meta Description</label>
									<textarea class="form-control" style="height: 200px;" name="meta_description">{{old('meta_description', @$about->meta_description)}}</textarea>
									@error('meta_description')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
							</div>
							<div class="card-footer">
								<div>
									<button type="submit" class="btn btn-success btn-lg float-right">
									@if(isset($about)) Update @else Save @endif
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
