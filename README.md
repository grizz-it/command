[![Build Status](https://travis-ci.com/grizz-it/command.svg?branch=master)](https://travis-ci.com/grizz-it/command)

# GrizzIT Command

This package supplies command routing for PHP applications.

## Installation

To install the package run the following command:

```
composer require grizz-it/command
```

## Usage

### CommandInterface

This package contains an [interface](src/Common/Command/CommandInterface.php)
which can be used to describe the execution of a command.

### IO

There are two classes which can be used in a CLI environment to determine the
input and output when executing a script. The [input](src/Component/Command/Input.php)
can be used as an data access object to retrieve whatever is passed to the
script. The [output](src/Component/Command/Output.php) contains an
implementation of all elements from the `grizz-it/cli` package. This can be used
to quickly create nice output in a command.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed
recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and
[CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## MIT License

Copyright (c) GrizzIT

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
