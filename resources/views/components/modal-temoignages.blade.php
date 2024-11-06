 <!-- Modal -->
 <div class="modal fade" id="ModalDelete{{ $temoignage->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h6 class="modal-title text-white" id="exampleModalLabel">
                    Supprimer ?
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('temoignages.destroy', $temoignage) }}" method="POST" enctype="multipart/form-data">
                @method('DELETE')
                @csrf
                <div class="modal-body text-white">
                    <p>
                        Êtes-vous sur de vouloir supprimer le témoignage de  :
                        <strong>{{ $temoignage->nom }}</strong>? <br>
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



<div class="modal fade" id="ModalUpdate{{ $temoignage->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">
                    Modifié le témoignage
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('temoignages.update',$temoignage) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" required id="nom" value="{{ old('nom',$temoignage->nom) }}" name="nom" >
                            @error('nom')
                                <span class="small text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="poste">Poste</label>
                            <input type="text" class="form-control" required id="poste" value="{{ old('poste',$temoignage->poste) }}" name="poste">
                            @error('poste')
                                <span class="small text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="note">Note ( 0 - 5 ) </label>
                            <div class="form-control">
                                <input type="range" class="w-100" required min="0" max="5" value="{{ old('note',$temoignage->note) }}"
                                    id="note" name="note" >
                            </div>
                            @error('note')
                                <span class="small text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="photo">Photo avatar</label>
                            <input type="file" class="form-control"  id="photo" name="photo" >
                            @error('photo')
                                <span class="small text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="message">Message</label>
                        <textarea class="form-control" required id="message" name="message" rows="5">{{ old('message',$temoignage->message) }}</textarea>
                        @error('message')
                            <span class="small text-danger"> {{ $message }} </span>
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
