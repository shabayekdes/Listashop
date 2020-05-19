<?php

namespace Payment;

class PaymentManager
{
    /**
     * Payment Driver Name.
     *
     * @var string
     */
    protected $driver;

    /**
     * Payment Driver Instance.
     *
     * @var object
     */
    protected $driverInstance;

    /**
     * Set the value of driver
     *
     * @param $driver
     *
     * @return $this
     */
    public function via($driver)
    {
        $this->driver = $driver;

        return $this;
    }


}
