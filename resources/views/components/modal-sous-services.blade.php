 <!-- Modal -->
 <div class="modal fade" id="ModalDelete{{ $sous->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h6 class="modal-title text-white" id="exampleModalLabel">
                    Supprimer ?
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('sous_service.destroy', ['id'=> $sous->id]) }}" method="POST">
                @csrf
                <div class="modal-body text-white">
                    <p>
                        Êtes-vous sur de vouloir supprimer le sous-service:
                        <strong>{{ $sous->titre }}</strong>? <br>
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
     <div class="modal fade" id="ModalUpdate{{ $sous->id }}" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">
                        {{ $sous->titre }}
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('sous_service.update',['id'=>$sous->id]) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="service_id" value="{{ $sous->service_id}}" />
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
                            <div class="col-sm-12">
                                <label for="" class="mb-1">Titre</label>
                                <input type="text" class="form-control" required id="titre"
                                    value="{{ old('titre',$sous->titre) }}" name="titre" required>
                                @error('titre')
                                    <span class="small text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="col-sm-12">
                                <label class="mb-3">Description</label>
                                <textarea class="form-control" cols="4" rows="6" placeholder="write a description here.."
                                    name="description">{{ old('description',$sous->description) }}</textarea>
                                @error('description')
                                    <span class="small text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="mb-1">image</label>
                            <span class="small text-warning mb-1">
                                ( Fichiers : jpeg,png,jpg )
                            </span>
                            <input type="file" class="form-control" id="image"  name="image">
                            @error('image')
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
    