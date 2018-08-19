# sample-zoo-php
A simple vanilla PHP app that leverages RAPID for authoring

## To run this app

- Ensure PHP is installed (v5.4+ is recommended)
- Run AEM
- Install RAPID
- This app uses custom AEM components:
    - The AEM package that contains those components is located under the `./aem_content` directory
    - Upload and install the AEM package (e.g. using AEM's package manager)
- Adjust values in `includes/config.php` if needed
- If you are running **PHP v5.4+** _(recommended)_
    - Open a terminal/cmd window and cd to the directory containing this file
    - Ensure that `php` is in your `PATH` (Or use the absolute path to php)
    - Run `php -S 0.0.0.0:3000` to run a development server
    - Navigate to `http://localhost:3000`
- If you are running **PHP v5.3**
    - Copy the contents of this directory to your web server's www root
        - **Important**: Make sure the site is not accessible at a *context folder* (e.g. http://localhost:3000/**context/**). It must be accessible at your host root (e.g. http://localhost:3000/), otherwise your will need to [tweak the adapter](https://rapid.aandes.io/docs/guide/adapter/adapter/) to take the *context folder* into account
    - Navigate to your web server's URL
        - **Important**: Either change the port of your webserver to `3000` or navigate to http://localhost:4502/crx/de/index.jsp#/apps/sample-zoo-php/%40mirror/config and update the `site.http.host` property to reflect your server port

## Get started with RAPID

Check out the [RAPID getting started docs here](https://rapid.aandes.io).