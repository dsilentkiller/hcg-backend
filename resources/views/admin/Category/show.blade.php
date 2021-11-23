@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="col-md-12 col-lg-12">
					<div class="card card-info">
						<div class="card-header">
							<div class="card-title">Info of Country: {{$category->name}}</div>
						</div>
						<div class="card-body">
							<div class="row">
								<img src="{{asset('uploads/destination_category/thumbnail/'.$category->image)}}" width="100%" height="100%">
							</div>
							<hr>
							<div class="form-group mt-2">
								<label>Created Or Updated By: {{$category->user->name}}</label>
							</div>
							<div class="form-group">
								<label>Top Heading: </label><br>
								<p>
									{{$category->top_heading}}
								</p>
							</div>
                            {{-- <div class="form-group">
								<label>Top Heading: </label><br>
								<p>
									{{$category->top_heading}}
								</p>
							</div> --}}
                            <div class="form-group">
								<label>Slug: </label><br>
								<p>
									{{$category->slug}}
								</p>
							</div>
							<div class="form-group">
								<label>Description: </label><br>
								<p>
									{!! $category->description !!}
								</p>
							</div>
							<div class="form-group">
								<label>Title Tag: {{$category->title_tag}}</label>
							</div>
							<div class="form-group">
								<label>Meta Keywords: </label>
								{{$category->meta_keywords}}
							</div>
							<div class="form-group">
								<label>Meta Description:</label>
								<p>
									{{$category->meta_description}}
								</p>
							</div>
						</div>
						<div class="card-footer">
							<div>
								<center><a href="{{route('category.index')}}"><< Go Back</a></center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection