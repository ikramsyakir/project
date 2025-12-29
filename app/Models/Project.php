<?php

namespace App\Models;

use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<ProjectFactory> */
    use HasFactory;

    const string STATUS_ACTIVE = 'active';

    const string STATUS_COMPLETED = 'completed';

    const string STATUS_PENDING = 'pending';

    const string STATUS_ON_HOLD = 'on_hold';

    protected $guarded = ['id'];

    /**
     * Get a label for the current status
     */
    public function statusLabel(): string
    {
        return match ($this->status) {
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_COMPLETED => 'Completed',
            self::STATUS_PENDING => 'Pending',
            self::STATUS_ON_HOLD => 'On Hold',
        };
    }

    /**
     * List of project statuses
     */
    public static function statuses(): array
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_COMPLETED,
            self::STATUS_PENDING,
            self::STATUS_ON_HOLD,
        ];
    }

    /**
     * Get options for status select input
     */
    public static function statusOptions(): array
    {
        return [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_COMPLETED => 'Completed',
            self::STATUS_PENDING => 'Pending',
            self::STATUS_ON_HOLD => 'On Hold',
        ];
    }
}
