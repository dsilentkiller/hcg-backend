@extends('layouts.admin-app')
@section('content')

<div class="row">
    {{ Breadcrumbs::render('banner.index') }}
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Banner List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Banner</th>
                            <th>Title</th>
                            <th>Slug</th>

                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($banners) && count($banners)>0)
                        @foreach($banners as $banner)
                        <tr>
                            <td>{{$n++}}</td>
                            <td>
                                <a href="{{asset('uploads/banners/thumbnail/'.$banner->image)}}"><img src="{{asset('uploads/banners/thumbnail/'.$banner->image)}}" height="80" width="150"></a>
                            </td>
                            <td>{{$banner->title}}</td>
                             <td>{{$banner->slug}}</td>
                            <td>View</td>
                            <td><a href="{{route('banner.edit', $banner)}}">Edit</a></td>
                            <td>
                                <form action="{{route('banner.destroy', $banner)}}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button type="submit" class="btn btn-link">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4">
                                <center>No Record Found</center>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection
