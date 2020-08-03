<header>
    
    <div class="flex justify-between">

        <x-nav-main />

        <div>
            <x-fj-localize>
                @foreach(config('translatable.locales') as $locale)
                    @slot($locale)
                        {{ $locale }}
                    @endslot
                @endforeach
            </x-fj-localize>
        </div>
        
    </div>

</header>