<?php
declare(strict_types=1);

namespace App\Infrastructure\UnityOfWork;

interface UnityOfWorkInterface
{
    public function commit(): void;

    public function clear(): void;

    public function rollback(): void;
}
