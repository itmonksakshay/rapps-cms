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
					<h1 class="m-0">Create New User</h1>
				 </div>
				<div class="col-sm-6">
					<div class="row float-sm-right">
						<a class="btn btn-primary" href="{{ route('user-management.index')}}"> Back</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="content">
		<div class="container-fluid">
			<form action="{{ route('user-management.store')}}" method="post">
				@csrf
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Name:</strong>
								<input type="text" placeholder="User Name" name="name" class="form-control"/>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Email:</strong>
							<input type="email" placeholder="User Email" name="email" class="form-control"/>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Password:</strong>
								<input type="password" placeholder="Enter Password" name="password" class="form-control"/>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Confirm Password:</strong>
							<input type="password" placeholder="Enter Password" name="password_confirmation" class="form-control"/>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Role:</strong>
							<select name="role">
								@foreach($userRoles as $key=>$role)
									@if($role->name == 'subscriber')
										<option value="{{$role->id}}" selected >{{$role->name}}</option>
									@else
									<option value="{{$role->id}}">{{$role->name}}</option>
									@endif
									
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


@endsection
