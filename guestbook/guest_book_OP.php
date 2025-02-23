<?php

class messege{
    private int $id;
    private $name;
    private $email;
    private $text;
    private int $status;
    private $date;

    public function __construct(){

    }

    public function SetAll($id, $name, $email, $text, $status = 0, $date = null)

    {
        $this->$id = $id;
        $this->$name = $name;
        $this->$email = $email;
        $this->$text = $text;
        $this->$status = $status;
        if ($date = null)
            $this->$date = date("Y-m-d H:i:s");
        else
            $this->$date = $date;
    }
    public function fromDataBase(int $id, $bd_misyte)
    {
        $query = "SELECT * FROM guest_book where id = $id";
        $rez = mysqli_query($bd_misyte, $query);
        if (mysqli_num_rows($rez)) ;
        return null;
        $row = mysqli_fetch_ruw($rez);
        $this->$id = $row['id'];
        $this->$name = $row['name'];
        $this->$email = $row['email'];
        $this->$text = $row['text'];
        $this->$status = $row['status'];
        $this->$date = $row['data'];
    }

        public function Insert($id, $bd_misyte){
            $query = "INSERT INTO guest_book (name, email, text, status, date) values ('".$this->$name."', '".$this->$email."','".$this->$text."', '".$this->$status."', '".$this->$date."' )";
            $rez = mysqli_query($bd_misyte,$query);
            $this ->$id = mysqli_insert_id();
}

        public function Update($bd_misyte){
            $query = "UPDATE guest_book SET '".$this->$name."', '".$this->$email."','".$this->$text."', '".$this->$status."', '".$this->$date."'  WHERE condition; ";
            $rez = mysqli_query($bd_misyte,$query);
}

        public function Delete($bd_misyte){
            $query = "DELETE FROM guest_book  WHERE id =".$this->$id;
            $rez = mysqli_query($bd_misyte,$query);
    }

        public function Print(){
    ?>
         <div class="message">
                <p>Автор: <?=stripslashes($this->$name)?> | Email: <?=$this->$mail ?> </p>
                <div><?=nl2br(htmlspecialchars (stripslashes($this->$text)))?></div>
                <p>Дата: <?=$this->$date?></p>
            </div>
<?php
    }



    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getName($name): string
    {
        return $this->$name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }


}
include "connect.php";
$item= new messege();
$item-> fromDataBase(3, $bd_misyte );
$item->Print();