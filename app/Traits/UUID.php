<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait UUID
{
    public static function bootUUID(): void
    {
        // Boot other traits on the Model
        /**
         * Listen for the creating event on the user model.
         * Sets the 'id' to a UUID using Str::uuid() on the instance being created
         */
        static::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
        });
    }
}