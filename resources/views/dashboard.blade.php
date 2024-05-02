<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between items-center"> <!-- Changed here -->
                    <div>
                        Hello {{ Auth::user()->name }}
                    </div>
                    <div>
                        <i id="eye-icon" class="fa fa-eye cursor-pointer" aria-hidden="true" onclick="toggleTable()"></i> {{count($children)}}
                    </div>
                    <div class="flex space-x-4"> <!-- Changed here -->
                        <!-- Add Payment Button -->
                        <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Make Payment</a>
                        <!-- Write to Sponsored Child Button -->
                        <a href="#" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Write to Your Sponsored Child</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-10">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Livewire Component -->
                    @livewire('transaction-table')

                </div>
            </div>
        </div>
    </div>
     <!-- table pop up -->
     <div id="table-popup" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-8 max-w-md rounded-lg">
                <!-- Table content -->
                <table class="min-w-full  border-gray-300 rounded-lg">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Second Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            <!-- Add more headers if needed -->
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                         @foreach ($children as $child) 

                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $child->child->first_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $child->child->second_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                         <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Write Letter</a>
                                </td>
                                <!-- Add more data cells if needed -->
                            </tr>
                             
                         @endforeach
                        <!-- Add more rows of data if needed -->
                    </tbody>
                </table>
                <!-- End of table content -->

                <!-- Close button -->
                <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="toggleTable()">Close</button>
            </div>
        </div>
     <!-- table pop up-->
     <script>
        function toggleTable() {
            var tablePopup = document.getElementById("table-popup");
            tablePopup.classList.toggle("hidden");
        }
    </script>
</x-app-layout>
