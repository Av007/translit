symfony2-slug
=============
<pre>Slug as a service</pre>
<br>
<h3>Usage</h3>
1. Add Utils folder to YOUR_BUNDLE
2. Add in /src/../config/services.yml <br />
<pre>
parameters:
  acme.text.class: Acme\WebBundle\Utils\Text

services:
  acme.helper.text:
    class: %acme.text.class%
</pre><br />
3. After use in controller according your logic as you want <br />
<pre>
$data->setSlug($helper::urlFormat($data->getId().'-'.$data->getTitle()));
</pre><br />

<h3>Functionality</h3>
- Translation (russian, german and etc, except chinese japanese, thai... and other asian and Arabyan countries)
- Url format (validation on an allowed values)
- Cut too long url by words
