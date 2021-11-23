@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		@if(isset($member))
		<form action="{{route('member.update', $member)}}" method="post" enctype="multipart/form-data">
			{{method_field('PATCH')}}
			@else
			<form action="{{route('member.store')}}" method="post" enctype="multipart/form-data">
				@endif
				<div class="row">
					<div class="col-md-6">
						<div class="card card-primary">
							@csrf
							<div class="card-header">
								<div class="card-title">member @if(isset($member)) Update @else Addon @endif Form </div>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label for="title">Full Name</label>
									<input type="text" name="name" class="form-control" value="{{old('name', @$member->name)}}">
									@error('name')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Designation:</label>
									<input type="text" name="designation" class="form-control" value="{{old('designation', @$member->designation)}}">
									@error('designation')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Address:</label>
									<input type="text" name="address" class="form-control" value="{{old('address', @$member->address)}}">
									@error('address')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Contact No:</label>
									<input type="text" name="contact_no" class="form-control" value="{{old('contact_no', @$member->contact_no)}}">
									@error('contact_no')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Choose Profile:</label>
									<input type="file" name="image" class="form-control">
									@error('image')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
									<div class="form-group">
									<label for="title">Email : </label>
									<input type="email" name="email" class="form-control" value="{{old('email', @$member->email)}}">
									@error('email')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Facebook Link: </label>
									<input type="url" name="facebook_link" class="form-control" value="{{old('facebook_link', @$member->facebook_link)}}">
									@error('facebook_link')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="title">Twitter Link: </label>
									<input type="url" name="twitter_link" class="form-control" value="{{old('twitter_link', @$member->twitter_link)}}">
									@error('twitter_link')
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
									<label for="title">Summary: </label>
									<textarea class="form-control" style="height: 200px;" name="summary">{{old('summary', @$member->summary)}}</textarea>
									@error('summary')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>

								<div class="form-group">
									<label for="title">Description</label>
									<textarea class="form-control editor" style="height: 200px;" name="description">{{old('description', @$member->description)}}</textarea>
									@error('description')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
							</div>
							<div class="card-footer">
								<div>
									<button type="submit" class="btn btn-primary btn-lg float-right">
									@if(isset($member)) Update @else Save @endif
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