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
			<form>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Name:</strong>
							<input type="text" placeholder="User Name" name="name" class="form-control"/>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Description:</strong>
							<textarea name="description" rows="4" cols="50"></textarea>
						</div>
					</div>		
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Permission:</strong><br/>
							<label><input type="checkbox" id="vehicle1" name="user" value="Bike"> User Permission </label><br/>
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
