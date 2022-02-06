@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">projectCategory List</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>project Category Name</th>
									<th>Summary</th>
									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(isset($projectCategories) && count($projectCategories)>0)
								@foreach($projectCategories as $projectCategory)
								<tr>
									<td>{{$n++}}</td>
									<td>{{$projectCategory->name}}</td>
									<td>{{Substr($projectCategory->summary, 0, 200)}}</td>
									<td><a href="{{route('project_category.show', $projectCategory)}}">View</a></td>
									<td><a href="{{route('project_category.edit', $projectCategory)}}">Edit</a></td>
									<td>
										<form action="{{route('project_category.destroy', $projectCategory)}}" method="post">
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

						{{$projectCategories->links()}}
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
