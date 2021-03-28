<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Command\Common\Factory;

use GrizzIt\Command\Common\Command\InputInterface;

interface InputFactoryInterface
{
    /**
     * Creates a CLI command request.
     *
     * @param array $arguments The arguments passed to the command line.
     *
     * @return InputInterface
     */
    public static function create(array $arguments): InputInterface;
}
