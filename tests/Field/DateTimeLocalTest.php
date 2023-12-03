<?php

declare(strict_types=1);

namespace Yiisoft\Form\Tests\Field;

use PHPUnit\Framework\TestCase;
use Yiisoft\Form\Field\Base\InputData\PureInputData;
use Yiisoft\Form\Field\DateTimeLocal;
use Yiisoft\Form\ThemeContainer;
use Yiisoft\Test\Support\Container\SimpleContainer;
use Yiisoft\Widget\WidgetFactory;

final class DateTimeLocalTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        WidgetFactory::initialize(new SimpleContainer());
        ThemeContainer::initialize();
    }

    public function testBase(): void
    {
        $inputData = new PureInputData(
            name: 'partyDate',
            value: '2017-06-01T08:30',
            label: 'Date of party',
            hint: 'Party date.',
            id: 'datetimelocalform-partydate',
        );

        $result = DateTimeLocal::widget()->inputData($inputData)->render();

        $expected = <<<HTML
            <div>
            <label for="datetimelocalform-partydate">Date of party</label>
            <input type="datetime-local" id="datetimelocalform-partydate" name="partyDate" value="2017-06-01T08:30">
            <div>Party date.</div>
            </div>
            HTML;

        $this->assertSame($expected, $result);
    }
}