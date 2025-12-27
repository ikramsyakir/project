<?php

namespace App\Models;

use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<ProjectFactory> */
    use HasFactory;

    public const STATUS_ACTIVE = 'active';

    public const STATUS_COMPLETED = 'completed';

    public const STATUS_PENDING = 'pending';

    public const STATUS_ON_HOLD = 'on_hold';

    protected $guarded = ['id'];

    /**
     * Get label for the current status
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
