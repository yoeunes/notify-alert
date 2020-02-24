<?php

namespace Yoeunes\Notify\Alert\Notifiers;

use Yoeunes\Notify\Notifiers\BaseNotification;

class Alert extends BaseNotification
{
    public function getNotifier()
    {
        return 'alert';
    }

    public function render()
    {
        return <<<HTML
<div class="alert alert-{$this->getType()}" role="alert">
  <h4 class="alert-heading">{$this->getTitle()}</h4>
  <p>{$this->getMessage()}</p>
</div>
HTML;
    }
}
