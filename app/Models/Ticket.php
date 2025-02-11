<?php

namespace App\Models;

class Ticket
{
    public function __construct(
        protected int $id,
        protected int $created_by, // the user id who created the ticket
        protected int $assigned_to, // the user id who is assigned the ticket
        protected string $title,
        protected ?string $description,
        protected string $due_date,
        protected ?string $resolved_date,
        protected int $priority,
        protected ?string $created_at,
        protected ?string $updated_at,
    )
    {

    }

    // Getters
    /**
     * Get the id of the ticket.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the id of the user that created the ticket.
     *
     * @return int
     */
    public function getCreatedBy(): int
    {
        return $this->created_by;
    }

    /**
     * Get the id of the user assigned to work the ticket.
     *
     * @return int
     */
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

    /**
     * Returns an array of fake tickets.
     *
     * @param int $count How many fake tickets do you need?
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
}
