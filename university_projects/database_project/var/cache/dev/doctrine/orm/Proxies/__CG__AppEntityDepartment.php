<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Department extends \App\Entity\Department implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'manager', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'address', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'slots_count', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'equipments', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'startTransportOrder', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'endTransportOrders', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'startOrders', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'endOrders'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'manager', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'address', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'slots_count', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'equipments', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'startTransportOrder', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'endTransportOrders', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'startOrders', '' . "\0" . 'App\\Entity\\Department' . "\0" . 'endOrders'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Department $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getManager(): ?\App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getManager', []);

        return parent::getManager();
    }

    /**
     * {@inheritDoc}
     */
    public function setManager(?\App\Entity\User $manager): \App\Entity\Department
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setManager', [$manager]);

        return parent::setManager($manager);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddress(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddress', []);

        return parent::getAddress();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddress(string $address): \App\Entity\Department
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddress', [$address]);

        return parent::setAddress($address);
    }

    /**
     * {@inheritDoc}
     */
    public function getSlotsCount(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSlotsCount', []);

        return parent::getSlotsCount();
    }

    /**
     * {@inheritDoc}
     */
    public function setSlotsCount(int $slots_count): \App\Entity\Department
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSlotsCount', [$slots_count]);

        return parent::setSlotsCount($slots_count);
    }

    /**
     * {@inheritDoc}
     */
    public function getEquipments(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEquipments', []);

        return parent::getEquipments();
    }

    /**
     * {@inheritDoc}
     */
    public function addEquipment(\App\Entity\Equipment $equipment): \App\Entity\Department
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addEquipment', [$equipment]);

        return parent::addEquipment($equipment);
    }

    /**
     * {@inheritDoc}
     */
    public function removeEquipment(\App\Entity\Equipment $equipment): \App\Entity\Department
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeEquipment', [$equipment]);

        return parent::removeEquipment($equipment);
    }

    /**
     * {@inheritDoc}
     */
    public function getStartTransportOrder(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStartTransportOrder', []);

        return parent::getStartTransportOrder();
    }

    /**
     * {@inheritDoc}
     */
    public function addStartTransportOrder(\App\Entity\TransportOrder $startTransportOrder): \App\Entity\Department
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addStartTransportOrder', [$startTransportOrder]);

        return parent::addStartTransportOrder($startTransportOrder);
    }

    /**
     * {@inheritDoc}
     */
    public function removeStartTransportOrder(\App\Entity\TransportOrder $startTransportOrder): \App\Entity\Department
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeStartTransportOrder', [$startTransportOrder]);

        return parent::removeStartTransportOrder($startTransportOrder);
    }

    /**
     * {@inheritDoc}
     */
    public function getEndTransportOrders(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEndTransportOrders', []);

        return parent::getEndTransportOrders();
    }

    /**
     * {@inheritDoc}
     */
    public function addEndTransportOrder(\App\Entity\TransportOrder $endTransportOrder): \App\Entity\Department
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addEndTransportOrder', [$endTransportOrder]);

        return parent::addEndTransportOrder($endTransportOrder);
    }

    /**
     * {@inheritDoc}
     */
    public function removeEndTransportOrder(\App\Entity\TransportOrder $endTransportOrder): \App\Entity\Department
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeEndTransportOrder', [$endTransportOrder]);

        return parent::removeEndTransportOrder($endTransportOrder);
    }

    /**
     * {@inheritDoc}
     */
    public function getStartOrders(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStartOrders', []);

        return parent::getStartOrders();
    }

    /**
     * {@inheritDoc}
     */
    public function addStartOrder(\App\Entity\OrderT $startOrder): \App\Entity\Department
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addStartOrder', [$startOrder]);

        return parent::addStartOrder($startOrder);
    }

    /**
     * {@inheritDoc}
     */
    public function removeStartOrder(\App\Entity\OrderT $startOrder): \App\Entity\Department
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeStartOrder', [$startOrder]);

        return parent::removeStartOrder($startOrder);
    }

    /**
     * {@inheritDoc}
     */
    public function getEndOrders(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEndOrders', []);

        return parent::getEndOrders();
    }

    /**
     * {@inheritDoc}
     */
    public function addEndOrder(\App\Entity\OrderT $endOrder): \App\Entity\Department
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addEndOrder', [$endOrder]);

        return parent::addEndOrder($endOrder);
    }

    /**
     * {@inheritDoc}
     */
    public function removeEndOrder(\App\Entity\OrderT $endOrder): \App\Entity\Department
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeEndOrder', [$endOrder]);

        return parent::removeEndOrder($endOrder);
    }

}
