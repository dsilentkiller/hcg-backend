
@extends('layouts.admin-app')
@section('content')
<section class="content">
    {{ Breadcrumbs::render('contact.index') }}
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Contact List</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>

									<th>Name</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Contact No</th>
									<th colspan="2">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(isset($contacts) && count($contacts)>0)
								@foreach($contacts as $contact)
								<tr>
									<td>{{$n++}}</td>
									{{-- <td>{{$contact->name}}</td> --}}
									<td>{{$contact->name}}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>{{ $contact->contact_no }}</td>
									<td><a href="{{route('contact.edit', $contact)}}">Edit</a></td>
									<td>
										<form action="{{route('contact.destroy', $contact)}}" method="post">
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
						{{-- {{$contacts->links()}} --}}
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


