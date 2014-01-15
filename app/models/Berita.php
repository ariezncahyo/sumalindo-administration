<?php

class Berita extends Eloquent {

	public $table = 'Berita';

	public $timestamps = true;

	/**
	 * Relasi User.
	 *
	 * @return User
	 */
	public function User()
    {
        return $this->belongsTo("User",'id_user');
    }

    /**
     * Buat url artikel
     *
     * @return $url
     */
    public function UrlBerita()
    {
        return URL::route('tampil-berita', $this->alias);
    }

}