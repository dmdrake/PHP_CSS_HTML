<?php
class Post extends Model{

    public function getAllPosts($limit = 0){

      if($limit > 0){
        $numposts = ' LIMIT '.$limit;
      }

      $sql =  'SELECT p.pID, p.title, p.content, p.uid, p.categoryid, p.date, c.name as name, u.first_name, u.last_name
      FROM posts p
		  INNER JOIN categories c on c.categoryid = p.categoryid
		  INNER JOIN users u on u.uid = p.uid
      ORDER BY date DESC'.$numposts;

      $results = $this->db->execute($sql);
      while ($row=$results->fetchrow()) {
            $posts[] = $row;
        }
      return $posts;
    }

  public function getPost($pID){
    $sql = 'SELECT p.pID, p.title, p.content, p.uid, p.categoryid, p.date, c.name as name, u.first_name, u.last_name
    FROM posts p
		INNER JOIN categories c on c.categoryid = p.categoryid
		INNER JOIN users u on u.uid = p.uid
		WHERE p.pID = ?';

    $results = $this->db->getrow($sql, array($pID));
    $post = $results;
    return $post;
  }

  public function getUserPosts($uID){

    $sql = 'SELECT *
    FROM posts
    WHERE uID = ?';
    $results = $this->db->execute($sql, $uID);
    while ($row=$results->fetchrow()) {
      $posts[] = $row;
      }

      return $posts;
    }

    public function getAllPostsByCategory($data){

            $sql =  'SELECT pID, title, content,date,users.uID,posts.categoryID,users.first_name,users.last_name,categories.name FROM posts, users, categories
    WHERE users.uID = posts.uID AND posts.categoryID = categories.categoryID AND categories.categoryID = ?';
            // perform query
            $results = $this->db->execute($sql,$data);

            while ($row=$results->fetchrow()) {
                $posts[] = $row;
            }

            return $posts;
        }


    public function addPost($data){

      $sql='INSERT INTO posts (title,content,categoryID,date,uID)
      VALUES (?,?,?,?,1)';

      $outcome = $this->db->execute($sql,$data);
      $message = 'Post added!';
      return $message;

    }

    public function updatePost($data) {

      $sql = 'UPDATE posts
      SET title = ?, content = ?, categoryID = ?, date = ?
      WHERE pID = ?';

      $this->db->execute($sql, $data);
      $message = "Post updated!";
      return $message;
    }

    public function deletePost($pID) {

      $sql = 'DELETE FROM posts
      WHERE pID = ?';

      $this->db->execute($sql,$pID);
      $message = "Post deleted!";
      return $message;
    }
}

?>
