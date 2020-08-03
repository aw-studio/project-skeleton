<x-fj-nav-list 
    :list="$nav" 
    :layout="$layout"
    dropdown 
/>

<x-fj-off-canvas>
    <x-fj-nav-list 
    :list="$nav" 
layout="vertical"
expandable 
/>
</x-fj-off-canvas>