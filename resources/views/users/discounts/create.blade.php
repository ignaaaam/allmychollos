<x-layout>
    <x-setting heading="Crear mi descuento">
        <form action="/user/discounts" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form.input name="titulo" />
            <x-form.input name="slug" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.input name="precio original" type="number" min="10" max="500" />
            <x-form.input name="precio descuento" type="number" min="10" max="500" />
            <x-form.textarea name="descripcion" />

            <x-form.field>
                <x-form.label name="categoria" />
                <select name="category_id" id="category_id" class="border border-gray-400 p-2 rounded">

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{$category->name}}</option>
                    @endforeach
                </select>

                <x-form.error name="category" />
            </x-form.field>

            <x-form.button>Publicar</x-form.button>
        </form>
    </x-setting>
</x-layout>
