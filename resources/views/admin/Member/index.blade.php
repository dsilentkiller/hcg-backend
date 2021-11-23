@extends('layouts.admin-app')
@section('content')
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">member List</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Member Name</th>
									<th>Profile</th>
									<th>Email</th>
									<th>Summary</th>
									<th colspan="3">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(isset($members) && count($members)>0)
								@foreach($members as $member)
								<tr>
									<td>{{$n++}}</td>
									<td>{{$member->name}}</td>
									<td>
										<img src="{{asset('uploads/member/thumbnail/'.$member->image)}}" height="150" width="120">
									</td>
									<td>
										<a href="mailto:{{$member->email}}">{{$member->email}}</a>
									</td>
									<td>{{Substr($member->summary, 0, 200)}}</td>
									<td><a href="{{route('member.show', $member)}}">View</a></td>
									<td><a href="{{route('member.edit', $member)}}">Edit</a></td>
									<td>
										<form action="{{route('member.destroy', $member)}}" method="post">
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

						{{$members->links()}}
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