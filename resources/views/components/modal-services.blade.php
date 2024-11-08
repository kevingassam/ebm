 <!-- Modal -->
 <div class="modal fade" id="ModalDelete{{ $service->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h6 class="modal-title text-white" id="exampleModalLabel">
                    Supprimer ?
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('services.destroy', $service) }}" method="POST">
                @method('DELETE')
                @csrf
                <div class="modal-body text-white">
                    <p>
                        Êtes-vous sur de vouloir supprimer le service:
                        <strong>{{ $service->titre }}</strong>? <br>
                        Cette action est irréversible.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">
                        Fermer
                    </button>
                    <button type="submit" class="btn btn-success">
                        Oui, confirmer !
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
