<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center items-center px-4 py-2 bg-button-light-orange hover:bg-button-dark-orange border border-transparent rounded-md font-semibold text-sm text-center text-white uppercase tracking-widest active:bg-button-dark-orange focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
