@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="col-md-12 col-lg-12">
					<div class="card card-info">
						<div class="card-header">
							<div class="card-title">Info of Service: {{$serviceCategory->name}}</div>
						</div>
                        //image
						<div class="card-body">
							<div class="row">
								<img src="{{asset('uploads/service_category/image/'.$serviceCategory->image)}}" width="358" height="239">
							</div>
							<hr>

                            {{--  user  --}}
							<div class="form-group mt-2">
								<label>Created Or Updated By: {{$serviceCategory->user->name}}</label>
							</div>

                            //title
							  <div class="form-group">
								<label>Title: </label><br>
								<p>
									{{$serviceCategory->title}}  
								</p>
							</div>  

                            {{-- heading   --}}
                              <div class="form-group">
								<label>Heading: </label><br>
								<p>
									{{$serviceCategory->heading}}  
								</p>
							</div>  

                            {{--  start_from  --}}
                              <div class="form-group">
								<label>Start_from: </label><br>
								<p>
									{{$serviceCategory->start_from}}  
								</p>
							</div>  


                            {{--  description  --}}
							<div class="form-group">
								<label>Description: </label><br>
								<p>
									{!! $serviceCategory->description !!}
								</p>
							</div>

                            {{--  title tag  --}}
                            <div class ="form-group">
                            <label> Title Tag: </label>#
                            {{ $serviceCategory ->title_tag }}
                            </div>
                            {{--  meta keywords  --}}
							<div class="form-group">
								<label>Meta Keywords: </label>
								{{$serviceCategory->meta_keywords}}
							</div>
                            {{--  meta_descriptioon  --}}
							<div class="form-group">
								<label>Meta Description:</label>
								<p>
									{{$serviceCategory->meta_description}}
								</p>
							</div>
						</div>
						<div class="card-footer">
							<div>
								<center><a href="{{route('service_category.index')}}"><< Go Back</a></center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection