@extends('admin.admin_master')
@section('admin')

<div class="container-full">

		<!-- Main content -->
		<section class="content">
			<div class="row">
            <div class="box box-inverse bg-img" style="background-image: url(../images/gallery/full/1.jpg);" data-overlay="2">
					  <div class="flexbox px-20 pt-20">
						<label class="toggler toggler-danger text-white">
						  <input type="checkbox">
						  <i class="fa fa-heart"></i>
						</label>
						<a href="{{ route('admin.profile.edit') }}" style="float: right" class="btn btn-rounded btn-success mb-5">Edit Profile</a>
					  </div>

					  <div class="box-body text-center pb-50">
						<a href="#">
						  <img class="avatar avatar-xxl avatar-bordered" src="{{ (!empty($adminData->profile_photo_path))?url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/no_image.jpg') }}" alt="User Avatar">
						</a>
						<h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">{{ $adminData->name }}</a></h4>
						<span><i class="fa fa-envelope w-20"></i> {{ $adminData->email }}</span>
					  </div>
                      
					  <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
						<li>
						  <span class="opacity-60">Followers</span><br>
						  <span class="font-size-20">8.6K</span>
						</li>
						<li>
						  <span class="opacity-60">Following</span><br>
						  <span class="font-size-20">8457</span>
						</li>
						<li>
						  <span class="opacity-60">Tweets</span><br>
						  <span class="font-size-20">2154</span>
						</li>
					  </ul>
					</div>
			</div>
		</section>
		<!-- /.content -->
	  </div>
@endsection