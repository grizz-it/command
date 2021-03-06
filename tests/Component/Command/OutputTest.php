<?php

/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace GrizzIt\Command\Tests\Component\Command;

use PHPUnit\Framework\TestCase;
use GrizzIt\Cli\Common\Io\WriterInterface;
use GrizzIt\Task\Common\TaskListInterface;
use GrizzIt\Cli\Common\Theme\ThemeInterface;
use GrizzIt\Command\Component\Command\Output;
use GrizzIt\Cli\Common\Element\ElementInterface;
use GrizzIt\Cli\Common\Factory\IoFactoryInterface;
use GrizzIt\Command\Common\Command\OutputModeEnum;
use GrizzIt\Cli\Common\Factory\ElementFactoryInterface;
use GrizzIt\Cli\Common\Generator\FormGeneratorInterface;

/**
 * @coversDefaultClass \GrizzIt\Command\Component\Command\Output
 */
class OutputTest extends TestCase
{
    /**
     * @covers ::write
     * @covers ::canOutput
     * @covers ::__construct
     *
     * @return void
     */
    public function testWrite(): void
    {
        $writer = $this->createMock(WriterInterface::class);
        $ioFactory = $this->createMock(IoFactoryInterface::class);
        $ioFactory->expects(static::once())
            ->method('createStandardWriter')
            ->willReturn($writer);

        $subject = new Output(
            $this->createMock(FormGeneratorInterface::class),
            $ioFactory,
            $this->createMock(ThemeInterface::class),
            $this->createMock(ElementFactoryInterface::class)
        );

        $input = 'foo';

        $writer->expects(static::once())
            ->method('write')
            ->with($input);

        $subject->write($input);
    }

    /**
     * @covers ::writeLine
     * @covers ::canOutput
     * @covers ::__construct
     *
     * @return void
     */
    public function testWriteLine(): void
    {
        $writer = $this->createMock(WriterInterface::class);
        $ioFactory = $this->createMock(IoFactoryInterface::class);
        $ioFactory->expects(static::once())
            ->method('createStandardWriter')
            ->willReturn($writer);

        $subject = new Output(
            $this->createMock(FormGeneratorInterface::class),
            $ioFactory,
            $this->createMock(ThemeInterface::class),
            $this->createMock(ElementFactoryInterface::class)
        );

        $input = 'foo';

        $writer->expects(static::once())
            ->method('writeLine')
            ->with($input);

        $subject->writeLine($input);
    }

    /**
     * @covers ::overWrite
     * @covers ::canOutput
     * @covers ::__construct
     *
     * @return void
     */
    public function testOverWrite(): void
    {
        $writer = $this->createMock(WriterInterface::class);
        $ioFactory = $this->createMock(IoFactoryInterface::class);
        $ioFactory->expects(static::once())
            ->method('createStandardWriter')
            ->willReturn($writer);

        $subject = new Output(
            $this->createMock(FormGeneratorInterface::class),
            $ioFactory,
            $this->createMock(ThemeInterface::class),
            $this->createMock(ElementFactoryInterface::class)
        );

        $input = 'foo';

        $writer->expects(static::once())
            ->method('overWrite')
            ->with($input);

        $subject->overWrite($input);
    }

    /**
     * @covers ::getFormGenerator
     * @covers ::canOutput
     * @covers ::__construct
     *
     * @return void
     */
    public function testGetFormGenerator(): void
    {
        $formGenerator = $this->createMock(FormGeneratorInterface::class);
        $subject = new Output(
            $formGenerator,
            $this->createMock(IoFactoryInterface::class),
            $this->createMock(ThemeInterface::class),
            $this->createMock(ElementFactoryInterface::class)
        );

        $this->assertEquals($formGenerator, $subject->getFormGenerator());
    }

    /**
     * @covers ::outputText
     * @covers ::canOutput
     * @covers ::__construct
     *
     * @return void
     */
    public function testOutputText(): void
    {
        $elementFactory = $this->createMock(ElementFactoryInterface::class);
        $element = $this->createMock(ElementInterface::class);
        $subject = new Output(
            $this->createMock(FormGeneratorInterface::class),
            $this->createMock(IoFactoryInterface::class),
            $this->createMock(ThemeInterface::class),
            $elementFactory
        );

        $content = 'foo';
        $newLine = false;
        $styleKey = 'baz';

        $elementFactory->expects(static::once())
            ->method('createText')
            ->with($content, $newLine, $styleKey)
            ->willReturn($element);

        $element->expects(static::once())
            ->method('render');

        $subject->outputText($content, $newLine, $styleKey);
    }

    /**
     * @covers ::outputTable
     * @covers ::canOutput
     * @covers ::__construct
     *
     * @return void
     */
    public function testOutputTable(): void
    {
        $elementFactory = $this->createMock(ElementFactoryInterface::class);
        $element = $this->createMock(ElementInterface::class);
        $subject = new Output(
            $this->createMock(FormGeneratorInterface::class),
            $this->createMock(IoFactoryInterface::class),
            $this->createMock(ThemeInterface::class),
            $elementFactory
        );

        $keys = ['foo-1'];
        $items = ['foo-1' => 'bar-1'];
        $tableCharacters = 'foo';
        $style = 'bar';
        $boxStyle = 'baz';
        $keyStyle = 'qux';

        $elementFactory->expects(static::once())
            ->method('createTable')
            ->with(
                $keys,
                $items,
                $tableCharacters,
                $style,
                $boxStyle,
                $keyStyle
            )->willReturn($element);

        $element->expects(static::once())
            ->method('render');

        $subject->outputTable(
            $keys,
            $items,
            $tableCharacters,
            $style,
            $boxStyle,
            $keyStyle
        );
    }

    /**
     * @covers ::outputList
     * @covers ::canOutput
     * @covers ::__construct
     *
     * @return void
     */
    public function testOutputList(): void
    {
        $elementFactory = $this->createMock(ElementFactoryInterface::class);
        $element = $this->createMock(ElementInterface::class);
        $subject = new Output(
            $this->createMock(FormGeneratorInterface::class),
            $this->createMock(IoFactoryInterface::class),
            $this->createMock(ThemeInterface::class),
            $elementFactory
        );

        $items = ['foo'];
        $style = 'bar';

        $elementFactory->expects(static::once())
            ->method('createList')
            ->with($items, $style)
            ->willReturn($element);

        $element->expects(static::once())
            ->method('render');

        $subject->outputList($items, $style);
    }

    /**
     * @covers ::outputExplainedList
     * @covers ::canOutput
     * @covers ::__construct
     *
     * @return void
     */
    public function testOutputExplainedList(): void
    {
        $elementFactory = $this->createMock(ElementFactoryInterface::class);
        $element = $this->createMock(ElementInterface::class);
        $subject = new Output(
            $this->createMock(FormGeneratorInterface::class),
            $this->createMock(IoFactoryInterface::class),
            $this->createMock(ThemeInterface::class),
            $elementFactory
        );

        $items = ['foo' => ['description' => 'bar']];
        $keyStyle = 'baz';
        $descriptionStyle = 'qux';

        $elementFactory->expects(static::once())
            ->method('createExplainedList')
            ->with($items, $keyStyle, $descriptionStyle)
            ->willReturn($element);

        $element->expects(static::once())
            ->method('render');

        $subject->outputExplainedList($items, $keyStyle, $descriptionStyle);
    }

    /**
     * @covers ::outputBlock
     * @covers ::canOutput
     * @covers ::__construct
     *
     * @return void
     */
    public function testOutputBlock(): void
    {
        $elementFactory = $this->createMock(ElementFactoryInterface::class);
        $element = $this->createMock(ElementInterface::class);
        $subject = new Output(
            $this->createMock(FormGeneratorInterface::class),
            $this->createMock(IoFactoryInterface::class),
            $this->createMock(ThemeInterface::class),
            $elementFactory
        );

        $content = 'foo';
        $style = 'bar';
        $padding = 'baz';
        $margin = 'qux';

        $elementFactory->expects(static::once())
            ->method('createBlock')
            ->with($content, $style, $padding, $margin)
            ->willReturn($element);

        $element->expects(static::once())
            ->method('render');

        $subject->outputBlock($content, $style, $padding, $margin);
    }

    /**
     * @covers ::outputProgressBar
     * @covers ::canOutput
     * @covers ::__construct
     *
     * @return void
     */
    public function testOutputProgressBar(): void
    {
        $elementFactory = $this->createMock(ElementFactoryInterface::class);
        $element = $this->createMock(ElementInterface::class);
        $subject = new Output(
            $this->createMock(FormGeneratorInterface::class),
            $this->createMock(IoFactoryInterface::class),
            $this->createMock(ThemeInterface::class),
            $elementFactory
        );

        $taskList = $this->createMock(TaskListInterface::class);
        $progressCharacters = 'foo';
        $textStyle = 'bar';
        $progressStyle = 'baz';

        $elementFactory->expects(static::once())
            ->method('createProgressBar')
            ->with($taskList, $progressCharacters, $textStyle, $progressStyle)
            ->willReturn($element);

        $element->expects(static::once())
            ->method('render');

        $subject->outputProgressBar(
            $taskList,
            $progressCharacters,
            $textStyle,
            $progressStyle
        );
    }

    /**
     * @covers ::write
     * @covers ::canOutput
     * @covers ::setOutputMode
     * @covers ::__construct
     *
     * @return void
     */
    public function testOutputMode(): void
    {
        $writer = $this->createMock(WriterInterface::class);
        $ioFactory = $this->createMock(IoFactoryInterface::class);
        $ioFactory->expects(static::once())
            ->method('createStandardWriter')
            ->willReturn($writer);

        $subject = new Output(
            $this->createMock(FormGeneratorInterface::class),
            $ioFactory,
            $this->createMock(ThemeInterface::class),
            $this->createMock(ElementFactoryInterface::class)
        );

        $input = 'foo';

        $writer->expects(static::exactly(3))
            ->method('write')
            ->with($input);

        $subject->write($input);
        $subject->write($input, 'text', true);
        $subject->setOutputMode(OutputModeEnum::OUTPUT_MODE_QUIET());
        $subject->write($input);
        $subject->write($input, 'text', true);
        $subject->setOutputMode(OutputModeEnum::OUTPUT_MODE_VERBOSE());
        $subject->write($input);
        $subject->write($input, 'text', true);
    }
}
