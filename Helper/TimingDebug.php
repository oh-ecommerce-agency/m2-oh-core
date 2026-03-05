<?php

namespace OH\Core\Helper;

/**
 * Usage: Use it in any class that has $this->_logger
 *
 * use TimingDebug;
 * $this->startTimer('getProduct');
 * ....
 * $this->endTimer('getProduct');
 */
trait TimingDebug
{
    private array $timings = [];

    private function startTimer(string $label): void
    {
        $this->timings[$label] = microtime(true);
    }

    private function endTimer(string $label): void
    {
        $elapsed = round((microtime(true) - $this->timings[$label]) * 1000, 2);
        $this->_logger->debug("[Timing] {$label}: {$elapsed}ms");
        unset($this->timings[$label]);
    }
}