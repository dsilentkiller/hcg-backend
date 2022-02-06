@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">about List</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>about Title</th>
									<th>Summary</th>
                                    <th>Project Done</th>
                                    <th>Happy Clients</th>
                                    <th>Image</th>

									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(isset($abouts) && count($abouts)>0)
								@foreach($abouts as $about)
								<tr>
									<td>{{$n++}}</td>
									<td>{{$about->title}}</td>
									<td>{{Substr($about->summary, 0, 200)}}</td>
                                    <td>{{$about->happy_clients}}</td>
                                    <td>{{($about->project_done)}}</td>
                                    <td>{{($about->image)}}</td>
									<td><a href="{{route('about.show', $about)}}">View</a></td>
									<td><a href="{{route('about.edit', $about)}}">Edit</a></td>
									<td>
										<form action="{{route('about.destroy', $about)}}" method="post">
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

						{{$abouts->links()}}
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
