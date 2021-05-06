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
					<h1 class="m-0">Role Management</h1>
				 </div>
				<div class="col-sm-6">
					<div class="row float-sm-right">
						<a class="btn btn-primary" href="{{ route('role-management.create')}}">Create New Role</a>
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
						<th>Description</th>
						<th width="280px">Action</th>
					</tr>
					<tr>
						<td>1</td>
						<td>Admin</td>
						<td>Admin Description</td>
						<td>
							<a class="btn btn-info" href="#">Show</a>
							<a class="btn btn-primary" href="#">Edit</a>
							<a class="btn btn-danger" href="#">Delete</a>
						</td>
					</tr>
				</table>	
			</div>
		</div>
	</div>
</div>


@endsection
