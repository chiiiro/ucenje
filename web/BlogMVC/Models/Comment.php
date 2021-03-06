<?php

namespace Models;

class Comment {

    private $commid;
    private $postid;
    private $content;
    private $userid;

    /**
     * @return mixed
     */
    public function getCommid()
    {
        return $this->commid;
    }

    /**
     * @param mixed $commid
     */
    public function setCommid($commid)
    {
        $this->commid = $commid;
    }

    /**
     * @return mixed
     */
    public function getPostid()
    {
        return $this->postid;
    }

    /**
     * @param mixed $postid
     */
    public function setPostid($postid)
    {
        $this->postid = $postid;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

}