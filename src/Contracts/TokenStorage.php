<?php

namespace NikitaKiselev\SendPulse\Contracts;

interface TokenStorage
{
    /**
     * Get token value
     *
     * @return string
     */
    public function get();

    /**
     * Set token
     *
     * @param string $value
     * @return mixed
     */
    public function set(string $value);

    /**
     * Check token empty
     * 
     * @return boolean
     */
    public function empty();
}