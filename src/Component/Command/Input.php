<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Command\Component\Command;

use GrizzIt\Command\Common\Command\InputInterface;

class Input implements InputInterface
{
    /**
     * Contains the passed command.
     *
     * @var string[]
     */
    private array $command;

    /**
     * Contains the passed parameters.
     *
     * @var array
     */
    private array $parameters;

    /**
     * Contains the passed flags.
     *
     * @var array
     */
    private array $flags;

    /**
     * Constructor
     *
     * @param string[] $command
     * @param array    $parameters
     * @param array    $flags
     */
    public function __construct(
        array $command = [],
        array $parameters = [],
        array $flags = []
    ) {
        $this->command = $command;
        $this->parameters = $parameters;
        $this->flags = $flags;
    }

    /**
     * Checks whether the flag is set.
     *
     * @param string $flag
     *
     * @return bool
     */
    public function hasParameter(string $parameter): bool
    {
        return array_key_exists($parameter, $this->parameters);
    }

    /**
     * Sets the value of a parameter.
     *
     * @param string $parameter
     * @param mixed $value
     *
     * @return void
     */
    public function setParameter(string $parameter, mixed $value): void
    {
        $this->parameters[$parameter] = $value;
    }

    /**
     * Retrieves the parameter from the input.
     *
     * @param string $parameter
     *
     * @return mixed
     */
    public function getParameter(string $parameter): mixed
    {
        return $this->parameters[$parameter] ?? null;
    }

    /**
     * Checks whether the flag is set.
     *
     * @param string $flag
     *
     * @return bool
     */
    public function isSetFlag(string $flag): bool
    {
        return in_array($flag, $this->flags);
    }

    /**
     * Returns the command.
     *
     * @return string[]
     */
    public function getCommand(): array
    {
        return $this->command;
    }

    /**
     * Returns the parameters.
     *
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * Returns the flags.
     *
     * @return array
     */
    public function getFlags(): array
    {
        return $this->flags;
    }
}
