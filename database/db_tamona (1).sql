-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Feb 2016 pada 13.46
-- Versi Server: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tamona`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_akun`
--

CREATE TABLE IF NOT EXISTS `data_akun` (
  `kode_akun` varchar(6) NOT NULL,
  `nama_akun` text NOT NULL,
  `posisi` text NOT NULL,
  PRIMARY KEY (`kode_akun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_akun`
--

INSERT INTO `data_akun` (`kode_akun`, `nama_akun`, `posisi`) VALUES
('001', 'Pengeluaran Kas Kecil', 'Debit'),
('002', 'Pengeluaran Kas Kecil', 'Kredit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_jabatan`
--

CREATE TABLE IF NOT EXISTS `data_jabatan` (
  `kode_jabatan` varchar(8) NOT NULL,
  `nama_jabatan` varchar(35) NOT NULL,
  PRIMARY KEY (`kode_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_jabatan`
--

INSERT INTO `data_jabatan` (`kode_jabatan`, `nama_jabatan`) VALUES
('JBT001', 'Manager Finance'),
('JBT002', 'Staff Finance'),
('JBT003', 'Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengeluaran`
--

CREATE TABLE IF NOT EXISTS `detail_pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT,
  `no_pengeluaran` varchar(15) NOT NULL,
  `keterangan_keperluan` text NOT NULL,
  `jumlah_pengeluaran` varchar(15) NOT NULL,
  `no_nota/kwitansi` varchar(35) NOT NULL,
  `kode_karyawan` varchar(15) NOT NULL,
  `no_jurnal` varchar(15) NOT NULL,
  `kode_akun_d` varchar(15) NOT NULL,
  `kode_akun_k` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pengeluaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `detail_pengeluaran`
--

INSERT INTO `detail_pengeluaran` (`id_pengeluaran`, `no_pengeluaran`, `keterangan_keperluan`, `jumlah_pengeluaran`, `no_nota/kwitansi`, `kode_karyawan`, `no_jurnal`, `kode_akun_d`, `kode_akun_k`) VALUES
(1, 'PGL02160001', 'beli permen', '50000', 'asderw', 'KRY002', 'JUP0216001', '001', '002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengisian`
--

CREATE TABLE IF NOT EXISTS `detail_pengisian` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `no_pengisian` varchar(15) NOT NULL,
  `saldo_awal` varchar(15) NOT NULL,
  `no_permintaan` varchar(15) NOT NULL,
  `keterangan` text NOT NULL,
  `saldo_akhir` varchar(15) NOT NULL,
  `no_jurnal` varchar(15) NOT NULL,
  `kode_akun_d` varchar(15) NOT NULL,
  `kode_akun_k` varchar(15) NOT NULL,
  `tanggal_detail` date NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `detail_pengisian`
--

INSERT INTO `detail_pengisian` (`id_detail`, `no_pengisian`, `saldo_awal`, `no_permintaan`, `keterangan`, `saldo_akhir`, `no_jurnal`, `kode_akun_d`, `kode_akun_k`, `tanggal_detail`) VALUES
(1, 'PGS02160001', '0', 'PKKJA001', 'ses', '100000', 'JUI0216001', '001', '002', '2016-02-13'),
(2, 'PGS02160002', '100000', 'PKKJA002', 'ok', '300000', 'JUI0216002', '001', '002', '2016-02-13'),
(3, 'PGS02160002', '300000', 'PKKJA002', 'beli permen', '250000', 'JUP0216001', '001', '002', '2016-02-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `kode_karyawan` varchar(10) NOT NULL,
  `nama_karyawan` varchar(35) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(3) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_hp` varchar(12) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `kode_jabatan` varchar(12) NOT NULL,
  PRIMARY KEY (`kode_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`kode_karyawan`, `nama_karyawan`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `nomor_hp`, `agama`, `kode_jabatan`) VALUES
('KRY001', 'Andika', 'jakarta', '2016-01-20', 'L', 'tangerang', '09887878', 'Islam', 'JBT001'),
('KRY002', 'johan', 'tangerang', '2016-01-23', 'L', 'tese', '0999898', 'Islam', 'JBT002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_kaskecil`
--

CREATE TABLE IF NOT EXISTS `pengeluaran_kaskecil` (
  `no_pengeluaran` varchar(15) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `kode_pengguna` varchar(11) NOT NULL,
  PRIMARY KEY (`no_pengeluaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran_kaskecil`
--

INSERT INTO `pengeluaran_kaskecil` (`no_pengeluaran`, `tanggal_pengeluaran`, `kode_pengguna`) VALUES
('PGL02160001', '2016-02-13', 'PGN02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `kode_pengguna` varchar(11) NOT NULL,
  `kode_karyawan` varchar(10) NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`kode_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`kode_pengguna`, `kode_karyawan`, `password`) VALUES
('PGN01', 'KRY001', '123456'),
('PGN02', 'KRY002', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengisian_kecil`
--

CREATE TABLE IF NOT EXISTS `pengisian_kecil` (
  `no_pengisian` varchar(15) NOT NULL,
  `tanggal_pengisian` date NOT NULL,
  `kode_pengguna` varchar(11) NOT NULL,
  PRIMARY KEY (`no_pengisian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengisian_kecil`
--

INSERT INTO `pengisian_kecil` (`no_pengisian`, `tanggal_pengisian`, `kode_pengguna`) VALUES
('PGS02160001', '2016-02-13', 'PGN01'),
('PGS02160002', '2016-02-13', 'PGN01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_kaskecil`
--

CREATE TABLE IF NOT EXISTS `permintaan_kaskecil` (
  `no_permintaan` varchar(15) NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah_kaskecil` varchar(15) NOT NULL,
  `kode_pengguna` varchar(15) NOT NULL,
  PRIMARY KEY (`no_permintaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `permintaan_kaskecil`
--

INSERT INTO `permintaan_kaskecil` (`no_permintaan`, `tanggal_permintaan`, `keterangan`, `jumlah_kaskecil`, `kode_pengguna`) VALUES
('PKKJA001', '2016-02-13', 'tes', '100000', 'PGN01'),
('PKKJA002', '2016-02-13', 'we', '200000', 'PGN01'),
('PKKJA003', '2016-02-14', 'ughk', '50000', 'PGN02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
