<div>
    <form wire:submit.prevent="save">
        <x-modal :showModal="$showModal" modalTitle="Tambah data pengguna">

            @slot('body')
                <div class="form-group">
                    <x-input-label for="form.name" label="Nama lengkap" />
                    <x-input type="text" wire:model="form.name" name="form.name" id="form.name" placeholder="Nama lengkap" />
                    <x-input-error name="form.name" />
                </div>
                <div class="form-group">
                    <x-input-label for="form.username" label="Username" />
                    <x-input type="text" wire:model="form.username" name="form.username" id="form.username"
                        placeholder="Username" />
                    <x-input-error name="form.username" />
                </div>
                <div class="form-group">
                    <x-input-label for="form.email" label="Email" />
                    <x-input type="email" wire:model="form.email" name="form.email" id="form.email" placeholder="Email" />
                    <x-input-error name="form.email" />
                </div>

                <div class="form-group">
                    <x-input-label for="form.role" label="Role" />
                    <x-input-select wire:model="form.role" name="form.role" id="form.role">
                        <option value="">Pilih Role</option>
                        @foreach (App\Enums\Role::cases() as $role)
                            <option value="{{ $role->value }}">{{ $role->label() }} - {{ $role->value }}</option>
                        @endforeach
                    </x-input-select>
                    <x-input-error name="form.role" />
                </div>

                <div class="form-group">
                    <x-input-label for="form.password" label="Password" />
                    <x-input type="password" wire:model="form.password" name="form.password" id="form.password"
                        placeholder="Password" />
                    <x-input-error name="form.password" />
                </div>
                <div class="form-group">
                    <x-input-label for="form.password_confirmation" label="Konfirmasi password" />
                    <x-input type="password" wire:model="form.password_confirmation" name="form.password_confirmation"
                        id="form.password_confirmation" placeholder="Konfirmasi Password" />
                    <x-input-error name="form.password_confirmation" />
                </div>
            @endslot

            @slot('footer')
                <button type="button" class="btn btn-secondary" wire:click="closeModal">Tutup</button>
                <button type="submit" class="btn btn-primary">
                    <span wire:loading wire:target="save" class="spinner-border spinner-border-sm"></span>
                    Simpan
                </button>
            @endslot

        </x-modal>
    </form>

</div>
