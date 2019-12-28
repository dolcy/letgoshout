<?php

declare(strict_types=1);

namespace App\Domain\Tweets\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Users\Entities\User;
use Hemp\Presenter\Presentable;
use App\Presenters\Tweets\TweetPresenter;

final class Tweet extends Model
{
    use Presentable;

    /**
     * Presenter api class
     * @var string
     */
    protected $defaultPresenter = TweetPresenter::class;

    /**
     * Fillable fields
     * @var array
     */
    protected $fillable = ['tweet'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
