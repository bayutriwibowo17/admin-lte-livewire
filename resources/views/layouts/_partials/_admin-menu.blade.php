@auth
    @role('admin')
        <li class="nav-header">ADMINISTRATION</li>

        <x-nav-link href="/admin" :active="request()->is('admin')" icon="tachometer-alt">
            Beranda
        </x-nav-link>

        <x-nav-dropdown icon="cogs" label="Manajemen" :active="request()->is('admin/users*') ||
            request()->is('admin/rfid*') ||
            request()->is('/admin/schedules*') ||
            request()->is('/admin/leaves*')">
            <x-nav-link dropdown href="/admin/users" :active="activeStateMenu('admin/users')">
                Pengguna
            </x-nav-link>
        </x-nav-dropdown>

        <x-nav-link href="/admin/settings" :active="request()->is('admin/settings')" icon="sliders-h">
            Pengaturan
        </x-nav-link>
    @endrole
@endauth
