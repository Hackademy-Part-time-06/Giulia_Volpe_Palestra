<x-main>
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="text-center">Aggiungi un libro</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('books.store') }}" class="w-75 m-5" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="titolo" class="form-label">Titolo</label>
                        <input type="text" class="form-control" name="title" id="titolo"
                            value="{{ old('title') }}">
                        @error('name')
                            <span class="text-danger">
                                Inserisci un valore obbligatorio!
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="author_id" class="form-label">Autori</label>
                        <select name="author_id" id="author_id" class="form-control">
                              @forelse ($authors as $author)
                             <option value="{{ $author->id }}">{{ $author->name . ' ' . $author->surname }}</option>
                        @empty
                            Nessun autore
                        @endforelse
                        </select>
                      
                       
                        {{-- <label for="autore" class="form-label">Autore</label>
                        <input type="text" class="form-control" name="author" id="autore"
                            value="{{ old('author') }}"> --}}
                        @error('name')
                            <span class="text-danger">
                                Inserisci un valore obbligatorio!
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pagine" class="form-label">Pagine</label>
                        <input type="number" class="form-control" name="pages" id="pagine"
                            value="{{ old('pages') }}">
                        @error('name')
                            <span class="text-danger">
                                Inserisci un valore numerico obbligatorio!
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="anno" class="form-label">Anno</label>
                        <input type="number" class="form-control" name="year" id="anno"
                            value="{{ old('year') }}">
                        @error('name')
                            <span class="text-danger">
                                Inserisci un valore numerico obbligatorio!
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="trama" class="form-label">Trama</label>
                        <input type="textarea" class="form-control" name="plot" id="trama"
                            value="{{ old('plot') }}">
                        @error('name')
                            <span class="text-danger">
                                Inserisci una trama valida!
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Importa i tuoi file!</label>
                        <input type="file" class="form-control" name="image" id="image" >
                        @error('name')
                            <span class="text-danger">
                                Inserisci un valore numerico obbligatorio!
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark">Invia!</button>
                    <button type="reset" class="btn btn-outline-danger">Reset</button>
                    <a href="{{route('books.home')}}" class="btn btn-outline-dark">Torna indietro</a>
                </form>
            </div>
        </div>
    </div>

</x-main>
