<?php namespace Larabook\Statuses;


use Mikro\Presenter\Contracts\PresenterInterface;
use Mikro\Presenter\PresenterTrait;

class Comment extends \Eloquent implements PresenterInterface{

    use PresenterTrait;

    protected $presenter = 'Larabook\Statuses\Presenter\CommentPresenter';

    /**
     * @var array
     */
    protected $fillable = ['user_id','status_id','body'];


    /**
     * @return mixed
     */
    public function owner()
    {
        return $this->belongsTo('Larabook\Users\User','user_id');
    }


    /**
     *
     * @return array
     */
    public function getDates()
    {
        return ['created_at','updated_at'];
    }

    /**
     * @param $statusId
     * @param $body
     * @return static
     */
    public static function leave($statusId, $body)
    {
        return new static([
           'status_id' => $statusId,
           'body'   =>  $body
        ]);
    }


}