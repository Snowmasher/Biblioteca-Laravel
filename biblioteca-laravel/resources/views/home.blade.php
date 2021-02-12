@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Libros
            </header>

            <div class="row ">
                <div class="col flex justify-center flex-col flex-wrap bg-gray-200 p-4 mt-5">
                    <a href="{{ route("libros.create") }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear nuevo libro</a>
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Título</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">F. Creación</th>
                                <th scope="col">F. Actualización</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($libros ?? '' as $libro)
                                <tr>
                                    <td class="border px-4 py-4">{{ $libro->id }}</td>
                                    <td class="border px-4 py-4">{{ $libro->user->name }}</td>
                                    <td class="border px-4 py-4">{{ $libro->titulo }}</td>
                                    <td class="border px-4 py-4">{{ $libro->descripcion }}</td>
                                    <td class="border px-4 py-4">{{ date_format($libro->created_at, "d/m/Y") }}</td>
                                    <td class="border px-4 py-4">{{ date_format($libro->updated_at, "d/m/Y") }}</td>
                                    <td class="border px-4 py-4">
                                        <a href="{{ route("libros.edit", ["libro" => $libro]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-black font-bold py-2 px-4 rounded">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('libros.destroy', $libro['id']) }}" method="POST">          
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="delete" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4 rounded">eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="border px-4 py-2">Empty</td>
                                    <td class="border px-4 py-2">Empty</td>
                                    <td class="border px-4 py-2">Empty</td>
                                    <td class="border px-4 py-2">Empty</td>
                                    <td class="border px-4 py-2">Empty</td>
                                    <td class="border px-4 py-2">Empty</td>
                                    <td class="border px-4 py-2">Empty</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @if($libros ?? ''->count())
                        <div class="mt-3">
                            {{ $libros ?? ''->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
</main>
@endsection
