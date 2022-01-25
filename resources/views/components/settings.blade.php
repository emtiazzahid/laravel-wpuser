<div>
    <x-validation-errors class="mb-4" :errors="$errors" />
    <form class="w-full max-w-sm" method="POST" action="{{ route('settings.update') }}">
        @csrf
        <div>
            <x-label for="site_url" :value="__('Site URL')" />

            <x-input id="site_url" class="block mt-1 w-full" type="text" name="site_url" :value="old('site_url')" required autofocus />
        </div>
        <div>
            <x-label for="site_url" :value="__('Site URL')" />

            <x-input id="site_url" class="block mt-1 w-full" type="text" name="site_url" :value="old('site_url')" required autofocus />
        </div>
        
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="site-base-url">
                    Site URL
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                       id="site-base-url" 
                       type="text" 
                       placeholder="http://wordpress.test/"
                       value="">
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="username">
                    Username
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="username" type="text" placeholder="admin">
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                    Password
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="password" placeholder="******************">
            </div>
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>