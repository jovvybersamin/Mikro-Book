<?php namespace Larabook\Statuses\Presenter;



use Mikro\Presenter\Presenter;

class StatusPresenter extends Presenter {


    public function createdAt()
    {
        return $this->entity->created_at->format('Y-m-d');
    }

    /**
     * @return string
     */
    public function body()
    {
        return ucwords($this->entity->body);
    }


} 