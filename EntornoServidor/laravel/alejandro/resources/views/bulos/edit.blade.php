<x-layout>
    <x-slot:title>Editar bulo</x-slot:title>

    <div class="max-w-2xl mx-auto mt-8">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <form method="POST" action="/bulos/{{ $bulo->id }}">
                    @csrf
                    @method('PUT')

                    <textarea name="textobulo" class="textarea textarea-bordered w-full mb-3">
                        {{ old('textobulo', $bulo->textobulo) }}
                    </textarea>

                    <textarea name="texto_desmentido" class="textarea textarea-bordered w-full mb-3">
                        {{ old('texto_desmentido', $bulo->texto_desmentido) }}
                    </textarea>

                    <input
                        type="url"
                        name="imagen"
                        class="input input-bordered w-full mb-3"
                        value="{{ old('imagen', $bulo->imagen) }}"
                    >

                    <div class="flex justify-between">
                        <a href="/" class="btn btn-ghost">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
