@extends('layouts.admin')

@section('title')
{{$pageTitle}}
@endsection


@section('main')

<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Edit User Role</h1>
				 </div>
				<div class="col-sm-6">
					<div class="row float-sm-right">
						<a class="btn btn-primary" href="{{ route('role-management.index')}}">Back</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<form method="POST" action="{{ route('role-management.update',$userRole->id)}}">
						@csrf
						@method('PUT')
						<input type="hidden" name="id" value="{{ $userRole->id }}">
						<div class="card card-primary card-outline">
							<div class="card-header">
								<div class="form-group">
									<label for="roleName">Role Name :- </label>
									<input type="input" class="form-control" name="name" id="roleName" value="{{$userRole->name}}">
								</div>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label for="roleDescription">Role Description :-</label>
									<textarea class="form-control" name="description" id="roleDescription" rows="3">{{$userRole->description}}</textarea>
								</div>
							</div>
						</div>
					
					
						<div class="card">
							
							<div class="card-header">
								<h3 class="card-title">Role Permissions</h3>
								 <div class="form-check float-right">
								    <input type="checkbox" class="form-check-input" id="select-all">
									<label class="form-check-label" for="exampleCheck1">Select All</label>
								</div>
							</div>
              <!-- /.card-header -->
							  <div class="card-body">
								<table id="example2" class="table table-bordered table-hover">
								  <thead>
									  <tr>
										<th>S.No</th>
										<th>Name</th>
										<th>Controller</th>
										<th>Method</th>
										<th>Permission</th>
									  </tr>
								  </thead>
								  <tbody>
									 @foreach($permissions as $key=>$permission) 
									  <tr>
										<td>{{$key+1}}</td>
										<td>{{$permission->name}}</td>
										<td>{{$permission->controller}}</td>
										<td>{{$permission->method}}</td>
										<td>
										     @php $check = in_array($permission->id, $userRole->permissions()->pluck('id')->toArray()) ? 'checked' : ''@endphp
                                                <div class="form-group form-check">
													<input type="checkbox" name="permissions[{{$key}}]" value="{{$permission->id}}" {{$check}} class="form-check-input">
												</div>

										</td>
									  </tr>
									@endforeach
								  </tbody>
								  <tfoot>
									</tfoot>
								 </table>
								 
							</div>
					</div>
						<button type="submit" class="btn btn-primary btn-block btn-large">Update</button>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

				
@endsection
@push('scripts')
<script>
$(function () {
       $('#select-all').click(function (event) {

          
           var selected = this.checked;
           // Iterate each checkbox
           $(':checkbox').each(function () {    this.checked = selected; });

       });
    });
</script>
@endpush
