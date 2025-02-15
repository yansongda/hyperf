<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Hyperf\DB\PgSQL;

use Hyperf\Contract\ConnectionInterface;
use Hyperf\DB\Pool\Pool;

class PgSQLPool extends Pool
{
    protected function createConnection(): ConnectionInterface
    {
        if (SWOOLE_MAJOR_VERSION < 5) {
            return new Swoole4PgSQLConnection($this->container, $this, $this->config);
        }
        return new PgSQLConnection($this->container, $this, $this->config);
    }
}
