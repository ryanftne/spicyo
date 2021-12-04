<?php

require 'DatabaseConnect.php';

class DatabaseFunction
{
    private $login;
    private $db;

    public function __construct()
    {
        $this->login = new DatabaseConnect('restaurant');
        $this->db = $this->login->db_connect();
    }

    public function selectUser($user_id)
    {
        $sth = $this->db->prepare('SELECT *
        FROM User
        WHERE id = :id_user');
        $sth->execute(array('id_user' => $user_id));
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectAllMenu()
    {
        $sth = $this->db->prepare('SELECT *
        FROM Menu');
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    public function selectAllChicha()
    {
        $sth = $this->db->prepare('SELECT *
        FROM Chicha');
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    public function selectMenu($menu_id)
    {
        $sth = $this->db->prepare('SELECT name, image, price, score, status
        FROM Menu
        WHERE id = :id_menu');
        $sth->execute(array(':id_menu' => $menu_id));
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectPanier($user_id)
    {
        $sth = $this->db->prepare('SELECT panier
        FROM Panier
        WHERE user = :id_user');
        $sth->execute(array(':id_user' => $user_id));
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function insertPanier($user_id)
    {
        $new_panier = $user_id * 93;
        $sth = $this->db->prepare('INSERT INTO Panier(panier, user) VALUES(?,?)');
        $sth->execute(array($new_panier, $user_id));
    }

    public function insertPanier_menu($panier_id, $menu_id)
    {
        $sth = $this->db->prepare('INSERT INTO Panier_menu(panier_id, menu_id) VALUES (?,?)');
        $sth->execute(array($panier_id, $menu_id));
    }

    public function selectPanier_menu($panier_id)
    {
        $sth = $this->db->prepare('SELECT id, menu_id
        FROM Panier_menu
        WHERE panier_id = :panier_id');
        $sth->execute(array(':panier_id' => $panier_id));
        $result = $sth->fetchAll();

        return $result;
    }

    public function updateMenu($menu_id, $menu_name, $menu_price, $menu_score, $menu_status)
    {
        $sth = $this->db->prepare('UPDATE Menu
        SET name=:menu_name, price=:menu_price, score=:menu_score, status=:menu_status
        WHERE id=:menu_id');
        $sth->execute(array(':menu_name' => $menu_name, ':menu_price' => $menu_price, ':menu_score' => $menu_score, ':menu_status' => $menu_status, ':menu_id' => $menu_id));
    }

    public function deleteFromPanier_menu($id_panier_menu)
    {
        $sth = $this->db->prepare('DELETE
        FROM Panier_menu
        WHERE id = :id');
        $sth->execute(array(':id' => $id_panier_menu));
    }

    public function insertOrder($user_id, $food_order, $today, $status)
    {
        $sth = $this->db->prepare('INSERT INTO Food_order(user, food_order, datetime, status) VALUES (?,?,?,?)');
        $sth->execute(array($user_id, $food_order, $today, $status));
    }

    public function selectFood_order($user_id)
    {
        $sth = $this->db->prepare('SELECT *
        FROM Food_order
        WHERE user = :id_user');
        $sth->execute(array('id_user' => $user_id));
        $result = $sth->fetchAll();
        return $result;
    }

    public function login($email, $password)
    {
        $sth = $this->db->prepare('SELECT *
        FROM User
        WHERE email = :user_email AND password = :user_password');
        $sth->execute(array('user_email' => $email, 'user_password' => $password));
        $count = $sth->rowCount();
        $result   = $sth->fetch(PDO::FETCH_ASSOC);
        // $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateProfile($id, $name, $firstname, $email, $phone, $address, $city, $postal_code)
    {
        $sth = $this->db->prepare('UPDATE User
        SET name = :name, firstname = :firstname, email = :email, phone = :phone, address = :address, city = :city, postal_code = :postal_code
        WHERE id = :id');
        $sth->execute(array(
            ':name' => $name,
            ':firstname' => $firstname,
            ':email' => $email,
            ':phone' => $phone,
            ':address' => $address,
            ':city' => $city,
            ':postal_code' => $postal_code,
            ':id' => $id
        ));
    }

    public function selectAllFood_order()
    {
        $sth = $this->db->prepare('SELECT *
        FROM Food_order');
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    public function selectAllStatus()
    {
        $sth = $this->db->prepare('SELECT *
        FROM Status');
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    public function insertUser($name, $firstname, $email, $password, $phone, $address, $city, $postal)
    {
        $sth = $this->db->prepare('INSERT INTO User(name, firstname, email, password, phone, address, city, postal_code, role) 
        VALUES(:name, :firstname, :email, :password, :phone, :address, :city, :postal, :role)');
        $sth->execute(array(
            'name' => $name,
            'firstname' => $firstname,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'postal' => $postal,
            'role' => 'USER'
        ));
    }
}
