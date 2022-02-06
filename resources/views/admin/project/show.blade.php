@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="col-md-12 col-lg-12">
					<div class="card card-info">
						<div class="card-header">
							<div class="card-title">Info of project: {{$project->name}}</div>
						</div>
						<div class="card-body">
							<div class="row">
								<img src="{{asset('uploads/project/thumbnail/'.$project->thumbnail)}}" width="358" height="239">
							</div>
							<hr>
							<div class="form-group mt-2">
								<label>Created Or Updated By: {{$project->user->name}}</label>
							</div>
							<div class="form-group">
								<label>Duration: {{$project->duration_days}} Days {{$project->duration_nights}} Nights</label><br>
							</div>
							<div class="form-group">
								<label>Difficulty:{{$project->difficulty}}</label><br>
							</div>
							<div class="form-group">
								<label>Start From: $ {{$project->start_from}}</label><br>
							</div>
							<div class="form-group">
								<label>Summary: </label><br>
								<p>
									{{$project->summary}}
								</p>
							</div>
							<div class="row">
								<div class="card card-primary card-tabs">
									<div class="card-header p-0 pt-1">
										<ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Trip Overview</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Itinearary</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Pricing Plan</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Booking</a>
											</li>
										</ul>
									</div>
									<div class="card-body">
										<div class="tab-content" id="custom-tabs-one-tabContent">
											<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
												{!! $project->trip_overview !!}
											</div>
											<div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
												{!! $project->itinearary !!}
											</div>
											<div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
												{!! $project->pricing_plan !!}
											</div>
											<div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
												{!! $project->booking !!}
											</div>
										</div>
									</div>
									<!-- /.card -->
								</div>
							</div>
							<div class="form-group">
								<label>Title Tag: {{$project->title_tag}}</label>
							</div>
							<div class="form-group">
								<label>Meta Keywords: </label>
								{{$project->meta_keywords}}
							</div>
							<div class="form-group">
								<label>Meta Description:</label>
								<p>
									{{$project->meta_description}}
								</p>
							</div>
							<div class="row">
								@foreach($project->thumbnails as $thumnail)
								<a href="{{asset('uploads/project/thumbnail/'.$thumnail->image)}}"><img src="{{asset('uploads/project/thumbnail/'.$thumnail->image)}}" height="100" width="100" class="m-2"></a>
								@endforeach
							</div>
						</div>
						<div class="card-footer">
							<div>
								<center><a href="{{route('project.index')}}"><< Go Back</a></center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
