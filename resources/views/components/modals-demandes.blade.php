 <!-- Modal -->
 <div class="modal fade" id="ModalDelete{{ $demande->id }}" tabindex="-1">
     <div class="modal-dialog">
         <div class="modal-content bg-danger">
             <div class="modal-header">
                 <h6 class="modal-title text-white" id="exampleModalLabel">
                     Supprimer ?
                 </h6>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ route('demandes.destroy', $demande) }}" method="POST">
                 @method('DELETE')
                 @csrf
                 <div class="modal-body text-white">
                     <p>
                         Êtes-vous sur de vouloir supprimer la demande de :
                         <strong>{{ $demande->nom }}</strong>? <br>
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






 <div class="modal fade" id="ModalMessage{{ $demande->id }}" tabindex="-1">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h6 class="modal-title" id="exampleModalLabel">
                     Modifié le témoignage
                 </h6>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <p>
                     {{ $demande->message }}
                 </p>
             </div>
         </div>
     </div>
 </div>
