<?php

require_once('model/Comment.php');
require_once('BaseDao.php');
class CommentDao extends BaseDao
{
    public function findArray()

    {
        $commentsDb=$this->db->query('select * from comments')->fetch_all(MYSQLI_ASSOC);

        $comments = array();
        foreach ($commentsDb as $comment){
            array_push($comments, new Comment($comment['id'], $comment['title'], $comment['content'], $comment['date']));

        }

        return $comments;

    }
    public function findByNoteId($noteId)

    {

        $commentsDb=$this->db->query('select * from comment where note_id='.$noteId)->fetch_all(MYSQLI_ASSOC);
        $comments = array();
        foreach ($commentsDb as $comment){
            array_push($comments, new Comment($comment['id'], $comment['title'], $comment['content'], $comment['author'], $comment['date'], $comment['is_notified'], $comment['note_id']));

        }

        return $comments;



    }
    
      public function findNotifiedComments($noteId)
    {
         
        $commentsDb=$this->db->query('select * from comment where is_notified=1 and  note_id='.$noteId)->fetch_all(MYSQLI_ASSOC);
        $comments = array();
        foreach ($commentsDb as $comment){
            array_push($comments, new Comment($comment['id'], $comment['title'], $comment['content'], $comment['author'], $comment['date'], $comment['is_notified'], $comment['note_id']));

        }

        return $comments;

    }

    public function create($title,$content,$author,$noteId)
    {
        $query=$this->db->prepare("insert into comment(title,content,author,date,is_notified,note_id) values(?,?,?,NOW(),0,?)  ");
        $query->bind_param('ssss',$title,$content,$author,$articleId);
$query->execute();

    }
    
    

    public function update()
    {


    }
    
    

    
    public function delete($commentId)
    {


    }
    
      public function notify($commentId)
    {
         
       $query=$this->db->prepare("update comment set is_notified=1 where id=?");
           $query->bind_param('s',$commentId);
                     $query->execute();

    }

   







































}
