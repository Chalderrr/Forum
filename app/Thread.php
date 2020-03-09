<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
	protected $guarded = [];

	/**
	 * @return string
	 */
	public function path() {
		return '/threads/' .$this->channel->slug . '/' . $this->id;
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function replies() {
		return $this->hasMany(Reply::class);
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function creator() {
		return $this->belongsTo(User::class, 'user_id');
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

	/**
	 * @param $reply
	 *
	 * @return Model
	 */
	public function addReply($reply)
    {
        return $this->replies()->create($reply);
    }
}
