@extends('layouts.admin')

@section('title')
{{$pageTitle}}
@endsection


@push('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" />

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
								@foreach($media as $image)
						
									<a href="{{ asset('storage/'.$image->media_path)}}" data-toggle="lightbox" data-title="{{$image->name}}" data-gallery="gallery" data-max-width="600" class="col-sm-4">
										<img src="{{ asset('storage/'.$image->media_path)}}" class="img-fluid" alt="white sample"/>
									</a>
			
								@endforeach
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
            <form action="{{ route('media.store') }}" method="POST" role="form" enctype="multipart/form-data">
				 @csrf
				<div class="modal-body">
					<div class="col-sm-12 form-group">
						<input class="form-control form-control-lg form-control-file" type="file" name="media"/>
					</div>
				</div>
				<div class="modal-footer justify-content-end">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  <button type="submit" class="btn btn-primary">Upload</button>
				</div>
			</form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

@endsection

@push('scripts')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous"></script>
	<script>
		$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            })
	</script>	
@endpush
