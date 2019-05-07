<?php
class Comments extends Model{

    public $message;
    public function getComments($pID){
        
        $sql = "SELECT c.commentText, c.date, u.first_name, u.last_name, c.commentID, c.postID, c.uID
                FROM comments c 
                INNER JOIN users u 
                ON c.uID = u.uID
                WHERE c.postID = {$pID}
                ORDER BY c.date";
        
        

       // $sql = 'SELECT * from comments';
       /*
        $results = $this->db->getrow($sql);
        $comments = $results;

        return $comments;
*/

        $results = $this->db->execute($sql,array());
        
      
    
        while ($row=$results->fetchrow()) {
            $posts[] = $row;
        }

        return $posts;
    }

    public function setComment($message){
        $this->$message = $message;
        
    }

    public function postComments($pID , $uID, $message){
       $sql = "INSERT INTO `comments`(`uID`, `commentText`, `date`, `postID`) VALUES (?,?,'' ,?)";
       
        $this->db->execute($sql,array($uID, $message, $pID));
        $message = 'Comment added.';
        return $message;

    }
    
    public function deleteComments($uID, $commentID, $pID){
        $sql = "DELETE FROM comments WHERE postID = ? AND commentID = ?";
        $this->db->execute($sql, array($pID, $commentID));
        $message = "Message Deleted.";
        return $message;
    }
    
    
}