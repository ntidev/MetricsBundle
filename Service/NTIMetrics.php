<?php
/**
 * Created by PhpStorm.
 * User: hector
 * Date: 1/22/18
 * Time: 8:11 AM
 */

namespace NTI\MetricsBundle\Service;

use NTI\MetricsBundle\Util\Collector;
use NTI\MetricsBundle\Util\StatsD;

class NTIMetrics implements Collector
{

    /**
     * @var Collector $statsDCollector
     */
    private $statsDCollector;

    /**
     * NTIMetrics constructor.
     * @param string $host
     * @param string $port
     * @param string $prefix
     */
    public function __construct($host = 'localhost', $port = '8125', $prefix = '')
    {
       $this->statsDCollector = new StatsD($host, $port, $prefix);
    }


    /**
     * Updates a counter by some arbitrary amount.
     *
     * @param string $variable
     * @param int $value The amount to increment the counter by
     */
    public function measure($variable, $value)
    {
        $this->statsDCollector->measure($variable, $value);
    }

    /**
     * Increments a counter.
     *
     * @param string $variable
     */
    public function increment($variable)
    {
        $this->statsDCollector->increment($variable);
    }

    /**
     * Decrements a counter.
     *
     * @param string $variable
     */
    public function decrement($variable)
    {
        $this->statsDCollector->decrement($variable);
    }

    /**
     * Records a timing.
     *
     * @param string $variable
     * @param int $time The duration of the timing in milliseconds
     */
    public function timing($variable, $time)
    {
        $this->statsDCollector->timing($variable, $time);
    }

    /**
     * Sends the metrics to the adapter backend.
     */
    public function flush()
    {
        $this->statsDCollector->flush();
    }
}