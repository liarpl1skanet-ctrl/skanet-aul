CREATE DATABASE skanet_aul;

USE skanet_aul;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);


CREATE TABLE guru (
    id_guru INT AUTO_INCREMENT PRIMARY KEY,
    nama_guru VARCHAR(100),
    alamat VARCHAR(100)
);


CREATE TABLE siswa (
    id_siswa INT AUTO_INCREMENT PRIMARY KEY,
    nama_siswa VARCHAR(100),
    alamat VARCHAR(50)
);