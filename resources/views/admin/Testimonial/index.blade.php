@extends('layouts.admin-app')
@section('content')
    <section class="content">
        {{ Breadcrumbs::render('testimonial.index') }}

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Testimonial List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Client Name</th>
                                        <th>Summary</th>
                                        <th>Image</th>
                                        <th>Profession</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($testimonials) && count($testimonials) > 0)
                                        @foreach ($testimonials as $testimonial)
                                            <tr>
                                                <td>{{ $n++ }}</td>
                                                <td>{{ $testimonial->client_name }}</td>
                                                <td>{{ $testimonial->summary }}</td>
                                                <td>{{ $testimonial->image }}</td>
                                                <td>{{ $testimonial->profession }}</td>
                                                <td><a href="{{ route('testimonial.edit', $testimonial) }}"
                                                        class="btn-link">Edit</a></td>
                                                <td>
                                                    <form action="{{ route('testimonial.destroy', $testimonial) }}"
                                                        method="post">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
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

                            {{ $testimonials->links() }}
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
