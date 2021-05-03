@extends('layouts.admin')


@section('main')
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


<div class="content-wrapper">
	<div class="content-header">

	
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Media</h1>
				 </div>
				<div class="col-sm-6">
					<div class="row float-sm-right">
						<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-xl">Add Media</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card card-primary">
						<div class="card-header">
							<h4 class="card-title">Uploaded Media</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-2">
									<a href="https://via.placeholder.com/1200/FFFFFF.png?text=1" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
										<img src="https://via.placeholder.com/300/FFFFFF?text=1" class="img-fluid mb-2" alt="white sample"/>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>			
			</div>
		</div>
	</div>
</div>


	<div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Extra Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

@endsection


