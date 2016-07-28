<?php

namespace NikitaKiselev\SendPulse\Storage;

use Illuminate\Session\Store;
use NikitaKiselev\SendPulse\Contracts\TokenStorage;

class SessionTokenStorage implements TokenStorage
{
    /**
     * @var Store
     */
    private $store;
    /**
     * @var
     */
    private $hashName;

    /**
     * SessionTokenStorage constructor.
     *
     * @param Store $store
     * @param string $hashName
     */
    public function __construct(Store $store, string $hashName)
    {
        $this->store = $store;
        $this->hashName = $hashName;
    }

    /**
     * Get token value
     *
     * @return string
     */
    public function get()
    {
        return $this->store->get($this->hashName);
    }

    /**
     * Set token
     *
     * @param string $value
     * @return mixed
     */
    public function set(string $value)
    {
        $this->store->put($this->hashName, $value);
    }

    /**
     * Check token empty
     *
     * @return boolean
     */
    public function empty()
    {
        return ! $this->store->has($this->hashName);
    }
}