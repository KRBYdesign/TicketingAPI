<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Main Dashboard Bento-box style -->
        <div class="grid grid-cols-6 px-12 gap-8 h-[800px] overflow-y-hidden">
            <div class="bg-neutral-800 px-8 py-12 col-span-4"></div>

            <div class="bg-neutral-800 px-8 py-12 col-span-2">
                <div class="flex flex-row justify-between mb-8">
                    <p class="font-semibold text-3xl text-gray-800 dark:text-gray-200">Your Tickets</p>
                    <x-primary-button>New Ticket</x-primary-button>
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
