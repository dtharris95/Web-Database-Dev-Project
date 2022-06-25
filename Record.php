<?php

Class Record {
    // Properties
    public $album;
    public $artist;
    public $tracklist;
    public $photo;

    // methods
    function __construct($album, $artist) {
        $this->album = $album;
        $this->artist = $artist;
        // $this->tracklist = $tracklist;
        // $this->photo = $photo;
    }

    function __destruct() {}

    function set_album($album) {
        $this->album = $album;
    }
    function get_album() {
      return $this->album;  
    }
    function set_artist($artist) {
        $this->artist = $artist;
    }
    function get_artist() {
      return $this->artist;  
    }
    function set_tracklist($tracklist) {
        $this->tracklist = $tracklist;
    }
    function get_tracklist() {
      return $this->tracklist;  
    }
    function set_photo($photo) {
        $this->photo = $photo;
    }
    function get_photo() {
      return $this->photo;  
    }

    function echoAlbumAndArtist() {
        echo "$this->album is an album by $this->artist </br>";
    }
}

    $mbdtf = new Record("My Beautiful Dark Twisted Fantasy", "Kanye West");
    $mbdtf->echoAlbumAndArtist();

    $motmone = new Record("Man on The Moon One", "Kid Cudi");
    $motmone->echoAlbumAndArtist();

    $illmatic = new Record("Illmatic", "Nas");
    $illmatic->echoAlbumAndArtist();
