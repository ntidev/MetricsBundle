# MetricsBundle
StatsD Client

### Installation

1. Install the bundle using composer:

    ```
    $ composer require nti/metrics-bundle "dev-master"
    ```

2. Add the bundle configuration to the AppKernel

    ```
    public function registerBundles()
    {
        $bundles = array(
            ...
            new NTI\MetricsBundle\NTIMetricsBundle(),
            ...
        );
    }

3. Setup the configution in the ``config.yml``

```
# NTI Metrics

nti_metrics:
    host: "statsDserver" # default: localhost
    port: 8125         # default: 8125
    prefix: "greenlink"  # default: ""
```

### Usage

1. Get the Metrics Client service

```
$collector = $container->get('nti.metrics');
```

The following methods are available for send metrics:

```
$collector->increment('glbs.email.send');            # Same as send "glbs.email.send:1|c"
$collector->decrement('glbs.email.send');            # Same as send "glbs.email.send:-1|c"
```
