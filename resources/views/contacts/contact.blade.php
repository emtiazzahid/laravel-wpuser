<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a
                href="{{ route('contacts.index') }}"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            << Show Contact list
            </a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-6 space-y-6">
                        <table>
                            <tbody>
                            <tr>
                                <td>Name: </td>
                                <td>{{ $contact->name }}</td>
                            </tr>
                            <tr>
                                <td>Phone Number: </td>
                                <td>{{ $contact->phone_number }}</td>
                            </tr>
                            <tr>
                                <td>Email Address: </td>
                                <td>{{ $contact->email }}</td>
                            </tr>
                            <tr>
                                <td>Budget: </td>
                                <td>{{ $contact->name }}</td>
                            </tr>
                            <tr>
                                <td>Message: </td>
                                <td>{{ $contact->message }}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
