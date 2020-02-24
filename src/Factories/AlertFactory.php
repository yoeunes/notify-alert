<?php

namespace Yoeunes\Notify\Alert\Factories;

use Yoeunes\Notify\Factories\BaseFactory;
use Yoeunes\Notify\Factories\Behaviours\MultipleNotificationAwareTrait;
use Yoeunes\Notify\Alert\Notifiers\Alert;

class AlertFactory extends BaseFactory
{
    use MultipleNotificationAwareTrait;

    private $notifications = [];

    public function notification($type, $message, $title = '', $context = [])
    {
        $notification = new Alert($type, $message, $title, $context);

        $this->notifications[] = $notification;

        return $notification;
    }

    public function render()
    {
        $notifications = $this->notificationsToString();
        $container = isset($this->config['container']) ? $this->config['container'] : 'body';

        return <<<HTML
<script type="application/javascript">
    let container = document.getElementById('$container');
    container.innerHTML = `$notifications`;
</script>
HTML;

    }

    public function getNotifications()
    {
        return $this->notifications;
    }
}
