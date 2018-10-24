<?php

namespace App\Listeners;

use App\Notifications\EmailVerificationNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

// implements ShouldQueue让这个监听器异步执行
class RegisteredListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 当事件被触发，对应该事件的监听器的handle()方法就会被调用
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // 获取刚刚注册的用户
        $user = $event->user;
        // 调用notify发送通知
        $user->notify(new EmailVerificationNotification());
    }
}
