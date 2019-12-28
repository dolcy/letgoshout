<?php

declare(strict_types=1);

namespace App\Presenters\Tweets;

use Illuminate\Support\Str;
use Hemp\Presenter\Presenter;

final class TweetPresenter extends Presenter
{
    /**
     * Transform tweets to uppercase with exclamation
     *
     * @return string
     */
    public function tweetToUppercase(): string
    {
        $tweet = $this->model->tweet;

        return strtoupper($tweet . Str::replaceLast('.', '!', $tweet));
    }
}
