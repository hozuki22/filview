<x-guest-layout>
    <x-slot name="header">
        <div id="header_inner">
            <h1 id="headline"><a href="">filview</a></h1>
        </div>
    </x-slot>

    <p>{{ session('message') }}</p>

    
    <x-slot name="footer">
        <div id="footer">
            <p>&copy;2024 hozuki</p>
        </div>
    </x-slot>
</x-guest-layout>