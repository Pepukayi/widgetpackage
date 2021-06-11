<?php

//namespace Tests\Feature;

use Orchestra\Testbench\TestCase;

class WidgetTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Pesto\Widget\WidgetServiceProvider::class
        ];
    }

    /**
     * @test
     */
    public function it_compiles_the_widget_blade_directive()
    {
        $string = "@widget('Pesto\Widget\Tests\TestWidget')";
        $expected = "<?= resolve('Pesto\Widget\Tests\TestWidget')->loadView(); ?>";

        $compiled = resolve('blade.compiler')->compileString($string);

        $this->assertEquals($expected, $compiled);
    }
}
