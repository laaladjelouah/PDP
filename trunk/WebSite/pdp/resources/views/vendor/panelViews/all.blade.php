		@extends('panelViews::mainTemplate')
		@section('page-wrapper')


		{!! $filter !!}
				<!-- Affichage des champs de recherche selon les vue demandé !-->

		<br><br>
		<a href="{!! url('panel/'.$current_entity.'/export/excel') !!}" class="btn btn-info">{!! \Lang::get('panel::fields.exportAsExcel') !!}</a>

		<!-- j'afiche le bouton importer uniquement si c'est users ou bike !-->
		@if(($current_entity=='users' )||($current_entity=='Bike'))
			<button class="btn btn-warning" data-toggle="modal" data-target="#import_modal">{!! \Lang::get('panel::fields.importData') !!}</button>
			@endif

		<!-- Modal  window qui s'afiche pour importer ou exporter des données du grid definit en bas-->
		<div class="modal fade" id="import_modal" tabindex="-1" role="dialog" aria-labelledby="import_modal_label" aria-hidden="true">
			<div class="modal-dialog">
					<div class="modal-content">
							<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title" id="import_modal_label">{!! \Lang::get('panel::fields.importData') !!}</h4>
								</div>
					<form method="post" action="{!! url('panel/'.$current_entity.'/import') !!}" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
									<div class="modal-body">
							<div><input type="file" name="import_file" /></div>
							<br />
							<div>
								<input type="radio" name="status" id="status_1" value="1" checked="checked" />&nbsp;
								<label for="status_1">{!! \Lang::get('panel::fields.deletePreviousData') !!}</label><br />
								<input type="radio" name="status" id="status_2" value="2" />&nbsp;
								<label for="status_2">{!! \Lang::get('panel::fields.keepOverwriteData') !!}</label><br />
								<input type="radio" name="status" id="status_3" value="3" />&nbsp;
								<label for="status_3">{!! \Lang::get('panel::fields.keepNotOverwriteData') !!}</label><br />
							</div>
										</div>
										<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">{!! \Lang::get('panel::fields.close') !!}</button>
													<button type="submit" class="btn btn-primary">{!! \Lang::get('panel::fields.importData') !!}</button>
										</div>
					</form>
				</div>
			</div>
		</div>

		@if ($import_message)
			<div>&nbsp;</div>
			<div class="alert alert-success">{{ $import_message }}</div>
		@endif


		<!-- affichage du tableau, une liste selon la vue demandé, utilisateur, historique ... !-->
			{!! $grid !!}



	<!-- ajout du bouton bikelock a la vue bike !-->
	<?php
	$urls = \Config::get('panel.panelControllers');
	$linkItems  = \Serverfireteam\Panel\libs\dashboard::getItems();
	?>

	<div>

		@foreach($linkItems as $linkItem)
			<?php
			$isActive = Request::segment(2) == $linkItem['modelName'];

			?>
			@if($current_entity=='Bike')
				<p class="s-link {{ $isActive ? 'active' : '' }}">
					<a href="{{ url($linkItem['showListUrl']) }}" class="{{ $isActive ? 'active' : '' }}">
						@if(($linkItem['title'] != 'Links')&($linkItem['title'] != 'Users')&($linkItem['title'] != 'Bikes')&($linkItem['title'] != 'Historys'))
							<button  class="btn btn-primary btn-sm pull-right"><strong> {{{$linkItem['title']}}} </strong></button>
					</a>
					@endif

				</p>
				@endif

				@endforeach
				</li>
				</ul>
	</div>

@stop   
