<?php namespace Larabook\Statuses\Presenter;



use Mikro\Presenter\Presenter;

class StatusPresenter extends Presenter {


    /**
     * Display how long its been since the published date.
     *
     * @return mixed
     */
    public function timeSincePublished()
   {
       return $this->created_at->diffForHumans();
   }

    /**
     * @return string
     */
    public function body()
    {
        return ucwords($this->entity->body);
    }



} 