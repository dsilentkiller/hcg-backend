@extends('layouts.admin-app')
@section('content')
<section class="content">
    {{ Breadcrumbs::render('banner.show') }}
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="col-md-12 col-lg-12">
					<div class="card card-info">
						<div class="card-header">
							<div class="card-title"> {{$banner->title}}</div>
						</div>
						<div class="card-body">
							<div class="row">
								<img src="{{asset('uploads/banner/thumbnail/'.$banner->image)}}" width="358" height="239">
							</div>
							<hr>
							<div class="form-group mt-2" >
                                @if(isset($banner))
                                @foreach ($banner->get('name') as $banner)
                                    {!! $banner->render() !!}
                                @endforeach
                                @endif
								<label>Created Or Updated By: {{$banner->user->name}} </label>
							</div>
                            {{-- Title --}}
                            <div class="form-group">
								<label>Title: </label><br>
								<p>
									{{$banner->title}}
								</p>
							</div>
                            {{-- Slug --}}
                            <div class="form-group">
								<label>Slug: </label><br>
								<p>
									{{$banner->slug}}
								</p>
							</div>
                            {{-- title tag --}}
							<div class="form-group">
								<label>Title Tag: {{$banner->title_tag}}</label>
							</div>
                            {{-- meta keywords --}}
							<div class="form-group">
								<label>Meta Keywords: </label>
								{{$banner->meta_keywords}}
							</div>
                            {{-- meta description --}}
							<div class="form-group">
								<label>Meta Description:</label>
								<p>
									{{$banner->meta_description}}
								</p>
							</div>
						</div>
						<div class="card-footer">
							<div>
								<center><a href="{{route('banner.index')}}"><< Go Back</a></center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
