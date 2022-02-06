@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">project List</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>project Title</th>
									<th>Summary</th>
                                    <th>Image</th>

									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(isset($projects) && count($projects)>0)
								@foreach($projects as $project)
								<tr>
									<td>{{$n++}}</td>
									<td>{{$project->title}}</td>
									<td>{{Substr($project->summary, 0, 200)}}</td>
                                    {{-- <td>{{$project->happy_clients}}</td>
                                    <td>{{($project->project_done)}}</td> --}}
                                    <td>{{($project->image)}}</td>
									<td><a href="{{route('project.show', $project)}}">View</a></td>
									<td><a href="{{route('project.edit', $project)}}">Edit</a></td>
									<td>
										<form action="{{route('project.destroy', $project)}}" method="post">
											@csrf
											{{method_field('DELETE')}}
											<button type="submit" class="btn-link">Deleted</button>
										</form>
									</td>
								</tr>
								@endforeach
								@else
								<tr>
									<td colspan="6">
										<center>No Record Found</center>
									</td>
								</tr>
								@endif
							</tbody>
						</table>

						{{$project->links()}}
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
