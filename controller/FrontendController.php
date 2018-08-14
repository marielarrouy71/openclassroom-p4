<?php

require_once('dao/NoteDao.php');
require_once('dao/CommentDao.php');
require_once('dao/UserDao.php');

class FrontendController
{
    private $noteDao;
    private $commentDao;
    private $userDao;

    public function __construct()
    {
        $this->noteDao = new NoteDao();
        $this->commentDao = new CommentDao();
        $this->userDao = new UserDao();
    }

    public function home()
    {
        $notes = $this->noteDao->findAll();
        $notesHeader = $notes;

        require('view/home.php');
    }

    public function detailNote($noteId)
    {
        $notesHeader = $this->noteDao->findAll();
        $note = $this->noteDao->findById($noteId);
        $comments = $this->commentDao->findByNoteId($noteId);


        require('view/detail.php');
    }

    public function addComment($title, $content, $author, $noteId)
    {

        $this->commentDao->create($title, $content, $author, $noteId);
        header('Location:?action=detailNote&noteId=' . $noteId);

    }

    public function notifyComment($commentId, $noteId)
    {

        $this->commentDao->notify($commentId);
        header('Location:?action=detailNote&noteId=' . $noteId);


    }

    public function loginDisplay()
    {
        require('view/login.php');
    }

    public function login($pseudo, $password)
    {
        $user = $this->userDao->findByPseudo($pseudo);
        if (password_verify($password, $user->getPassword())) {
            setcookie('projet4', 'projet4', time() + 30);
            header('Location: ?action=adminHome');
        } else {
            header('Location: ?action=loginDisplay');
        }
    }


}
