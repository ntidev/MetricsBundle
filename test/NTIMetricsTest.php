<?php
/**
 * Created by PhpStorm.
 * User: hector
 * Date: 1/24/18
 * Time: 8:21 AM
 */

namespace NTI\MetricsBundle\Test;


use NTI\MetricsBundle\Service\NTIMetrics;
use NTI\MetricsBundle\Util\Collector;
use PHPUnit\Framework\TestCase;

class NTIMetricsTest extends TestCase
{

    public function testInstanceOf()
    {
        $ntiMetrics = new NTIMetrics();
        $this->assertInstanceOf(Collector::class, $ntiMetrics);
    }

}