@extends('admin.admin_master')
@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="container-full">

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Admin Profile Edit</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('admin.profile.store') }}" method="post" enctype="multipart/form-data">
                       @csrf
					  <div class="row">
						<div class="col-12">						
							<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
								        <h5>Admin Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" value="{{ $editData->name }}" required>
                                        </div>
							        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
								        <h5>Admin Email<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" value="{{ $editData->email }}" required>
                                        </div>
							        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Profile Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" id="image" name="profile_photo_path" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <img class="avatar avatar-xxl avatar-bordered" id="showImage" src="{{ (!empty($editData->profile_photo_path))?url('upload/admin_images/'.$editData->profile_photo_path) : url('upload/no_image.jpg') }}" alt="User Avatar">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-rounded btn-primary mb-5">Update</button>
                            </div>
					</form>
				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection