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
					<h1 class="m-0">Create New Role</h1>
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
					<form method="post" action="{{ route('role-management.store')}}">
						<div class="card card-primary card-outline">
							<div class="card-header">
								<div class="form-group">
									<label for="roleName">Role Name :- </label>
									<input type="input" class="form-control" name="name" id="roleName" value="{{ old('name') }}">
								</div>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label for="roleDescription">Role Description :-</label>
									<textarea class="form-control" name="description" id="roleDescription" rows="3">{{ old('description') }}</textarea>
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
											<div class="form-group form-check">
												<input type="checkbox" name="permissions[{{$key}}]" value="{{$permission->id}}" class="form-check-input">
											</div>
										</td>
								  </tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
						<div class="col-xs-12 col-sm-12 col-md-12 text-center">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
						@csrf
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
