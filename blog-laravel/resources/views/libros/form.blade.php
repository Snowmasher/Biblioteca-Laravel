

<form method="POST" action="{{ $route }}">
    <div class="w-full max-w-lg">
        <div class="flex flex-wrap">
            <h1 class="mb-5">{{ $titulo }}</h1>
        </div>
    </div>
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
    <div class="flex flex-wrap mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="titulo">Título</label>
            <input type="text" name="titulo" value="{{ old("titulo") ?? $libro->titulo }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="Título">

        </div>
    </div>

    <div class="flex flex-wrap mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="descripcion">Descripción</label>
            <textarea class="text-grey-darkest flex-1 p-2 m-1 bg-transparent" name="descripcion" value="{{ old("descripcion") ?? $libro->descripcion }}"  placeholder="Descripción ..."></textarea>
            
        </div>
    </div>

    <div class="flex flex-wrap mx-3 mb-6">
        <div class="w-full px-3">
            <input type="submit" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded" value="{{ $textButton }}">
        </div>
    </div>
</form>