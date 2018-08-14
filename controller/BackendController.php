<?php

require_once('dao/NoteDao.php');
require_once('dao/CommentDao.php');
require_once('service/ConnectionService.php');


class BackendController
{
    private $noteDao;
    private $commentDao;
    private $connectionService;

    public function __construct()
    {
        $this->noteDao = new NoteDao();
        $this->commentDao = new CommentDao();
        $this->connectionService = new ConnectionService();
    }


    public function adminHome()
    {
        if ($this->connectionService->isConnected()) {
            $notesHeader = $this->noteDao->findAll();
            $notes = $notesHeader;


            require('view/adminHome.php');
        } else {
            header('Location: ?action=loginDisplay');
        }

    }

    public function updateNoteDisplay($noteId)
    {
        if ($this->connectionService->isConnected()) {
            $notesHeader = $this->noteDao->findAll();
            $note = $this->noteDao->findById($noteId);

            require('view/updateNoteDisplay.php');
        } else {
            header('Location: ?action=loginDisplay');
        }

    }


    public function deleteNote($noteId)
    {
        if ($this->connectionService->isConnected()) {
            $this->noteDao->delete($noteId);
            header('Location:?action=adminHome');
        } else {
            header('Location: ?action=loginDisplay');
        }
    }

    public function manageCommentsDisplay($noteId)
    {
        if ($this->connectionService->isConnected()) {
            $notesHeader = $this->noteDao->findAll();
            $comments = $this->commentDao->findNotifiedComments($noteId);

            require('view/manageCommentsDisplay.php');
        } else {
            header('Location: ?action=loginDisplay');
        }

    }

    public function addNoteDisplay()
    {
        if ($this->connectionService->isConnected()) {
            $notesHeader = $this->noteDao->findAll();

            require('view/addNoteDisplay.php');
        } else {
            header('Location: ?action=loginDisplay');
        }


    }

    public function addNote($title, $content)
    {
        if ($this->connectionService->isConnected()) {
            $this->noteDao->create($title, $content);


            header('Location:?action=adminHome');
        } else {
            header('Location: ?action=loginDisplay');
        }

    }

    public function updateNote($title, $content, $noteId)
    {
        if ($this->connectionService->isConnected()) {
            $this->noteDao->update($title, $content, $noteId);

            header('Location:?action=adminHome');
        } else {
            header('Location: ?action=loginDisplay');
        }

    }

    public function keepComment($commentId, $noteId)
    {
        if ($this->connectionService->isConnected()) {
            $this->commentDao->keep($commentId);

            header('Location:?action=manageCommentsDisplay&noteId=' . $noteId);
        } else {
            header('Location: ?action=loginDisplay');
        }

    }

    public function removeComment($commentId, $noteId)
    {
        if ($this->connectionService->isConnected()) {
            $this->commentDao->delete($commentId);

            header('Location:?action=manageCommentsDisplay&noteId=' . $noteId);

        } else {
            header('Location: ?action=loginDisplay');
        }

    }


}
