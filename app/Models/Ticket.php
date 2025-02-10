<?php

namespace App\Models;

class Ticket
{
    public function __construct(
        protected int $id,
        protected int $created_by,
        protected int $assigned_to,
        protected string $title,
        protected ?string $description,
        protected string $due_date,
        protected ?string $resolved_date,
        protected int $priority,
        protected string $created_at,
        protected ?string $updated_at,
        array $modelAttributes = [])
    {

    }

    /**
     * Returns an array of fake tickets.
     *
     * @param int $count
     * @return array
     */
    public static function fakeArray(int $count = 3) : array
    {
        $return = [];

        for ($i = 0; $i < $count; $i++) {
            $title = "Can't make my computer work. Tried restarting and nothing. #$i";
            $description = "Long description explaining what I've done so far. There's a lot I can put here and we need to test the length displays. Without it, I don't know what the UI looks like when a ticket is too big.#$i";
            $creator = 1;
            $assigned = 1;
            $due = date("d-m-Y", strtotime("+7 day"));
            $resolved = ($i % 3 == 0) ? null : date("d-m-Y", strtotime("+7 day"));
            $urgency = $count % 3;
            $created = date("d-m-Y", strtotime("-3 day"));
            $updated = $created;

            $ticket = new Ticket($i, $creator, $assigned, $title, $description, $due, $resolved, $urgency, $created, $updated);

            $return[] = $ticket;
        }

        return $return;
    }

    // Setters

    // Getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getCreatedBy(): int
    {
        return $this->created_by;
    }
    public function getAssignedTo(): int
    {
        return $this->assigned_to;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function getDueDate() : string
    {
        return $this->due_date;
    }
    public function getResolvedDate() : ?string
    {
        return $this->resolved_date;
    }
    public function getPriority(): int
    {
        return $this->priority;
    }
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }
}
