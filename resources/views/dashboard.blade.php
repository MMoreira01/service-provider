<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Academic Papers Repository') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Paper Card -->
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 dark:border-gray-700">
                    <div class="p-6">
                        <h3 class="font-semibold text-lg mb-4">Paper Title 1</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">Authors: Author 1, Author 2</p>
                        <p class="text-gray-600 dark:text-gray-400">Abstract: Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit.</p>
                    </div>
                </div>

                <!-- Paper Card -->
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 dark:border-gray-700">
                    <div class="p-6">
                        <h3 class="font-semibold text-lg mb-4">Paper Title 2</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">Authors: Author 3, Author 4</p>
                        <p class="text-gray-600 dark:text-gray-400">Abstract: Sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua.</p>
                    </div>
                </div>

                <!-- Paper Card -->
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 dark:border-gray-700">
                    <div class="p-6">
                        <h3 class="font-semibold text-lg mb-4">Paper Title 3</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">Authors: Author 5, Author 6</p>
                        <p class="text-gray-600 dark:text-gray-400">Abstract: Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
