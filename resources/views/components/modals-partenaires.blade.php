 <!-- Modal -->
 <div class="modal fade" id="ModalDelete{{ $partenaire->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h6 class="modal-title text-white" id="exampleModalLabel">
                    Supprimer ?
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('partenaires.destroy', $partenaire) }}" method="POST">
                @method('DELETE')
                @csrf
                <div class="modal-body text-white">
                    <p>
                        Êtes-vous sur de vouloir supprimer le partenaire  :
                        <strong>{{ $partenaire->nom }}</strong>? <br>
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



<div class="modal fade" id="ModalUpdate{{ $partenaire->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">
                    Modifié le témoignage
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('partenaires.update',$partenaire) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" required id="nom" value="{{ old('nom',$partenaire->nom) }}" name="nom">
                            @error('nom')
                                <span class="small text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-8">
                            <label for="logo">Logo</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                            @error('logo')
                                <span class="small text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <img src="{{ Storage::url($partenaire->logo) }}" class="w-100" alt="" srcset="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('nom',$partenaire->description) }}</textarea>
                        @error('description')
                            <span class="small text-danger"> {{ $description }} </span>
                        @enderror
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
