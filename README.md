symfony2-slug
=============
<p>Slug as a service</p>
<br>
<h3>Usage</h3>
1. Add Utils folder to YOUR_BUNDLE
2. Add in /src/../config/services.yml: <br />
<pre>
parameters:
&nbsp;&nbsp;acme.text.class: Acme\WebBundle\Utils\Text<br>
services:
&nbsp;&nbsp;acme.helper.text:
&nbsp;&nbsp;&nbsp;&nbsp;class: %acme.text.class%
</pre><br />
3. After use in controller according your logic as you want <br />
<code>
<?php
$helper = $this->get('optimum.helper.text');<br>
$data->setSlug($helper::urlFormat($data->getId().'-'.$data->getTitle()));
</code><br />

<h3>Functionality</h3>
- Translation (russian, german and etc, except chinese japanese, thai... and other asian and Arabyan countries)
- Url format (validation on an allowed values)
- Cut too long url by words
