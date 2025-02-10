<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TicketPreview extends Component
{
    private const MAX_TITLE_LENGTH = 42;
    private const MAX_DESCRIPTION_LENGTH = 127;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title,
        public string $description,
        public string $dueDate,
        public ?string $resolved,
        public int $creatorId,
    )
    {
        if (strlen($this->title) > self::MAX_TITLE_LENGTH) {
            $this->title = substr($this->title, 0, self::MAX_TITLE_LENGTH - 2) . '...';
        }

        if (strlen($this->description) > self::MAX_DESCRIPTION_LENGTH) {
            $this->description = substr($this->description, 0, self::MAX_DESCRIPTION_LENGTH - 2) . '...';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ticket-preview')
            ->with([
                'title' => $this->title,
                'description' => $this->description,
                'dueDate' => $this->dueDate,
                'resolved' => is_null($this->resolved),
                'created_by' => User::find($this->creatorId)->getName(),
            ]);
    }
}
