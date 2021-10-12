<?php

namespace OmarEhab\Aramex\API\Response;

use OmarEhab\Aramex\API\Classes\Notification;
use OmarEhab\Aramex\API\Classes\Transaction;

abstract class Response
{
    private Transaction $transaction;
    private array $notifications;
    private bool $hasErrors;

    /**
     * @return Transaction
     */
    public function getTransaction(): Transaction
    {
        return $this->transaction;
    }

    /**
     * @param Transaction $transaction
     * @return $this
     */
    public function setTransaction(Transaction $transaction): Response
    {
        $this->transaction = $transaction;
        return $this;
    }

    /**
     * @return Notification[]
     */
    public function getNotifications(): array
    {
        return $this->notifications;
    }

    /**
     * @param Notification[] $notifications
     * @return $this
     */
    public function setNotifications(array $notifications): Response
    {
        $this->notifications = $notifications;
        return $this;
    }

    /**
     * @param Notification[] $notifications
     * @return $this
     */
    public function addNotifications(array $notifications): Response
    {
        $this->notifications = array_merge(($this->notifications ?? []), $notifications);
        return $this;
    }

    /**
     * @return bool
     */
    public function getHasErrors(): bool
    {
        return $this->hasErrors;
    }

    /**
     * @param bool $hasErrors
     * @return $this
     */
    public function setHasErrors(bool $hasErrors): Response
    {
        $this->hasErrors = $hasErrors;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return !$this->hasErrors;
    }

    public function getNotificationMessages(): array
    {
        return collect($this->getNotifications())->keyBy(function (Notification $notification) {
            return $notification->getCode();
        })->map(function (Notification $notification) {
            return $notification->getMessage();
        })->toArray();
    }

    public function getMessages(): array
    {
        return array_map(function (Notification $notification) {
            return $notification->getMessage();
        }, $this->getNotifications());
    }

    /**
     * @return bool
     */
    public function isFail(): bool
    {
        return $this->hasErrors;
    }

    protected function parse($obj): Response
    {
        $this->setHasErrors($obj->HasErrors)
            ->setTransaction(Transaction::parse($obj->Transaction))
            ->setNotifications(Notification::parseArray($obj->Notifications));

        return $this;
    }

    public static abstract function make($obj);
}