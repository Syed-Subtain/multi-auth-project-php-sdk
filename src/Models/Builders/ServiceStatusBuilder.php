<?php

declare(strict_types=1);

/*
 * MultiAuthSampleLib
 *
 * This file was automatically generated by APIMATIC v3.0 ( https://www.apimatic.io ).
 */

namespace MultiAuthSampleLib\Models\Builders;

use Core\Utils\CoreHelper;
use MultiAuthSampleLib\Models\ServiceStatus;

/**
 * Builder for model ServiceStatus
 *
 * @see ServiceStatus
 */
class ServiceStatusBuilder
{
    /**
     * @var ServiceStatus
     */
    private $instance;

    private function __construct(ServiceStatus $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new service status Builder object.
     */
    public static function init(string $status): self
    {
        return new self(new ServiceStatus($status));
    }

    /**
     * Sets app field.
     */
    public function app(?string $value): self
    {
        $this->instance->setApp($value);
        return $this;
    }

    /**
     * Sets moto field.
     */
    public function moto(?string $value): self
    {
        $this->instance->setMoto($value);
        return $this;
    }

    /**
     * Sets notes field.
     */
    public function notes(?int $value): self
    {
        $this->instance->setNotes($value);
        return $this;
    }

    /**
     * Sets users field.
     */
    public function users(?int $value): self
    {
        $this->instance->setUsers($value);
        return $this;
    }

    /**
     * Sets time field.
     */
    public function time(?string $value): self
    {
        $this->instance->setTime($value);
        return $this;
    }

    /**
     * Sets os field.
     */
    public function os(?string $value): self
    {
        $this->instance->setOs($value);
        return $this;
    }

    /**
     * Sets php version field.
     */
    public function phpVersion(?string $value): self
    {
        $this->instance->setPhpVersion($value);
        return $this;
    }

    /**
     * Add an additional property to this model.
     *
     * @param string $name Name of property
     * @param mixed $value Value of property
     */
    public function additionalProperty(string $name, $value): self
    {
        $this->instance->addAdditionalProperty($name, $value);
        return $this;
    }

    /**
     * Initializes a new service status object.
     */
    public function build(): ServiceStatus
    {
        return CoreHelper::clone($this->instance);
    }
}
