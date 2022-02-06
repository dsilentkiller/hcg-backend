@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">service List</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Service Name</th>
                                    <th>Category Name</th>
									<th>Summary</th>
									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(isset($services) && count($services)>0)
								@foreach($services as $service)
								<tr>
									<td>{{$n++}}</td>
									<td>{{$service->name}}</td>
                                    <td>{{$service->category_name}}</td>
									<td>{{Substr($service->summary, 0, 200)}}</td>
									<td><a href="{{route('service.show', $service)}}">View</a></td>
									<td><a href="{{route('service.edit', $service)}}">Edit</a></td>
									<td>
										<form action="{{route('service.destroy', $service)}}" method="post">
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

						{{$services->links()}}
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
