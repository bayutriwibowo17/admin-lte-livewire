<div>
    <x-card title="Data website">
        @slot('body')
            <form wire:submit.prevent="save">
                <div class="form-group">
                    <x-input-label for="title" label="Nama web" />
                    <x-input type="text" name="title" wire:model="title" id="title" placeholder="Nama web" />
                    <x-input-error name="title" />
                </div>
                <div class="form-group">
                    <x-input-label for="description" label="Deskripsi web" />
                    <x-input-textarea wire:model="description" name="description" id="description"
                        placeholder="Deskripsi web" />
                    <x-input-error name="description" />
                </div>

                <div class="form-group">
                    <x-input-label for="author" label="Author" />
                    <x-input type="text" wire:model="author" name="author" id="author" placeholder="Author"
                        disabled />
                    <x-input-error name="author" />
                </div>

                <x-btn-submit target="save" class="btn-primary">
                    Simpan
                </x-btn-submit>
            </form>
        @endslot
    </x-card>
</div>
