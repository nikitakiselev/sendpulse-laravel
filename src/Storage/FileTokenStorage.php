<?php

namespace NikitaKiselev\SendPulse\Storage;

use Illuminate\Contracts\Filesystem\Factory;
use NikitaKiselev\SendPulse\Contracts\TokenStorage;

class FileTokenStorage implements TokenStorage
{
    /**
     * @var Factory
     */
    private $file;

    /**
     * @var string
     */
    private $hashName;

    /**
     * FileTokenStorage constructor.
     *
     * @param Factory $file
     */
    public function __construct(Factory $file, string $hashName)
    {
        $this->file = $file;
        $this->hashName = $hashName;
    }

    /**
     * Get token value
     *
     * @return string
     */
    public function get()
    {
        if (!$this->empty())
        {
            return $this->file->disk()->get(
                $this->hashName
            );
        }

        return null;
    }

    /**
     * Set token
     *
     * @param string $value
     * @return mixed
     */
    public function set(string $value)
    {
        return $this->file->disk()->put(
            $this->hashName,
            $value
        );
    }

    /**
     * Check token empty
     *
     * @return boolean
     */
    public function empty()
    {
        return ! $this->file->disk()->exists(
            $this->hashName
        );
    }
}