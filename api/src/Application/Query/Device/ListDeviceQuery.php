<?php
declare(strict_types=1);

namespace App\Application\Query\Device;

use App\Application\Query\QueryInterface;
use Symfony\Component\HttpFoundation\Request;

class ListDeviceQuery implements QueryInterface
{
    /**
     * @var Request
     */
    private $request;

    /**
     * ListDeviceQuery constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return Request
     */
    public function request(): Request
    {
        return $this->request;
    }
}