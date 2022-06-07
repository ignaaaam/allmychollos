<x-layout>
    <x-setting :heading="'Editar Descuento: ' . $discount->title" >
        @can('admin')
            <form action="/admin/discounts/{{ $discount->id }}" method="POST" enctype="multipart/form-data">
        @endcan
        <form action="/user/discounts/{{ $discount->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $discount->title)" />
            <x-form.input name="slug" :value="old('slug', $discount->slug)" />
            <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $discount->thumbnail)"/>
            <x-form.input name="original_price" type="number" step="any" min="10" max="900" :value="old('original_price', $discount->original_price)" />
            <x-form.input name="discounted_price" type="number" step="any" min="10" max="900" :value="old('discounted_price', $discount->discounted_price)" />
            <x-form.input name="link" :value="old('link', $discount->link)" />
{{--            PREMIUM CHECKBOX WILL BE SHOWN ONCE SUBSCRIPTIONS ARE IMPLEMENTED --}}
            {{--            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 3)--}}
{{--                <x-form.checkbox name="premium" :value="old('premium', $discount->premium)"/>--}}
{{--            @endif--}}
            <x-form.textarea name="body" >{{ old('body', $discount->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category" />
                <select name="category_id" id="category_id" class="border border-gray-400 p-2 rounded">

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{$category->name}}</option>
                    @endforeach
                </select>

                <x-form.error name="category" />
            </x-form.field>

            <x-form.button>Actualizar</x-form.button>
        </form>
    </x-setting>
</x-layout>
