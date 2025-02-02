@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="col-md-12 col-lg-12">
					<div class="card card-info">
						<div class="card-header">
							<div class="card-title">Project: {{$projectCategory->name}}</div>
						</div>
						<div class="card-body">
							<div class="row">
								<img src="{{asset('uploads/project_category/thumbnail/'.$projectCategory->image)}}" width="358" height="239">
							</div>
							<hr>
							<div class="form-group mt-2">
								<label>Created Or Updated By: {{$projectCategory->user->name}}</label>
							</div>
							<div class="form-group">
								<label>Summary: </label><br>
								<p>
									{{$projectCategory->summary}}
								</p>
							</div>
							<div class="form-group">
								<label>Description: </label><br>
								<p>
									{!! $projectCategory->description !!}
								</p>
							</div>
							<div class="form-group">
								<label>Title Tag: {{$projectCategory->title_tag}}</label>
							</div>
							<div class="form-group">
								<label>Meta Keywords: </label>
								{{$projectCategory->meta_keywords}}
							</div>
							<div class="form-group">
								<label>Meta Description:</label>
								<p>
									{{$projectCategory->meta_description}}
								</p>
							</div>
						</div>
						<div class="card-footer">
							<div>
								<center><a href="{{route('project_category.index')}}"><< Go Back</a></center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
