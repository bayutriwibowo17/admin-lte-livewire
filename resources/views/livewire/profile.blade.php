<div class="row">
    <div class="col-md-4">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('/') }}/dist/img/avatar6.png"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">
                    {{ user()->name }}
                </h3>

                <p class="text-muted text-center">
                    {{ user()->role }}
                </p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Followers</b>
                        <a class="float-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                        <b>Following</b>
                        <a class="float-right">543</a>
                    </li>
                    <li class="list-group-item">
                        <b>Friends</b>
                        <a class="float-right">13,287</a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <div class="col-md-8">
        <x-card title="Data akun">
            @slot('body')
                <form wire:submit.prevent="save">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label for="username" label="Username" />
                                <x-input type="text" wire:model="username" name="username" id="username"
                                    placeholder="Username" disabled />
                                <x-input-error name="username" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label for="email" label="Email" />
                                <x-input type="email" wire:model="email" name="email" id="email" placeholder="Email"
                                    disabled />
                                <x-input-error name="email" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <x-input-label for="name" label="Nama lengkap" />
                        <x-input type="text" wire:model="name" name="name" id="name"
                            placeholder="Nama lengkap" />
                        <x-input-error name="name" />
                    </div>

                    <div class="form-group">
                        <x-input-label for="new_password" label="Password baru" />
                        <div class="input-group">
                            <x-input type="password" wire:model="new_password" name="new_password" id="new_password"
                                placeholder="Password baru" />
                            <div class="input-group-append toggle-password">
                                <span class="input-group-text">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        <x-input-error name="new_password" />
                    </div>

                    <div class="form-group">
                        <x-input-label for="new_password_confirmation" label="Konfirmasi Password baru" />
                        <div class="input-group">
                            <x-input type="password" wire:model="new_password_confirmation" name="new_password_confirmation"
                                id="new_password_confirmation" placeholder="Konfirmasi Password baru" />
                            <div class="input-group-append toggle-password">
                                <span class="input-group-text">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <x-input-error name="new_password_confirmation" />
                        </div>
                    </div>

                    @push('scripts')
                        <script>
                            // toggle password visibility
                            function togglePwd(el, icon) {
                                const input = el.previousElementSibling;
                                if (input.type === "password") {
                                    input.type = "text";
                                    icon.classList.replace("fa-eye", "fa-eye-slash");
                                } else {
                                    input.type = "password";
                                    icon.classList.replace("fa-eye-slash", "fa-eye");
                                }
                            }

                            // attach ke semua button yang punya .toggle-password
                            document.addEventListener('DOMContentLoaded', () => {
                                document.querySelectorAll('.toggle-password').forEach(btn => {
                                    btn.addEventListener('click', () => {
                                        const icon = btn.querySelector('i');
                                        // cari input sebelumnya (password / text)
                                        togglePwd(btn, icon);
                                    });
                                });
                            });
                        </script>
                    @endpush

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            <span wire:loading wire:target="save" class="spinner-border spinner-border-sm"></span>
                            Simpan
                        </button>
                    </div>
                </form>
            @endslot
        </x-card>
    </div>
</div>
