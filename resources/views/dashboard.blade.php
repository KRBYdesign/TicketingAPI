<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Main Dashboard Bento-box style -->
        <div class="grid grid-cols-6 px-12 gap-8 h-[800px] overflow-y-hidden">
            <!-- Assigned tickets or another dashboard layout -->
            <div class="bg-neutral-50 dark:bg-neutral-800 px-8 py-12 col-span-4"></div>

            <!-- User tickets preview -->
            <div class="bg-neutral-50 dark:bg-neutral-800 px-8 py-12 col-span-2">
                <div class="flex flex-row justify-between mb-8">
                    <!-- todo Make this a link to view all the users tickets -->
                    <a class="font-semibold text-3xl text-gray-800 dark:text-gray-200 hover:underline" href="">Your Tickets</a>

                    <!-- New ticket button -->
                    <a class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                       href="{{ url('/tickets/create') }}">New Ticket</a>
                </div>

                <div id="ticket-preview-container" class="flex flex-col gap-4 overflow-y-auto h-[650px]">
                    @foreach($data['tickets'] as $ticket)
                        <x-ticket-preview
                            title="{{ $ticket->getTitle() }}"
                            description="{{ $ticket->getDescription() }}"
                            dueDate="{{ $ticket->getDueDate() }}"
                            resolved="{{ $ticket->getResolvedDate() }}"
                            creatorId="{{ $ticket->getCreatedBy() }}"
                        />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
