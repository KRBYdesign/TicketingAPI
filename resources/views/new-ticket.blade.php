<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Ticket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Bento-box style -->
        <div class="grid grid-cols-6 px-12 gap-8 h-[800px] overflow-y-hidden">
            <form class="px-8 py-12 bg-neutral-50 dark:bg-neutral-800 col-start-2 col-span-4 relative overflow-y-auto" action="{{ url('/tickets/create') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <x-honeypot />


                <div class="grid grid-cols-3 gap-4">
                    <!-- Ticket Title -->
                    <div class="mb-6 col-span-2">
                        <label for="ticket_title" class="block mb-2 font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" id="ticket_title" name="ticket_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please enter a title for your ticket.">
                    </div>

                    <!-- Ticket Type Dropdown Menu -->
                    <div class="position-absolute mb-6 position-relative">
                        <label for="ticket_type" class="block mb-2 font-medium text-gray-900 dark:text-white">Ticket Type</label>
                        <div class="relative">
                            <!-- input element-->
                            <input id="type_input" type="text" class="z-10 relative bbg-gray-50 bg-neutral-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly placeholder="Please Make A Selection" />

                            <!-- drop down icon -->
                            <div class="absolute top-0 right-0 z-20 rounded-r-md border-l-[1px] bbg-gray-50 border focus:ring-blue-500 focus:border-blue-500 h-full w-12 p-2.5 dark:bg-neutral-600 bg-neutral-100 dark:border-gray-600 flex items-center dark:hover:ring-[1px] dark:hover:ring-blue-500" id="expand_type_selection" aria-expanded="false">
                                <svg id="expand_type_icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g  stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0303 7.46967C14.3232 7.76256 14.3232 8.23744 14.0303 8.53033L10.5607 12L14.0303 15.4697C14.3232 15.7626 14.3232 16.2374 14.0303 16.5303C13.7374 16.8232 13.2626 16.8232 12.9697 16.5303L8.96967 12.5303C8.67678 12.2374 8.67678 11.7626 8.96967 11.4697L12.9697 7.46967C13.2626 7.17678 13.7374 7.17678 14.0303 7.46967Z" class="fill-neutral-600 dark:fill-white"></path></g></svg>
                            </div>

                            <!-- drop down menu -->
                            <div id="type_dropdown" class="z-0 absolute top-0 left-0 w-full h-0 bg-neutral-50 dark:bg-neutral-700 overflow-y-hidden pt-10 border rounded-lg dark:border-neutral-500">
                                <p class="option text-right px-4 py-2 text-neutral-500 hover:bg-neutral-200 dark:text-neutral-300 dark:hover:bg-neutral-500">Design / Artwork</p>
                                <p class="option text-right px-4 py-2 text-neutral-500 hover:bg-neutral-200 dark:text-neutral-300 dark:hover:bg-neutral-500">Website Update / Creation</p>
                                <p class="option text-right px-4 py-2 text-neutral-500 hover:bg-neutral-200 dark:text-neutral-300 dark:hover:bg-neutral-500">Tech Issues</p>
                                <p class="option text-right px-4 py-2 text-neutral-500 hover:bg-neutral-200 dark:text-neutral-300 dark:hover:bg-neutral-500">Software Assistance / Install</p>
                                <p class="option text-right px-4 py-2 text-neutral-500 hover:bg-neutral-200 dark:text-neutral-300 dark:hover:bg-neutral-500">Other</p>
                            </div>
                        </div>

                        <script>
                            // Form Interactions
                            const expand = document.getElementById('expand_type_selection');
                            const expandIcon = document.getElementById('expand_type_icon');
                            const typeInput = document.getElementById('type_input');
                            const typeDropdown = document.getElementById('type_dropdown');
                            const dropDownOpts = document.querySelectorAll('p.option');

                            expand.addEventListener('click', () => {
                                let status = expand.ariaSelected === "true";

                                if (!status) {
                                    // expand the menu
                                    expand.ariaSelected = "true";
                                    typeDropdown.classList.remove('h-0');
                                    typeDropdown.classList.add('h-fit');
                                    expandIcon.classList.add("-rotate-90");
                                } else {
                                    // close the menu
                                    expand.ariaSelected = "false";
                                    typeDropdown.classList.remove('h-fit');
                                    typeDropdown.classList.add('h-0');
                                    expandIcon.classList.remove("-rotate-90");
                                }
                            })

                            dropDownOpts.forEach((opt) => {
                                opt.addEventListener('click', () => {
                                    // set the value of the selection
                                    typeInput.value = opt.innerText;
                                    // close the menu
                                    expandIcon.classList.remove("-rotate-90");
                                    expand.ariaSelected = 'false';
                                    typeDropdown.classList.remove('h-fit');
                                    typeDropdown.classList.add('h-0');
                                });
                            })
                        </script>
                    </div>
                </div>

                <!-- Ticket Description -->
                <div class="mb-6">
                    <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ticket Description</label>
                    <textarea id="ticket_description" name="ticket_description" class="block w-full py-2 px-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-neutral-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 max-h-[320px]" placeholder="Please describe your issue in as much detail as possible. Be sure to include the issues you're experiencing, as well as what steps have already been taken to resolve it."></textarea>
                    <!-- todo leave a link to a markdown cheat sheet -->
                    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Both plain text and <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Markdown</a> are supported.</p>
                </div>

                <!-- Ticket Attachments -->
                <!-- Todo: Include attachments so users can leave inspiration / screenshots -->
            </form>
        </div>
    </div>
</x-app-layout>
