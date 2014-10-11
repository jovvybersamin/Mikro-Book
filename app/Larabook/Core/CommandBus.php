<?php namespace Larabook\Core;


use Illuminate\Support\Facades\App;

trait CommandBus {

    /**
     * Execute the command
     *
     * @param $command
     * @return mixed
     */
   public function execute($command)
   {
        return  $this->getCommandBus()->execute($command);
   }

    /**
     *  Get the command bus
     *
     * @return mixed
     */
    public function getCommandBus()
    {
        return App::make('Laracasts\Commander\CommandBus');
    }

} 