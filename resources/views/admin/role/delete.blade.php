
<form action="{{ route('role-management.destroy',$role->id) }}" method="post">
	@csrf
	@method('DELETE')
	<div class="text-center">
		<button class=" btn btn-primary " type="submit"> Okay</button> 
		<button class=" btn btn-primary " type="button" data-dismiss="modal"> Cancel</button>
	</div>
</form>
