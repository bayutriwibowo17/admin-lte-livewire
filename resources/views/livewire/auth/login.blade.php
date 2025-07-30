<div>
    <p class="login-box-msg">Sign in to start your session</p>

    <form wire:submit.prevent="login" method="post">
        <div class="mb-2">
            <x-input-label for="form.username" label="Username" />
            <x-input type="text" wire:model="form.username" name="form.username" id="form.username"
                placeholder="ntbkdev" />
            <x-input-error name="form.username" />
        </div>
        <div class="mb-2">
            <x-input-label for="form.password" label="Password" />
            <x-input type="password" wire:model="form.password" name="form.password" id="form.password"
                placeholder="********" />
            <x-input-error name="form.password" />
        </div>

        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" wire:model="remember" id="remember">
                    <label for="remember">
                        Remember Me
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">
                    Log In
                </button>
            </div>
            <!-- /.col -->
        </div>
    </form>

</div>
