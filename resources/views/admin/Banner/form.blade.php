@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="card card-primary">
					<div class="card-header" style="padding: 0px;">
						<div class="card-title" >New banner Setup</div>
						<div>
							<a class="btn btn-primary float-right" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">+ Create New</a>
						</div>
					</div>
					<div class="card-body @if(!isset($banner)) collapse @endif" id="collapseExample">
						<div class="container">
							@if(isset($banner))
							<form class="form-inline" action="{{route('banner.update', $banner)}}" method="post" enctype="multipart/form-data">
								{{method_field('PATCH')}}
								@else
								<form class="form-inline" action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
									@endif
									@csrf
									<div class="form-group m-2">
										<label for="staticEmail2" class="sr-only">Top Heading</label>
										<input type="text" name="top_heading" class="form-control" value="{{old('top_heading', @$banner->top_heading)}}" placeholder="Enter Top Heading">
										@error('top_heading')
										<span>{{$message}}</span>
										@enderror
									</div>
									<div class="input-group m-2">
										<label for="inputPassword2" class="sr-only">Bottom Heading</label>
										<input type="text" name="bottom_heading" class="form-control" placeholder="Enter Bottom Heading" value="{{old('bottom_heading', @$banner->bottom_heading)}}">
										@error('bottom_heading')
										<span>{{$message}}</span>
										@enderror
									</div>
									<div class="form-group mx-sm-3 m-2">
										<label for="inputPassword2" class="sr-only">Choose Image</label>
										<input type="file" name="image" placeholder="choose an image">
										@error('image')
										<span>{{$message}}</span>
										@enderror
									</div>
									<button type="submit" class="btn btn-primary m-2">
										@if(isset($banner))
										Update
										@else
										Add
										@endif
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">banner List</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Banner</th>
										<th>Top Heading</th>
										<th>Bottom Heading</th>
										<th colspan="3">Action</th>
									</tr>
								</thead>
								<tbody>
									@if(isset($banners) && count($banners)>0)
									@foreach($banners as $banner)
									<tr>
										<td>{{$n++}}</td>
										<td>
											<a href="{{asset('uploads/banners/thumbnail/'.$banner->image)}}"><img src="{{asset('uploads/banners/thumbnail/'.$banner->image)}}" height="80" width="150"></a>
										</td>
										<td>{{$banner->top_heading}}</td>
										<td>{{$banner->bottom_heading}}</td>
										<td>View</td>
										<td><a href="{{route('banner.edit', $banner)}}">Edit</a></td>
										<td>
											<form action="{{route('banner.destroy', $banner)}}" method="post">
												@csrf
												{{method_field('DELETE')}}
												<button type="submit" class="btn btn-link">Delete</button>
											</form>
										</td>
									</tr>
									@endforeach
									@else
									<tr>
										<td colspan="4">
											<center>No Record Found</center>
										</td>
									</tr>
									@endif
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	@endsection