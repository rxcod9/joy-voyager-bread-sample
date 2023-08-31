<?php

namespace Joy\VoyagerBreadSample\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Joy\VoyagerBreadSample\Database\Factories\SampleFactory;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Spatial;
use TCG\Voyager\Traits\Translatable;

class Sample extends Model
{
    use HasFactory;
    use Notifiable;
    use Translatable;
    use Resizable;
    use SoftDeletes;
    use Spatial;

    protected $translatable = ['name', 'description'];
    protected $spatial      = ['coordinates'];

    public const ACTIVE   = 'ACTIVE';
    public const INACTIVE = 'INACTIVE';
    public const EXPIRED  = 'EXPIRED';

    protected $guarded = [];

    public function save(array $options = [])
    {
        // If no created_by has been assigned, assign the current user's id as the created_by of the post
        if (!$this->created_by_id && Auth::user()) {
            $this->created_by_id = Auth::user()->getKey();
        }

        if (Auth::user()) {
            $this->modified_by_id = Auth::user()->getKey();
        }

        return parent::save();
    }

    public function createdBy()
    {
        return $this->belongsTo(Voyager::modelClass('User'), 'created_by_id', 'id');
    }

    public function modifiedBy()
    {
        return $this->belongsTo(Voyager::modelClass('User'), 'modified_by_id', 'id');
    }

    public function assignedTo()
    {
        return $this->belongsTo(Voyager::modelClass('User'), 'assigned_to_id', 'id');
    }

    /**
     * Scope a query to only active scopes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('status', '=', static::ACTIVE);
    }

    /**
     * Scope a query to only inactive scopes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInactive(Builder $query)
    {
        return $query->where('status', '=', static::INACTIVE);
    }

    /**
     * Scope a query to only expired scopes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExpired(Builder $query)
    {
        return $query->where('status', '=', static::EXPIRED);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parent()
    {
        return $this->belongsTo(Voyager::modelClass('Sample'));
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return new SampleFactory();
    }

    // /**
    //  * Set the user's first name.
    //  *
    //  * @param  string  $value
    //  * @return void
    //  */
    // public function setSelectAttribute($value)
    // {
    //     $this->attributes['select'] = (int) $value;
    // }

    // /**
    //  * Set the user's first name.
    //  *
    //  * @param  string  $value
    //  * @return void
    //  */
    // public function setSelect2Attribute($value)
    // {
    //     $this->attributes['select2'] = (int) $value;
    // }
}
