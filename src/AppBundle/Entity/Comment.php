<?php

namespace AppBundle\Entity;

/**
 * Comment
 */
class Comment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var News
     */
    private $news;

    /**
     * @var string
     */
    private $text;

    /**
     * @var \DateTime
     */
    private $date;

    public function __construct()
    {
        $this->date = new \DateTime();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set news
     *
     * @param News $news
     *
     * @return Comment
     */
    public function setNews(News $news)
    {
        $this->news = $news;

        return $this;
    }

    /**
     * Get news
     *
     * @return string
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Comment
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Comment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}

