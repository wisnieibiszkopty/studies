<?php

class View {

    protected $content;
    protected $title = "Roksa.pl - reaktywacja";
    protected $keywords = 'narzędzia internetowe, php, formularz, galeria';
    protected $buttons = array(
        "Contact" => "?page=index",
        "Form" => "?page=form",
        "Gallery" => "?page=gallery",
        "About us" => "?page=aboutus"
    );

    public function setContent(string $content){
        $this->content = $content;
    }

    public function setTitle(string $title){
        $this->title = $title;
    }

    public function setKeywords(array $keywords){
        $this->keywords = $keywords;
    }

    public function setButtons(array $buttons){
        $this->buttons = $buttons;
    }

    public function setStyles($url){
        echo '<link rel="stylesheet" href="' . $url . '" type="text/css">';
    }

    public function show(){
        $this->showHeader();
        $this->showContent();
        $this->showFooter();
    }

    public function showTitle(){
        echo "<title>$this->title</title>";
    }

    public function showKeywords(){
        echo "<meta name=\"keywords\" contents=\"$this->keywords\">";
    }

    public function showMenu(){
        echo "<div id='nav'>";
        foreach($this->buttons as $name => $url){
            echo ' <a href="' . $url . '">' . $name . '</a>';
        }
        echo "</div>";
    }

    public function showHeader(){
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
        $this->setStyles('css/styles.css');
        echo "<title>".$this->title."</title></head><body>";
    }

    public function showContent(){
        echo "<div id='content'>";
        echo "<div id='header'>";
        echo "<img src='images/foto.jpg' alt='foto' /></div>";
        echo "<div id='menu'>";
        $this->showMenu();
        echo "</div></div>";
        echo "<div id='main'>";
        echo "<h1>".$this->title."</h1>";
        echo $this->content . "</div>"; }

    public function showFooter(){
        echo '<div>Kamil Wodowski 2024</div>';
        echo '</body></html>';
    }

}
