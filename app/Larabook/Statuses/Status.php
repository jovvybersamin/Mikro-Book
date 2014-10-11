<?php namespace Larabook\Statuses;


use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;
use Mikro\Presenter\Contracts\PresenterInterface;
use Mikro\Presenter\PresenterTrait;

class Status extends \Eloquent implements PresenterInterface{

    use EventGenerator, PresenterTrait;

    /**
     * Fillable field for status
     *
     * @var array
     */

    protected $fillable = ['body'];

    /**
     * @var StatusPresenter
     */
    protected $presenter = 'Larabook\Statuses\Presenter\StatusPresenter';

    /**
     * Status belongs to a user
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('Larabook\Users\User');
    }

    /**
     * @return array
     */
    public function getDates()
    {
        return ['created_at','updated_at'];
    }


    /**
     * Publish new status
     *
     * @param $body
     * @return static
     */
    public static function publish($body)
    {
        $status = new static(compact('body'));

        $status->raise(new StatusWasPublished($body));

        return $status;
    }


} 