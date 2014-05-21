ZF2Booster
==========

This is a simple module to setup 2 different Caching mechanizm in ZF2 to speed up the performance of your website.

First : filesystem

for this create a folder cache.

```

> mkdir data/cache

```

Now give permission 0777 to cache folder.

```

> sudo chmod -R 0777 data/cache

```

Now you can use filesystem cache in your system.

Settings of filesystem cache:

```php

//ZF2Booster/config/booster.config.php

'fileCache' => array(
                    'cache_dir' => './data/cache',
                    'namespace' => 'systemCache',
                    'dir_level' => 2,
                    'filePermission' => 0666,
                    'dirPermission' => 0755
                    ),

```

These are the default filesystem cache settings.

Use:

```php
//ZF2Booster/src/ZF2Booster/Controller/ZF2BoosterController.php

// store item in filesystem cache
        $this->getServiceLocator()->get('Zend\Cache\Storage\Filesystem')->setItem('foo', 'taxi');
        

```

This is how you can store items in the filesystem cache.

```php
//ZF2Booster/src/ZF2Booster/Controller/ZF2BoosterController.php

 // get item in filesystem cache
        echo 'Cached Item is:- '.$this->getServiceLocator()->get('Zend\Cache\Storage\Filesystem')->getItem('foo');
        

```

This how you can get the items.

Second: memcached

This is a distributed memory object caching system

to use this cache you have to install PHP ext/memcached extension. 

```

> sudo apt-get update
> sudo apt-get install memcached
> sudo apt-get install php5-memcache
> sudo apt-get install php5-memcached

```

That's it now you can use memcached 

Settings:

```php
//ZF2Booster/config/booster.config.php

    'memcached' => array(
    	           'lifetime' => 7200,
                    'options' => array(
                                'servers'   => array(
                                    array(
                                        '127.0.0.1',11211 // For me my localhost is my memcached server.
                                    )
                                ),
                                'namespace'  => 'SystemMemCache',
                                'liboptions' => array (
                                    'COMPRESSION' => true,
                                    'binary_protocol' => true,
                                    'no_block' => true,
                                    'connect_timeout' => 100
                                )
                            )

```
These are the default settings for memcached

Use:


```php
//ZF2Booster/src/ZF2Booster/Controller/ZF2BoosterController.php

// store item in memcached cache
        $this->getServiceLocator()->get('Zend\Cache\Storage\Memcached')->setItem('foo', 'taxi');
        

```

This is how you can store items in the memcached.

```php
//ZF2Booster/src/ZF2Booster/Controller/ZF2BoosterController.php

 // get item in memcached cache
        echo 'Cached Item is:- '.$this->getServiceLocator()->get('Zend\Cache\Storage\Memcached')->getItem('foo');
        

```

This how you can get the items.


Final note:-

I have created these two cache service so that you can use them throught the application. for more information visit 

http://framework.zend.com/manual/2.0/en/modules/zend.cache.storage.adapter.html
