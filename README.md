# MetricsBundle
StatsD Client

### Installation

1. Install the bundle using composer:

    ```bash
    $ composer require nti/metrics-bundle "dev-master"
    ```

2. Add the bundle configuration to the AppKernel

    ```php
    public function registerBundles()
    {
        $bundles = array(
            ...
            new NTI\MetricsBundle\NTIMetricsBundle(),
            ...
        );
    }

3. Setup the configuration in the ``config.yml``

```yaml
# NTI Metrics

nti_metrics:
    host: "statsDserver" # default: localhost
    port: 8125           # default: 8125
    prefix: "greenlink." # default: ""
```

### Usage

1. Get the Metrics Client service

```php
$collector = $container->get('nti.metrics');
```

The following methods are available for send metrics:

```php
$collector->increment('glbs.email.send');            # Same as send "glbs.email.send:1|c"
$collector->decrement('glbs.email.send');            # Same as send "glbs.email.send:-1|c"
```

To send the values to statsD server you have to call the following method:

```php
$collector->flush();
```
