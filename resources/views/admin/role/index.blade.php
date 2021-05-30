@extends('layouts.admin')

@section('title')
{{$pageTitle}}
@endsection

@push('styles')
<style>
	.fade.in {
	  opacity: 1;
	}
	.modal.in .modal-dialog {
	  -webkit-transform: translate(0, 0);
	  -o-transform: translate(0, 0);
	  transform: translate(0, 0);
	}
	.modal-backdrop.in {
	  opacity: 0.5;
	}
</style>
@endpush



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
					@foreach($userRoles as $key=>$role)
					<tr>
						<td>{{$key+1}}</td>
						<td>{{$role->name}}</td>
						<td>{{ \Str::limit($role->description, 100) }}</td>
						<td>
					
							<div class="row">
								<div class="pr-1">
									<a class="btn btn-info" href="{{ route('role-management.show',$role->id) }}">Show</a>
									<a class="btn btn-primary" href="{{ route('role-management.edit',$role->id) }}">Edit</a>
									<a data-toggle="modal" class="btn btn-danger" id="deleteActionButton" data-target="#deleteActionModal" data-attr="{{ route('role-management.delete', $role->id) }}" title="Delete">
										Delete
									</a>
								</div>
							</div>
						</td>
					</tr>
					@endforeach
				</table>	
			</div>
		</div>
	</div>
</div>




<div class="modal fade" id="deleteActionModal" tabindex="-1" role="dialog" aria-labelledby="roleTitle" aria-hidden="true">
	<div class="vertical-alignment-helper">
		<div class="modal-dialog vertical-align-center">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title  text-center">Attention</h4>
				</div>
				<div class="modal-body">
					<p class="text-center">Are you sure you want to delete this record?</p>
					<div id="deleteActionBody">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>






@endsection

@push('scripts')
<script>
	
	    $(document).on('click', '#deleteActionButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#deleteActionModal').modal("show");
                $('#deleteActionBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
            , timeout: 8000
        })
    });

	
	
</script>

@endpush


