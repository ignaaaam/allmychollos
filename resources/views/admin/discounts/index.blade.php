<x-layout>
    <x-setting heading="Manage Posts">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody>
                        @foreach($discounts as $discount)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                            <a href="/discounts/{{ $discount->slug }}">
                                                {{ $discount->title }}
                                            </a>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="/admin/discounts/{{ $discount->id }}/edit" class="text-indigo-500 hover:text-indigo-600">
                                        Edit
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    {{--                                        <a href="/admin/discounts/{{ $discount->id }}/delete" class="text-red-500 hover:text-indigo-600">--}}
                                    {{--                                            Delete--}}
                                    {{--                                        </a>--}}
                                    <form action="/admin/discounts/{{ $discount->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="text-xs font-bold text-red-500 border border-red-500 rounded-full px-8 py-2 hover:bg-red-500 hover:text-white transition">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="px-5 bg-white py-5 flex flex-col xs:flex-row items-center xs:justify-between">
                        <div class="links p-8">{{ $discounts->withQueryString()->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>
