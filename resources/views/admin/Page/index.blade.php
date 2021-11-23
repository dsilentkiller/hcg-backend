@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Page List</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Page Name</th>
									<th>Profile</th>
									<th>Summary</th>
									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(isset($pages) && count($pages)>0)
								@foreach($pages as $page)
								<tr>
									<td>{{$n++}}</td>
									<td>{{$page->title}}</td>
									<td>
										{{$page->title_tag}}
									</td>
									<td>{{Substr($page->summary, 0, 200)}}</td>
									<td><a href="{{route('page.show', $page)}}">View</a></td>
									<td><a href="{{route('page.edit', $page)}}">Edit</a></td>
									<td>
										<form action="{{route('page.destroy', $page)}}" method="post">
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

						{{$pages->links()}}
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