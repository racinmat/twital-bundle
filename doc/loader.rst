Add your own source adapter
###########################


The recommended way to add your TwitalSourceAdapter_ to ``TwitalLoader`` is registering it using the 
`Symfony2 dependency injection <http://symfony.com/doc/current/components/dependency_injection/index.html>`__ system.

Depending on your preferences, you can choose which syntax to adopt.

Using XML:

.. code-block:: xml

    <service id="my.source_adapter" class="...mySourceAdapterClass...">
        
    </service>
    
Using YAML:

.. code-block:: yaml

    services:
        my.source_adapter:
            class: ...mySourceAdapterClass...                   

Using PHP:

.. code-block:: php
    
    <?php
    
     $container
        ->register('my.source_adapter', '...mySourceAdapterClass...')
    ;

    
Once you have added one of this configurations to your bundle, choose which 
file name pattern will activate the loader. To do this you have to edit your ``config.yml``. 

.. code-block:: yaml

    goetas_twital:
        source_adapter:
            my.source_adapter: ['/\.myext1\.twital$/', '/\.myext2\.twital$/']
            
Alternative way to add your source adapter            
------------------------------------------

If you prefer to use the Symfony2 service tagging system, you can also use the following method:

You have to add your adapters as services and tag them with ``twital.source_adapter``, 
and you also have to specify the ``pattern`` attribute.
 
Using XML:

.. code-block:: xml

    <service id="my.source_adapter" class="...mySourceAdapterClass...">
        <tag name="twital.source_adapter" pattern="/\.xml\.twtal$/i" />
    </service>
    
Using YAML:

.. code-block:: yaml

    services:
        my.source_adapter:
            class: ...mySourceAdapterClass...
            tags:
                - { name: twital.source_adapter, pattern: '/\.xml\.twtal$/i' }
                   

Using PHP:

.. code-block:: php
    
    <?php
    
     $container
        ->register('my.source_adapter', '...mySourceAdapterClass...')
        ->addTag('twital.source_adapter', array('pattern' => '/\.xml\.twtal$/i'))
    ;

        
.. _`TwitalSourceAdapter`: http://twital.readthedocs.org/en/latest/api.html#creating-a-sourceadpater   
