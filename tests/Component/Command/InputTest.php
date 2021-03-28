<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Command\Tests\Component\Command;

use PHPUnit\Framework\TestCase;
use GrizzIt\Command\Component\Command\Input;

/**
 * @coversDefaultClass \GrizzIt\Command\Component\Command\Input
 */
class InputTest extends TestCase
{
    /**
     * A few simple getter method tests.
     *
     * @covers ::hasParameter
     * @covers ::getParameter
     * @covers ::isSetFlag
     * @covers ::getCommand
     * @covers ::getParameters
     * @covers ::getFlags
     * @covers ::__construct
     *
     * @return void
     */
    public function testGetters(): void
    {
        $command = ['foo'];
        $parameters = ['bar' => 'baz'];
        $flags = ['qux'];
        $subject = new Input($command, $parameters, $flags);

        $this->assertEquals($command, $subject->getCommand());
        $this->assertEquals($parameters, $subject->getParameters());
        $this->assertEquals($flags, $subject->getFlags());
        $this->assertEquals(true, $subject->isSetFlag('qux'));
        $this->assertEquals(true, $subject->hasParameter('bar'));
        $this->assertEquals('baz', $subject->getParameter('bar'));
    }

    /**
     * Test if the variable is going to be set correctly.
     *
     * @covers ::hasParameter
     * @covers ::setParameter
     * @covers ::__construct
     *
     * @return void
     */
    public function testSetter(): void
    {
        $subject = new Input([], [], []);

        $this->assertEquals(false, $subject->hasParameter('baz'));
        $subject->setParameter('baz', 'foo');
        $this->assertEquals(true, $subject->hasParameter('baz'));
    }
}
