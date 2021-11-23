@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">packageCategory List</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Package Category Name</th>
									<th>Summary</th>
									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(isset($packageCategories) && count($packageCategories)>0)
								@foreach($packageCategories as $packageCategory)
								<tr>
									<td>{{$n++}}</td>
									<td>{{$packageCategory->name}}</td>
									<td>{{Substr($packageCategory->summary, 0, 200)}}</td>
									<td><a href="{{route('package_category.show', $packageCategory)}}">View</a></td>
									<td><a href="{{route('package_category.edit', $packageCategory)}}">Edit</a></td>
									<td>
										<form action="{{route('package_category.destroy', $packageCategory)}}" method="post">
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

						{{$packageCategories->links()}}
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