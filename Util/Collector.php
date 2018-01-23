<?php

namespace NTI\MetricsBundle\Util;

/**
 * Collector interface.
 */
interface Collector
{
    /**
     * Updates a counter by some arbitrary amount.
     *
     * @param string $variable
     * @param int    $value    The amount to increment the counter by
     */
    public function measure($variable, $value);

    /**
     * Increments a counter.
     *
     * @param string $variable
     */
    public function increment($variable);

    /**
     * Decrements a counter.
     *
     * @param string $variable
     */
    public function decrement($variable);

    /**
     * Records a timing.
     *
     * @param string $variable
     * @param int    $time     The duration of the timing in milliseconds
     */
    public function timing($variable, $time);

    /**
     * Updates a gauge by an arbitrary amount.
     *
     * @param string $variable
     * @param int    $value
     */
    public function gauge($variable, $value);

    /**
     * Sends the metrics to the adapter backend.
     */
    public function flush();
}
