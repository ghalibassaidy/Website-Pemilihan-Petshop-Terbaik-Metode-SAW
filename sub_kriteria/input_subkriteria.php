<?php
                    //Controller Edit Subkriteria
                        // Check If form submitted, insert form data into users table.
                    if(isset($_POST['Submit'])) {
                        $id = $_POST['id_kriteria'];
                        $nama_subkriteria = $_POST['nama_subkriteria'];
                         $nilai = $_POST['nilai'];
                        $keterangan = $_POST['keterangan'];
                       

                        // include database connection file
                        include_once("../aksilogin/config.php");
                                
                        // Insert user data into table
                        $result = mysqli_query($koneksi, "INSERT INTO sub_kriteria VALUES('','$id','$nama_subkriteria','$nilai','$keterangan')");
                        
                        // Show message when user added
                        header("location:../data_sub_kriteria.php?pesan=input&id_kriteria=$id");
                    }
                    ?>