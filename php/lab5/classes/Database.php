<?php
//require "../vendor/autoload.php";
//
//class Database {
//
//    private $database;
//    private $collection;
//
//    public function __construct(){
//        $client = new MongoDB\Client("mongodb://localhost:27017");
//        $this->database = $client->selectDatabase("TestDB");
//    }
//
//    public function selectCollection(string $collectionName): void {
//        $this->collection = $this->database->selectCollection($collectionName);
//    }
//
//    public function insert($document){
//        $this->collection->insertOne($document);
//    }
//
//    public function findAll(){
//        $data = $this->collection->find();
//        return $data;
//    }
//
//}
//
//?>