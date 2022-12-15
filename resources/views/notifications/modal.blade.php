<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$notification->id}}">

	<form action="{{route('notifications.destroy',$notification->id)}}" method="POST">
	@csrf
	@method('DELETE')
	<div class="modal-dialog">
		<div class="modal-content">
			<div class=" text-center">
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
					<span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Eliminar Notificacion</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Eliminar</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-danger">Confirmar</button>
			</div>
		</div>
	</div>
	</form>
</div>