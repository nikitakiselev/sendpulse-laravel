<?php

namespace NikitaKiselev\SendPulse;

use Illuminate\Support\Manager;
use NikitaKiselev\SendPulse\Storage\FileTokenStorage;
use NikitaKiselev\SendPulse\Storage\SessionTokenStorage;

class TokenStorageManager extends Manager
{
    /**
     * Get the default storage driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']['sendpulse.token_storage'];
    }

    /**
     * @return FileTokenStorage
     */
    public function createFileDriver()
    {
        return new FileTokenStorage(
            $this->app->make(\Illuminate\Contracts\Filesystem\Factory::class),
            $this->hashName()
        );
    }

    /**
     * @return SessionTokenStorage
     */
    public function createSessionDriver()
    {
        return new SessionTokenStorage(
            $this->app->make(\Illuminate\Session\Store::class),
            $this->hashName()
        );
    }

    /**
     * Get hash name
     * 
     * @return string
     */
    protected function hashName()
    {
        $userId = $this->app['config']->get('sendpulse.api_user_id');
        $secret = $this->app['config']->get('sendpulse.api_secret');

        return md5($userId . '::' . $secret);
    }
}