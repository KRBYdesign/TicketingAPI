

<div class="flex flex-col bg-neutral-700 p-4 rounded-md">
    <div class="flex justify-between items-center mb-2">
        <p class="w-fit px-1 py-1/2 rounded-md bg-neutral-300 text-sm">{{ $dueDate }}</p>
        <p class="w-fit px-1 py-1/2 rounded-md {{ $resolved ? "bg-green-500" : "bg-yellow-400" }} text-sm">{{ $resolved ? "Closed" : "Open" }}</p>
    </div>

    <div>
        <p class="text-neutral-600 dark:text-neutral-300 text-xl font-bold">{{ htmlspecialchars_decode($title) }}</p>
        <p class="text-neutral-600 dark:text-neutral-300 h-12 overflow-hidden">{{ htmlspecialchars_decode($description) }}</p>
        <p class="text-neutral-600 dark:text-neutral-300 text-sm font-bold mt-2">{{ $created_by }}</p>
    </div>
</div>
