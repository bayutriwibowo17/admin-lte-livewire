@auth
    @role(['admin', 'user'])
        <li class="nav-header">MENU</li>

        <x-nav-link href="/" :active="request()->is('/')" icon="home">
            Beranda
        </x-nav-link>
    @endrole
@endauth
