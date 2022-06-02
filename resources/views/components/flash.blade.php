    @if(session()->has('success'))
        <div x-data = "{show: true}"
             x-init= "setTimeout(() => show = false, 4000)"
             x-show="show"
             class="fixed bg-button-light-orange text-white p-4 rounded-lg bottom-3 right-3 text-sm">
            <p>{{ session('success') }}</p>
        </div>
    @endif
