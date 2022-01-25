<div>
    @if (session()->has('message'))
        <div class="text-green-600">
            {{ session('message') }}
        </div>
    @endif
    <form class="w-full max-w-sm" method="POST" action="{{ route('settings.update') }}">
        @method('PUT')
        @csrf
        <div>
            <x-label for="site_url" :value="__('Site URL')" />

            <x-input id="site_url" class="block mt-1 w-full" type="text" required autofocus wire:model="site_url" placeholder="http://wordpress.test/"/>
            @error('site_url') <span class="text-red-600">{{ $message }}</span>@enderror
        </div>
        <div>
            <x-label for="username" :value="__('Username')" />

            <x-input id="username" class="block mt-1 w-full" type="text" required autofocus wire:model="username" placeholder="admin"/>
            @error('username') <span class="text-red-600">{{ $message }}</span>@enderror
        </div>
        <div>
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" class="block mt-1 w-full" type="password" required autofocus  wire:model="password" placeholder="********"/>
            @error('password') <span class="text-red-600">{{ $message }}</span>@enderror
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-3" wire:click.prevent="update()">
                {{ __('Update') }}
            </x-button>
        </div>
    </form>
</div>
