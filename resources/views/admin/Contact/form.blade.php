
@extends('layouts.admin-app')
@section('content')
<section class="content">
    {{ Breadcrumbs::render('contact.create') }}

	<div class="container-fluid">
		@if(isset($contact))
		<form action="{{route('contact.update', $contact)}}" method="post" enctype="multipart/form-data">
			{{method_field('PATCH')}}
		@else
			<form action="{{route('contact.store')}}" method="post" enctype="multipart/form-data">
				@endif
				<div class="row">
					<div class="col-md-6">
						<div class="card card-warning">
							@csrf
							<div class="card-header">
								<div class="card-name">Contact @if(isset($contact)) Update @else Addon @endif Form </div>
							</div>

                            {{-- name --}}
							 <div class="card-body">
								<div class="form-group">
									<label for="name">Name:</label>
									<input type="text" name="name" class="form-control" placeholder="Enter contact Name" value="{{old('name', @$contact->name)}}">
									@error('name')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>

                                 {{-- image --}}
								<div class="form-group">
									<label for="image">
										<input type="file" name="image" placeholder="Choose An image">
									</label>
								</div>
                                 {{-- contact number --}}
                                 <div class="form-group">
									<label for="number">Contact  Number</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">+977</span>
                                        <input type="number" class="form-control" aria-label="max 10 digit number" name="contact_no"  placeholder="mobile number " value="{{old('contact_no', @$contact->contact_no)}}">
                                      </div>
									@error('contact_no')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>

                                {{-- email --}}
                                <div class="form-group">
									<label for="email">Email </label>
									<input type ="email" class="form-control editor" style="height: 20px;" name="email">{{old('email', @$contact->email)}}
									@error('email')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
                                 {{-- Subject--}}
								<div class="form-group">
									<label for="name">Subject</label>
									<textarea class="form-control editor" style="height: 150px;" name="subject">{{old('subject', @$contact->subject)}}</textarea>
									@error('subject')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>
                            {{-- message --}}
								<div class="form-group">
									<label for="name">message</label>
									<textarea class="form-control" style="height: 200px;" name="message">{{old('message', @$contact->message)}}</textarea>
									@error('message')
									<span class="alert alert-danger">{{$message}}</span>
									@enderror
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card card-info">
							<div class="card card-header">
								<div class="card-name">Your Page Info</div>
							</div>
                            <div class="form-group">
                                <label for="title">Meta Keywords</label>
                                <textarea class="form-control" style="height: 200px;" name="meta_Keywords">{{old('meta_Keywords', @$about->meta_Keywords)}}</textarea>
                                @error('meta_keywords')
                                <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
							<div class="card-footer">
								<div>
									<button type="submit" class="btn btn-success btn-lg float-right">
									@if(isset($contact)) Update @else Save @endif
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
