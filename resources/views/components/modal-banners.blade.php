 <!-- Modal -->
 <div class="modal fade" id="ModalDelete{{ $banner->id }}" tabindex="-1">
     <div class="modal-dialog">
         <div class="modal-content bg-danger">
             <div class="modal-header">
                 <h6 class="modal-title text-white" id="exampleModalLabel">
                     Supprimer ?
                 </h6>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ route('banners.destroy', $banner) }}" method="POST">
                 @method('DELETE')
                 @csrf
                 <div class="modal-body text-white">
                     <p>
                         Êtes-vous sur de vouloir supprimer l'héro:
                         <strong>{{ $banner->titre }}</strong>? <br>
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




 <div class="modal fade" id="ModalUpdate{{ $banner->id }}" tabindex="-1">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h6 class="modal-title" id="exampleModalLabel">
                     Modifié le Héro
                 </h6>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form action="{{ route('banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 @method('PUT')
                 <div class="modal-body">
                     <div class="row mb-3">
                         <div class="col-12">
                             <label for="titre">Titre</label>
                             <input type="text" class="form-control" required
                                 value="{{ old('titre', $banner->titre) }}" id="titre" name="titre">
                             @error('titre')
                                 <span class="small text-danger"> {{ $message }} </span>
                             @enderror
                         </div>
                         <div class="col-12">
                             <label for="btn_text">Texte a afficher sur le button</label>
                             <input type="text" class="form-control" required
                                 value="{{ old('btn_text', $banner->btn_text) }}" id="btn_text" name="btn_text">
                             @error('btn_text')
                                 <span class="small text-danger"> {{ $message }} </span>
                             @enderror
                         </div>
                         <div class="col-12">
                             <label for="photo">Photo </label>
                             <input type="file" class="form-control"  id="photo" name="photo">
                             @error('photo')
                                 <span class="small text-danger"> {{ $message }} </span>
                             @enderror
                         </div>
                         <div class="col-12 ">
                             <div class="p-2 card m-2">
                                 <img src="{{ $banner->Cover() }}" alt="{{ $banner->titre }}" class="w-100">
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">
                         Fermer
                     </button>
                     <button type="submit" class="btn btn-dark">
                         Mettre à jour
                     </button>
                 </div>
             </form>
         </div>
     </div>
 </div>
