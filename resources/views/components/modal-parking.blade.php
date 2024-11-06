 <!-- Modal -->
 <div class="modal fade" id="ModalDelete{{ $parking->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h6 class="modal-title text-white" id="exampleModalLabel">
                    Supprimer ?
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('parkings.destroy', $parking) }}" method="POST" enctype="multipart/form-data">
                @method('DELETE')
                @csrf
                <div class="modal-body text-white">
                    <p>
                        Êtes-vous sur de vouloir supprimer le parking :
                        <strong>{{ $parking->reference }}</strong>? <br>
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




 <!-- Modal -->
 <div class="modal fade" id="ModalUpdate{{ $parking->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">
                    Parking <b>{{ $parking->reference }}</b>
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('parkings.update', $parking) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger small">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row mb-3">
                        <div class="col-sm-6 col-6 pb-3">
                            <label for="" class="mb-1">Référence</label>
                            <input type="text" class="form-control" required id="reference"
                                value="{{ old('reference',$parking->reference) }}" name="reference" required>
                            @error('reference')
                                <span class="small text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-sm-6 col-6 pb-3">
                            <label for="" class="mb-1">Numéro</label>
                            <input type="text" class="form-control" required id="numero"
                                value="{{ old('numero',$parking->numero) }}" name="numero" required>
                            @error('numero')
                                <span class="small text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-sm-6 col-12 pb-3">
                            <label for="" class="mb-1">Statut</label>
                            <select class="form-select" required id="statut" name="statut">
                                <option value="disponible" @selected($parking->statut == "disponible")>Disponible</option>
                                <option value="vendu" @selected($parking->statut == "vendu")>Vendu</option>
                            </select>
                            @error('statut')
                                <span class="small text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-sm-6 col-12 pb-3">
                            <label for="type_parking" class="mb-1">Type de parking</label>
                            <select class="form-select" required id="type_parking" name="type_parking">
                                <option value="souterrain" @selected($parking->type_parking == "souterrain")>Souterrain</option>
                                <option value="exterieur" @selected($parking->type_parking == "exterieur")>Exterieur</option>
                            </select>
                            @error('type_parking')
                                <span class="small text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 pb-3">
                        <label for="" class="mb-1">Plan</label>
                        <span class="small text-warning mb-1">
                            ( Fichiers : jpeg,png,jpg,pdf )
                        </span>
                        <input type="file" class="form-control"  id="plan" name="plan" >
                        @error('plan')
                            <span class="small text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">
                        Fermer
                    </button>
                    <button type="submit" class="btn btn-dark">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
