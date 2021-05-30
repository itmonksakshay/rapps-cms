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
					<h1 class="m-0">User Role</h1>
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
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h3 class="text-center"> {{$userRole->name}} Role</h3>
						</div>
						<div class="card-body">
							<h4>Role Description :-</h4>
							<p>{{$userRole->description}}</p>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Role Users</h3>
						</div>
              <!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>S.No</th>
										<th>User Name</th>
										<th>User Email</th>
									</tr>
								</thead>
								<tbody>
									@foreach($roleUsers as $key=>$user)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$user->name}}</td>
										<td>{{$user->email}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>		
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Role Permissions</h3>
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
								  </tr>
							  </thead>
							  
							  <tbody>
								  @foreach($rolePermissions as $key=>$permission)
								  <tr>
									<td>{{$key+1}}</td>
									<td>{{$permission->name}}</td>
									<td>{{$permission->controller}}</td>
									<td>{{$permission->method}}</td>
								  </tr>
								  @endforeach
							  </tbody>
				
							 </table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
