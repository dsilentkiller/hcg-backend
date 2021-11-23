@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Service List</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Service Name</th>
									<th>Description</th>
									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(isset($serviceCategories) && count($serviceCategories)>0)
								@foreach($serviceCategories as $serviceeCategory)
								<tr>
									<td>{{$n++}}</td>
									<td>{{$serviceCategory->name}}</td>
									<td>{{Substr($serviceCategory->description, 0, 200)}}</td>
									<td><a href="{{route('service_category.show', $serviceCategory)}}">View</a></td>
									<td><a href="{{route('service_category.edit', $serviceCategory)}}">Edit</a></td>
									<td>
										<form action="{{route('service_category.destroy', $serviceCategory)}}" method="post">
											@csrf
											{{method_field('DELETE')}}
											<button type="submit" class="btn-link">Deleted</button>
										</form>
									</td>
								</tr>
								@endforeach
								@else
								<tr>
									<td colspan="5">
										<center>No Record Found</center>
									</td>
								</tr>
								@endif
							</tbody>
						</table>

						{{$serviceCategories->links()}}
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