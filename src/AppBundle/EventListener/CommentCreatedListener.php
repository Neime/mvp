<?php

namespace AppBundle\EventListener;

use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use AppBundle\Entity\Comment;

/**
 * CommentCreated listener
 */
class CommentCreatedListener implements EventSubscriberInterface
{
    private $session;

    /**
     * {@inheritDoc}
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            'pre_comment_created' => 'increaseNumber',
            'post_comment_created' => 'flashMessage',
        );
    }

    /**
     * Comment created
     * @param Event $event
     */
    public function increaseNumber(GenericEvent $event)
    {
        $comment = $event->getSubject();

        if (!$comment instanceof Comment) {
            throw new Exception("Error Processing Request", 1);
        }

        $comment->getNews()->increaseNumberComment();
    }

    /**
     * Comment created
     * @param Event $event
     */
    public function flashMessage(GenericEvent $event)
    {
        $comment = $event->getSubject();

        if (!$comment instanceof Comment) {
            throw new Exception("Error Processing Request", 1);
        }

        $this->session->getFlashBag()->add('success', 'Comment created');
    }
}
