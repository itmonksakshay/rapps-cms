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
					<h1 class="m-0">User Management</h1>
				 </div>
				<div class="col-sm-6">
					<div class="row float-sm-right">
						<a class="btn btn-primary" href="{{ route('user-management.create')}}">Create New User</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="content">
		<div class="container-fluid">
			<div class="row">				
				<table class="table table-bordered">
					 <tr>
					   <th>No</th>
					   <th>Name</th>
					   <th>Email</th>
					   <th>Role</th>
					   <th width="280px">Action</th>
					 </tr>

					
						@foreach($users as $key=>$user)
						<tr>
							<td>{{$key+1}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							@php $roles = $user->role()->get()
								
							 @endphp
							<td> <label class="badge badge-success">@foreach($roles as $key=>$role) {{$role->name}}   @endforeach</label></td>
							<td>
								<a class="btn btn-info" href="#">Show</a>
								<a class="btn btn-primary" href="{{ route('user-management.edit',$user->id) }}">Edit</a>
								<a class="btn btn-danger" href="#">Delete</a>
							</td>
						</tr>
						@endforeach
					
				</table>	
			</div>
		</div>
	</div>
</div>


@endsection
