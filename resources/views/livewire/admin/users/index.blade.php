<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    Data pengguna
                </h3>
                <button class="btn btn-primary rounded btn-sm float-right" wire:click="$dispatch('openCreateModal')">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>
            </div>
            <div class="card-body">
                <div class="row align-items-center mb-3">
                    <div wire:ignore class="col-md-6">
                        <x-input-label for="show" label="Tampilkan" />
                        <x-input-select wire:model.live="perPage" name="perPage" id="show">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </x-input-select>
                    </div>

                    <div class="col-md-6">
                        <x-input-label for="search" label="Cari" />
                        <x-input wire:model.live.debounce.300ms="search" type="search" name="search" id="search"
                            placeholder="Cari data..." />
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <x-table-sort-header :sortDirection="$sortDirection" :sortColumn="$sortColumn" column="name"
                                    label="Nama lengkap" />
                                <x-table-sort-header :sortDirection="$sortDirection" :sortColumn="$sortColumn" column="username"
                                    label="Username" />
                                <x-table-sort-header :sortDirection="$sortDirection" :sortColumn="$sortColumn" column="email"
                                    label="Email" />
                                <x-table-sort-header :sortDirection="$sortDirection" :sortColumn="$sortColumn" column="role"
                                    label="Role" />
                                <x-table-sort-header :sortDirection="$sortDirection" :sortColumn="$sortColumn" column="created_at"
                                    label="Terdaftar" />
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <x-input wire:model.live.debounce.300ms="searchName" type="text" name="search"
                                        class="form-control-sm" placeholder="Cari nama..." />
                                </td>
                                <td>
                                    <x-input wire:model.live.debounce.300ms="searchUsername" type="text"
                                        name="search" class="form-control-sm" placeholder="Cari username..." />
                                </td>
                                <td>
                                    <x-input wire:model.live.debounce.300ms="searchEmail" type="text" name="search"
                                        class="form-control-sm" placeholder="Cari email..." />
                                </td>
                                <td colspan="100">
                                    <span class="form-control form-control-sm text-muted text-center">Tidak ada
                                        aksi</span>
                                </td>
                            </tr>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->index + $users->firstItem() }}
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->label() }}</td>
                                    <td>{{ $user->created_at->format('d F Y') }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm"
                                            wire:click="$dispatch('openEditModal', { id: @js($user->id) })"
                                            data-bs-toggle="tooltip" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm"
                                            onclick="deleteConfirm(`{{ $user->id }}`)" data-bs-toggle="tooltip"
                                            title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="100%">
                                        Data tidak ditemukan
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>

    @livewire('admin.users.create-modal')
    @livewire('admin.users.edit-modal')
</div>
