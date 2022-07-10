<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Subscription extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $connection = 'mysql';
    protected $table = 'subscriptions';
    protected $primaryKey = 'subscription_id';
    protected $guarded = [];

    public function members(): HasMany
    {
        return $this->hasMany(Member::class, 'member_id', 'member_id');
    }
}
