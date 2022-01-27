<div>
    <div wire:loading>
        Loading..
    </div>

    <form method="POST" action="{{ route('contacts.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-label for="name" :value="__('Name')" />

            <x-input id="name" class="block mt-1 w-full" type="text" autofocus wire:model="name"/>
            @error('name') <span class="text-red-600">{{ $message }}</span>@enderror
        </div>

        <!-- Phone Number -->
        <div>
            <x-label for="phone_number" :value="__('Phone Number')" />

            <x-input id="phone_number" class="block mt-1 w-full" type="text" autofocus  wire:model="phone_number"/>
             @error('phone_number') <span class="text-red-600">{{ $message }}</span>@enderror
        </div>

        <!-- Email Address -->
        <div>
            <x-label for="email" :value="__('Email Address')" />

            <x-input id="email" class="block mt-1 w-full" type="email" autofocus wire:model="email"/>
            @error('email') <span class="text-red-600">{{ $message }}</span>@enderror
        </div>

        <!-- Desired Budget -->
        <div>
            <x-label for="budget" :value="__('Desired Budget')" />

            <x-input id="budget" class="block mt-1 w-full" type="text" autofocus wire:model="budget"/>
            @error('budget') <span class="text-red-600">{{ $message }}</span>@enderror
        </div>

        <!-- Message -->
        <div>
            <x-label for="message" :value="__('Message')" />

            <textarea id="message" cols="30" rows="10" class="block mt-1 w-full" wire:model="message"></textarea>
            @error('message') <span class="text-red-600">{{ $message }}</span>@enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button type="button" class="ml-3" wire:click.prevent="contactStore()">
                {{ __('Submit') }}
            </x-button>
        </div>
    </form>

    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
    <x-livewire-alert::flash />
</div>
