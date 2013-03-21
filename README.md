symfony2-slug
=============
<h1>Slug as a service</h1>
<br>
<h3>Usage</h3>
1. Add Utils folder to YOUR_BUNDLE
2. Add in /src/../config/services.yml <br />
<code>
parameters:
  acme.text.class: Acme\WebBundle\Utils\Text

services:
  acme.helper.text:
    class: %acme.text.class%
</code><br />
3. After use in controller according your logic as you want <br />
<code>$data->setSlug($helper::urlFormat($data->getId().'-'.$data->getTitle()));</code><br />
